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
                    <h3 class="card-title">Settings</h3>
                  </div>  
                    <div class="card-body">

                      @if(!empty($settings->id))
                        <form method="post" action="{{route('settings.update',$settings->id)}}">  
                            @csrf
                            @method('PUT')
                            <div class="card-body">   
                                <div class="form-group">
                                    <label>Company Name <small style="color: red">*</small></label>
                                    <input type="text" required class="form-control" value="{{$settings->company_name}}" name="company_name" id="company_name">
                                    </div>
                                
                                <div class="form-group">
                                    <label>Company Cell <small style="color: red">*</small></label>
                                    <input type="text" required class="form-control" value="{{$settings->company_cell}}" name="company_cell" id="company_cell">
                                </div>

                                <div class="form-group">
                                    <label>BIN <small style="color: red">*</small></label>
                                    <input type="text" required class="form-control" value="{{$settings->bin}}" name="bin" id="bin">
                                </div>

                                <div class="form-group">
                                    <label>Jakat <small style="color: red">*</small></label>
                                    <input type="text" required class="form-control" value="{{$settings->jakat}}" name="jakat" id="jakat">
                                </div>
                              </div>
                            <!-- /.card-body -->
                            <input type="hidden" value="{{ $settings->id }}" name="id">
                            <button type="submit" id="sub" class="btn btn-info float-right mr-4">Update</button>
                          </form>
                        @else
                        <div class="col-12">
                          <a class="btn btn-outline-info float-right" href="{{route('settings.create')}}">
                              <i class="fas fa-plus"></i> Add Setting
                          </a>          
                       </div>
                       @endif
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

