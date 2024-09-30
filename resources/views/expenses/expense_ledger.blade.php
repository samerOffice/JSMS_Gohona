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
                    <th style="color: blue">TOTAL</th>
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
    
        <!-- Monthly Expense Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Monthly Expenses</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Shop Rent / Advance</th>
                        <th>Salary</th>
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
                    <tr>{{$total_monthly_salaries}}</tr>

                    @foreach($monthly_payments as $monthly_payment)
                    <tr>
                        <td>{{ $monthly_payment->payment_date }}</td>
                        <td>{{ $monthly_payment->shop_rent_advance }}</td>
                        <td>{{ $monthly_payment->staff_salary }}</td>
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
                  
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="total">Total Monthly Expenses</td>
                        <td class="total">$1,700.00</td>
                    </tr>
                </tfoot>
            </table>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Employee</th>
                        <th>Paid Salary Amount</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($monthly_payments as $monthly_payment)
                    <tr>
                        <td>{{ $monthly_payment->payment_date }}</td>
                        <td>{{ $monthly_payment->shop_rent_advance }}</td>
                        <td>{{ $monthly_payment->market_member_fees }}</td>
                    </tr>
                    @endforeach
                  
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="total">Total Monthly Expenses</td>
                        <td class="total">$1,700.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    
        <!-- Yearly Expense Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Yearly Expenses</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024</td>
                        <td>Annual Insurance Premium</td>
                        <td>$1,200.00</td>
                    </tr>
                    <tr>
                        <td>2024</td>
                        <td>Business License Renewal</td>
                        <td>$500.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="total">Total Yearly Expenses</td>
                        <td class="total">$1,700.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Marketing Expense Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Marketing Costs</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-09-10</td>
                        <td>Social Media Campaign</td>
                        <td>$800.00</td>
                    </tr>
                    <tr>
                        <td>2024-09-05</td>
                        <td>Google Ads</td>
                        <td>$400.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="total">Total Marketing Costs</td>
                        <td class="total">$1,200.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>


        <!-- Payment Expense Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Payments</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-09-10</td>
                        <td>Social Media Campaign</td>
                        <td>$800.00</td>
                    </tr>
                    <tr>
                        <td>2024-09-05</td>
                        <td>Google Ads</td>
                        <td>$400.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="total">Total Payments</td>
                        <td class="total">$1,200.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>

    
        <!-- Investment Expense Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Investment Expenses</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-09-15</td>
                        <td>New Equipment Purchase</td>
                        <td>$5,000.00</td>
                    </tr>
                    <tr>
                        <td>2024-08-01</td>
                        <td>Software Development</td>
                        <td>$3,000.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="total">Total Investment Expenses</td>
                        <td class="total">$8,000.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    
    
        <!-- Loans and Advances Section -->
        <div class="ledger-section">
            <h4 class="text-center" style="background-color: #b7f3fd; padding-top : 10px; padding-bottom : 10px;">Loans and Advances</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-07-01</td>
                        <td>Bank Loan Payment</td>
                        <td>$2,000.00</td>
                    </tr>
                    <tr>
                        <td>2024-08-15</td>
                        <td>Employee Advance</td>
                        <td>$500.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="total">Total Loans and Advances</td>
                        <td class="total">$2,500.00</td>
                    </tr>
                </tfoot>
            </table>
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