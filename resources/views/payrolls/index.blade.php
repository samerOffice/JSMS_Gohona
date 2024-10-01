@extends('master')

@section('title')
Welcome
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
         
          <div class="row">
            <div class="col-md-2 col-sm-1"></div>
            <div class="col-md-8 col-sm-10">
                  <!-- Pay Slip Header -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5><i class="fa-solid fa-receipt"></i> Pay Slip
                        <small class="float-right"><b>Date:</b> <span style="color: green">{{ \Carbon\Carbon::now()->format('F j, Y') }}</span></small>
                    </h5>
                </div>

                <!-- Pay Slip Form -->
                <form action="{{ route('payroll.store') }}" method="post">
                    @csrf
                    <div class="card-body">

                        <!-- Employee Information -->
                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-12">
                                <label>Employee Name</label>
                                <select class="form-control select2bs4" id="employee" name="employee">
                                    <option value="">Select Employee</option>
                                    @foreach ($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->emp_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="col-md-4 col-sm-12">
                                <b>Joining Date:</b> <span id="emp_joining_date"></span><br>
                                <b>Per Day Salary:</b> <span id="emp_per_day_salary"></span><br>
                                <b>Total Bonus Day:</b> <span id="emp_total_bonus_day">39 days</span>
                                <input type="hidden" value="39" name="emp_total_bonus_day">
                                <input type="hidden" value="{{ \Carbon\Carbon::now()->format('Y-m-d')}}" name="salary_date">
                            </div> -->
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-3 col-sm-12">
                            <label>Total Yearly Bonus (BDT):</label>
                                <input type="text" readonly style="background-color: #d9ff8d;" id="emp_total_bonus_amount" name="emp_total_bonus_amount" class="form-control mb-2">
                          </div>
                          <div class="col-md-3 col-sm-12">
                            <label>Bonus Eligible Month:</label>
                                <input type="text" readonly style="background-color: #d9ff8d;" id="bonus_eligible_month" name="bonus_eligible_month" class="form-control mb-2">
                          </div>
                          <div class="col-md-3 col-sm-12">
                            <label>Bonus Payable Month:</label>
                                <input type="text" readonly style="background-color: #d9ff8d;" id="bonus_pay_month" name="bonus_pay_month" class="form-control mb-2">
                          </div>
                          <div class="col-md-3 col-sm-12">
                            <label>Bonus Payable Amount (BDT):</label>
                                <input type="text" readonly style="background-color: #d9ff8d;" id="bonus_pay_amount" name="bonus_pay_amount" class="form-control">
                          </div>
                        </div>

                        <!-- Payment Calculation Table -->
                        <h4 class="mt-4">Payment Calculation</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Joining Date</td>
                                    <td><input type="date" readonly style="background-color: #b7f3fd;" id="joining_date" name="joining_date" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Total Working Days</td>
                                    <td><input type="number" readonly style="-webkit-appearance: none; -moz-appearance: textfield; background-color: #b7f3fd; pointer-events: none;" id="total_working_day" name="total_working_day" class="form-control" value="26"></td>
                                </tr>
                                <tr>
                                    <td>Total Leave</td>
                                    <td><input type="number" id="total_leave" name="total_leave" class="form-control" value="0"></td>
                                </tr>
                                <tr>
                                    <td>Total Number of Payable Days</td>
                                    <td><input type="number" readonly style="-webkit-appearance: none; -moz-appearance: textfield; background-color: #b7f3fd; pointer-events: none;" id="total_number_of_pay_day" name="total_number_of_pay_day" class="form-control" value="26"></td>
                                </tr>
                                <tr>
                                    <td>Per Day Salary</td>
                                    <td><input type="number" step="0.01" readonly style="-webkit-appearance: none; -moz-appearance: textfield; background-color: #b7f3fd; pointer-events: none;" id="per_day_salary" name="per_day_salary" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Monthly Salary</td>
                                    <td><input type="number" step="0.01" readonly style="-webkit-appearance: none; -moz-appearance: textfield; background-color: #b7f3fd; pointer-events: none;" id="monthly_salary" name="monthly_salary" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Monthly Holiday Bonus</td>
                                    <td><input type="number" step="0.01" readonly style="-webkit-appearance: none; -moz-appearance: textfield; background-color: #b7f3fd; pointer-events: none;" id="monthly_holiday_bonus" name="monthly_holiday_bonus" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Total Daily Allowance</td>
                                    <td><input type="number" step="0.01" id="total_daily_allowance" name="total_daily_allowance" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Total Travel Allowance</td>
                                    <td><input type="number" step="0.01" id="total_travel_allowance" name="total_travel_allowance" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Rental Cost Allowance</td>
                                    <td><input type="number" step="0.01" id="rental_cost_allowance" name="rental_cost_allowance" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Hospital Bill Allowance</td>
                                    <td><input type="number" step="0.01" id="hospital_bill_allowance" name="hospital_bill_allowance" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Insurance Allowance</td>
                                    <td><input type="number" step="0.01" id="insurance_allowance" name="insurance_allowance" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Sales Commission</td>
                                    <td><input type="number" step="0.01" id="sales_commission" name="sales_commission" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Retail Commission</td>
                                    <td><input type="number" step="0.01" id="retail_commission" name="retail_commission" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Total Others</th>
                                    <td><input type="number" step="0.01" readonly style="-webkit-appearance: none; -moz-appearance: textfield; background-color: #b7f3fd; pointer-events: none;" id="total_others" name="total_others" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Total Salary</th>
                                    <td><input type="number" step="0.01" readonly style="-webkit-appearance: none; -moz-appearance: textfield; background-color: #b7f3fd; pointer-events: none;" id="total_salary" name="total_salary" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Yearly Bonus</td>
                                    <td><input type="number" step="0.01" id="yearly_bonus" name="yearly_bonus" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Total Payable Salary</td>
                                    <td><input type="number" step="0.01" readonly style="-webkit-appearance: none; -moz-appearance: textfield; background-color: #b7f3fd; pointer-events: none;" id="total_payable_salary" name="total_payable_salary" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Salary Advance Less</td>
                                    <td><input type="number" step="0.01" id="advance_less" name="advance_less" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Any Deduction</td>
                                    <td><input type="number" step="0.01" id="any_deduction" name="any_deduction" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Final Pay Amount</th>
                                    <td><input type="number" readonly style="-webkit-appearance: none; -moz-appearance: textfield; background-color: #b7f3fd; pointer-events: none;" id="final_pay_amount" name="final_pay_amount" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Loan Advance</th>
                                    <td><input type="number" step="0.01" id="loan_advance" name="loan_advance" class="form-control"></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit Payment</button>
                    </div>
                </form>
            </div>
            </div>
            <div class="col-md-2 col-sm-1"></div>
          </div>


        
        </div>
    </section>
</div>

@endsection


@push('myScripts')
<script>

$(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
            });   
            
  // $('#invoice_print').on('click',function(){
  //   window.addEventListener("load", window.print());
  // })
    });

$('#employee').on('change',function(event){
  event.preventDefault();
  var selectedEmployee = $('#employee').val();
  $('#total_leave').val('0');
  $('#total_number_of_pay_day').val('');
  $('#monthly_salary').val('');
  $('#yearly_bonus').val('');

   // Function to get CSRF token from meta tag
   function getCsrfToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

// Set up Axios defaults
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-CSRF-TOKEN'] = getCsrfToken();

axios.get('sanctum/csrf-cookie').then(response=>{
 axios.post('employee_details_dependancy',{
        data: selectedEmployee
      }).then(response=>{

      console.log(response.data.employee_advance);
      console.log(response.data.renew_date);

      $('#joining_date').val(response.data.joining_date);
      $('#advance_less').val(response.data.employee_advance);
      var emp_joining_date_from_response = response.data.joining_date;
      var dateParts = emp_joining_date_from_response.split("-");
      var jsDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);

      // Format the date using toLocaleDateString with the Bangladeshi locale
      var options = { year: 'numeric', month: 'long', day: 'numeric' };
      var formattedDate = jsDate.toLocaleDateString('en-BD', options);

      // Display the formatted date in the HTML element
      $('#emp_joining_date').html(formattedDate);

      $('#per_day_salary').val(response.data.per_day_salary);
      $('#emp_per_day_salary').html(response.data.per_day_salary);
      $('#monthly_holiday_bonus').val(response.data.per_day_salary);    
      var total_leave = $('#total_leave').val();

       if(total_leave == '0'){
        $('#total_number_of_pay_day').val('26');
        $('#total_daily_allowance').val(0);
        $('#total_travel_allowance').val(0);
        $('#rental_cost_allowance').val(0);
        $('#hospital_bill_allowance').val(0);
        $('#insurance_allowance').val(0);
        $('#sales_commission').val(0);
        $('#retail_commission').val(0);
        // $('#advance_less').val(0);
        $('#any_deduction').val(0);
        var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
        var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
        var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
        var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
        var insurance_allowance = parseFloat($('#insurance_allowance').val());
        var sales_commission = parseFloat($('#sales_commission').val());
        var retail_commission = parseFloat($('#retail_commission').val());
        var advance_less = parseFloat($('#advance_less').val());
        var any_deduction = parseFloat($('#any_deduction').val());

        var total_number_of_pay_day = parseFloat($('#total_number_of_pay_day').val());
        var per_day_salary = parseFloat($('#per_day_salary').val());
        var monthly_salary = total_number_of_pay_day*per_day_salary;
        var emp_total_bonus_amount = per_day_salary*39;
        var bonus_pay_amount = (emp_total_bonus_amount/4);

        $('#emp_total_bonus_amount').val(emp_total_bonus_amount);

        // var dataString = JSON.stringify(empTotalBonusAmount);
        // document.getElementById('hiddenDataYearlyTotalBonusAmount').value = dataString;

        $('#bonus_pay_amount').val(bonus_pay_amount);

        $('#monthly_salary').val(monthly_salary);
        var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());

        //total others result
        var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
        $('#total_others').val(total_others);
        
        //total salary result
        var total_salary = (monthly_salary+total_others);
        $('#total_salary').val(total_salary);


        //total payable salary result
        var yearly_bonus = parseFloat($('#yearly_bonus').val());
        var total_payable_salary = (total_salary+yearly_bonus);
        $('#total_payable_salary').val(total_payable_salary);

        //final pay amount result
        var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
        $('#final_pay_amount').val(final_pay_amount);     
        
       }

       //**************************** Yearly Bonus Count start ***********************************

        //to check yearly bonus is first time given or not
        if((response.data.yearly_bonus_date) == null){

          //.....................bonus count...................
          function calculateDates(joiningDateStr) {
            let joiningDate = new Date(joiningDateStr);
            let currentDate = new Date(joiningDate);
            let endDate = new Date(joiningDate);      
            endDate.setFullYear(endDate.getFullYear() + 1); // Set end date to 1 year after joining date       
            let results = [];    
            while (currentDate < endDate) {
              let eligibleDate = new Date(currentDate);
              eligibleDate.setMonth(eligibleDate.getMonth() +2);          
              let payDate = new Date(eligibleDate);
              payDate.setMonth(payDate.getMonth() + 1);
              
              results.push({
                joiningDate: currentDate.toISOString().split('T')[0],
                eligibleDate: eligibleDate.toISOString().split('T')[0],
                payDate: payDate.toISOString().split('T')[0]
              });         
              currentDate = new Date(payDate);
            }       
            return results;
          }

          let dates = calculateDates(response.data.joining_date);  //passing joining date if it is first time

        const firstDate = dates[0]; 
        console.log("Dates for 1 year if yearly bonus not exist:");

        //.......eligible mm-yyyy starts.......
        var eligibleDateFormatted = new Date(firstDate.eligibleDate);
        var eligibleMonth = eligibleDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
        var eligibleYear = eligibleDateFormatted.getFullYear();
        // Format month as two digits
        var eligibleMonthString = eligibleMonth < 10 ? '0' + eligibleMonth : '' + eligibleMonth;
        // Combine month and year in "mm-yyyy" format
        var eligible_mm_yyyy = eligibleMonthString + '-' + eligibleYear;
        //........eligible mm-yyyy ends........

        //.......bonus pay mm-yyyy starts....
        var payDateFormatted = new Date(firstDate.payDate);
        var payMonth = payDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
        var payYear = payDateFormatted.getFullYear();
        // Format month as two digits
        var payMonthString = payMonth < 10 ? '0' + payMonth : '' + payMonth;
        // Combine month and year in "mm-yyyy" format
        var payMonth_mm_yyyy = payMonthString + '-' + payYear;
        //........bonus pay mm-yyyy ends.....

        console.log("Joining Date:", firstDate.joiningDate);
        console.log("Eligible Date:", eligible_mm_yyyy);
        console.log("Bonus Pay Date:", payMonth_mm_yyyy);
        console.log("");
        $('#bonus_eligible_month').val(eligible_mm_yyyy);
        $('#bonus_pay_month').val(payMonth_mm_yyyy);
        var innerHTMLValueOfBonusPayMonth = $('#bonus_pay_month').val();

        //........current mm-yyyy starts............
        var currentDateFormatted = new Date();
        var currentMonth = currentDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
        var currentYear = currentDateFormatted.getFullYear();
        // Format month as two digits
        var currentMonthString = currentMonth < 10 ? '0' + currentMonth : '' + currentMonth;
        // Combine month and year in "mm-yyyy" format
        var current_mm_yyyy = currentMonthString + '-' + currentYear;
        //.........current mm-yyyy ends..............

        if(current_mm_yyyy == innerHTMLValueOfBonusPayMonth){
          $('#yearly_bonus').val(bonus_pay_amount);
        }else{
          $('#yearly_bonus').val('0');
        }
        var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
        var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
        var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
        var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
        var insurance_allowance = parseFloat($('#insurance_allowance').val());
        var sales_commission = parseFloat($('#sales_commission').val());
        var retail_commission = parseFloat($('#retail_commission').val());
        var monthly_salary = parseFloat($('#monthly_salary').val());
        var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
        var advance_less = parseFloat($('#advance_less').val());
        var any_deduction = parseFloat($('#any_deduction').val());

        //total others result
        var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
        $('#total_others').val(total_others);
        
        //total salary result
        var total_salary = (monthly_salary+total_others);
        $('#total_salary').val(total_salary);

        //total payable salary result
        var yearly_bonus = parseFloat($('#yearly_bonus').val());
        var total_payable_salary = (total_salary+yearly_bonus);
        $('#total_payable_salary').val(total_payable_salary);

        //final pay amount result
        var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
        $('#final_pay_amount').val(final_pay_amount);

        }else{


               if(((response.data.renew_date) == null) && ((response.data.renewed_yearly_bonus_date) == null)){
                    //.....................bonus count...................
                    function calculateDates(joiningDateStr) {
                    let joiningDate = new Date(joiningDateStr);
                    let currentDate = new Date(joiningDate);
                    let endDate = new Date(joiningDate);      
                    endDate.setFullYear(endDate.getFullYear() + 1); // Set end date to 1 year after joining date       
                    let results = [];    
                    while (currentDate < endDate) {
                      let eligibleDate = new Date(currentDate);
                      eligibleDate.setMonth(eligibleDate.getMonth() +2);          
                      let payDate = new Date(eligibleDate);
                      payDate.setMonth(payDate.getMonth() + 1);
                      
                      results.push({
                        joiningDate: currentDate.toISOString().split('T')[0],
                        eligibleDate: eligibleDate.toISOString().split('T')[0],
                        payDate: payDate.toISOString().split('T')[0]
                      });         
                      currentDate = new Date(payDate);
                    }       
                    return results;
                  }
                  
                  let dates = calculateDates(response.data.yearly_bonus_date); //passing latest yearly bonus date

                const firstDate = dates[0]; 
                console.log("Dates for 1 year if yearly bonus exist:");
                // console.log(response.data.yearly_bonus);
                //.......eligible mm-yyyy starts.......
                var eligibleDateFormatted = new Date(firstDate.eligibleDate);
                var eligibleMonth = eligibleDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
                var eligibleYear = eligibleDateFormatted.getFullYear();
                // Format month as two digits
                var eligibleMonthString = eligibleMonth < 10 ? '0' + eligibleMonth : '' + eligibleMonth;
                // Combine month and year in "mm-yyyy" format
                var eligible_mm_yyyy = eligibleMonthString + '-' + eligibleYear;
                //........eligible mm-yyyy ends........

                //.......bonus pay mm-yyyy starts....
                var payDateFormatted = new Date(firstDate.payDate);
                var payMonth = payDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
                var payYear = payDateFormatted.getFullYear();
                // Format month as two digits
                var payMonthString = payMonth < 10 ? '0' + payMonth : '' + payMonth;
                // Combine month and year in "mm-yyyy" format
                var payMonth_mm_yyyy = payMonthString + '-' + payYear;
                //........bonus pay mm-yyyy ends.....

                console.log("Last Yearly Bonus Date:", firstDate.joiningDate);
                console.log("Eligible Date:", eligible_mm_yyyy);
                console.log("Bonus Pay Date:", payMonth_mm_yyyy);
                console.log("");
                $('#bonus_eligible_month').val(eligible_mm_yyyy);
                $('#bonus_pay_month').val(payMonth_mm_yyyy);

                var innerHTMLValueOfBonusPayMonth = $('#bonus_pay_month').val();

                //........current mm-yyyy starts............
                var currentDateFormatted = new Date();
                var currentMonth = currentDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
                var currentYear = currentDateFormatted.getFullYear();
                // Format month as two digits
                var currentMonthString = currentMonth < 10 ? '0' + currentMonth : '' + currentMonth;
                // Combine month and year in "mm-yyyy" format
                var current_mm_yyyy = currentMonthString + '-' + currentYear;
                //.........current mm-yyyy ends..............

                if(current_mm_yyyy == innerHTMLValueOfBonusPayMonth){ 
                  $('#yearly_bonus').val(bonus_pay_amount);
                }else{
                  $('#yearly_bonus').val('0');
                }

                var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
                var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
                var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
                var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
                var insurance_allowance = parseFloat($('#insurance_allowance').val());
                var sales_commission = parseFloat($('#sales_commission').val());
                var retail_commission = parseFloat($('#retail_commission').val());
                var monthly_salary = parseFloat($('#monthly_salary').val());
                var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
                var advance_less = parseFloat($('#advance_less').val());
                var any_deduction = parseFloat($('#any_deduction').val());

                //total others result
                var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
                $('#total_others').val(total_others);
                
                //total salary result
                var total_salary = (monthly_salary+total_others);
                $('#total_salary').val(total_salary);

                //total payable salary result
                var yearly_bonus = parseFloat($('#yearly_bonus').val());
                var total_payable_salary = (total_salary+yearly_bonus);
                $('#total_payable_salary').val(total_payable_salary);

                //final pay amount result
                var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
                $('#final_pay_amount').val(final_pay_amount);
               }

               else if(((response.data.renew_date) != null) && ((response.data.renewed_yearly_bonus_date) == null))
               {
                      //.....................bonus count...................
                      function calculateDates(joiningDateStr) {
                    let joiningDate = new Date(joiningDateStr);
                    let currentDate = new Date(joiningDate);
                    let endDate = new Date(joiningDate);      
                    endDate.setFullYear(endDate.getFullYear() + 1); // Set end date to 1 year after joining date       
                    let results = [];    
                    while (currentDate < endDate) {
                      let eligibleDate = new Date(currentDate);
                      eligibleDate.setMonth(eligibleDate.getMonth() +2);          
                      let payDate = new Date(eligibleDate);
                      payDate.setMonth(payDate.getMonth() + 1);
                      
                      results.push({
                        joiningDate: currentDate.toISOString().split('T')[0],
                        eligibleDate: eligibleDate.toISOString().split('T')[0],
                        payDate: payDate.toISOString().split('T')[0]
                      });         
                      currentDate = new Date(payDate);
                    }       
                    return results;
                  }
                  
                  let dates = calculateDates(response.data.renew_date); //passing renew date

                const firstDate = dates[0]; 
                console.log("Dates for 1 year if renew date exist:");
                // console.log(response.data.yearly_bonus);

                //.......eligible mm-yyyy starts.......
                var eligibleDateFormatted = new Date(firstDate.eligibleDate);
                var eligibleMonth = eligibleDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
                var eligibleYear = eligibleDateFormatted.getFullYear();
                // Format month as two digits
                var eligibleMonthString = eligibleMonth < 10 ? '0' + eligibleMonth : '' + eligibleMonth;
                // Combine month and year in "mm-yyyy" format
                var eligible_mm_yyyy = eligibleMonthString + '-' + eligibleYear;
                //........eligible mm-yyyy ends........

                //.......bonus pay mm-yyyy starts....
                var payDateFormatted = new Date(firstDate.payDate);
                var payMonth = payDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
                var payYear = payDateFormatted.getFullYear();
                // Format month as two digits
                var payMonthString = payMonth < 10 ? '0' + payMonth : '' + payMonth;
                // Combine month and year in "mm-yyyy" format
                var payMonth_mm_yyyy = payMonthString + '-' + payYear;
                //........bonus pay mm-yyyy ends.....

                console.log("Renew Date:", firstDate.joiningDate);
                console.log("Eligible Date:", eligible_mm_yyyy);
                console.log("Bonus Pay Date:", payMonth_mm_yyyy);
                console.log("");
                $('#bonus_eligible_month').val(eligible_mm_yyyy);
                $('#bonus_pay_month').val(payMonth_mm_yyyy);

                var innerHTMLValueOfBonusPayMonth = $('#bonus_pay_month').val();

                //........current mm-yyyy starts............
                var currentDateFormatted = new Date();
                var currentMonth = currentDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
                var currentYear = currentDateFormatted.getFullYear();
                // Format month as two digits
                var currentMonthString = currentMonth < 10 ? '0' + currentMonth : '' + currentMonth;
                // Combine month and year in "mm-yyyy" format
                var current_mm_yyyy = currentMonthString + '-' + currentYear;
                //.........current mm-yyyy ends..............

                if(current_mm_yyyy == innerHTMLValueOfBonusPayMonth){ 
                  $('#yearly_bonus').val(bonus_pay_amount);
                }else{
                  $('#yearly_bonus').val('0');
                }

                var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
                var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
                var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
                var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
                var insurance_allowance = parseFloat($('#insurance_allowance').val());
                var sales_commission = parseFloat($('#sales_commission').val());
                var retail_commission = parseFloat($('#retail_commission').val());
                var monthly_salary = parseFloat($('#monthly_salary').val());
                var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
                var advance_less = parseFloat($('#advance_less').val());
                var any_deduction = parseFloat($('#any_deduction').val());

                //total others result
                var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
                $('#total_others').val(total_others);
                
                //total salary result
                var total_salary = (monthly_salary+total_others);
                $('#total_salary').val(total_salary);

                //total payable salary result
                var yearly_bonus = parseFloat($('#yearly_bonus').val());
                var total_payable_salary = (total_salary+yearly_bonus);
                $('#total_payable_salary').val(total_payable_salary);

                //final pay amount result
                var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
                $('#final_pay_amount').val(final_pay_amount);
               }
               else{
                    //.....................bonus count...................
                    function calculateDates(joiningDateStr) {
                    let joiningDate = new Date(joiningDateStr);
                    let currentDate = new Date(joiningDate);
                    let endDate = new Date(joiningDate);      
                    endDate.setFullYear(endDate.getFullYear() + 1); // Set end date to 1 year after joining date       
                    let results = [];    
                    while (currentDate < endDate) {
                      let eligibleDate = new Date(currentDate);
                      eligibleDate.setMonth(eligibleDate.getMonth() +2);          
                      let payDate = new Date(eligibleDate);
                      payDate.setMonth(payDate.getMonth() + 1);
                      
                      results.push({
                        joiningDate: currentDate.toISOString().split('T')[0],
                        eligibleDate: eligibleDate.toISOString().split('T')[0],
                        payDate: payDate.toISOString().split('T')[0]
                      });         
                      currentDate = new Date(payDate);
                    }       
                    return results;
                  }
                  
                  let dates = calculateDates(response.data.renewed_yearly_bonus_date); //passing latest renewed yearly bonus date

                const firstDate = dates[0]; 
                console.log("Dates for 1 year if renewed yearly bonus date exist:");
                // console.log(response.data.yearly_bonus);

                //.......eligible mm-yyyy starts.......
                var eligibleDateFormatted = new Date(firstDate.eligibleDate);
                var eligibleMonth = eligibleDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
                var eligibleYear = eligibleDateFormatted.getFullYear();
                // Format month as two digits
                var eligibleMonthString = eligibleMonth < 10 ? '0' + eligibleMonth : '' + eligibleMonth;
                // Combine month and year in "mm-yyyy" format
                var eligible_mm_yyyy = eligibleMonthString + '-' + eligibleYear;
                //........eligible mm-yyyy ends........

                //.......bonus pay mm-yyyy starts....
                var payDateFormatted = new Date(firstDate.payDate);
                var payMonth = payDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
                var payYear = payDateFormatted.getFullYear();
                // Format month as two digits
                var payMonthString = payMonth < 10 ? '0' + payMonth : '' + payMonth;
                // Combine month and year in "mm-yyyy" format
                var payMonth_mm_yyyy = payMonthString + '-' + payYear;
                //........bonus pay mm-yyyy ends.....

                console.log("Latest Renewed Yearly Bonus Date:", firstDate.joiningDate);
                console.log("Eligible Date:", eligible_mm_yyyy);
                console.log("Bonus Pay Date:", payMonth_mm_yyyy);
                console.log("");
                $('#bonus_eligible_month').val(eligible_mm_yyyy);
                $('#bonus_pay_month').val(payMonth_mm_yyyy);

                var innerHTMLValueOfBonusPayMonth = $('#bonus_pay_month').val();

                //........current mm-yyyy starts............
                var currentDateFormatted = new Date();
                var currentMonth = currentDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
                var currentYear = currentDateFormatted.getFullYear();
                // Format month as two digits
                var currentMonthString = currentMonth < 10 ? '0' + currentMonth : '' + currentMonth;
                // Combine month and year in "mm-yyyy" format
                var current_mm_yyyy = currentMonthString + '-' + currentYear;
                //.........current mm-yyyy ends..............

                if(current_mm_yyyy == innerHTMLValueOfBonusPayMonth){ 
                  $('#yearly_bonus').val(bonus_pay_amount);
                }else{
                  $('#yearly_bonus').val('0');
                }

                var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
                var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
                var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
                var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
                var insurance_allowance = parseFloat($('#insurance_allowance').val());
                var sales_commission = parseFloat($('#sales_commission').val());
                var retail_commission = parseFloat($('#retail_commission').val());
                var monthly_salary = parseFloat($('#monthly_salary').val());
                var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
                var advance_less = parseFloat($('#advance_less').val());
                var any_deduction = parseFloat($('#any_deduction').val());

                //total others result
                var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
                $('#total_others').val(total_others);
                
                //total salary result
                var total_salary = (monthly_salary+total_others);
                $('#total_salary').val(total_salary);

                //total payable salary result
                var yearly_bonus = parseFloat($('#yearly_bonus').val());
                var total_payable_salary = (total_salary+yearly_bonus);
                $('#total_payable_salary').val(total_payable_salary);

                //final pay amount result
                var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
                $('#final_pay_amount').val(final_pay_amount);
               }
        }
       

      });
 });
});


$('#total_working_day').on('keyup',function(){
  $('#total_leave').val('');
  $('#total_number_of_pay_day').val('');
  $('#monthly_salary').val('');
});


//total leave calculation
$('#total_leave').on('keyup', function(){
    var total_working_day = parseFloat($('#total_working_day').val());
    var total_leave = parseFloat($('#total_leave').val());
    var per_day_salary = parseFloat($('#per_day_salary').val());
      
    var total_number_of_pay_day = total_working_day-total_leave;
    var monthly_salary = total_number_of_pay_day*per_day_salary;

    $('#total_number_of_pay_day').val(total_number_of_pay_day);
    $('#monthly_salary').val(monthly_salary);
    $('#monthly_holiday_bonus').val(per_day_salary);


    $('#total_daily_allowance').val(0);
    $('#total_travel_allowance').val(0);
    $('#rental_cost_allowance').val(0);
    $('#hospital_bill_allowance').val(0);
    $('#insurance_allowance').val(0);
    $('#sales_commission').val(0);
    $('#retail_commission').val(0);
    // $('#advance_less').val(0);
    $('#any_deduction').val(0);
    var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
    var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
    var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
    var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
    var insurance_allowance = parseFloat($('#insurance_allowance').val());
    var sales_commission = parseFloat($('#sales_commission').val());
    var retail_commission = parseFloat($('#retail_commission').val());
    var monthly_salary = parseFloat($('#monthly_salary').val());
    var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
    var advance_less = parseFloat($('#advance_less').val());
    var any_deduction = parseFloat($('#any_deduction').val());

    //total others result
    var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
    $('#total_others').val(total_others);
    
    //total salary result
    var total_salary = (monthly_salary+total_others);
    $('#total_salary').val(total_salary);

    //total payable salary result
    var yearly_bonus = parseFloat($('#yearly_bonus').val());
    var total_payable_salary = (total_salary+yearly_bonus);
    $('#total_payable_salary').val(total_payable_salary);

    //final pay amount result
    var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
        $('#final_pay_amount').val(final_pay_amount);

    });



//total daily allowannce calculation
$('#total_daily_allowance').on('keyup',function(){
  $('#total_travel_allowance').val(0);
  $('#rental_cost_allowance').val(0);
  $('#hospital_bill_allowance').val(0);
  $('#insurance_allowance').val(0);
  $('#sales_commission').val(0);
  $('#retail_commission').val(0);
  // $('#advance_less').val(0);
  $('#any_deduction').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
  var advance_less = parseFloat($('#advance_less').val());
  var any_deduction = parseFloat($('#any_deduction').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);

   
   //total payable salary result
   var yearly_bonus = parseFloat($('#yearly_bonus').val());
    var total_payable_salary = (total_salary+yearly_bonus);
    $('#total_payable_salary').val(total_payable_salary);

    //final pay amount result
    var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
    $('#final_pay_amount').val(final_pay_amount);
});


//total travel allowannce calculation
$('#total_travel_allowance').on('keyup',function(){
  $('#rental_cost_allowance').val(0);
  $('#hospital_bill_allowance').val(0);
  $('#insurance_allowance').val(0);
  $('#sales_commission').val(0);
  $('#retail_commission').val(0);
  // $('#advance_less').val(0);
  $('#any_deduction').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
  var advance_less = parseFloat($('#advance_less').val());
  var any_deduction = parseFloat($('#any_deduction').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);

   //total payable salary result
   var yearly_bonus = parseFloat($('#yearly_bonus').val());
    var total_payable_salary = (total_salary+yearly_bonus);
    $('#total_payable_salary').val(total_payable_salary);

    //final pay amount result
    var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
      $('#final_pay_amount').val(final_pay_amount);
});


//rental allowance calculation
$('#rental_cost_allowance').on('keyup',function(){
  $('#hospital_bill_allowance').val(0);
  $('#insurance_allowance').val(0);
  $('#sales_commission').val(0);
  $('#retail_commission').val(0);
  // $('#advance_less').val(0);
  $('#any_deduction').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
  var advance_less = parseFloat($('#advance_less').val());
  var any_deduction = parseFloat($('#any_deduction').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);

   //total payable salary result
   var yearly_bonus = parseFloat($('#yearly_bonus').val());
    var total_payable_salary = (total_salary+yearly_bonus);
    $('#total_payable_salary').val(total_payable_salary);
});

//hospital bill allowance calculation
$('#hospital_bill_allowance').on('keyup',function(){
  $('#insurance_allowance').val(0);
  $('#sales_commission').val(0);
  $('#retail_commission').val(0);
  // $('#advance_less').val(0);
  $('#any_deduction').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
  var advance_less = parseFloat($('#advance_less').val());
  var any_deduction = parseFloat($('#any_deduction').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);

   //total payable salary result
   var yearly_bonus = parseFloat($('#yearly_bonus').val());
    var total_payable_salary = (total_salary+yearly_bonus);
    $('#total_payable_salary').val(total_payable_salary);

    //final pay amount result
    var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
    $('#final_pay_amount').val(final_pay_amount);
});


//insurance allowance calculation
$('#insurance_allowance').on('keyup',function(){
  $('#sales_commission').val(0);
  $('#retail_commission').val(0);
  // $('#advance_less').val(0);
  $('#any_deduction').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
  var advance_less = parseFloat($('#advance_less').val());
  var any_deduction = parseFloat($('#any_deduction').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);

   //total payable salary result
   var yearly_bonus = parseFloat($('#yearly_bonus').val());
    var total_payable_salary = (total_salary+yearly_bonus);
    $('#total_payable_salary').val(total_payable_salary);

   //final pay amount result
   var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
   $('#final_pay_amount').val(final_pay_amount);
});


//sales commission calculation
$('#sales_commission').on('keyup',function(){
  $('#retail_commission').val(0);
  // $('#advance_less').val(0);
  $('#any_deduction').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
  var advance_less = parseFloat($('#advance_less').val());
  var any_deduction = parseFloat($('#any_deduction').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);

   //total payable salary result
   var yearly_bonus = parseFloat($('#yearly_bonus').val());
    var total_payable_salary = (total_salary+yearly_bonus);
    $('#total_payable_salary').val(total_payable_salary);

    //final pay amount result
    var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
    $('#final_pay_amount').val(final_pay_amount);
});


//retail commission calculation
$('#retail_commission').on('keyup',function(){
  // $('#advance_less').val(0);
  $('#any_deduction').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
  var advance_less = parseFloat($('#advance_less').val());
  var any_deduction = parseFloat($('#any_deduction').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);

   //total payable salary result
   var yearly_bonus = parseFloat($('#yearly_bonus').val());
    var total_payable_salary = (total_salary+yearly_bonus);
    $('#total_payable_salary').val(total_payable_salary);

    //final pay amount result
    var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
    $('#final_pay_amount').val(final_pay_amount);
});




//-----------------------yearly bonus (manual entry) calculation-----------------------------
$('#yearly_bonus').on('keyup',function(){
  
  
  //........current mm-yyyy starts............
  var currentDateFormatted = new Date();
  var currentMonth = currentDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
  var currentYear = currentDateFormatted.getFullYear();
  // Format month as two digits
  var currentMonthString = currentMonth < 10 ? '0' + currentMonth : '' + currentMonth;
  // Combine month and year in "mm-yyyy" format
  var current_mm_yyyy = currentMonthString + '-' + currentYear;
  //.........current mm-yyyy ends..............
  
  $('#bonus_eligible_month').val('');
  $('#bonus_pay_month').val(current_mm_yyyy);

  $('#total_payable_salary').val(0);
  // $('#advance_less').val(0);
  $('#any_deduction').val(0);
  $('#final_pay_amount').val(0);

  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
  var advance_less = parseFloat($('#advance_less').val());
  var any_deduction = parseFloat($('#any_deduction').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);

   //total payable salary result
   var yearly_bonus = parseFloat($('#yearly_bonus').val());
    var total_payable_salary = (total_salary+yearly_bonus);
    $('#total_payable_salary').val(total_payable_salary);

    //final pay amount result
    var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
    $('#final_pay_amount').val(final_pay_amount);
});









//advance less calculation
$('#advance_less').on('keyup',function(){
  $('#any_deduction').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
  var advance_less = parseFloat($('#advance_less').val());
  var any_deduction = parseFloat($('#any_deduction').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);

   //total payable salary result
   var yearly_bonus = parseFloat($('#yearly_bonus').val());
    var total_payable_salary = (total_salary+yearly_bonus);
    $('#total_payable_salary').val(total_payable_salary);

    //final pay amount result
    var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
    $('#final_pay_amount').val(final_pay_amount);
});


//any deduction calculation
$('#any_deduction').on('keyup',function(){
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());
  var advance_less = parseFloat($('#advance_less').val());
  var any_deduction = parseFloat($('#any_deduction').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);

   //total payable salary result
   var yearly_bonus = parseFloat($('#yearly_bonus').val());
    var total_payable_salary = (total_salary+yearly_bonus);
    $('#total_payable_salary').val(total_payable_salary);

    //final pay amount result
    var final_pay_amount = (total_payable_salary-(advance_less+any_deduction));
    $('#final_pay_amount').val(final_pay_amount);
});

  </script>
  @endpush