<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class StockController extends Controller
{
   

        //------------*********** Stock Type (start) *****************----------
        public function stock_list()
        {
            
            $user_role = Auth::user()->role_id;
    
            $menu_data = DB::table('menu_permissions')
                    ->where('role',$user_role)
                    ->first();
            $permitted_menus = $menu_data->menus;
            $permitted_menus_array = explode(',', $permitted_menus);
    
            $stocks = DB::table('stocks')->get();
    
            return view('stocks.stock_list',compact('permitted_menus_array','stocks'));
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
    
            return view('stocks.create',compact('permitted_menus_array'));
        }
    
    
         /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            // $currentDate = Carbon::now()->format('Y-m-d');
            $currentYear = Carbon::now()->year;
            $currentMonth = Carbon::now()->format('m');
            // $currentDate = Carbon::now()->format('d');
    
            $randomPart = $this->generateRandomDigits(3);
    
    
            $stock_memo = $currentYear.''.$currentMonth.'-'.$randomPart;
            $stock_date = $request->stock_date;
            $stock_name = $request->stock_name;
    
            $stock = DB::table('stocks')
            ->insertGetId([
            'stock_memo'=>$stock_memo,
            'stock_date'=>$stock_date,
            'stock_name'=>$stock_name
            ]);
        return redirect()->route('stock.index')->withSuccess('Stock is added successfully'); 
           
        }
        //------------*********** Stock Type (end) *****************----------




        //------------*********** Stock Sale (start) *****************----------

        public function index()
        {
            
            $user_role = Auth::user()->role_id;
    
            $menu_data = DB::table('menu_permissions')
                    ->where('role',$user_role)
                    ->first();
            $permitted_menus = $menu_data->menus;
            $permitted_menus_array = explode(',', $permitted_menus);
    
    
            $sales = DB::table('stock_sales')
            ->leftJoin('customers','stock_sales.client_id','customers.id')
            ->leftJoin('sale_types','stock_sales.sale_type','sale_types.id')
            ->select('stock_sales.*','customers.name as customer_name','sale_types.name as sale_type_name')
            ->orderBy('stock_sales.id','DESC')
            ->get();
    
            return view('stocks.index',compact('permitted_menus_array','sales'));
        }
    
    
    
        public function stock_sale_create(){
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
        
            return view('stocks.stock_sale_create',compact('permitted_menus_array','products','sale_types','customers','users'));
        }
    
    
    
        public function stock_sale_store(Request $request)
        {
    
            $company_bin_no = DB::table('settings')->first();
            $binNumber = $company_bin_no->bin;
    
            $sale_number = mt_rand(100000, 999999);
    
            $sale = DB::table('stock_sales')->insertGetId([
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
    
            $sale_num = DB::table('stock_sales')
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
    
                DB::table('stock_sale_calculations')->insert([
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
    
                DB::table('stock_sale_payment_calculations')->insert([
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
        return redirect()->route('preview_last_stock_sale');
        }
    
    
        public function preview_last_stock_sale(){
            
            $user_role = Auth::user()->role_id;
    
            $menu_data = DB::table('menu_permissions')
                    ->where('role',$user_role)
                    ->first();
            $permitted_menus = $menu_data->menus;
            $permitted_menus_array = explode(',', $permitted_menus);
    
            
            $last_inserted_data = DB::table('stock_sales')
                                 ->orderBy('id', 'desc')
                                 ->first();
    
            $last_inserted_id = $last_inserted_data->id;
    
            $sale = DB::table('stock_sales')
                    ->leftJoin('customers','stock_sales.client_id','customers.id')
                    ->leftJoin('users','stock_sales.user_id','users.id')
                    ->leftJoin('sale_types','stock_sales.sale_type','sale_types.id')
                    ->select('stock_sales.*',
                    'customers.name as customer_name',
                    'users.name as user_name',
                    'customers.address as customer_address',
                    'customers.mobile_number as customer_mobile_number',
                    'sale_types.name as sale_type_name')
                    ->where('stock_sales.id',$last_inserted_id)
                    ->first();
          
            $sold_product_details = DB::table('stock_sale_calculations')
                                    ->leftJoin('products','stock_sale_calculations.product_id','products.id')
                                    ->leftJoin('stock_sales','stock_sale_calculations.sale_number','stock_sales.sale_number')
                                    ->select('stock_sale_calculations.*',
                                            'products.product_nr as token_no',
                                            'products.product_details as product_details',
                                            'products.weight as product_weight',
                                            'products.st_or_dia as product_st_or_dia',
                                            'products.st_or_dia_price as product_st_or_dia_price',
                                            'stock_sale_calculations.wage as product_wage',
                                            DB::raw('products.weight * stock_sale_calculations.unit_price_amount as product_individual_total_amount')                                  
                                            )
                                            ->where('stock_sales.id',$last_inserted_id)
                                            ->get();
    
    
            $payment_infos = DB::table('stock_sale_payment_calculations')
                             ->leftJoin('stock_sales','stock_sale_payment_calculations.sale_number','stock_sales.sale_number')
                             ->where('stock_sales.id',$last_inserted_id)
                             ->get();
    
            $totals = DB::table('stock_sale_calculations')
                        ->leftJoin('products', 'stock_sale_calculations.product_id', '=', 'products.id')
                        ->leftJoin('stock_sales', 'stock_sale_calculations.sale_number', '=', 'stock_sales.sale_number')
                        ->where('stock_sales.id', $last_inserted_id)
                        ->select(
                            DB::raw('SUM(stock_sale_calculations.wage) as total_wage'),
                            DB::raw('SUM(products.weight) as total_weight'),
                            DB::raw('SUM(products.weight * stock_sale_calculations.unit_price_amount) as sum_of_product_individual_total_amount')
                        )
                        ->first();
    
            return view('stocks.stock_sale_preview',compact('permitted_menus_array','sale','sold_product_details','payment_infos','totals'));
        }



        public function preview_stock_sale(string $id){
        
            $user_role = Auth::user()->role_id;
    
            $menu_data = DB::table('menu_permissions')
                    ->where('role',$user_role)
                    ->first();
            $permitted_menus = $menu_data->menus;
            $permitted_menus_array = explode(',', $permitted_menus);
    
        
    
            $sale = DB::table('stock_sales')
                    ->leftJoin('customers','stock_sales.client_id','customers.id')
                    ->leftJoin('users','stock_sales.user_id','users.id')
                    ->leftJoin('sale_types','stock_sales.sale_type','sale_types.id')
                    ->select('stock_sales.*',
                    'customers.name as customer_name',
                    'users.name as user_name',
                    'customers.address as customer_address',
                    'customers.mobile_number as customer_mobile_number',
                    'sale_types.name as sale_type_name')
                    ->where('stock_sales.id',$id)
                    ->first();
          
            $sold_product_details = DB::table('stock_sale_calculations')
                                    ->leftJoin('products','stock_sale_calculations.product_id','products.id')
                                    ->leftJoin('stock_sales','stock_sale_calculations.sale_number','stock_sales.sale_number')
                                    ->select('stock_sale_calculations.*',
                                            'products.product_nr as token_no',
                                            'products.product_details as product_details',
                                            'products.weight as product_weight',
                                            'products.st_or_dia as product_st_or_dia',
                                            'products.st_or_dia_price as product_st_or_dia_price',
                                            'stock_sale_calculations.wage as product_wage',
                                            DB::raw('products.weight * stock_sale_calculations.unit_price_amount as product_individual_total_amount')                                  
                                            )
                                            ->where('stock_sales.id',$id)
                                            ->get();
    
    
            $payment_infos = DB::table('stock_sale_payment_calculations')
                            ->leftJoin('stock_sales','stock_sale_payment_calculations.sale_number','stock_sales.sale_number')
                            ->where('stock_sales.id',$id)
                            ->get();
    
            $totals = DB::table('stock_sale_calculations')
            ->leftJoin('products', 'stock_sale_calculations.product_id', '=', 'products.id')
            ->leftJoin('stock_sales', 'stock_sale_calculations.sale_number', '=', 'stock_sales.sale_number')
            ->where('stock_sales.id', $id)
            ->select(
                DB::raw('SUM(stock_sale_calculations.wage) as total_wage'),
                DB::raw('SUM(products.weight) as total_weight'),
                DB::raw('SUM(products.weight * stock_sale_calculations.unit_price_amount) as sum_of_product_individual_total_amount')
            )
            ->first();
            return view('stocks.stock_sale_preview',compact('permitted_menus_array','sale','sold_product_details','payment_infos','totals'));
        }
    
    
    
    
    
        private function generateRandomDigits($length)
        {
            return str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
        }
        //------------*********** Stock Sale (end) *****************----------







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
