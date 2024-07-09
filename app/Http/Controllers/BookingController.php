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
        //
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
