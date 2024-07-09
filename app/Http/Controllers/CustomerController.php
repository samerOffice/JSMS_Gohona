<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class CustomerController extends Controller
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

        $customers = DB::table('customers')
                    ->leftJoin('customer_categories','customers.customer_category_id','customer_categories.id')
                    ->leftJoin('districts','customers.district_id','districts.id')
                    ->leftJoin('zones','customers.zone_id','zones.id')
                    ->select('customers.*','customer_categories.name as customer_category_name', 'districts.name as district_name','zones.name as zone_name' )
                    ->orderBy('customers.id','DESC')
                    ->get();

        return view('customers.index',compact('customers','permitted_menus_array'));
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

        $customer_categories = DB::table('customer_categories')->get();
        $districts = DB::table('districts')->get();
        return view('customers.create',compact('permitted_menus_array','customer_categories','districts'));
    }


    public function districtAndZoneDependancy(Request $request){

        $selectedDistrictId = $request->input('data');


        $zones = DB::table('zones')
                    ->where('district_id',$selectedDistrictId)
                    ->get();
  
      $str="<option value=''>-- Select --</option>";
      foreach ($zones as $zone) {
         $str .= "<option value='$zone->id'> $zone->name </option>";
         
      }
      echo $str;
      }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = DB::table('customers')
        ->insertGetId([
        'name'=>$request->name,
        'mobile_number'=>$request->mobile_number,
        'address'=>$request->address,
        'customer_category_id'=>$request->customer_category_id,
        'district_id'=>$request->district_id,
        'zone_id'=>$request->zone_id,
        'fb_name'=>$request->fb_name
        
        ]);
        return redirect()->route('customer.index')->withSuccess('Customer is added successfully'); 
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
        
           
        $customer = DB::table('customers')
                    ->leftJoin('customer_categories','customers.customer_category_id','customer_categories.id')
                    ->leftJoin('districts','customers.district_id','districts.id')
                    ->leftJoin('zones','customers.zone_id','zones.id')
                    ->select('customers.*','customer_categories.name as customer_category_name', 'districts.name as district_name','zones.name as zone_name' )
                             ->where('customers.id',$id)
                             ->first();


        $customer_categories = DB::table('customer_categories')->get();
        $districts= DB::table('districts')->get();
        $zones= DB::table('zones')->get();
        return view('customers.edit',compact('customer','customer_categories','districts','zones','permitted_menus_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         
        $data = array();
        $data['name'] = $request->name;
        $data['mobile_number'] = $request->mobile_number;
        $data['address'] = $request->address;
        $data['customer_category_id'] = $request->customer_category_id;
        $data['district_id'] = $request->district_id;
        $data['zone_id'] = $request->zone_id;
        $data['fb_name'] = $request->fb_name;
       
        $updated = DB::table('customers')
                  ->where('id', $request->id)
                  ->update($data);
        return redirect()->route('customer.index')->withSuccess('Customer is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function customer_import_form(){
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        return view('customers.import',compact('permitted_menus_array'));
    }


    public function customer_excel_file_import(Request $request){
       

        $request->validate([
            'customer_excel_file' => 'required|mimes:csv',
        ], [
            'customer_excel_file.mimes' => 'Please upload file with .csv format',
        ]);

        $filePath = $request->file('customer_excel_file')->move(public_path('import_customer_csv_files'));

        $file = fopen($filePath, 'r');

        $csvData = [];
        while (($row = fgetcsv($file)) !== false) {
            $csvData[] = $row;
        }
        fclose($file);

        unlink($filePath);

        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);


        return view('customers.import')->with([
            'csvData' => $csvData,
            'permitted_menus_array' => $permitted_menus_array
        ]);
    }

    public function submitCustomerData(Request $request)
    {
        
        $names = $request->input('name');
        $mobile_numbers = $request->input('mobile_number');
        $addresses = $request->input('address');
        $customer_category_ids = $request->input('customer_category_id');
        $district_ids = $request->input('district_id');
        $zone_ids = $request->input('zone_id');
        $fb_names = $request->input('fb_name');


        // dd($customer_category_ids);


        foreach($names as $index => $name) {
              if(!empty($name)){

                $mobile_number = $mobile_numbers[$index];
                $address = $addresses[$index];
                $customer_category_id = $customer_category_ids[$index];
                $district_id = $district_ids[$index];
                $zone_id = $zone_ids[$index];
                $fb_name = $fb_names[$index];
               
                $customer = DB::table('customers')
                            ->insertGetId([
                            'name'=>$name,
                            'mobile_number'=>$mobile_number, 
                            'address'=>$address, 
                            'customer_category_id'=>$customer_category_id, 
                            'district_id'=>$district_id, 
                            'zone_id'=>$zone_id, 
                            'fb_name'=>$fb_name 
                            ]);
              }
                
        }
        // return response()->json(['message' => 'Data submitted successfully']);
        return redirect()->route('customer.index')->withSuccess('Customers are added successfully');
    }
}
