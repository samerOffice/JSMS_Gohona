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
                        <h3 class="card-title">Add Supplier</h3>
                      </div>
                    <div class="card-body">
                        <form method="post" action="{{route('supplier.store')}}">  
                            @csrf                  
                            <div class="card-body">
                              <div class="form-group">
                                <label for="product_category_name">Name</label>
                                <input type="text" required class="form-control" id="name" name="name" >
                              </div>

                              <div class="form-group">
                                <label for="product_category_name">Mobile Number</label>
                                <input type="text" required class="form-control" id="mobile_no" name="mobile_no" >
                              </div>

                             
                              {{-- <div class="form-group">
                                <label for="product_category_name">Due Amount</label>
                                <input type="text" class="form-control" id="due_amount" name="due_amount" >
                              </div> --}}
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


