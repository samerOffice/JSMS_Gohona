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


    //-------- Monthly Payment (start) --------

    public function monthly_payment_list(){
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $expenses = DB::table('monthly_payments')->get();

        return view('expenses.monthly_payments.index',compact('permitted_menus_array','expenses'));
    }

    public function create_monthly_payment(){

        $user_role = Auth::user()->role_id;
        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $previousMonth = Carbon::now()->subMonth()->format('F, Y');
        $currentMonth = Carbon::now()->format('F, Y');

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

        return view('expenses.monthly_payments.create',compact('permitted_menus_array','previousMonth','currentMonth','salaries'));
    }



        public function store_monthly_payment(Request $request){
            
            $monthly_payment = DB::table('monthly_payments')
                            ->insertGetId([
                            'payment_month'=>Carbon::now()->format('m-Y'),
                            'shop_rent_advance'=>$request->shop_rent_advance,
                            'service_charge'=>$request->service_charge,
                            'electricity_bill'=>$request->electricity_bill,
                            'water_bill'=>$request->water_bill,
                            'internet_bill'=>$request->internet_bill,
                            'jewelers_member_fees'=>$request->jewelers_member_fees,
                            'vat'=>$request->vat,
                            'vat_office'=>$request->vat_office,
                            'vat_liton'=>$request->vat_liton,
                            'staff_bonus'=>$request->staff_bonus,
                            'vat_memo'=>$request->vat_memo,
                            'market_member_fees'=>$request->market_member_fees
                            ]);

            $expense_names = $request->expense_name;
            $expense_amounts = $request->expense_amount;
            $expense_pay_dates = $request->expense_pay_date;

            foreach ($expense_names as $key => $expense_name) {
                
                $expense_amount = $expense_amounts[$key] ?? null;
                $expense_pay_date = $expense_pay_dates[$key] ?? null;
                
                DB::table('monthly_payment_others')
                    ->insert([
                    'monthly_payment_id' => $monthly_payment,
                    'expense_name' => $expense_name,
                    'expense_amount' => $expense_amount,
                    'expense_pay_date' => $expense_pay_date  
                ]);

            }

    return redirect()->route('monthly_payment_list')->withSuccess('Monthly Payments are added successfully'); 
    }



    public function edit_monthly_expense($id){
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);


        $expense = DB::table('monthly_payments')
                        ->where('id',$id)
                        ->first();


        $payment_month = $expense->payment_month;
        $payment_month_number = Carbon::createFromFormat('m-Y', $payment_month)->month; // Get the month number
        $payment_year = Carbon::createFromFormat('m-Y', $payment_month)->year;


        $salaries = DB::table('payrolls')
                    ->leftJoin('employees','payrolls.employee','employees.id')
                    ->select(
                        'payrolls.id as payroll_id',
                        'employees.emp_name as staff_name',
                        'payrolls.final_pay_amount as staff_paid_salary_amount',
                        'payrolls.salary_date as staff_salary_date'
                        )
                    ->whereMonth('salary_date',$payment_month_number)
                    ->whereYear('salary_date',$payment_year)
                    ->get();


       
        return view('expenses.monthly_payments.edit',compact('permitted_menus_array','expense','salaries')); 
    }


    public function monthly_payment_dependancy($id){

        $others = DB::table('monthly_payment_others')
                    ->where('monthly_payment_id',$id)
                    ->get();

        return response()->json($others, 200);  
    }


    public function update_monthly_payment(Request $request){

        $expense_id = $request->id;

        // Delete existing records for the given expense_id
        DB::table('monthly_payment_others')
            ->where('monthly_payment_id', $expense_id)
            ->delete();

        // Insert new records
        $expense_names = $request->expense_name;
        $expense_amounts = $request->expense_amount;
        $expense_pay_dates = $request->expense_pay_date;

        foreach ($expense_names as $key => $expense_name) {
            
            $expense_amount = $expense_amounts[$key] ?? null;
            $expense_pay_date = $expense_pay_dates[$key] ?? null;
            
            DB::table('monthly_payment_others')
                ->insert([
                'monthly_payment_id' => $expense_id,
                'expense_name' => $expense_name,
                'expense_amount' => $expense_amount,
                'expense_pay_date' => $expense_pay_date  
            ]);

        }

        $data = array();
        $data['shop_rent_advance'] = $request->shop_rent_advance;
        $data['service_charge'] = $request->service_charge;
        $data['electricity_bill'] = $request->electricity_bill;
        $data['water_bill'] = $request->water_bill;
        $data['internet_bill'] = $request->internet_bill;
        $data['jewelers_member_fees'] = $request->jewelers_member_fees;
        $data['vat'] = $request->vat;
        $data['vat_office'] = $request->vat_office;
        $data['vat_liton'] = $request->vat_liton;
        $data['staff_bonus'] = $request->staff_bonus;
        $data['vat_memo'] = $request->vat_memo;
        $data['market_member_fees'] = $request->market_member_fees;
       
        $updated = DB::table('monthly_payments')
                  ->where('id', $expense_id)
                  ->update($data);

        return redirect()->route('monthly_payment_list')->withSuccess('Monthly Payments are updated successfully'); 

    }

    public function delete_monthly_payment($id){

        $deleted_main = DB::table('monthly_payments')
                            ->where('id', $id)
                            ->delete();

        $deleted_others = DB::table('monthly_payment_others')
                            ->where('monthly_payment_id', $id)
                            ->delete();

        return redirect()->route('monthly_payment_list')->withSuccess('Monthly Payment is deleted successfully');  
    }


    //-------- Monthly Payment (end) --------



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
        
        $currentYear = Carbon::now()->year;

        $yearly_payment = DB::table('yearly_payments')
                                ->insertGetId([
                                'payment_year'=>$currentYear,
                                'trade_license'=>$request->trade_license,
                                'pahela_boishakh_expenses'=>$request->pahela_boishakh_expenses,
                                'valentine_gate'=>$request->valentine_gate,
                                'zakat'=>$request->zakat,
                                'dealing_licence'=>$request->dealing_licence
                                ]);

        return redirect()->route('yearly_payment_list')->withSuccess('Yearly Payments are added successfully'); 
    }


    public function edit_yearly_expense($id){
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $expense = DB::table('yearly_payments')
                        ->where('id',$id)
                        ->first();

        return view('expenses.yearly_payments.edit',compact('permitted_menus_array','expense')); 
    }


    public function update_yearly_payment(Request $request){
  
        $data = array();
        $data['trade_license'] = $request->trade_license;
        $data['pahela_boishakh_expenses'] = $request->pahela_boishakh_expenses;
        $data['valentine_gate'] = $request->valentine_gate;
        $data['zakat'] = $request->zakat;
        $data['dealing_licence'] = $request->dealing_licence;
       
        $updated = DB::table('yearly_payments')
                  ->where('id', $request->id)
                  ->update($data);

        return redirect()->route('yearly_payment_list')->withSuccess('Yearly Payments are updated successfully'); 
    }



    public function delete_yearly_payment($id){

        $deleted = DB::table('yearly_payments')
                  ->where('id', $id)
                  ->delete();
        return redirect()->route('yearly_payment_list')->withSuccess('Yearly Payment is deleted successfully');   
    }

    //-------- Yearly Payment (end) --------


    //-------- Marketing Cost (start) --------
    public function marketing_cost_list(){
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $expenses = DB::table('marketing_costs')->get();

        return view('expenses.marketing_costs.index',compact('permitted_menus_array','expenses'));
    }

    public function create_marketing_cost(){
        $user_role = Auth::user()->role_id;
        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        return view('expenses.marketing_costs.create',compact('permitted_menus_array'));
    }

    public function store_marketing_cost(Request $request){
       
        $yearly_payment = DB::table('marketing_costs')
                                ->insertGetId([
                                'payment_date'=>$request->payment_date,
                                'advertising'=>$request->advertising,
                                'sms_buy'=>$request->sms_buy,
                                'facebook_boosting'=>$request->facebook_boosting,
                                'facebook_design'=>$request->facebook_design,
                                'website_charge'=>$request->website_charge
                                ]);

        return redirect()->route('marketing_cost_list')->withSuccess('Marketing Cost are added successfully'); 
    }

    public function edit_marketing_cost($id){

        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $expense = DB::table('marketing_costs')
                        ->where('id',$id)
                        ->first();

        return view('expenses.marketing_costs.edit',compact('permitted_menus_array','expense')); 
    }

    public function update_marketing_cost(Request $request){

      
        $data = array();
        $data['payment_date'] = $request->payment_date;
        $data['advertising'] = $request->advertising;
        $data['sms_buy'] = $request->sms_buy;
        $data['facebook_boosting'] = $request->facebook_boosting;
        $data['facebook_design'] = $request->facebook_design;
        $data['website_charge'] = $request->website_charge;
       
        $updated = DB::table('marketing_costs')
                  ->where('id', $request->id)
                  ->update($data);

        return redirect()->route('marketing_cost_list')->withSuccess('Marketing Costs are updated successfully'); 
    }

    public function delete_marketing_cost($id){

        $deleted = DB::table('marketing_costs')
                  ->where('id', $id)
                  ->delete();
        return redirect()->route('marketing_cost_list')->withSuccess('Marketing Cost is deleted successfully');   
    }


    //-------- Marketing Cost (end) ----------


     //-------- Payments (start) ----------
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


     public function create()
    {
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);
        
        return view('expenses.create',compact('permitted_menus_array'));
    }
     //-------- Payments (end) ----------

   


    

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
