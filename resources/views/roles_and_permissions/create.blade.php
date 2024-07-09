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
                <a class="btn btn-outline-info float-right" href="{{route('roles_and_permissions.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>

               
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add New Role</h3>
                      </div>
                    <div class="card-body">
                        <form method="post" action="{{route('roles_and_permissions.store')}}">  
                            @csrf                  
                            <div class="card-body">
                              <div class="form-group">
                                <label for="product_category_name">Role Name</label>
                                <input type="text" required class="form-control" id="role_name" name="role_name" >
                              </div>
                            <!-- /.card-body -->
                            <button type="submit" id="ss"  class="btn btn-info float-right mr-4">Submit</button>
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


