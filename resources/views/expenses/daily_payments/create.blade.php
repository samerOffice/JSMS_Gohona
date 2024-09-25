@extends('master')

@section('title')
Daily Payment
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
                    <br> 
                    <div>
                    <div class="row">
                    <div class="col-12">
                        <a class="btn btn-outline-info float-right" href="{{route('daily_payment_list')}}">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-md-10 col-sm-12">
                    <div class="card" style="">
                    <div class="card-header">                                   
                        <h3 class="card-title ">Add New Daily Payment</h3>
                    </div>

                <div class="card-body" >
                {{-- form starts  --}}
                <form action="{{route('store_daily_payment')}}" method="post">
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
                                    <td>Payment Date</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="date" name="payment_date" class="form-control" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile Bill</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="mobile_bill" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Snacks</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="snacks" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Entertainment Bill</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="entertainment_bill" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Others</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="others" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gift for Customer</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="gift_for_customer" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ornaments Binding Bill</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="ornaments_binding_bill" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Interest for Gold Lending</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="interest_for_gold_lending" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Vangary Loss</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="vangary_loss" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pay Repair Bill</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="pay_repair_bill" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Photocopy</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="photocopy" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Management Expenses</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="management_expenses" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Transport</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="transport" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bkash Cost</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="bkash_cost" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Repairing Cost</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="repairing_cost" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Conveyance</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="conveyance" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buy Lock / Locker</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="buy_lock_locker" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cash Back</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="cash_back" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Live Cost</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="live_cost" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Parking Cost</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="parking_cost" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>VAT Machine</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="vat_machine" class="form-control expense_amount" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Door Greese</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="door_grease" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    {{-- <h4 class="text-center">Others</h4>

                    <div class="col-md-12">  
                          
                        <table class="table table-bordered nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">               
                            <tbody>
                                <div id="form-container">
                                    <div class="form-row">
                                        <div class="row" style="width: 100%">
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="expense_name" class="col-form-label text-start">Expense Name</label>
                                                <input type="text" class="form-control expense_name" name="expense_name[]">
                                            </div>
    
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="expense_amount"  class="col-form-label text-start">Expense Amount (BDT)</label>
                                                <input type="number" step="0.01" id="initial_expense_amount" class="form-control expense_amount" name="expense_amount[]"> 
                                            </div>
                                
                                            <div class="form-group col-md-3 col-sm-4">
                                                <label  class="col-form-label text-start">Payment Date</label>         
                                                <input type="date" id="expense_pay_date" name="expense_pay_date[]" value="{{ date('Y-m-d') }}" class="form-control" />
                                            </div>
                                
                                            <div class="form-group">
                                            <a style="margin-top: 35px; color:white" class="btn btn-info" id="addButton"><i class="fas fa-plus"></i></a>   
                                            </div>   
                                            </div>                                   
                                    </div>
                                </div>
                            </tbody>
                        </table>                  
                    </div> --}}
            

                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-primary btn-lg float-right">Submit</button>
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
                                <input type="text" class="form-control expense_name" name="expense_name[]">
                            </div>

                            <div class="form-group col-md-4 col-sm-4">
                                <label for="expense_amount"  class="col-form-label text-start">Expense Amount (BDT)</label>
                                <input type="number" step="0.01" class="form-control expense_amount" name="expense_amount[]"> 
                            </div>
                            
                            <div class="form-group col-md-3 col-sm-4">
                                <label  class="col-form-label text-start">Payment Date</label>         
                                <input type="date" id="expense_pay_date" name="expense_pay_date[]" value="{{ date('Y-m-d') }}" class="form-control" />
                            </div>
            
                            <div class="form-group">                                        
                            <button style="margin-top:35px !important; color: white" class="remove-button btn btn-danger">x</button>   
                            </div>
                        </div>                                         
                    `;
        container.appendChild(newRow);
        newRow.querySelector('.remove-button').addEventListener('click', function() {
            newRow.remove();
        });

    // Attach the change event handler to the new input field
    newRow.querySelector('.expense_amount').addEventListener('input', updateTotal);
});

    // Attach event listener to the static initial field
    document.querySelector('.expense_amount').addEventListener('input', updateTotal);

</script>
@endpush