<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Auth;

class CustomerTransactionController extends Controller
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

    $customer_transactions = DB::table('customer_transactions')
                ->leftJoin('customers','customer_transactions.customer_id','customers.id')
                ->select('customer_transactions.*','customers.name as customer_name', 'customers.mobile_number as customer_mobile_no')
                ->orderBy('customer_transactions.id','DESC')
                ->get();

    return view('customer_transactions.index',compact('customer_transactions','permitted_menus_array'));
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

        $customers = DB::table('customers')->get();
       
        return view('customer_transactions.create',compact('permitted_menus_array','customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer_transaction = DB::table('customer_transactions')
        ->insertGetId([
        'transaction_date'=>Carbon::now()->toDateString(),
        'cash_memo_no'=>$request->cash_memo_no,
        'customer_id'=>$request->customer_id,
        'description'=>$request->description,
        'bill_amount'=>$request->bill_amount,
        'paid_amount'=>$request->paid_amount,
        'due_amount'=>$request->due_amount
        
        ]);
        return redirect()->route('customer_transaction.index')->withSuccess('Customer Transaction is added successfully'); 
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
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);
        
           
        $customer_transaction = DB::table('customer_transactions')
                                ->leftJoin('customers','customer_transactions.customer_id','customers.id')
                                ->select('customer_transactions.*','customers.name as customer_name', 'customers.mobile_number as customer_mobile_number' )
                                ->where('customer_transactions.id',$id)
                                ->first();


        $customers = DB::table('customers')->get();
       
        return view('customer_transactions.edit',compact('customer_transaction','customers','permitted_menus_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['cash_memo_no'] = $request->cash_memo_no;
        $data['customer_id'] = $request->customer_id;
        $data['description'] = $request->description;
        $data['bill_amount'] = $request->bill_amount;
        $data['paid_amount'] = $request->paid_amount;
        $data['due_amount'] = $request->due_amount;
      
        $updated = DB::table('customer_transactions')
                  ->where('id', $request->id)
                  ->update($data);
        return redirect()->route('customer_transaction.index')->withSuccess('Customer Transaction is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_customer_transaction($id){

        $deleted = DB::table('customer_transactions')
                  ->where('id', $id)
                  ->delete();
        return redirect()->route('customer_transaction.index')->withSuccess('Customer Transaction is deleted successfully');   
    }
}
