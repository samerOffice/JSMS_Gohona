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
        $binNumber = $randomPart1 . '-' . $randomPart2;

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
                'wage' => $wage,
                'payment_type' => $payment_type,
                'payment_info' => $payment_info,
                'reference' => $reference,
                'payment_amount' => $payment_amount
                
            ]);
        }

     return redirect()->route('booking.index')->withSuccess('Booking is added successfully'); 
    }

    private function generateRandomDigits($length)
    {
        return str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
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

    public function bookingPreviewData(Request $request){

        $selectedPaymentMethod = $request->input('data');

        return response()->json([
            'status' => 'success',
            'info' => $selectedPaymentMethod
                    
        ], 200);

    }

    public function bookingPreview(){
        // $user_role = Auth::user()->role_id;

        // $menu_data = DB::table('menu_permissions')
        //         ->where('role',$user_role)
        //         ->first();
        // $permitted_menus = $menu_data->menus;
        // $permitted_menus_array = explode(',', $permitted_menus);
        // return view('bookings.preview', compact('permitted_menus_array'));
        return view('bookings.preview');
    }
}
