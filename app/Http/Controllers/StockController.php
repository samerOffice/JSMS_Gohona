<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class StockController extends Controller
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

        return view('stocks.index',compact('permitted_menus_array'));
    }


    public function stock_list()
    {
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $stocks = DB::table('stocks')->get();

        return view('stocks.stock_list',compact('permitted_menus_array','stocks'));
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

        return view('stocks.create',compact('permitted_menus_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $currentDate = Carbon::now()->format('Y-m-d');
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->format('m');
        // $currentDate = Carbon::now()->format('d');

        $randomPart = $this->generateRandomDigits(3);


        $stock_memo = $currentYear.''.$currentMonth.'-'.$randomPart;
        $stock_date = $request->stock_date;
        $stock_name = $request->stock_name;

        $stock = DB::table('stocks')
        ->insertGetId([
        'stock_memo'=>$stock_memo,
        'stock_date'=>$stock_date,
        'stock_name'=>$stock_name
        ]);
    return redirect()->route('stock.index')->withSuccess('Stock is added successfully'); 
       
    }

    private function generateRandomDigits($length)
    {
        return str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
