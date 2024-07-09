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
                <a class="btn btn-outline-info float-right" href="{{route('settings.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
          
            <div class="col-12">
              <br>  
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Settings</h3>
                  </div>  
                    <div class="card-body">
                        <form method="post" action="{{route('settings.store')}}">  
                            @csrf
                            <div class="card-body">   
                                <div class="form-group">
                                    <label>Company Name <small style="color: red">*</small></label>
                                    <input type="text" required class="form-control"  name="company_name" id="company_name">
                                    </div>
                                
                                <div class="form-group">
                                    <label>Company Cell <small style="color: red">*</small></label>
                                    <input type="text" required class="form-control"  name="company_cell" id="company_cell">
                                </div>

                                <div class="form-group">
                                    <label>BIN <small style="color: red">*</small></label>
                                    <input type="text" required class="form-control"  name="bin" id="bin">
                                </div>

                                <div class="form-group">
                                    <label>Jakat <small style="color: red">*</small></label>
                                    <input type="text" required class="form-control"  name="jakat" id="jakat">
                                </div>
                              </div>
                            <!-- /.card-body -->
                            <button type="submit" id="sub" class="btn btn-info float-right mr-4">Submit</button>
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

