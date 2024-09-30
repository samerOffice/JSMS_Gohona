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
                        <h3 class="card-title ">Edit Monthly Payments</h3>
                    </div>

                <div class="card-body" >
                {{-- form starts  --}}
                <form action="{{route('update_monthly_payment')}}" method="post">
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
                                <td>Payment Month</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" style="background-color: #d9ff8d;" readonly value="{{$expense->payment_month}}" class="form-control" required>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Payment Date</td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" name="payment_date" value="{{$expense->payment_date}}" class="form-control" required>
                                    </div>
                                </td>
                            </tr>

                            
                            <tr>
                                <td>Shop Rent / Advance</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="shop_rent_advance" value="{{$expense->shop_rent_advance}}" class="form-control" step="0.01">
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
                                        <input type="number" name="service_charge" value="{{$expense->service_charge}}" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Electricity Bill</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="electricity_bill" value="{{$expense->electricity_bill}}" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Water Bill</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="water_bill" value="{{$expense->water_bill}}" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Internet Bill</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="internet_bill" value="{{$expense->internet_bill}}" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Jewelers Member Fees</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="jewelers_member_fees" value="{{$expense->jewelers_member_fees}}" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="vat" value="{{$expense->vat}}" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>VAT Office</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="vat_office" value="{{$expense->vat_office}}" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>VAT Liton</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="vat_liton" value="{{$expense->vat_liton}}" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Staff Bonus</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="staff_bonus" value="{{$expense->staff_bonus}}" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>VAT Memo</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="vat_memo" value="{{$expense->vat_memo}}" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Market Member Fees</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="market_member_fees" value="{{$expense->market_member_fees}}" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                        </tbody>                      
                    </table>
                    </div>

                    <h4 class="text-center">Others</h4>
                    <div class="col-md-12">   
                        <div id="form-container">
                            <!-- Rows will be added here dynamically -->
                        </div> 
                        <button type="button" class="add-button btn btn-info" id="addButton"><i class="fas fa-plus"></i></button>            
                    </div>
                    
                    
                    <br>
                    <div class="form-group text-center mt-3">
                        <input type="hidden" value="{{$expense->id}}" name="id" id="expenseId">
                        <button type="submit" class="btn btn-primary btn-lg float-right">Submit</button>
                    </div>
                </form>
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

$(document).ready(function() {
        fetchData();
        $('#addButton').on('click', function() {          
                addRow({});       
        });
    });


    function fetchData() {
        var expense_id = document.getElementById('expenseId').value;
        const baseUrl = "{{ url('/') }}/";
        
        axios.get(baseUrl +'monthly_payment_dependancy/'+expense_id).then(response=>{           
            if (Array.isArray(response.data)) {
                    response.data.forEach(function(expense) {
                        console.log('Adding row for monthly other expenses:', expense);
                        addRow({
                            expenseName: expense.expense_name,
                            expenseAmount: expense.expense_amount,
                            expensePayDate: expense.expense_pay_date
                        });
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            console.log(response);               
        }).catch(error => console.error('Failed to fetch product data:', error))
    }



        function addRow(data) {
        const container = $('#form-container');
        const newRow = $(`
            <div class="form-row">
               <div class="form-group col-md-4 col-sm-4">
                    <label for="expense_name" class="col-form-label text-start">Expense Name</label>
                    <input type="text" class="form-control" name="expense_name[]" value="${data.expenseName || ''}">
                </div>

                <div class="form-group col-md-4 col-sm-4">
                    <label for="expense_amount"  class="col-form-label text-start">Expense Amount (BDT)</label>
                    <input type="number" step="0.01" id="initial_expense_amount" class="form-control" name="expense_amount[]" value="${data.expenseAmount || ''}"> 
                </div>
                
                <div class="form-group col-md-3 col-sm-4">
                    <label  class="col-form-label text-start">Payment Date</label>         
                    <input type="date" id="expense_pay_date" name="expense_pay_date[]" value="${data.expensePayDate || ''}" class="form-control" />
                </div>

                <div class="form-group">                                        
                    <button style="margin-top:35px !important" class="remove-button btn btn-danger">x</button>   
                </div>

            </div>
        `);

        container.append(newRow);
        newRow.find('.remove-button').on('click', function() {
            newRow.remove();
        });
    }

</script>
@endpush
