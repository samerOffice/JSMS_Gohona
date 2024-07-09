<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SaleController extends Controller
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

        $sales = DB::table('sales')
                ->leftJoin('customers','sales.client_id','customers.id')
                ->leftJoin('sale_types','sales.sale_type','sale_types.id')
                ->select('sales.*','customers.name as customer_name','sale_types.name as sale_type_name')
                ->orderBy('sales.id','DESC')
                ->get();

        return view('sales.index',compact('sales','permitted_menus_array'));
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
         $sale_types = DB::table('sale_types')
                    ->where('status',1)
                    ->get();
         $customers = DB::table('customers')->get();
         $users = DB::table('users')->get();

       
        return view('sales.create',compact('permitted_menus_array','products','sale_types','customers','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $randomPart1 = $this->generateRandomDigits(9); // Generates the first part (9 digits)
        $randomPart2 = $this->generateRandomDigits(4); // Generates the second part (4 digits)
        $binNumber = $randomPart1 . '-' . $randomPart2;

        $sale_number = mt_rand(100000, 999999);

        $sale = DB::table('sales')->insertGetId([
            'sale_number' => $sale_number,
            'sale_type' => $request->sale_type,
            'bin_no' => $binNumber,
            'sale_date' => Carbon::now()->toDateString(),
            'client_id' => $request->client,
            'user_id' => $request->booked_by,
            'item_total_amount' => $request->item_total_amount,
            'vat_amount' => $request->total_vat_amount,
            'subtotal_amount' => $request->subtotal_amount,
            'discount_amount' => $request->discount,
            'total_amount' => $request->total_amount_after_discount,
            'total_paid_amount' => $request->paid,
            'total_return_amount' => $request->return_amount,
            'total_due_amount' => $request->due
        ]);

        $sale_num = DB::table('sales')
                       ->where('id',$sale)
                       ->first();

        $last_sale_number = $sale_num->sale_number;

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

            DB::table('sale_calculations')->insert([
                'sale_number' => $last_sale_number,
                'sale_date' => Carbon::now()->toDateString(),
                'product_id' => $product_id,
                'unit_price_amount' => $unit_price_amount,
                'wage' => $wage
                // 'payment_type' => $payment_type,
                // 'payment_info' => $payment_info,
                // 'reference' => $reference,
                // 'payment_amount' => $payment_amount
                
            ]);

            DB::table('sale_payment_calculations')->insert([
                'sale_number' => $last_sale_number,
                'sale_date' => Carbon::now()->toDateString(),
                'payment_type' => $payment_type,
                'payment_info' => $payment_info,
                'reference' => $reference,
                'payment_amount' => $payment_amount             
            ]);

            $data = array();      
            $data['status']=2;
            $updated = DB::table('products')
                  ->where('id', $product_id)
                  ->update($data);
        }
    return redirect()->route('preview_last_sale');
    }

    private function generateRandomDigits($length)
    {
        return str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
    }


    public function preview_last_sale(){
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        
        $last_inserted_data = DB::table('sales')
                             ->orderBy('id', 'desc')
                             ->first();

        $last_inserted_id = $last_inserted_data->id;

        $sale = DB::table('sales')
                ->leftJoin('customers','sales.client_id','customers.id')
                ->leftJoin('users','sales.user_id','users.id')
                ->leftJoin('sale_types','sales.sale_type','sale_types.id')
                ->select('sales.*',
                'customers.name as customer_name',
                'users.name as user_name',
                'customers.address as customer_address',
                'customers.mobile_number as customer_mobile_number',
                'sale_types.name as sale_type_name')
                ->where('sales.id',$last_inserted_id)
                ->first();
      
        $sold_product_details = DB::table('sale_calculations')
                                ->leftJoin('products','sale_calculations.product_id','products.id')
                                ->leftJoin('sales','sale_calculations.sale_number','sales.sale_number')
                                ->select('sale_calculations.*',
                                        'products.product_nr as token_no',
                                        'products.product_details as product_details',
                                        'products.weight as product_weight',
                                        'products.st_or_dia as product_st_or_dia',
                                        'products.st_or_dia_price as product_st_or_dia_price',
                                        'sale_calculations.wage as product_wage',
                                        DB::raw('products.weight * sale_calculations.unit_price_amount as product_individual_total_amount')                                  
                                        )
                                        ->where('sales.id',$last_inserted_id)
                                        ->get();


        $payment_infos = DB::table('sale_payment_calculations')
                         ->leftJoin('sales','sale_payment_calculations.sale_number','sales.sale_number')
                         ->where('sales.id',$last_inserted_id)
                         ->get();

        $totals = DB::table('sale_calculations')
                    ->leftJoin('products', 'sale_calculations.product_id', '=', 'products.id')
                    ->leftJoin('sales', 'sale_calculations.sale_number', '=', 'sales.sale_number')
                    ->where('sales.id', $last_inserted_id)
                    ->select(
                        DB::raw('SUM(sale_calculations.wage) as total_wage'),
                        DB::raw('SUM(products.weight) as total_weight'),
                        DB::raw('SUM(products.weight * sale_calculations.unit_price_amount) as sum_of_product_individual_total_amount')
                    )
                    ->first();

        return view('sales.preview',compact('permitted_menus_array','sale','sold_product_details','payment_infos','totals'));
    }



    public function preview_sale(string $id){
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        
        // $last_inserted_data = DB::table('sales')
        //                      ->orderBy('id', 'desc')
        //                      ->first();

        // $last_inserted_id = $last_inserted_data->id;

        $sale = DB::table('sales')
                ->leftJoin('customers','sales.client_id','customers.id')
                ->leftJoin('users','sales.user_id','users.id')
                ->leftJoin('sale_types','sales.sale_type','sale_types.id')
                ->select('sales.*',
                'customers.name as customer_name',
                'users.name as user_name',
                'customers.address as customer_address',
                'customers.mobile_number as customer_mobile_number',
                'sale_types.name as sale_type_name')
                ->where('sales.id',$id)
                ->first();
      
        $sold_product_details = DB::table('sale_calculations')
                                ->leftJoin('products','sale_calculations.product_id','products.id')
                                ->leftJoin('sales','sale_calculations.sale_number','sales.sale_number')
                                ->select('sale_calculations.*',
                                        'products.product_nr as token_no',
                                        'products.product_details as product_details',
                                        'products.weight as product_weight',
                                        'products.st_or_dia as product_st_or_dia',
                                        'products.st_or_dia_price as product_st_or_dia_price',
                                        'sale_calculations.wage as product_wage',
                                        DB::raw('products.weight * sale_calculations.unit_price_amount as product_individual_total_amount')                                  
                                        )
                                        ->where('sales.id',$id)
                                        ->get();


        $payment_infos = DB::table('sale_payment_calculations')
                        ->leftJoin('sales','sale_payment_calculations.sale_number','sales.sale_number')
                        ->where('sales.id',$id)
                        ->get();

        $totals = DB::table('sale_calculations')
        ->leftJoin('products', 'sale_calculations.product_id', '=', 'products.id')
        ->leftJoin('sales', 'sale_calculations.sale_number', '=', 'sales.sale_number')
        ->where('sales.id', $id)
        ->select(
            DB::raw('SUM(sale_calculations.wage) as total_wage'),
            DB::raw('SUM(products.weight) as total_weight'),
            DB::raw('SUM(products.weight * sale_calculations.unit_price_amount) as sum_of_product_individual_total_amount')
        )
        ->first();
        return view('sales.preview',compact('permitted_menus_array','sale','sold_product_details','payment_infos','totals'));
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
