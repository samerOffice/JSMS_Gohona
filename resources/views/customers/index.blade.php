@extends('master')

@section('title')
Welcome
@endsection

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12">

                <a class="btn btn-outline-success float-right ml-2" href="{{route('customer_import')}}">
                  <i class="fas fa-upload"></i> Import Customer
              </a>
                <a class="btn btn-outline-info float-right" href="{{route('customer.create')}}">
                    <i class="fas fa-plus"></i> Add Customer
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
                      <h3 class="card-title">Customer List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial No.</th>
                          <th>Client No.</th>
                          <th>Name</th>
                          <th>FB Name</th>
                          <th>Mobile No.</th>
                          <th>Customer Category</th>                          
                          <th>District</th>
                          <th>Zone</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($customers as $customer)
                        <tr>
                          <td>{{$i++}}</td>
                          <td></td>
                          <td>{{$customer->name}}</td>
                          <td>{{$customer->fb_name}}</td>
                          <td>{{$customer->mobile_number}}</td>                          
                          <td>{{$customer->customer_category_name}}</td>
                          <td>{{$customer->district_name}}</td>
                          <td>{{$customer->zone_name}}</td>
                          <td>{{$customer->created_at}}</td>
                          <td>
                             <a href="{{route('customer.edit', $customer->id)}}" style="color: white"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a>
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