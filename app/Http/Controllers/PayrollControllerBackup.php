<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = DB::table('employees')->get();
        return view('payrolls.index',compact('employees'));
    }


    public function payroll_list(){
        $payrolls = DB::table('payrolls')
                    ->leftJoin('employees','payrolls.employee','employees.id')
                    ->select(
                        'payrolls.*',
                        'employees.emp_name as employee_name',
                        'employees.designation as employee_designation'
                        )
                    ->get();

        return view('payrolls.payroll_list',compact('payrolls'));
    }

    public function employee_details_dependancy(Request $request){
        $selectedEmployeeId = $request->input('data');
        $employeeInfo = DB::table('employees')
                    ->where('id',$selectedEmployeeId)
                    ->first();

        $joining_date = $employeeInfo->joining_date;
        $joining_month = Carbon::parse($joining_date)->format('m');
  
        $data = [
            'joining_date' => $employeeInfo->joining_date,
            'yearly_bonus_date' => $employeeInfo->yearly_bonus_date,
            'joining_month' => $joining_month,
            'per_day_salary' => $employeeInfo->per_day_salary
        ];

        return $data;
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
        $payroll = DB::table('payrolls')
        ->insertGetId([
        'employee'=>$request->employee,
        'salary_date'=>$request->salary_date,
        'joining_date'=>$request->joining_date,
        'per_day_salary'=>$request->per_day_salary,
        'emp_total_bonus_day'=>$request->emp_total_bonus_day,
        'emp_total_bonus_amount'=>$request->emp_total_bonus_amount,     
        'bonus_eligible_month'=>$request->bonus_eligible_month,
        'bonus_pay_month'=>$request->bonus_pay_month,
        'bonus_pay_amount'=>$request->bonus_pay_amount,
        'total_working_day'=>$request->total_working_day,
        'total_leave'=>$request->total_leave,
        'total_number_of_pay_day'=>$request->total_number_of_pay_day,
        'monthly_salary'=>$request->monthly_salary,
        'monthly_holiday_bonus'=>$request->monthly_holiday_bonus,
        'total_daily_allowance'=>$request->total_daily_allowance,
        'total_travel_allowance'=>$request->total_travel_allowance,
        'rental_cost_allowance'=>$request->rental_cost_allowance,
        'hospital_bill_allowance'=>$request->hospital_bill_allowance,
        'insurance_allowance'=>$request->insurance_allowance,
        'sales_commission'=>$request->sales_commission,
        'retail_commission'=>$request->retail_commission,
        'total_others'=>$request->total_others,
        'total_salary'=>$request->total_salary,
        'yearly_bonus'=>$request->yearly_bonus,
        'total_payable_salary'=>$request->total_payable_salary,
        'advance_less'=>$request->advance_less,
        'any_deduction'=>$request->any_deduction,
        'final_pay_amount'=>$request->final_pay_amount,
        'loan_advance'=>$request->loan_advance
        ]);

        $only_payroll = $request->all();
         // Filter out fields with values equal to zero
         $filteredData = array_filter($only_payroll, function($value) {
            return $value != 0;
        });


        //retrieve employee name
        $emp = DB::table('payrolls')
               ->where('id',$payroll)
               ->first();
        $employee_id = $emp->employee;


       //for yearly bonus update


       $carbonDate = Carbon::createFromFormat('m-Y', $request->bonus_pay_month);

       // Format the date to dd-mm-yyyy
       $formattedDate = $carbonDate->format('Y-m-d');




       $data = array();
       $data['yearly_bonus_date'] = $formattedDate;
        $updated = DB::table('employees')
                  ->where('id', $employee_id)
                  ->update($data);



        $emp_details = DB::table('employees')
                       ->where('id',$employee_id)
                       ->first();
        
        $emp_name = $emp_details->emp_name;
        $emp_id = $emp_details->id;
        $emp_designation = $emp_details->designation;
 
         // Redirect to another route to show the data
         return redirect()->route('payroll_show_data')->with([
            'filtered_data' => $filteredData,
            'emp_name' => $emp_name,
            'emp_id' => $emp_id,
            'emp_designation' => $emp_designation,
            'payroll' => $payroll
        ]);

    }


    public function payroll_show_data(){
        // Retrieve filtered data from session
        $filteredData = session('filtered_data', []);
        $emp_name = session('emp_name');
        $emp_id = session('emp_id');
        $emp_designation = session('emp_designation');
        $payroll = session('payroll');
        // Pass the filtered data to the Blade view
        return view('payrolls.show_data',compact('filteredData','emp_name','emp_id','emp_designation','payroll'));
    }



    public function generateCsv(Request $request)
    {
        $id = $request->payroll;
        $fileName = 'payroll_data.csv';

        // $payrolls = Payroll::all();

        $payroll = DB::table('payrolls')
                    ->leftJoin('employees','payrolls.employee','=','employees.id')
                    ->select('payrolls.*','employees.emp_name as employee_name')
                    ->where('payrolls.id',$id)
                    ->first();

        // Define the headers for the CSV file
        $headers = [
            'Employee', 
            'Salary Date',
            'Joining Date',
            'Per Day Salary',
            'Total Bonus Day',
            'Total Bonus Amount',
            'Bonus Eligible Month',
            'Bonus Payable Month',
            'Bonus Pay Amount',
            'Total Working Days',
            'Total Leave',
            'Total Number of Payable Days',
            'Monthly Salary',
            'Monthly Holiday Bonus',
            'Total Daily Allowance',
            'Total Travel Allowance',
            'Rental Cost Allowance',
            'Hospital Bill Allowance',
            'Insurance Allowance',
            'Sales Commission',
            'Retail Commission',
            'Total Others',
            'Total Salary',
            'Yearly Bonus',
            'Total Payable Salary',
            'Advance Less',
            'Any Deduction',
            'Final Payment Amount',
            'Loan Advance'
        ];

        // Open output stream
        $file = fopen('php://output', 'w');
     
        // Set the headers for the CSV file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        // Write the header row to the CSV file
        fputcsv($file, $headers);

            fputcsv($file, [
                $payroll->employee_name,
                $payroll->salary_date,
                $payroll->joining_date,
                $payroll->per_day_salary,
                $payroll->emp_total_bonus_day,
                $payroll->emp_total_bonus_amount,
                $payroll->bonus_eligible_month,
                $payroll->bonus_pay_month,
                $payroll->bonus_pay_amount,
                $payroll->total_working_day,
                $payroll->total_leave,
                $payroll->total_number_of_pay_day,
                $payroll->monthly_salary,
                $payroll->monthly_holiday_bonus,
                $payroll->total_daily_allowance,
                $payroll->total_travel_allowance,
                $payroll->rental_cost_allowance,
                $payroll->hospital_bill_allowance,
                $payroll->insurance_allowance,
                $payroll->sales_commission,
                $payroll->retail_commission,
                $payroll->total_others,
                $payroll->total_salary,
                $payroll->yearly_bonus,
                $payroll->total_payable_salary,
                $payroll->advance_less,
                $payroll->any_deduction,
                $payroll->final_pay_amount,
                $payroll->loan_advance
            ]);
        
        // Close the output stream
        fclose($file);
        exit();
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
