<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class SettingController extends Controller
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
        
        $settings = DB::table('settings')->first();
        
        return view('settings.index',compact('settings','permitted_menus_array'));
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
        
        return view('settings.create',compact('permitted_menus_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $settings = DB::table('settings')
        ->insertGetId([
        'company_name'=>$request->company_name,
        'company_cell'=>$request->company_cell,
        'bin'=>$request->bin,
        'jakat'=>$request->jakat
        ]);
        return redirect()->route('settings.index'); 
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
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);
        
        
        $data = array();
        $data['company_name'] = $request->company_name;
        $data['company_cell'] = $request->company_cell;
        $data['bin'] = $request->bin;
        $data['jakat'] = $request->jakat;

        $updated = DB::table('settings')
                  ->where('id', $request->id)
                  ->update($data);

        $settings = DB::table('settings')->first();

        return view('settings.index',compact('settings','permitted_menus_array'))->withSuccess('Settings updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
