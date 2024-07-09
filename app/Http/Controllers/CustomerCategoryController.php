<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class CustomerCategoryController extends Controller
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
        
        
        $customer_categories = DB::table('customer_categories')
                                ->orderBy('id','DESC')
                                ->get();
        return view('customer_categories.index',compact('customer_categories','permitted_menus_array'));
        
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
    

        return view('customer_categories.create',compact('permitted_menus_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer_category = DB::table('customer_categories')
        ->insertGetId([
        'name'=>$request->name,
        'status'=>$request->status ? '1' : '2'
        ]);
    return redirect()->route('customer_category.index')->withSuccess('Customer Category is added successfully'); 
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
        
           
        $customer_category = DB::table('customer_categories')
                             ->where('id',$id)
                             ->first();
        return view('customer_categories.edit',compact('customer_category','permitted_menus_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['status'] = $request->status ? '1' : '2';
        $updated = DB::table('customer_categories')
                  ->where('id', $request->id)
                  ->update($data);
        return redirect()->route('customer_category.index')->withSuccess('Customer Category is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
