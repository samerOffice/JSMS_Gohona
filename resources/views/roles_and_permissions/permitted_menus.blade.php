@extends('master')

@section('title')
Welcome
@endsection

@push('css')
<style>
  /* Hide the default checkbox */
  input[type="checkbox"] {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      width: 20px;
      height: 20px;
      border: 1px solid #ccc;
      border-radius: 1px;
      outline: none;
  }
  
  /* Define the custom checkbox */
  input[type="checkbox"]::before {
      content: '';
      display: inline-block;
      width: 16px;
      height: 16px;
      background-color: white;
      border-radius: 1px;
      /* margin-right: 1px; */
      border: 1px solid #ccc;
  }
  
  /* Change the color of the custom checkbox when checked */
  input[type="checkbox"]:checked::before {
      background-color: #17a2b8; /* Change the color here */
  }
  </style>
@endpush


@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-outline-info float-right" href="{{route('roles_and_permissions.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
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
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Menu List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('menu_permission_store') }}" method="POST">
                            @csrf
                            <div class="row">
                                @foreach($menus as $menu)
                                    <div class="col-6">
                                        <input type="checkbox" id="item{{ $menu->id }}" name="menu[]" value="{{ $menu->id }}" {{ in_array($menu->id, $permitted_menus_array) ? 'checked' : '' }}>
                                        <label for="item{{ $menu->id }}">{{ $menu->menu_name }}</label>
                                    </div>
                                @endforeach                               
                            </div>

                            <input type="hidden" value="{{$role_id}}" name="role_id">
                            <button type="submit" class="btn btn-success">Submit</button>
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