@extends('master')

@section('title')
Welcome
@endsection

@push('css')
<style>
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
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
                <a class="btn btn-outline-info float-right" href="{{route('payment_method.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>

               
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Payment Method</h3>
                      </div>
                    <div class="card-body">
                        <form method="post" action="{{route('payment_method.store')}}">  
                            @csrf                  
                            <div class="card-body">
                              <div class="form-group">
                                <label for="product_category_name">Name</label>
                                <input type="text" required class="form-control" id="name" name="name" >
                              </div>

                              <div class="form-group">
                                <label for="product_category_name">Under Type</label>
                                <select class="form-control select2bs4" required name="under_type" style="width: 100%;">
                                    <option value="">Select Type</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Gold">Gold</option>
                                    <option value="Card">Card</option>
                                    <option value="Bank">Bank</option>
                                    <option value="Mobile Banking">Mobile Banking</option>
                                    <option value="Others">Others</option>
                                  </select>
                              </div>                 

                              <div class="form-group">
                                <label> Status </label>
                                <label class="switch">
                                    <input type="checkbox" id="toggleButton" name="status" value="" class="toggle-switch-checkbox">
                                    <span class="slider round"></span>
                                  </label>
                              </div>


                            </div>
                            <!-- /.card-body -->
                            <button type="submit" class="btn btn-info float-right mr-4">Submit</button>
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

          
        // Event listener to toggle the input value when the switch is clicked
        $('.toggle-switch-checkbox').change(function() {
           
            if ($(this).is(':checked')) {
                // Checkbox is checked and '1' is for activate
                $('#toggleButton').val(1);
            } else {
                // Checkbox is unchecked and '2' is for deactivate
                $('#toggleButton').val(2);
            }
        });       
    });
    
</script>
  @endpush

