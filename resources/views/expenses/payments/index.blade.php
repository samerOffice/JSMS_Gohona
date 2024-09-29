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
                <a class="btn btn-outline-info float-right" href="{{route('expense.create')}}">
                    <i class="fas fa-plus"></i> Add Expense
                </a>            
            </div>

            <div class="col-12">
                <br>
                @if ($message = Session::get('success'))
                <div class="alert alert-info" role="alert">
                  <div class="row">
                    <div class="col-11">
                      {{ $message }}
                    </div>
                    <div class="col-1">
                      <button type="button" class=" btn btn-info" data-dismiss="alert" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                  </div>
                </div>
                @endif
            </div>

        
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Expense List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial No.</th>
                          <th>Expense Type</th>
                          <th>Expense Name</th>
                          <th>Expense Amount (BDT)</th>
                          <th>Payment Date</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($expenses as $expense)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>
                            @if($expense->expense_type == 1)
                            Daily Payment
                            @elseif($expense->expense_type == 2)
                            Monthly Payment
                            @elseif($expense->expense_type == 3)
                            Yearly Payment
                            @elseif($expense->expense_type == 4)
                            Marketing Cost
                            @elseif($expense->expense_type == 5)
                            Payments
                            @elseif($expense->expense_type == 6)
                            Investment Expenses
                            @else
                            Loan/Advance
                            @endif
                        </td>
                          <td>{{$expense->expense_name}}</td>
                          <td>{{$expense->expense_amount}} Tk</td>
                          <td>{{$expense->expense_pay_date}}</td>                          
                          <td>
                             <a href="{{route('expense.edit', $expense->id)}}" style="color: white"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a>
                             <a onclick="Swal.fire({
                                title: 'Are You Sure?',
                                text: '',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes',
                                cancelButtonText: 'Cancel',
                                
                              }).then((result)=>{
                                if (result.isConfirmed){
                                    var deleteExpense = '{{ route('delete_payment_expense', $expense->id )}}';
                                    window.location.href = deleteExpense;
                                    Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Your file has been deleted.',
                                    icon: 'success'
                                  });
                                  }
                              })" ><button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i>  Delete </button></a>
                        </td>
                        </tr> 
                        @endforeach              
                 
                        </tfoot>
                      </table>
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