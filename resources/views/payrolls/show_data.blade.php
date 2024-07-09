@extends('master')

@section('title')
Payroll
@endsection

@push('css')
<style type="text/css">
    @media print {
        #invoice_print {
            display: none;
        }
    }
</style>


<style>
  .table-container {
      /* display: flex; */
      justify-content: center;
      align-items: center;
      height: 100vh;
  }
  table {
      border-collapse: collapse;
  }
  table, th, td {
      border: 1px solid black;
  }
  th, td {
      padding: 10px;
  }
</style>
@endpush

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <br>

        <div class="invoice p-3 mt-3" id="payroll_details">         
            <div class="row">          
                <div class="col-12">
                    <br>
                    <div class="card">

                        <div class="card-header" style="padding-left: 10%">
                          <h3 class="card-title">{{$emp_name}}</h3><br>
                          <h3 class="card-title">{{$emp_designation}}</h3>
                        </div>

                        <div class="table-container">
                            <table id="" class="table table-bordered table-striped" style="">
                                <thead>
                                    @foreach($filteredData as $key => $value)
                                    @if( ($key !== '_token') 
                                    && 
                                    ($key !== 'emp_total_bonus_day')
                                    && 
                                    ($key !== 'emp_id')
                                    && 
                                    ($key !== 'employee')
                                    && 
                                    ($key !== 'id')
                                    && 
                                    ($key !== 'emp_name')
                                    && 
                                    ($key !== 'emp_designation')
                                    && 
                                    ($key !== 'joining_date')
                                    && 
                                    ($key !== 'emp_salary_date')                                  
                                    && 
                                    ($key !== 'emp_total_bonus_amount')
                                    && 
                                    ($key !== 'bonus_eligible_month')
                                    && 
                                    ($key !== 'bonus_pay_month')
                                    && 
                                    ($key !== 'bonus_pay_amount')
                                    && 
                                    ($key !== 'created_at')
                                    && 
                                    ($key !== 'updated_at')
                                    )
                                    <tr>
                                        <td style="width: 50%; padding-left : 10%" >
                                            {{-- @if($key === 'emp_joining_date')
                                            Joining Date --}}
                                            @if($key === 'salary_date')
                                            Salary Date
                                            @elseif($key === 'total_working_day')
                                            Total Working Days (Days)
                                            @elseif($key === 'total_leave')
                                            Total Leave Days (Days)
                                            @elseif($key === 'total_number_of_pay_day')
                                            Total Number of Payable Days (Days)
                                            @elseif($key === 'per_day_salary')
                                            Per Day Salary (BDT)
                                            @elseif($key === 'monthly_salary')
                                            Monthly Salary (BDT)
                                            @elseif($key === 'monthly_holiday_bonus')
                                            Monthly Holiday Bonus (BDT)
                                            @elseif($key === 'total_daily_allowance')
                                            Total Daily Allowance (BDT)
                                            @elseif($key === 'total_travel_allowance')
                                            Total Travel Allowance (BDT)
                                            @elseif($key === 'rental_cost_allowance')
                                            Rental Cost Allowance (BDT)
                                            @elseif($key === 'hospital_bill_allowance')
                                            Hospital Bill Allowance (BDT)
                                            @elseif($key === 'insurance_allowance')
                                            Insurance Allowance (BDT)
                                            @elseif($key === 'sales_commission')
                                            Sales Commission (BDT)
                                            @elseif($key === 'retail_commission')
                                            Retail Commission (BDT)
                                            @elseif($key === 'total_others')
                                            Total Others (BDT)
                                            @elseif($key === 'total_salary')
                                            Total Salary (BDT)
                                            @elseif($key === 'yearly_bonus')
                                            Yearly Bonus (BDT)
                                            @elseif($key === 'total_payable_salary')
                                            Total Payable Salary (BDT)
                                            @elseif($key === 'advance_less')
                                            Advance Less (BDT)
                                            @elseif($key === 'any_deduction')
                                            Any Deduction (BDT)
                                            @elseif($key === 'final_pay_amount')
                                            <span style="color: green">Final Payment Amount (BDT)</span>
                                            @elseif($key === 'loan_advance')
                                            Loan Advance (BDT)
                                            @else
                                            {{$key}}
                                            @endif
                                        </td>
                                        <td>{{ $value }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </thead>                          
                              </table>
                        </div>
                      </div>
                </div>            
            </div>  
                
            <div class="row no-print">
                <div class="col-12">
                  <a  id="invoice_print" target="_blank"  class="btn btn-danger float-right" style="margin-right: 5px;">
                    <i class="fas fa-print"></i> Print
                  </a>
                  {{-- <button onclick="window.location.href='{{ route('generate-csv', ['id' => $payroll]) }}'">Download CSV</button> --}}
                  <form method="post" action="{{route('generate-csv')}}">
                    @csrf
                    <input type="hidden" name="payroll" value="{{$last_inserted_id}}">
                  <button type="submit" class="btn btn-success"><i class="fas fa-download"></i> Download CSV</button>
                </form>
                </div>
            </div>
        </div>
        
        <br>       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@push('myScripts')
<script>
$(document).ready(function() {
            $('#invoice_print').on('click', function() {      
                var printContent = document.getElementById('payroll_details').innerHTML;
                printContentFunction(printContent);
            });

            function printContentFunction(content) {
                var originalContent = document.body.innerHTML;

                // Set body content to the content you want to print
                document.body.innerHTML = content;

                // Call window.print() to print the content
                 window.print();

                // Restore original content
                document.body.innerHTML = originalContent;

                setTimeout(function() {
                    if (!window.matchMedia('print').matches) {
                        // Redirect to a different page if print was canceled
                        window.location.href = '{{ route('payroll_show_data') }}';
                    }
                }, 500);

            }
   
        });
  
           
  
  </script>
  @endpush