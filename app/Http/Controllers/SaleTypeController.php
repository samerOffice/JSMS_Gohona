<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class SaleTypeController extends Controller
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
        
        $sale_types = DB::table('sale_types')
                        ->orderBy('id','DESC')
                        ->get();                               
        return view('sale_types.index',compact('sale_types','permitted_menus_array'));
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
        
        return view('sale_types.create',compact('permitted_menus_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sale_type = DB::table('sale_types')
        ->insertGetId([
        'name'=>$request->name,
        'status'=>$request->status ? '1' : '2'
        ]);
    return redirect()->route('sale_type.index')->withSuccess('Sale Type is added successfully'); 
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
        
        $sale_type = DB::table('sale_types')
        ->where('id',$id)
        ->first();
     return view('sale_types.edit',compact('sale_type','permitted_menus_array'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['status'] = $request->status ? '1' : '2';
        $updated = DB::table('sale_types')
                  ->where('id', $request->id)
                  ->update($data);
        return redirect()->route('sale_type.index')->withSuccess('Sale Type is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
