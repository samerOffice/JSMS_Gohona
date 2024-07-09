@extends('master')

@section('title')
Customer Create
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-outline-info float-right" href="{{route('customer.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>

               
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Customer</h3>
                      </div>
                    <div class="card-body">
                        <form method="post" action="{{route('customer.store')}}">
                            @csrf                  
                            <div class="card-body">
                              <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" required class="form-control" id="name" name="name">
                              </div>

                              <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" required placeholder="e.g. 01813470120" class="form-control" id="mobile_number" name="mobile_number">
                              </div>

                              <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" id="summernote"  required></textarea>
                              </div>

                              <div class="form-group">
                                <label>Customer Category</label>
                                <select class="form-control select2bs4" required name="customer_category_id" style="width: 100%;">
                                    @foreach($customer_categories as $customer_category)
                                    <option value="{{$customer_category->id}}">{{$customer_category->name}}</option>
                                    @endforeach
                                  </select>
                              </div>

                              <div class="form-group">
                                <label>District</label>
                                <select class="form-control select2bs4" required id="district_id" name="district_id" style="width: 100%;">
                                    @foreach($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                  </select>
                              </div>
                             
                                <div class="form-group">
                                    <label>Zone</label>
                                    <select required class="form-control select2bs4" id="zone_id" name="zone_id" style="width: 100%;">                                  
                                      <option value="">Select Zone</option>                                        
                                      <option value=""></option>                                                                                              
                                  </select>
                                </div> 
                           
                                <div class="form-group">
                                    <label>Facebook Name</label>
                                    <input type="text" required class="form-control" id="fb_name" name="fb_name">
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
            });
        //summernote   
        $('#summernote').summernote();
    });


//district and zone dependancy dropdown logic start
$('#district_id').on('change',function(event){
  event.preventDefault();
  var selectedDistrict = $('#district_id').val();

  if (selectedDistrict == '') {
        $('#zone_id').html('');
        return false;
      }

// Function to get CSRF token from meta tag
function getCsrfToken() {
  return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  }
// Set up Axios defaults
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-CSRF-TOKEN'] = getCsrfToken();

const baseUrl = "{{ url('/') }}/";

// axios.get('sanctum/csrf-cookie').then(response=>{
 axios.post(baseUrl +'district_and_zone_dependancy',{
        data: selectedDistrict
      }).then(response=>{
      $('#zone_id').html(response.data);
        console.log(response.data);
      });
//  });
});
//district and zone dependancy dropdown logic end

</script>


 @endpush

