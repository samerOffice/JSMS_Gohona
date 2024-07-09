<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class SupplierTransactionController extends Controller
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

        $supplier_transactions = DB::table('supplier_transactions as st1')
        ->join('suppliers', 'st1.supplier_id', '=', 'suppliers.id')
        ->join(DB::raw('(SELECT MAX(id) as id, SUM(due_amount) as total_due_amount FROM supplier_transactions GROUP BY supplier_id) as st2'), 
        function($join) {
            $join->on('st1.id', '=', 'st2.id');
        })
        ->select(
            'st1.id',
            // 'st1.transaction_date',
            // 'st1.reference',
            'st1.supplier_id',
            // 'st1.description',
            // 'st1.bill_amount',
            // 'st1.paid_amount',
            // 'st1.due_amount',
            'suppliers.name as supplier_name',
            'suppliers.mobile_no as supplier_mobile_no',
            'st2.total_due_amount'
        )
        ->orderBy('st1.id','DESC')
        ->get();
                        
        return view('supplier_transactions.index',compact('supplier_transactions','permitted_menus_array'));
    }

    public function supplier_transaction_list(){
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $supplier_transactions = DB::table('supplier_transactions')
                ->leftJoin('suppliers','supplier_transactions.supplier_id','suppliers.id')
                ->select('supplier_transactions.*','suppliers.name as supplier_name', 'suppliers.mobile_no as supplier_mobile_no' )
                ->orderBy('supplier_transactions.id','DESC')
                ->get();

    return view('supplier_transactions.transaction_list',compact('supplier_transactions','permitted_menus_array'));
    }

    public function view_supplier_transaction(string $id){
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);


        $supplier_info = DB::table('supplier_transactions')
        ->leftJoin('suppliers', 'supplier_transactions.supplier_id', '=', 'suppliers.id')
        ->select(
            'supplier_transactions.supplier_id', 
            DB::raw('SUM(supplier_transactions.due_amount) as total_due_amount'), 
            'suppliers.name as supplier_name', 
            'suppliers.mobile_no as supplier_mobile_no'
        )
        ->where('supplier_transactions.supplier_id', $id)
        ->groupBy('supplier_transactions.supplier_id', 'suppliers.name', 'suppliers.mobile_no')
        ->first();

        $supplier_transactions = DB::table('supplier_transactions')
                                ->where('supplier_id',$id)
                                ->get();

        return view('supplier_transactions.view',compact('supplier_transactions','supplier_info','permitted_menus_array'));
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

        $suppliers = DB::table('suppliers')->get();
       
        return view('supplier_transactions.create',compact('permitted_menus_array','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer_transaction = DB::table('supplier_transactions')
        ->insertGetId([
        'transaction_date'=>Carbon::now()->toDateString(),
        'reference'=>$request->reference,
        'supplier_id'=>$request->supplier_id,
        'description'=>$request->description,
        'bill_amount'=>$request->bill_amount,
        'paid_amount'=>$request->paid_amount,
        'due_amount'=>$request->due_amount
        
        ]);
        return redirect()->route('supplier_transaction.index')->withSuccess('Supplier Transaction is added successfully'); 
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
        
        $supplier_transaction = DB::table('supplier_transactions')
        ->leftJoin('suppliers','supplier_transactions.supplier_id','suppliers.id')
        ->select('supplier_transactions.*','suppliers.name as supplier_name', 'suppliers.mobile_no as supplier_mobile_no' )
        ->where('supplier_transactions.id',$id)
        ->first();

        $suppliers = DB::table('suppliers')->get();
       
        return view('supplier_transactions.edit',compact('supplier_transaction','suppliers','permitted_menus_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['reference'] = $request->reference;
        $data['supplier_id'] = $request->supplier_id;
        $data['description'] = $request->description;
        $data['bill_amount'] = $request->bill_amount;
        $data['paid_amount'] = $request->paid_amount;
        $data['due_amount'] = $request->due_amount;
      
        $updated = DB::table('supplier_transactions')
                  ->where('id', $request->id)
                  ->update($data);
        return redirect()->route('supplier_transaction.transaction_list')->withSuccess('Supplier Transaction is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_supplier_transaction($id){

        $deleted = DB::table('supplier_transactions')
                  ->where('id', $id)
                  ->delete();
        return redirect()->route('supplier_transaction.transaction_list')->withSuccess('Supplier Transaction is deleted successfully');   
    }
}
