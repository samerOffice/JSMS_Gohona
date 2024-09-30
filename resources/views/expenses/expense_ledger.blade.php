@extends('master')

@section('title')
Expense Ledger
@endsection

@push('css')
<style>
.table-container {
    overflow-x: auto; /* Enable horizontal scrolling */
    max-width: 100%;  /* Set the max width of the container */
    white-space: nowrap; /* Prevent wrapping of table cells */
}

table {
    width: 100%; /* Optional: you can set a fixed or dynamic width */
    border-collapse: collapse; /* Ensure borders don't overlap */
}

th, td {
    padding: 8px 16px;
    text-align: left;
    border: 1px solid #ddd; /* Add border for visibility */
}
</style>

@endpush

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <h5>Month: <span style="color: #0f48f2"> {{ \Carbon\Carbon::now()->format('F') }}</span></h5>
        <h5>Year: <span style="color: #0f48f2"> {{ \Carbon\Carbon::now()->format('Y') }}</span></h5>
        <br>
        <!-- Daily Expense Section -->
        <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Daily Expenses</h4>
        <div class="table-container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Mobile Bill</th>
                        <th>Snacks</th>
                        <th>Entertainment Bill</th>
                        <th>Others</th>
                        <th>Gift for Customer</th>
                        <th>Ornaments Binding Bill</th>
                        <th>Interest for Gold Lending</th>
                        <th>Vangary Loss</th>
                        <th>Pay Repair Bill</th>
                        <th>Photocopy</th>
                        <th>Management Expenses</th>
                        <th>Transport</th>
                        <th>Bkash Cost</th>
                        <th>Repairing Cost</th>
                        <th>Conveyance</th>
                        <th>Buy Lock/Locker</th>
                        <th>Cash Back</th>
                        <th>Live Cost</th>
                        <th>Parking Cost</th>
                        <th>VAT Machine</th>
                        <th>Door Grease</th>
                    </tr>
                </thead>
                <tbody>               
                @foreach($daily_payments as $daily_payment)
                    <tr>
                        <td>{{$daily_payment->payment_date}}</td>
                        <td>{{$daily_payment->mobile_bill}}</td>
                        <td>{{$daily_payment->snacks}}</td>
                        <td>{{$daily_payment->entertainment_bill}}</td>
                        <td>{{$daily_payment->others}}</td>
                        <td>{{$daily_payment->gift_for_customer}}</td>
                        <td>{{$daily_payment->ornaments_binding_bill}}</td>
                        <td>{{$daily_payment->interest_for_gold_lending}}</td>
                        <td>{{$daily_payment->vangary_loss}}</td>
                        <td>{{$daily_payment->pay_repair_bill}}</td>
                        <td>{{$daily_payment->photocopy}}</td>
                        <td>{{$daily_payment->management_expenses}}</td>
                        <td>{{$daily_payment->transport}}</td>
                        <td>{{$daily_payment->bkash_cost}}</td>
                        <td>{{$daily_payment->repairing_cost}}</td>
                        <td>{{$daily_payment->conveyance}}</td>
                        <td>{{$daily_payment->buy_lock_locker}}</td>
                        <td>{{$daily_payment->cash_back}}</td>
                        <td>{{$daily_payment->live_cost}}</td>
                        <td>{{$daily_payment->parking_cost}}</td>
                        <td>{{$daily_payment->vat_machine}}</td>
                        <td>{{$daily_payment->door_grease}}</td>
                    </tr>
                @endforeach               
                <!-- Total Row -->
                <tr class="total">
                    <th style="color: blue">TOTAL (BDT)</th>
                    <td>{{ $total_mobile_bill }}</td>
                    <td>{{ $total_snacks }}</td>
                    <td>{{ $total_entertainment_bill }}</td>
                    <td>{{ $total_others }}</td>
                    <td>{{ $total_gift_for_customer }}</td>
                    <td>{{ $total_ornaments_binding_bill }}</td>
                    <td>{{ $total_interest_for_gold_lending }}</td>
                    <td>{{ $total_vangary_loss }}</td>
                    <td>{{ $total_pay_repair_bill }}</td>
                    <td>{{ $total_photocopy }}</td>
                    <td>{{ $total_management_expenses }}</td>
                    <td>{{ $total_transport }}</td>
                    <td>{{ $total_bkash_cost }}</td>
                    <td>{{ $total_repairing_cost }}</td>
                    <td>{{ $total_conveyance }}</td>
                    <td>{{ $total_buy_lock_locker }}</td>
                    <td>{{ $total_cash_back }}</td>
                    <td>{{ $total_live_cost }}</td>
                    <td>{{ $total_parking_cost }}</td>
                    <td>{{ $total_vat_machine }}</td>
                    <td>{{ $total_door_grease }}</td>
                </tr>                
                </tbody>
              
            </table>
        </div>
        <h5 style="color: green">Grand Total (BDT) : <b>{{ number_format($daily_grand_total, 2) }} Tk.</b></h5>
        <br>
    
        <!-- Monthly Expense Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Monthly Expenses</h4>
            <div class="table-container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Shop Rent / Advance</th>
                        {{-- <th>Salary</th> --}}
                        <th>Service Charge</th>
                        <th>Electricity Bill</th>
                        <th>Water Bill</th>
                        <th>Internet Bill</th>
                        <th>Jewelers Member Fees</th>
                        <th>VAT</th>
                        <th>VAT Office</th>
                        <th>VAT Liton</th>
                        <th>Staff Bonus</th>
                        <th>VAT Memo</th>
                        <th>Market Member Fees</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monthly_payments as $monthly_payment)
                    <tr>
                        <td>{{ $monthly_payment->payment_date }}</td>
                        <td>{{ $monthly_payment->shop_rent_advance }}</td>
                        {{-- <td>{{ $monthly_payment->staff_salary }}</td> --}}
                        <td>{{ $monthly_payment->service_charge }}</td>
                        <td>{{ $monthly_payment->electricity_bill }}</td>
                        <td>{{ $monthly_payment->water_bill }}</td>
                        <td>{{ $monthly_payment->internet_bill }}</td>
                        <td>{{ $monthly_payment->jewelers_member_fees }}</td>
                        <td>{{ $monthly_payment->vat }}</td>
                        <td>{{ $monthly_payment->vat_office }}</td>
                        <td>{{ $monthly_payment->vat_liton }}</td>
                        <td>{{ $monthly_payment->staff_bonus }}</td>
                        <td>{{ $monthly_payment->vat_memo }}</td>
                        <td>{{ $monthly_payment->market_member_fees }}</td>
                    </tr>
                    @endforeach
                    <tr class="total">
                        <th style="color: blue">TOTAL (BDT)</th>
                        <td>{{ $total_shop_rent_advance }}</td>
                        <td>{{ $total_service_charge }}</td>
                        <td>{{ $total_electricity_bill }}</td>
                        <td>{{ $total_water_bill }}</td>
                        <td>{{ $total_internet_bill }}</td>
                        <td>{{ $total_jewelers_member_fees }}</td>
                        <td>{{ $total_vat }}</td>
                        <td>{{ $total_vat_office }}</td>
                        <td>{{ $total_vat_liton }}</td>
                        <td>{{ $total_staff_bonus }}</td>
                        <td>{{ $total_vat_memo }}</td>
                        <td>{{ $total_market_member_fees }}</td>
                    </tr>
                    
                </tbody>
                <tfoot>
                    <tr><th class="total" colspan="3" style="color: rgb(198, 13, 158)">Sum of Total (BDT) :</th></tr>
                    <tr><th class="total" colspan="3" style="color: rgb(198, 13, 158)">{{ number_format($total_monthly_payment, 2) }}</th></tr>
                </tfoot>
            </table>
            </div>

            <h4 style="color: rgb(179, 25, 97);" class="text-center">Salaries</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Employee</th>
                        <th>Paid Salary Amount (BDT)</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($salaries as $salary)
                    <tr>
                        <td>{{ $salary->staff_salary_date }}</td>
                        <td>{{ $salary->staff_name }}</td>
                        <td>{{ $salary->staff_paid_salary_amount }}</td>
                    </tr>
                    @endforeach
                  
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-center" style="color : blue">TOTAL (BDT)</th>
                        <td class="total">{{$total_monthly_salaries}}</td>
                    </tr>
                </tfoot>
            </table>


            @if($monthly_payment_others->isNotEmpty())
            <h4 style="color: rgb(179, 25, 97);" class="text-center">Others</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Expense Name</th>
                        <th>Paid Amount (BDT)</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($monthly_payment_others as $monthly_payment_other)
                    <tr>
                        <td>{{ $monthly_payment_other->expense_pay_date }}</td>
                        <td>{{ $monthly_payment_other->expense_name }}</td>
                        <td>{{ $monthly_payment_other->expense_amount }}</td>
                    </tr>
                    @endforeach
                  
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-center" style="color : blue">TOTAL (BDT)</th>
                        <td class="total">{{$total_monthly_payment_others}}</td>
                    </tr>
                </tfoot>
            </table>
            @endif

            <h5 style="color: green">Grand Total (BDT) : <b>{{$monthly_grand_total}} Tk.</b></h5>
            <br>
        </div>
    
        <!-- Yearly Expense Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Yearly Expenses</h4>
            <div class="table-container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Payment Year</th>
                        <th>Trade License</th>
                        <th>Pahela Boishakh Expenses</th>
                        <th>Valentine Gate</th>
                        <th>Zakat</th>
                        <th>Dealing Licence</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($yearly_payments as $yearly_payment)
                    <tr>
                        <td>{{ $yearly_payment->payment_date }}</td>
                        <td>{{ $yearly_payment->payment_year }}</td>
                        <td>{{ $yearly_payment->trade_license }}</td>
                        <td>{{ $yearly_payment->pahela_boishakh_expenses }}</td>
                        <td>{{ $yearly_payment->valentine_gate }}</td>
                        <td>{{ $yearly_payment->zakat }}</td>
                        <td>{{ $yearly_payment->dealing_licence }}</td>
                    </tr>
                    @endforeach
                    <tr class="total">
                        <th colspan="2" class="text-center" style="color: blue">TOTAL (BDT)</th>
                        <td>{{ $total_trade_license }}</td>
                        <td>{{ $total_pahela_boishakh_expenses }}</td>
                        <td>{{ $total_valentine_gate }}</td>
                        <td>{{ $total_zakat }}</td>
                        <td>{{ $total_dealing_licence }}</td>
                    </tr>
                    
                </tbody>
            </table>
            </div>
            <h5 style="color: green">Grand Total (BDT) : <b>{{ number_format($yearly_grand_total, 2) }} Tk.</b></h5>
            <br>
            
        </div>

        <!-- Marketing Expense Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Marketing Costs</h4>
            <div class="table-container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Advertising</th>
                        <th>SMS Buy</th>
                        <th>Facebook Boosting</th>
                        <th>Facebook Design</th>
                        <th>Website Charge</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($marketing_costs as $marketing_cost)
                    <tr>
                        <td>{{ $marketing_cost->payment_date }}</td>
                        <td>{{ $marketing_cost->advertising }}</td>
                        <td>{{ $marketing_cost->sms_buy }}</td>
                        <td>{{ $marketing_cost->facebook_boosting }}</td>
                        <td>{{ $marketing_cost->facebook_design }}</td>
                        <td>{{ $marketing_cost->website_charge }}</td>
                    </tr>
                    @endforeach
                    <tr class="total">
                        <th class="text-center" style="color: blue">TOTAL (BDT)</th>
                        <td>{{ $total_advertising }}</td>
                        <td>{{ $total_sms_buy }}</td>
                        <td>{{ $total_facebook_boosting }}</td>
                        <td>{{ $total_facebook_design }}</td>
                        <td>{{ $total_website_charge }}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
            <h5 style="color: green">Grand Total (BDT) : <b>{{ number_format($marketing_cost_grand_total, 2) }} Tk.</b></h5>
            <br>
            
        </div>


        <!-- Payment Expense Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Payments</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Expense Name</th>
                        <th>Paid Amount (BDT)</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->expense_pay_date }}</td>
                        <td>{{ $payment->expense_name }}</td>
                        <td>{{ $payment->expense_amount }}</td>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
            <h5 style="color: green">Grand Total (BDT) : <b>{{ number_format($total_payments, 2) }} Tk.</b></h5>
            <br>
        </div>

    
        <!-- Investment Expense Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Investment Expenses</h4>
            <div class="table-container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Buy Old Gold</th>
                        <th>Buy Ornaments Readymade</th>
                        <th>Buy 24K Gold / Ananto</th>
                        <th>Buy Ornaments from Ananto</th>
                        <th>Exchange Own Gold</th>
                        <th>Exchange Own Diamond</th>
                        <th>Buy or Exchange Own Gold</th>
                        <th>Booking Cancel</th>
                        <th>Deposit Customer 24K Gold</th>
                        <th>Buy Diamond from Mihir</th>
                        <th>Pay to Sajal Bhai</th>
                        <th>Pay to Ananto</th>
                        <th>Order Cancel</th>
                        <th>Deposit in City Bank</th>
                        <th>Pay Vangary Profit</th>
                        <th>Deposit in Dutch Bangla Bank</th>
                        <th>Shop Decoration Advance</th>
                        <th>Pay to Customer</th>
                        <th>Due Cancel</th>
                        <th>Box Bill (Shamim Products)</th>
                        <th>Diamond Test Machine / Wet Machine</th>
                        <th>Buy Stone</th>
                        <th>Software Advance / Payment</th>
                        <th>Buy Coffee Machine / Computer</th>
                        <th>Stationary Printing</th>
                        <th>Balance or Cash in Hand</th>
                    </tr>
                </thead>
                <tbody>               
                @foreach($investment_payments as $investment_payment)
                    <tr>
                        <td>{{ $investment_payment->payment_date }}</td>
                        <td>{{ $investment_payment->buy_old_gold }}</td>
                        <td>{{ $investment_payment->buy_ornaments_readymade }}</td>
                        <td>{{ $investment_payment->buy_24k_gold_ananto }}</td>
                        <td>{{ $investment_payment->buy_ornaments_from_ananto }}</td>
                        <td>{{ $investment_payment->exchange_own_gold }}</td>
                        <td>{{ $investment_payment->exchange_own_diamond }}</td>
                        <td>{{ $investment_payment->buy_or_exchange_own_gold }}</td>
                        <td>{{ $investment_payment->booking_cancel }}</td>
                        <td>{{ $investment_payment->deposit_customer_24k_gold }}</td>
                        <td>{{ $investment_payment->buy_diamond_from_mihir }}</td>
                        <td>{{ $investment_payment->pay_to_sajal_bhai }}</td>
                        <td>{{ $investment_payment->pay_to_ananto }}</td>
                        <td>{{ $investment_payment->order_cancel }}</td>
                        <td>{{ $investment_payment->deposit_in_city_bank }}</td>
                        <td>{{ $investment_payment->pay_vangary_profit }}</td>
                        <td>{{ $investment_payment->deposit_in_dutch_bangla_bank }}</td>
                        <td>{{ $investment_payment->shop_decoration_advance }}</td>
                        <td>{{ $investment_payment->pay_to_customer }}</td>
                        <td>{{ $investment_payment->due_cancel }}</td>
                        <td>{{ $investment_payment->box_bill_shamim_products }}</td>
                        <td>{{ $investment_payment->diamond_test_machine_wet_machine }}</td>
                        <td>{{ $investment_payment->buy_stone }}</td>
                        <td>{{ $investment_payment->software_advance_payment }}</td>
                        <td>{{ $investment_payment->buy_coffee_machine_computer }}</td>
                        <td>{{ $investment_payment->stationary_printing }}</td>
                        <td>{{ $investment_payment->balance_or_cash_in_hand }}</td>
                    </tr>
                @endforeach               
                <!-- Total Row -->
                <tr class="total">
                    <th style="color: blue">TOTAL (BDT)</th>
                    <td>{{ $total_buy_old_gold }}</td>
                    <td>{{ $total_buy_ornaments_readymade }}</td>
                    <td>{{ $total_buy_24k_gold_ananto }}</td>
                    <td>{{ $total_buy_ornaments_from_ananto }}</td>
                    <td>{{ $total_exchange_own_gold }}</td>
                    <td>{{ $total_exchange_own_diamond }}</td>
                    <td>{{ $total_buy_or_exchange_own_gold }}</td>
                    <td>{{ $total_booking_cancel }}</td>
                    <td>{{ $total_deposit_customer_24k_gold }}</td>
                    <td>{{ $total_buy_diamond_from_mihir }}</td>
                    <td>{{ $total_pay_to_sajal_bhai }}</td>
                    <td>{{ $total_pay_to_ananto }}</td>
                    <td>{{ $total_order_cancel }}</td>
                    <td>{{ $total_deposit_in_city_bank }}</td>
                    <td>{{ $total_pay_vangary_profit }}</td>
                    <td>{{ $total_deposit_in_dutch_bangla_bank }}</td>
                    <td>{{ $total_shop_decoration_advance }}</td>
                    <td>{{ $total_pay_to_customer }}</td>
                    <td>{{ $total_due_cancel }}</td>
                    <td>{{ $total_box_bill_shamim_products }}</td>
                    <td>{{ $total_diamond_test_machine_wet_machine }}</td>
                    <td>{{ $total_buy_stone }}</td>
                    <td>{{ $total_software_advance_payment }}</td>
                    <td>{{ $total_buy_coffee_machine_computer }}</td>
                    <td>{{ $total_stationary_printing }}</td>
                    <td>{{ $total_balance_or_cash_in_hand }}</td>
                </tr>
                            
                </tbody>
              
            </table>
            </div>
            <h5 style="color: green">Grand Total (BDT) : <b>{{ number_format($investment_expense_grand_total, 2) }} Tk.</b></h5>
            <br>
        </div>
    
    
        <!-- Loans and Advances Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Loans and Advances</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Expense Type</th>
                        <th>Employee</th>
                        <th>Paid Amount (BDT)</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($loan_or_advances as $loan_or_advance)
                    <tr>
                        <td>{{ $loan_or_advance->expense_pay_date }}</td>
                        <td>
                            @if($loan_or_advance->loan_or_advance_expense_type == 1)
                            Loan 
                            @else 
                            Advance
                            @endif
                        </td>
                        <td>{{ $loan_or_advance->employee_name }}</td>
                        <td>{{ $loan_or_advance->loan_or_advance_amount }}</td>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
            <h5 style="color: green">Grand Total (BDT) : <b>{{ number_format($total_loan_or_advances, 2) }} Tk.</b></h5>
            <br>
        </div>       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  </div>

@endsection

@push('myScripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  @endpush