<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class SupplierController extends Controller
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
        
        $suppliers = DB::table('suppliers')
                    ->orderBy('id','DESC')
                    ->get();
        return view('suppliers.index',compact('suppliers','permitted_menus_array'));
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

        return view('suppliers.create',compact('permitted_menus_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $supplier = DB::table('suppliers')
        ->insertGetId([
        'name'=>$request->name,
        'mobile_no'=>$request->mobile_no,
        'due_amount'=>$request->due_amount
        ]);
    return redirect()->route('supplier.index')->withSuccess('Supplier is added successfully'); 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
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
        
        $supplier = DB::table('suppliers')
        ->where('id',$id)
        ->first();
      return view('suppliers.edit',compact('supplier','permitted_menus_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['mobile_no'] = $request->mobile_no;
        $data['due_amount'] = $request->due_amount;
        $updated = DB::table('suppliers')
                  ->where('id', $request->id)
                  ->update($data);
        return redirect()->route('supplier.index')->withSuccess('Supplier Details is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }

    public function delete_supplier($id){

        $deleted = DB::table('suppliers')
                  ->where('id', $id)
                  ->delete();
        return redirect()->route('supplier.index')->withSuccess('Supplier is deleted successfully');   
    }
}
