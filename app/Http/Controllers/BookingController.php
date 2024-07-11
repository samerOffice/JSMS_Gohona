<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $bookings = DB::table('bookings')
                            ->leftJoin('customers','bookings.client_id','customers.id')
                            ->select('bookings.*','customers.name as customer_name',)
                            ->orderBy('bookings.id','DESC')
                            ->get();


        return view('bookings.index',compact('bookings','permitted_menus_array'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_role = Auth::user()->role_id;
        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

         $products = DB::table('products')
                    ->where('status',1)
                    ->get();
         $customers = DB::table('customers')->get();
         $users = DB::table('users')->get();

        //  $payment_types = DB::table('payment_methods')
        //                   ->groupBy('under_type')
        //                   ->get('under_type');

        // dd($payment_types);

        //  $payment_types = DB::table('payment_methods')
        //                   ->groupBy('under_type')
        //                   ->get('under_type');

        // dd($payment_types);
       
        return view('bookings.create',compact('permitted_menus_array','products','customers','users'));
    }


    public function productDependancy(Request $request){
        
        $selectedProductId = $request->input('data');
        $product = DB::table('products')
                    ->where('id',$selectedProductId)
                    ->first();


        return response()->json([
            'status' => 'success',
            'id' => $product->id,
            'product_nr' => $product->product_nr,
            'product_details' => $product->product_details,
            'weight' => $product->weight,
            'st_dia' => $product->st_or_dia,
            'st_dia_price' => $product->st_or_dia_price,
            'wage' => $product->wage,
            'wage_type' => $product->wage_type
        ], 200);
      }


      public function clientDependancy(Request $request){
        
        $selectedClientId = $request->input('data');
        $client = DB::table('customers')
                    ->where('id',$selectedClientId)
                    ->first();


        return response()->json([
            'status' => 'success',
            'id' => $client->id,
            'name' => $client->name,
            'mobile_number' => $client->mobile_number,
            'address' => $client->address
            
        ], 200);
      }


      public function paymentMethodDependancy(Request $request){
        
        $selectedPaymentMethod = $request->input('data');

        $payment_methods = DB::table('payment_methods')
                    ->where('under_type',$selectedPaymentMethod)
                    ->get();
  
      $str="<option value=''>-- Select --</option>";
      foreach ($payment_methods as $payment_method) {
         $str .= "<option value='$payment_method->id'> $payment_method->name </option>";
         
      }
      echo $str;
      }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $randomPart1 = $this->generateRandomDigits(9); // Generates the first part (9 digits)
        $randomPart2 = $this->generateRandomDigits(4); // Generates the second part (4 digits)

        $company_bin_no = DB::table('settings')->first();

        $binNumber = $company_bin_no->bin;

        // $binNumber = $randomPart1 . '-' . $randomPart2;

        $booking_number = mt_rand(100000, 999999);

        $booking = DB::table('bookings')->insertGetId([
            'booking_number' => $booking_number,
            'bin_no' => $binNumber,
            'booking_date' => Carbon::now()->toDateString(),
            'client_id' => $request->client,
            'user_id' => $request->booked_by,
            'item_total_amount' => $request->item_total_amount,
            'vat_amount' => $request->total_vat_amount,
            'subtotal_amount' => $request->subtotal_amount,
            'discount_amount' => $request->discount,
            'total_amount' => $request->total_amount_after_discount,
            'total_paid_amount' => $request->paid,
            'total_due_amount' => $request->due
        ]);

        $booking_num = DB::table('bookings')
                       ->where('id',$booking)
                       ->first();

        $last_booking_number = $booking_num->booking_number;

        // Insert each unit_price and wage into booking_calculations
        $product_ids = $request->product_id;
        $unit_price_amounts = $request->unit_price;
        $wages = $request->wage;
        $payment_types = $request->payment;
        $payment_infos = $request->payment_info;
        $references = $request->reference;
        $payment_amounts = $request->amount;

        foreach ($product_ids as $key => $product_id) {
            $unit_price_amount = $unit_price_amounts[$key] ?? null; 
            $wage = $wages[$key] ?? null;
            $payment_type = $payment_types[$key] ?? null;
            $payment_info = $payment_infos[$key] ?? null;
            $reference = $references[$key] ?? null;
            $payment_amount = $payment_amounts[$key] ?? null;

            DB::table('booking_calculations')->insert([
                'booking_number' => $last_booking_number,
                'booking_date' => Carbon::now()->toDateString(),
                'product_id' => $product_id,
                'unit_price_amount' => $unit_price_amount,
                'wage' => $wage
                // 'payment_type' => $payment_type,
                // 'payment_info' => $payment_info,
                // 'reference' => $reference,
                // 'payment_amount' => $payment_amount                
            ]);

            DB::table('booking_payment_calculations')->insert([
                'booking_number' => $last_booking_number,
                'booking_date' => Carbon::now()->toDateString(),
                'payment_type' => $payment_type,
                'payment_info' => $payment_info,
                'reference' => $reference,
                'payment_amount' => $payment_amount             
            ]);

            $data = array();
            $data['status']=3;
            $updated = DB::table('products')
                  ->where('id', $product_id)
                  ->update($data);
        }

    //  return redirect()->route('booking.index')->withSuccess('Booking is added successfully');
     return redirect()->route('preview_last_booking');
    }

    private function generateRandomDigits($length)
    {
        return str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
    }




    public function preview_last_booking(){
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        
        $last_inserted_data = DB::table('bookings')
                             ->orderBy('id', 'desc')
                             ->first();

        $last_inserted_id = $last_inserted_data->id;

        $booking = DB::table('bookings')
                ->leftJoin('customers','bookings.client_id','customers.id')
                ->leftJoin('users','bookings.user_id','users.id')
                ->select('bookings.*',
                'customers.name as customer_name',
                'users.name as user_name',
                'customers.address as customer_address',
                'customers.mobile_number as customer_mobile_number'
                )
                ->where('bookings.id',$last_inserted_id)
                ->first();
      
        $booked_product_details = DB::table('booking_calculations')
                                ->leftJoin('products','booking_calculations.product_id','products.id')
                                ->leftJoin('bookings','booking_calculations.booking_number','bookings.booking_number')
                                ->select('booking_calculations.*',
                                        'products.product_nr as token_no',
                                        'products.product_details as product_details',
                                        'products.weight as product_weight',
                                        'products.st_or_dia as product_st_or_dia',
                                        'products.st_or_dia_price as product_st_or_dia_price',
                                        'booking_calculations.wage as product_wage',
                                        DB::raw('products.weight * booking_calculations.unit_price_amount as product_individual_total_amount')                                  
                                        )
                                        ->where('bookings.id',$last_inserted_id)
                                        ->get();


        $payment_infos = DB::table('booking_payment_calculations')
                         ->leftJoin('bookings','booking_payment_calculations.booking_number','bookings.booking_number')
                         ->where('bookings.id',$last_inserted_id)
                         ->get();

        $totals = DB::table('booking_calculations')
                    ->leftJoin('products', 'booking_calculations.product_id', '=', 'products.id')
                    ->leftJoin('bookings', 'booking_calculations.booking_number', '=', 'bookings.booking_number')
                    ->select(
                        DB::raw('SUM(booking_calculations.wage) as total_wage'),
                        DB::raw('SUM(products.weight) as total_weight'),
                        DB::raw('SUM(products.weight * booking_calculations.unit_price_amount) as sum_of_product_individual_total_amount')
                     )
                    ->where('bookings.id', $last_inserted_id)
                    ->first();

        return view('bookings.preview',compact('permitted_menus_array','booking','booked_product_details','payment_infos','totals'));
    }




    
    public function preview_booking(string $id){
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        
        // $last_inserted_data = DB::table('bookings')
        //                      ->orderBy('id', 'desc')
        //                      ->first();

        // $last_inserted_id = $last_inserted_data->id;

        $booking = DB::table('bookings')
                ->leftJoin('customers','bookings.client_id','customers.id')
                ->leftJoin('users','bookings.user_id','users.id')
                ->select('bookings.*',
                'customers.name as customer_name',
                'users.name as user_name',
                'customers.address as customer_address',
                'customers.mobile_number as customer_mobile_number'
                )
                ->where('bookings.id',$id)
                ->first();
      
        $booked_product_details = DB::table('booking_calculations')
                                ->leftJoin('products','booking_calculations.product_id','products.id')
                                ->leftJoin('bookings','booking_calculations.booking_number','bookings.booking_number')
                                ->select('booking_calculations.*',
                                        'products.product_nr as token_no',
                                        'products.product_details as product_details',
                                        'products.weight as product_weight',
                                        'products.st_or_dia as product_st_or_dia',
                                        'products.st_or_dia_price as product_st_or_dia_price',
                                        'booking_calculations.wage as product_wage',
                                        DB::raw('products.weight * booking_calculations.unit_price_amount as product_individual_total_amount')                                  
                                        )
                                        ->where('bookings.id',$id)
                                        ->get();


        $payment_infos = DB::table('booking_payment_calculations')
                         ->leftJoin('bookings','booking_payment_calculations.booking_number','bookings.booking_number')
                         ->where('bookings.id',$id)
                         ->get();

        $totals = DB::table('booking_calculations')
                    ->leftJoin('products', 'booking_calculations.product_id', '=', 'products.id')
                    ->leftJoin('bookings', 'booking_calculations.booking_number', '=', 'bookings.booking_number')
                    ->select(
                        DB::raw('SUM(booking_calculations.wage) as total_wage'),
                        DB::raw('SUM(products.weight) as total_weight'),
                        DB::raw('SUM(products.weight * booking_calculations.unit_price_amount) as sum_of_product_individual_total_amount')
                     )
                    ->where('bookings.id', $id)
                    ->first();

        return view('bookings.preview',compact('permitted_menus_array','booking','booked_product_details','payment_infos','totals'));
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

  
}
