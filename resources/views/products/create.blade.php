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
                <a class="btn btn-outline-info float-right" href="{{route('product.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
           
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Product</h3>
                      </div>
                    <div class="card-body">
                        <form method="post" action="{{route('product.store')}}">  
                            @csrf                  
                            <div class="card-body">
                              <div class="form-group">
                                <label >Product Nr</label>
                                <input type="text" required class="form-control" id="product_nr" name="product_nr" >
                              </div>

                              <div class="form-group">
                                <label>Product Details</label>
                                <input type="text" required class="form-control" id="product_details" name="product_details" >
                              </div>

                              <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Product Category</label>
                                        <select class="form-control select2bs4" required name="product_category" style="width: 100%;">
                                            @foreach($product_categories as $product_category)
                                            <option value="{{$product_category->id}}">{{$product_category->product_category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Product Type</label>
                                        <select class="form-control select2bs4" required name="product_type" style="width: 100%;">                                  
                                            <option value="1">Gold</option>
                                            <option value="2">Diamond</option>                                  
                                        </select>
                                    </div>
                                </div>
                              </div>

                            
                              <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Weight</label>
                                        <input type="text" required class="form-control" id="weight" name="weight" >
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Select Carat</label>
                                        <select class="form-control select2bs4" required name="carat" style="width: 100%;">                                  
                                            <option value="1">18K</option>
                                            <option value="2">21K</option>                                
                                            <option value="3">22K</option>                                
                                        </select>
                                    </div>
                                </div>
                              </div>
                            
                              {{-- <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity">
                              </div> --}}

                              <div class="form-group">
                                <label>St/Dia</label>
                                <input type="text" class="form-control" id="st_or_dia" name="st_or_dia">
                              </div>

                              <div class="form-group">
                                <label>St/Dia Price</label>
                                <input type="text" class="form-control" id="st_or_dia_price" name="st_or_dia_price">
                              </div>

                              <div class="row">
                                <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Wage</label>
                                    <input type="text" class="form-control" id="wage" name="wage">
                                </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Wage Type</label>
                                    <select class="form-control select2bs4" required id="wage_type" name="wage_type" style="width: 100%;">                                  
                                        <option value="Percentage">Percentage</option>
                                        {{-- <option value="Fixed">Fixed</option> --}}
                                    </select>
                                </div>
                                </div>
                              </div>                            

                              <div class="form-group">
                                <label>Suppliers</label>
                                <select class="form-control select2bs4" name="supplier" style="width: 100%;">
                                    @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                  </select>
                              </div>

                              <div class="form-group">
                                <label>Purchase Price</label>
                                <input type="text" class="form-control" id="purchase_price" name="purchase_price">
                              </div>

                            
                              <div class="form-group">
                                <label>Stock Type</label>
                                <select class="form-control select2bs4" id="stock_type" name="stock_type" style="width: 100%;">                                  
                                    <option value="1">New Stock</option>
                                    <option value="2">Exchange</option>                         
                                    <option value="3">Old Gold</option>                         
                                    <option value="4">S. Return</option>                         
                                  </select>
                              </div>

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

@push('myScripts')
<script>
 $(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
            })    
    });  
</script>
@endpush

