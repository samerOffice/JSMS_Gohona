@extends('master')

@section('title')
Monthly Payment
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
                    <br> 
                    <div>
                    <div class="row">
                    <div class="col-12">
                        <a class="btn btn-outline-info float-right" href="{{route('monthly_payment_list')}}">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-md-10 col-sm-12">
                    <div class="card" style="">
                    <div class="card-header">                                   
                        <h3 class="card-title ">Add New Monthly Payment</h3>
                    </div>

                <div class="card-body" >
                {{-- form starts  --}}
                <form action="{{route('store_monthly_payment')}}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Field Name</th>
                                    <th>Input</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Expense Month</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" style="background-color: #b7f3fd;" readonly value="{{$previousMonth}}" class="form-control" required>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Payment Month</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" style="background-color: #d9ff8d;" readonly value="{{$currentMonth}}" class="form-control" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shop Rent / Advance</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="shop_rent_advance" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Salary</td>
                                    <td>
                                        <div class="row" style="width: 100%">
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="expense_name" class="col-form-label text-start"> Name</label>                                               
                                            </div>
    
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="expense_amount"  class="col-form-label text-start">Salary Amount (BDT)</label>                                            
                                            </div>
                                
                                            <div class="form-group col-md-3 col-sm-4">
                                                <label  class="col-form-label text-start">Payment Date</label>
                                            </div>  
                                        </div>

                                    @foreach($salaries as $salary)
                                        <div class="row" style="width: 100%">
                                            <div class="form-group col-md-4 col-sm-4">                                           
                                                <input type="text" class="form-control" readonly style="background-color: #fff3b0;"  value="{{$salary->staff_name}}">
                                            </div>

                                            <div class="form-group col-md-4 col-sm-4">                                          
                                                <input type="text" step="0.01" readonly style="background-color: #fff3b0;" class="form-control" value="{{$salary->staff_paid_salary_amount}}"> 
                                            </div>
                                
                                            <div class="form-group col-md-3 col-sm-4">
                                                <input type="date" id="expense_pay_date" readonly style="background-color: #fff3b0;" value="{{$salary->staff_salary_date}}" class="form-control" />
                                            </div>  
                                        </div>                               
                                    @endforeach
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Service Charge</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="service_charge" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Electricity Bill</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="electricity_bill" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Water Bill</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="water_bill" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Internet Bill</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="internet_bill" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jewelers Member Fees</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="jewelers_member_fees" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>VAT</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="vat" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>VAT Office</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="vat_office" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>VAT Liton</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="vat_liton" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Staff Bonus</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="staff_bonus" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>VAT Memo</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="vat_memo" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Market Member Fees</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="market_member_fees" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            
                <h4 class="text-center">Others</h4>

                    <div class="col-md-12">  
                          
                        <table class="table table-bordered nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">               
                            <tbody>
                                <div id="form-container">
                                    <div class="form-row">
                                        <div class="row" style="width: 100%">
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="expense_name" class="col-form-label text-start">Expense Name</label>
                                                <input type="text" class="form-control" name="expense_name[]">
                                            </div>
    
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="expense_amount"  class="col-form-label text-start">Expense Amount (BDT)</label>
                                                <input type="number" step="0.01" id="initial_expense_amount" class="form-control" name="expense_amount[]"> 
                                            </div>
                                
                                            <div class="form-group col-md-3 col-sm-4">
                                                <label  class="col-form-label text-start">Payment Date</label>         
                                                <input type="date" id="expense_pay_date" name="expense_pay_date[]" value="{{ date('Y-m-d') }}" class="form-control" />
                                            </div>
                                
                                            <div class="form-group">
                                            <a style="margin-top: 35px; color:white" class="btn btn-info" id="addButton"><i class="fas fa-plus"></i> Add</a>   
                                            </div>   
                                            </div>                                   
                                    </div>
                                </div>
                            </tbody>
                        </table>                  
                    </div>

                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
        {{-- form ends  --}}

            </div> <!--end of card body -->
            </div> <!--end of card -->
        </div> <!-- end of col -->

        </div> <!-- end of row -->   
        
      </div>

      </div> <!-- /.container-fluid -->     
    </div> <!-- /.content-header -->      
  </div> <!-- /.content-wrapper -->   
@endsection



@push('myScripts')
<script>


document.getElementById('addButton').addEventListener('click', function() { 
        const container = document.getElementById('form-container');
        const newRow = document.createElement('div');
        newRow.className = 'form-row';
        newRow.innerHTML = `<div class="row" style="width: 100%; margin-top: 70px !important;">

                           <div class="form-group col-md-4 col-sm-4">
                                <label for="expense_name" class="col-form-label text-start">Expense Name</label>
                                <input type="text" class="form-control" name="expense_name[]">
                            </div>

                            <div class="form-group col-md-4 col-sm-4">
                                <label for="expense_amount"  class="col-form-label text-start">Expense Amount (BDT)</label>
                                <input type="number" step="0.01" class="form-control" name="expense_amount[]"> 
                            </div>
                            
                            <div class="form-group col-md-3 col-sm-4">
                                <label  class="col-form-label text-start">Payment Date</label>         
                                <input type="date" id="expense_pay_date" name="expense_pay_date[]" value="{{ date('Y-m-d') }}" class="form-control" />
                            </div>
            
                            <div class="form-group">                                        
                            <button style="margin-top:35px !important; color: white" class="remove-button btn btn-danger">x Remove</button>   
                            </div>
                        </div>                                         
                    `;
        container.appendChild(newRow);
        newRow.querySelector('.remove-button').addEventListener('click', function() {
            newRow.remove();
        });
  
});

</script>
@endpush
