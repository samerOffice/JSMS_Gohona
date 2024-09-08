@extends('master')

@section('title')
Expense
@endsection

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-outline-info float-right" href="{{route('expense.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>

               
            <div class="col-12">
                <br>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Update Expense Details</h3>
                  </div>  
                    <div class="card-body">
                        <form method="post" action="{{route('expense.update',$expense->id) }}">  
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="product_category_name">Expense Name</label>
                                  <input type="text" required class="form-control" id="expense_name" name="expense_name" value="{{$expense->expense_name}}">
                                </div>

                                <div class="form-group">
                                    <label>Expense Amount (BDT)</label>
                                    <input type="number" step="0.01" required  class="form-control" id="expense_amount" name="expense_amount" value="{{$expense->expense_amount}}">
                                </div>

                                <div class="form-group">
                                    <label>Payment Date</label>
                                    <input type="date" required  class="form-control" id="expense_pay_date" name="expense_pay_date" value="{{$expense->expense_pay_date}}">
                                </div>

                              </div>
                            <!-- /.card-body -->
                            <input type="hidden" value="{{$expense->id}}" name="id">
                            <button type="submit" id="sub" class="btn btn-info float-right mr-4">Update</button>
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

</script>
  @endpush