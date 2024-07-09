<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class EmployeeController extends Controller
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
        
        $employees = DB::table('employees')
                    ->orderBy('id','DESC')
                    ->get();
        return view('employees.index',compact('employees','permitted_menus_array'));
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
        
        return view('employees.create',compact('permitted_menus_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sale_type = DB::table('employees')
        ->insertGetId([
        'emp_name'=>$request->emp_name,
        'designation'=>$request->designation,
        'joining_date'=>$request->joining_date,
        'per_day_salary'=>$request->per_day_salary,
        'father_name'=>$request->father_name,
        'mother_name'=>$request->mother_name,
        'mobile_number'=>$request->mobile_number,
        'nid_number'=>$request->nid_number,
        'present_address'=>$request->present_address,
        'permanent_address'=>$request->permanent_address,
        'birth_date'=>$request->birth_date,
        'blood_group'=>$request->blood_group,
        'nationality'=>$request->nationality,
        'marital_status'=>$request->marital_status,
        'religion'=>$request->religion,
        'gender'=>$request->gender,
        'profile_pic'=>$request->profile_pic,

        'emergency_contact_name_one'=>$request->emergency_contact_name_one,
        'emergency_contact_number_one'=>$request->emergency_contact_number_one,
        'emergency_contact_relation_one'=>$request->emergency_contact_relation_one,

        'emergency_contact_name_two'=>$request->emergency_contact_name_two,
        'emergency_contact_number_two'=>$request->emergency_contact_number_two,
        'emergency_contact_relation_two'=>$request->emergency_contact_relation_two,

        'emergency_contact_name_three'=>$request->emergency_contact_name_three,
        'emergency_contact_number_three'=>$request->emergency_contact_number_three,
        'emergency_contact_relation_three'=>$request->emergency_contact_relation_three
        ]);
    return redirect()->route('employee.index')->withSuccess('Employee is added successfully'); 
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
        
        $employee = DB::table('employees')
        ->where('id',$id)
        ->first();
     return view('employees.edit',compact('employee','permitted_menus_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['emp_name'] = $request->emp_name;
        $data['designation'] = $request->designation;
        $data['joining_date'] = $request->joining_date;
        $data['per_day_salary'] = $request->per_day_salary;
        $data['father_name'] = $request->father_name;
        $data['mother_name'] = $request->mother_name;
        $data['mobile_number'] = $request->mobile_number;
        $data['nid_number'] = $request->nid_number;
        $data['present_address'] = $request->present_address;
        $data['permanent_address'] = $request->permanent_address;
        $data['birth_date'] = $request->birth_date;
        $data['blood_group'] = $request->blood_group;
        $data['nationality'] = $request->nationality;
        $data['marital_status'] = $request->marital_status;
        $data['religion'] = $request->religion;
        $data['gender'] = $request->gender;
        $data['profile_pic'] = $request->profile_pic;

        $data['emergency_contact_name_one'] = $request->emergency_contact_name_one;
        $data['emergency_contact_number_one'] = $request->emergency_contact_number_one;
        $data['emergency_contact_relation_one'] = $request->emergency_contact_relation_one;

        $data['emergency_contact_name_two'] = $request->emergency_contact_name_two;
        $data['emergency_contact_number_two'] = $request->emergency_contact_number_two;
        $data['emergency_contact_relation_two'] = $request->emergency_contact_relation_two;

        $data['emergency_contact_name_three'] = $request->emergency_contact_name_three;
        $data['emergency_contact_number_three'] = $request->emergency_contact_number_three;
        $data['emergency_contact_relation_three'] = $request->emergency_contact_relation_three;

        $updated = DB::table('employees')
                  ->where('id', $request->id)
                  ->update($data);
        return redirect()->route('employee.index')->withSuccess('Employee information is updated successfully');
    }


    public function renew(string $id){
       $data = array();
       $data['renew_date'] = Carbon::now()->toDateString();
       $updated = DB::table('employees')
                  ->where('id', $id)
                  ->update($data);

      return redirect()->route('employee.index')->withSuccess('Employee renewed date is updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
