@extends('master')

@section('title')
Customer Transaction
@endsection

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-outline-info float-right" href="{{route('customer_transaction.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>

               
            <div class="col-12">
                <br>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Update Customer Transaction</h3>
                  </div>  
                    <div class="card-body">
                        <form method="post" action="{{route('customer_transaction.update',$customer_transaction->id) }}">  
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="product_category_name">Cash Memo No.</label>
                                  <input type="text" required class="form-control" id="cash_memo_no" name="cash_memo_no" value="{{$customer_transaction->cash_memo_no}}">
                                </div>

                                <div class="form-group">
                                    <label>Customer</label>
                                    <select class="form-control select2bs4" required name="customer_id" style="width: 100%;">
                                        <option value="{{$customer_transaction->customer_id}}">{{$customer_transaction->customer_name}} ({{$customer_transaction->customer_mobile_number}})</option>
                                        @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}} ({{$customer->mobile_number}})</option>
                                        @endforeach
                                      </select>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="" required class="form-control">{{$customer_transaction->description}}</textarea>
                                </div>  
                                
                                <div class="form-group">
                                    <label>Bill Amount</label>
                                    <input type="text" required class="form-control" id="bill_amount" name="bill_amount" value="{{$customer_transaction->bill_amount}}">
                                </div>
                        
                                <div class="form-group">
                                    <label>Paid Amount</label>
                                    <input type="text"  class="form-control" id="paid_amount" name="paid_amount" value="{{$customer_transaction->paid_amount}}">
                                </div>
                                    
                                <div class="form-group">
                                    <label>Due Amount</label>
                                    <input type="text" class="form-control" id="due_amount" name="due_amount" value="{{$customer_transaction->due_amount}}">
                                </div>
                              </div>
                            <!-- /.card-body -->
                            <input type="hidden" value="{{$customer_transaction->id}}" name="id">
                            <button type="submit" id="submit" class="btn btn-info float-right mr-4">Update</button>
                          </form>
                    </div>
                    <!-- /.card-body -->
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
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
            });
        //summernote   
        $('#summernote').summernote();
    });

//**************** calculation start **************

//------------------bill amount and due amount calculation-----------------
document.addEventListener('DOMContentLoaded', () => {
document.getElementById('bill_amount').addEventListener('keyup', (event) => {
    var bill_amount = parseFloat(document.getElementById('bill_amount').value);

    document.getElementById('paid_amount').value = 0;
    
    // Ensure bill amount is a valid number, if not set it to 0
    if (isNaN(bill_amount)) {
        bill_amount = 0;
    }
    var due_amount = bill_amount; // Add other values as needed

// Set the due amount value to the due_amount input
document.getElementById('due_amount').value = due_amount.toFixed(2); // Format to 2 decimal places

    });

//------------------bill amount,paid amount and due amount calculation-----------------
    document.getElementById('paid_amount').addEventListener('keyup', (event) => {
    var bill_amount = parseFloat(document.getElementById('bill_amount').value);
    var paid_amount = parseFloat(document.getElementById('paid_amount').value);
    
    // Ensure paid amount is a valid number, if not set it to 0
    if (isNaN(paid_amount)) {
        paid_amount = 0;
    }
    var due_amount = bill_amount-paid_amount; // Add other values as needed

    // Set the due amount value to the due amount input
    document.getElementById('due_amount').value = due_amount.toFixed(2); // Format to 2 decimal places

    });
});

//**************** calculation end **************

</script>
  @endpush