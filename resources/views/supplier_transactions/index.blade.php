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

                <a class="btn btn-outline-info float-right ml-2" href="{{route('supplier_transaction.transaction_list')}}">
                    <i class="fas fa-list"></i> Transaction List
                </a> 
                
                <a class="btn btn-outline-primary float-right ml-2" href="{{route('supplier_transaction.create')}}">
                    <i class="fas fa-plus"></i> Add Supplier Transaction
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
                      <h3 class="card-title">Supplier Due List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial No.</th>                 
                          <th>Supplier Name</th>
                          <th>Mobile No.</th>
                          <th>Total Due Amount (BDT)</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($supplier_transactions as $supplier_transaction)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$supplier_transaction->supplier_name}}</td>                          
                          <td>{{$supplier_transaction->supplier_mobile_no}}</td>
                          <td>
                            @php
                            echo number_format($supplier_transaction->total_due_amount, 2, '.', '')
                            @endphp
                          </td>
                          <td>
                             <a href="{{route('supplier_transaction.view',$supplier_transaction->supplier_id)}}" style="color: white"><button class="btn btn-outline-success"><i class="fa-solid fa-eye"></i> View</button></a>
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