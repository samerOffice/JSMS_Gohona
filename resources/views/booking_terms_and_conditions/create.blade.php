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
                <a class="btn btn-outline-info float-right" href="{{route('booking_terms_and_conditions.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
          
            <div class="col-12">
              <br>  
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Booking Terms and Conditions</h3>
                  </div>  
                    <div class="card-body">
                        <form method="post" action="{{route('booking_terms_and_conditions.store')}}">  
                            @csrf
                            <div class="card-body">   
                                  <div class="form-group">
                                    <label>Booking Terms and Conditions</label>
                                    <textarea id="summernote" name="terms">
                                      
                                    </textarea>
                                  </div>                                 
                              </div>
                            <!-- /.card-body -->
                            <input type="hidden" value="" name="id">
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

@push('myScripts')
<script>
$('#summernote').summernote();
// $('textarea').summernote().replace('<p>', '<p style="margin:0">');
</script>
@endpush