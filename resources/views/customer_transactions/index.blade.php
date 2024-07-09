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

                <a class="btn btn-outline-info float-right" href="{{route('customer_transaction.create')}}">
                    <i class="fas fa-plus"></i> Add Transaction
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
                      <h3 class="card-title">Customer Transaction List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial No.</th>
                          <th>Date</th>
                          <th>Memo No.</th>
                          <th>Customer Name</th>
                          <th>Mobile No.</th>
                          <th>Description</th>
                          <th>Bill Amount</th>
                          <th>Paid Amount</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($customer_transactions as $customer_transaction)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$customer_transaction->transaction_date}}</td>
                          <td>{{$customer_transaction->cash_memo_no}}</td>
                          <td>{{$customer_transaction->customer_name}}</td>                          
                          <td>{{$customer_transaction->customer_mobile_no}}</td>
                          <td>{{$customer_transaction->description}}</td>
                          <td>
                            @php
                            echo number_format($customer_transaction->bill_amount, 2, '.', '')
                            @endphp
                          </td>
                          <td>
                            @php
                            echo number_format($customer_transaction->paid_amount, 2, '.', '')
                            @endphp
                          </td>
                          <td>
                             <a href="{{route('customer_transaction.edit', $customer_transaction->id)}}" style="color: white"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a> | 
                             <a onclick="Swal.fire({
                                title: 'Are You Sure?',
                                text: '',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes',
                                cancelButtonText: 'Cancel',
                                
                              }).then((result)=>{
                                if (result.isConfirmed){
                                    var deleteCustomerTransaction = '{{ route('delete_customer_transaction', $customer_transaction->id )}}';
                                    window.location.href = deleteCustomerTransaction;
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