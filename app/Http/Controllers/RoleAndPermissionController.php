<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class RoleAndPermissionController extends Controller
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
        
        $roles = DB::table('roles')
                // ->orderBy('id','DESC')        
                ->get();

        // dd($roles);
        return view('roles_and_permissions.index',compact('roles','permitted_menus_array'));
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
        
        return view('roles_and_permissions.create',compact('permitted_menus_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $supplier = DB::table('roles')
        ->insertGetId([
        'role_name'=>$request->role_name,
        'status'=>'1'
        ]);
    return redirect()->route('roles_and_permissions.index')->withSuccess('Role is added successfully'); 
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
        
        $role = DB::table('roles')
        ->where('id',$id)
        ->first();
      return view('roles_and_permissions.edit',compact('role','permitted_menus_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['role_name'] = $request->role_name;
        $updated = DB::table('roles')
                  ->where('id', $request->id)
                  ->update($data);

        return redirect()->route('roles_and_permissions.index')->withSuccess('Role is updated successfully');
    }

    public function delete_role($id){
        $deleted = DB::table('roles')
                  ->where('id', $id)
                  ->delete();
        return redirect()->route('roles_and_permissions.index')->withSuccess('Role is deleted successfully');   
    }

    public function menus($role_id){
        
        $menus = DB::table('menus')->get();

        $data = DB::table('menu_permissions')
              ->where('role',$role_id)
              ->first();

        if($data == null){
        
            return view('roles_and_permissions.initial_permitted_menus',compact('menus','role_id'));

        }else{

            $permitted_menus = $data->menus;
            // Use explode to convert the string into an array
            $permitted_menus_array = explode(',', $permitted_menus);
            return view('roles_and_permissions.permitted_menus',compact('menus','role_id','permitted_menus_array'));
        }

        
    }

    public function menu_permission_store(Request $request){
        
        $user_role_id = $request->role_id;

        $menu_permission_data = DB::table('menu_permissions')
                ->where('role',$user_role_id)
                ->first();

        if($menu_permission_data == null){

            $selectedItems = implode(',',$request->input('menu'));
            $add_menu_permission = DB::table('menu_permissions')
                                ->insertGetId([
                                    'role'=>$user_role_id,
                                    'menus'=>$selectedItems
                                    ]);
            return redirect()->route('roles_and_permissions.index')->withSuccess('Menu Permission is addded successfully');
        }else{

            $selectedItems = implode(',',$request->input('menu'));
            
            $data = array();
            $data['menus'] =  $selectedItems;
            $updated = DB::table('menu_permissions')
                      ->where('role', $user_role_id)
                      ->update($data);
    
            return redirect()->route('roles_and_permissions.index')->withSuccess('Menu Permission is updated successfully');

        }
        
       
    }
}
