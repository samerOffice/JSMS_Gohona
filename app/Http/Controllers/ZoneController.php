<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ZoneController extends Controller
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
        
        $zones = DB::table('zones')
                ->leftJoin('districts', 'zones.district_id', '=', 'districts.id')
                ->select('zones.*', 'districts.name as district_name')
                ->orderBy('zones.id','DESC')
                ->get();
        return view('zones.index',compact('zones','permitted_menus_array'));
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
        
        $districts = DB::table('districts')->get();
        return view('zones.create',compact('districts','permitted_menus_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $zone = DB::table('zones')
        ->insertGetId([
        'name'=>$request->name,
        'district_id'=>$request->district_id,
        'note'=>$request->note,
        'status'=>$request->status ? '1' : '2'
        ]);
        return redirect()->route('zone.index')->withSuccess('Zone is added successfully'); 
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
        
        $districts = DB::table('districts')->get();
        $zone = DB::table('zones')
              ->leftJoin('districts', 'zones.district_id', '=', 'districts.id')
              ->select('zones.*', 'districts.name as district_name')
              ->where('zones.id',$id)
              ->first();

        
     return view('zones.edit',compact('zone','districts','permitted_menus_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['district_id'] = $request->district_id;
        $data['note'] = $request->note;
        $data['status'] = $request->status ? '1' : '2';
        $updated = DB::table('zones')
                  ->where('id', $request->id)
                  ->update($data);
        return redirect()->route('zone.index')->withSuccess('Zone is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
