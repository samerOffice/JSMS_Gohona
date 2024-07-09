<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class BookingTermsAndConditionsController extends Controller
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
        
        $booking_terms_and_conditions = DB::table('booking_terms_and_conditions')->first();
        
        return view('booking_terms_and_conditions.index',compact('booking_terms_and_conditions','permitted_menus_array'));
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
        

        return view('booking_terms_and_conditions.create',compact('permitted_menus_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $user_role = Auth::user()->role_id;

        //     $data = DB::table('menu_permissions')
        //             ->where('role',$user_role)
        //             ->first();
        //     $permitted_menus = $data->menus;
        //     $permitted_menus_array = explode(',', $permitted_menus);
        
        $booking_terms_and_conditions = DB::table('booking_terms_and_conditions')
        ->insertGetId([
        'terms'=>$request->terms,
        ]);
        return redirect()->route('booking_terms_and_conditions.index'); 
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
        $data['terms'] = $request->terms;

        $updated = DB::table('booking_terms_and_conditions')
                  ->where('id', $request->id)
                  ->update($data);

        $booking_terms_and_conditions = DB::table('booking_terms_and_conditions')->first();

        return view('booking_terms_and_conditions.index',compact('booking_terms_and_conditions','permitted_menus_array'))->withSuccess('Booking Terms and Conditions updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
