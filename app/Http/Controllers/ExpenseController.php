<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class ExpenseController extends Controller
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

        $expenses = DB::table('expenses')->get();

        return view('expenses.index',compact('permitted_menus_array','expenses'));
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


        $salaries = DB::table('payrolls')
                  ->leftJoin('employees','payrolls.employee','employees.id')
                  ->select(
                    'payrolls.id as payroll_id',
                    'employees.emp_name as staff_name',
                    'payrolls.final_pay_amount as staff_paid_salary_amount',
                    'payrolls.salary_date as staff_salary_date'
                    )
                  ->whereMonth('salary_date',Carbon::now()->month)
                  ->whereYear('salary_date',Carbon::now()->year)
                  ->get();

        // dd($salary);

        return view('expenses.create',compact('permitted_menus_array','salaries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
       
        $expense_type = $request->expense_type;  

        $expense_names = $request->expense_name;
        $expense_amounts = $request->expense_amount;
        $expense_pay_dates = $request->expense_pay_date;

        foreach ($expense_names as $key => $expense_name) {
           
            $expense_amount = $expense_amounts[$key] ?? null;
            $expense_pay_date = $expense_pay_dates[$key] ?? null;
          
            DB::table('expenses')
                ->insert([
                'expense_type' => $expense_type,
                'expense_name' => $expense_name,
                'expense_amount' => $expense_amount,
                'expense_pay_date' => $expense_pay_date  
            ]);

        }

        return redirect()->route('expense.index')->withSuccess('Expenses are added successfully'); 

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

        $expense = DB::table('expenses')
                    ->where('id',$id)
                    ->first();

        return view('expenses.edit',compact('permitted_menus_array','expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['expense_name'] = $request->expense_name;
        $data['expense_amount'] = $request->expense_amount;
        $data['expense_pay_date'] = $request->expense_pay_date;
        
        $updated = DB::table('expenses')
                  ->where('id', $request->id)
                  ->update($data);
        return redirect()->route('expense.index')->withSuccess('Expense Details is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
