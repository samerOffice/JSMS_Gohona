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
                    <h3 class="card-title">Terms and Conditions</h3>
                  </div>  
                    <div class="card-body">

                      @if(!empty($terms_and_conditions->id))
                        <form method="post" action="{{route('terms_and_conditions.update',$terms_and_conditions->id)}}">  
                            @csrf
                            @method('PUT')
                            <div class="card-body">   
                                  <div class="form-group">
                                    <label>Terms and Conditions</label>
                                    <textarea id="summernote"  name="terms">
                                      {{ $terms_and_conditions->terms }}
                                    </textarea>
                                  </div>                                 
                              </div>
                            <!-- /.card-body -->
                            <input type="hidden" value="{{ $terms_and_conditions->id }}" name="id">
                            <button type="submit" id="sub" class="btn btn-info float-right mr-4">Update</button>
                          </form>
                        @else
                        <div class="col-12">
                          <a class="btn btn-outline-info float-right" href="{{route('terms_and_conditions.create')}}">
                              <i class="fas fa-plus"></i> Add T&C
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

@push('myScripts')
<script>
$('#summernote').summernote();
// $('textarea').summernote().replace('<p>', '<p style="margin:0">');
</script>
@endpush