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
                      <h3 class="card-title">User List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial No.</th>
                          <th>User Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Created At</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($users as $user)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->role_name}}</td>
                          <td>{{$user->created_at}}</td>
                          <td>
                            @if(($user->status) == 1)                           
                            <button class="btn btn-sm btn-success">Active</button>                           
                            @else                            
                            <button class="btn btn-sm btn-danger">Inactive</button>                           
                            @endif
                          </td>
                          <td>
                             <a href="{{route('edit_user',$user->id)}}" style="color: white"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a>                       
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