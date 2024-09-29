@extends('master')

@section('title')
Loan/Advance
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
                    <br> 
                    <div>
                    <div class="row">
                    <div class="col-12">
                        <a class="btn btn-outline-info float-right" href="{{route('loan_or_advance_list')}}">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-md-10 col-sm-12">
                    <div class="card" style="">
                    <div class="card-header">                                   
                        <h3 class="card-title ">Add Loan/Advance</h3>
                    </div>

                <div class="card-body" >
                {{-- form starts  --}}
                <form action="{{route('store_loan_or_advance')}}" method="post">
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
                                            <input type="date" name="expense_pay_date" class="form-control" required>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Expense Type</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control select2bs4" required id="expense_type" name="expense_type" style="width: 100%;">
                                                <option value="">Select</option>
                                                <option value="1">Loan</option>
                                                <option value="2">Advance</option>
                                            </select>
                                            <br> 
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Employee</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control select2bs4" required id="employee_id" name="employee_id" style="width: 100%;">
                                                <option value="">Select</option>
                                                @foreach($employees as $employee)
                                                <option value="{{$employee->id}}">{{$employee->emp_name}} ({{$employee->designation}})</option>
                                                @endforeach
                                            </select>
                                            <br> 
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Amount (BDT)</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" required name="expense_amount" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                
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
$(document).ready(function() {
 //Initialize Select2 Elements
 $('.select2bs4').select2({
            theme: 'bootstrap4'
            });
});
</script>
@endpush
