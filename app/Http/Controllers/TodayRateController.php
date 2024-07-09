<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class TodayRateController extends Controller
{
    public function index(){

        $user_role = Auth::user()->role_id;
        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $today_rates = DB::table('today_rates')
                        ->orderBy('id','DESC')
                        ->get();
        return view('today_rates.index',compact('today_rates','permitted_menus_array'));
    }

    public function create(){

        $user_role = Auth::user()->role_id;
        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        return view('today_rates.create',compact('permitted_menus_array'));
    }

    public function store(Request $request){       
        $today_rate = DB::table('today_rates')
        ->insertGetId([
        'name'=>$request->name,
        'rate'=>$request->rate,
        'status'=>$request->status ? '1' : '2'
        ]);
    return redirect()->route('today_rate_list')->withSuccess('Today Rate is added successfully'); 
    }

    public function edit($id){

        $user_role = Auth::user()->role_id;
        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $today_rate = DB::table('today_rates')
        ->where('id',$id)
        ->first();
    return view('today_rates.edit',compact('today_rate','permitted_menus_array'));
    }

    public function update(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['rate'] = $request->rate;
        $data['status'] = $request->status ? '1' : '2';
        $updated = DB::table('today_rates')
                  ->where('id', $request->id)
                  ->update($data);
        return redirect()->route('today_rate_list')->withSuccess('Today Rate is updated successfully');
    }

    public function delete($id){
        $deleted = DB::table('today_rates')->where('id', $id)->delete();
        return redirect()->route('today_rate_list');
    }
}
