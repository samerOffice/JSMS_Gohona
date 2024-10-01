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
                <a class="btn btn-outline-info float-right" href="{{route('employee.create')}}">
                    <i class="fas fa-plus"></i> Add Employee
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
                      <h3 class="card-title">Employee List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial No.</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Joining Date</th>
                          <th>Renew Date</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($employees as $employee)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$employee->emp_name}}</td>
                          <td>{{$employee->designation}}</td>
                          <td>{{$employee->joining_date}}</td>
                          <td>{{$employee->renew_date}}</td>      
                          <!-- <td>
                            @if($employee->yearly_bonus_date == null)
                             <button class="btn btn-secondary"><i class="fa-solid fa-arrows-rotate"></i> Renew</button>
                             @else
                             <a href="{{route('employee.renew', $employee->id)}}" style="color: white"><button class="btn btn-danger"><i class="fa-solid fa-arrows-rotate"></i> Renew</button></a>
                             @endif
                              | 
                             <a href="{{route('employee.edit', $employee->id)}}" style="color: white"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a>
                        </td> -->

                        <td> 

                           @if($employee->super_admin_permission == 1)
                            <button class="btn btn-secondary" disabled>Yearly Bonus Permitted</button>
                            @else 
                            <a href="{{route('employee.super_admin_permission', $employee->id)}}" style="color: white"><button class="btn btn-info">Yearly Bonus Permission</button></a>
                            @endif                        
                              |                         
                             <a href="{{route('employee.renew', $employee->id)}}" style="color: white"><button class="btn btn-danger"><i class="fa-solid fa-arrows-rotate"></i> Renew</button></a>                           
                              | 
                             <a href="{{route('employee.edit', $employee->id)}}" style="color: white"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a>
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