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


    //-------- Daily Payment (start) --------
    public function daily_payment_list(){
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $expenses = DB::table('daily_payments')->get();

        return view('expenses.daily_payments.index',compact('permitted_menus_array','expenses'));
    }

    public function create_daily_payment(){
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        return view('expenses.daily_payments.create',compact('permitted_menus_array'));
    }

    public function store_daily_payment(Request $request){
        
                $daily_payment = DB::table('daily_payments')
                                ->insertGetId([
                                'payment_date'=>$request->payment_date,
                                'mobile_bill'=>$request->mobile_bill,
                                'snacks'=>$request->snacks,
                                'entertainment_bill'=>$request->entertainment_bill,
                                'others'=>$request->others,
                                'gift_for_customer'=>$request->gift_for_customer,
                                'ornaments_binding_bill'=>$request->ornaments_binding_bill,
                                'interest_for_gold_lending'=>$request->interest_for_gold_lending,
                                'vangary_loss'=>$request->vangary_loss,
                                'pay_repair_bill'=>$request->pay_repair_bill,
                                'photocopy'=>$request->photocopy,
                                'management_expenses'=>$request->management_expenses,
                                'transport'=>$request->transport,
                                'bkash_cost'=>$request->bkash_cost,
                                'repairing_cost'=>$request->repairing_cost,
                                'conveyance'=>$request->conveyance,
                                'buy_lock_locker'=>$request->buy_lock_locker,
                                'cash_back'=>$request->cash_back,
                                'live_cost'=>$request->live_cost,
                                'parking_cost'=>$request->parking_cost,
                                'vat_machine'=>$request->vat_machine,
                                'door_grease'=>$request->door_grease    
                                ]);

                // $expense_names = $request->expense_name;
                // $expense_amounts = $request->expense_amount;
                // $expense_pay_dates = $request->expense_pay_date;
        
                // foreach ($expense_names as $key => $expense_name) {
                    
                //     $expense_amount = $expense_amounts[$key] ?? null;
                //     $expense_pay_date = $expense_pay_dates[$key] ?? null;
                    
                //     DB::table('daily_payments_others')
                //         ->insert([
                //         'daily_payment_id' => $daily_payment,
                //         'expense_name' => $expense_name,
                //         'expense_amount' => $expense_amount,
                //         'expense_pay_date' => $expense_pay_date  
                //     ]);
        
                // }
        
        return redirect()->route('daily_payment_list')->withSuccess('Daily Payments are added successfully'); 
    }


    public function edit_daily_expense($id){
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $expense = DB::table('daily_payments')
                        ->where('id',$id)
                        ->first();

        return view('expenses.daily_payments.edit',compact('permitted_menus_array','expense')); 
    }


    public function update_daily_payment(Request $request){
  
        $data = array();
        $data['payment_date'] = $request->payment_date;
        $data['mobile_bill'] = $request->mobile_bill;
        $data['snacks'] = $request->snacks;
        $data['entertainment_bill'] = $request->entertainment_bill;
        $data['others'] = $request->others;
        $data['gift_for_customer'] = $request->gift_for_customer;
        $data['ornaments_binding_bill'] = $request->ornaments_binding_bill;
        $data['interest_for_gold_lending'] = $request->interest_for_gold_lending;
        $data['vangary_loss'] = $request->vangary_loss;
        $data['pay_repair_bill'] = $request->pay_repair_bill;
        $data['photocopy'] = $request->photocopy;
        $data['management_expenses'] = $request->management_expenses;
        $data['transport'] = $request->transport;
        $data['bkash_cost'] = $request->bkash_cost;
        $data['repairing_cost'] = $request->repairing_cost;
        $data['conveyance'] = $request->conveyance;
        $data['buy_lock_locker'] = $request->buy_lock_locker;
        $data['cash_back'] = $request->cash_back;
        $data['live_cost'] = $request->live_cost;
        $data['parking_cost'] = $request->parking_cost;
        $data['vat_machine'] = $request->vat_machine;
        $data['door_grease'] = $request->door_grease;
       
        $updated = DB::table('daily_payments')
                  ->where('id', $request->id)
                  ->update($data);

        return redirect()->route('daily_payment_list')->withSuccess('Daily Payments are updated successfully'); 
    }


    public function delete_daily_payment($id){

        $deleted = DB::table('daily_payments')
                  ->where('id', $id)
                  ->delete();
        return redirect()->route('daily_payment_list')->withSuccess('Daily Payment is deleted successfully');   
    }


    //-------- Daily Payment (end) --------


    //-------- Yearly Payment (start) --------

    public function yearly_payment_list(){
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $expenses = DB::table('yearly_payments')->get();

        return view('expenses.yearly_payments.index',compact('permitted_menus_array','expenses'));
    }

    public function create_yearly_payment(){

        $user_role = Auth::user()->role_id;
        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        return view('expenses.yearly_payments.create',compact('permitted_menus_array'));
    }


    public function store_yearly_payment(Request $request){
        
    }

    //-------- Yearly Payment (end) --------





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

        return view('expenses.daily_payments.create',compact('permitted_menus_array','salaries'));
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
