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
                <a class="btn btn-outline-info float-right" href="{{route('stock.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
           
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Stock</h3>
                      </div>
                    <div class="card-body">
                        <form method="post" action="{{route('stock.store')}}">  
                            @csrf                  
                            <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" required class="form-control" id="stock_date" name="stock_date" >
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Memo</label>
                                        <input type="text" required placeholder="Memo" class="form-control" id="stock_memo" name="stock_memo" >
                                      </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Unit 18K</label>
                                        <input type="text" placeholder="Unit 18K" class="form-control" id="stock_unit_18k" name="stock_unit_18k" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Unit 21K</label>
                                        <input type="text" placeholder="Unit 21K" class="form-control" id="stock_unit_21k" name="stock_unit_21k" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Unit 22K</label>
                                        <input type="text" placeholder="Unit 22K" class="form-control" id="stock_unit_22k" name="stock_unit_22k" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>D18K</label>
                                        <input type="text" placeholder="D18K" class="form-control" id="stock_d18K" name="stock_d18K" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>St</label>
                                        <input type="text" placeholder="St" class="form-control" id="stock_st" name="stock_st">
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Dia</label>
                                        <input type="text" placeholder="Dia" class="form-control" id="stock_dia" name="stock_dia">
                                    </div>        
                                </div>
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

