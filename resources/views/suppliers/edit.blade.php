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
                <a class="btn btn-outline-info float-right" href="{{route('supplier.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
           
            <div class="col-12">
                <br>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Update Supplier Detailes</h3>
                  </div>  
                    <div class="card-body">
                        <form method="post" action="{{route('supplier.update',$supplier->id)}}">  
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                  <label for="">Name</label>
                                  <input type="text" required class="form-control" id="name" name="name" value="{{$supplier->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Mobile Number</label>
                                    <input type="text" required class="form-control" id="mobile_no" name="mobile_no" value="{{$supplier->mobile_no}}">
                                </div>
                                
                                {{-- <div class="form-group">
                                    <label for="">Due Amount</label>
                                    <input type="text" class="form-control" id="due_amount" name="due_amount" value="{{$supplier->due_amount}}">
                                </div> --}}
                            </div>  
                             
                            <!-- /.card-body -->
                            <input type="hidden" value="{{$supplier->id}}" name="id">
                            <button type="submit" id="sub" class="btn btn-info float-right mr-4">Update</button>
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

