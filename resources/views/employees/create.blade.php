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
                <a class="btn btn-outline-info float-right" href="{{route('employee.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
           
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Employee Information</h3>
                      </div>
                    <div class="card-body">
                        <form method="post" action="{{route('employee.store')}}">  
                            @csrf                  
                            <div class="card-body">
                              {{-- <div class="form-group">
                                <label>Picture</label>
                                <input type="file" class="form-control" id="profile_pic" name="profile_pic">
                              </div> --}}

                              <div class="row">
                              <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                  <label >Full Name <small style="color: red">*</small></label>
                                  <input type="text" required class="form-control" id="emp_name" name="emp_name" >
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                  <label >Designation <small style="color: red">*</small></label>
                                  <input type="text" required class="form-control" id="designation" name="designation" >
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                  <label >Joining Date <small style="color: red">*</small></label>
                                  <input type="date" required class="form-control" id="joining_date" name="joining_date" >
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                  <label>Per Day Salary <small style="color: red">*</small></label>
                                  <input type="number" required class="form-control" id="per_day_salary" name="per_day_salary" >
                                </div>
                              </div>
                              </div>
                                                                    
                              <div class="row">
                                <div class="col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label >Father's Name</label>
                                    <input type="text"  class="form-control" id="father_name" name="father_name" >
                                  </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label >Mother's Name</label>
                                    <input type="text"  class="form-control" id="mother_name" name="mother_name" >
                                  </div>
                                </div>
                              </div>
                              

                              <div class="row">
                                <div class="col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label >Contact Number</label>
                                    <input type="text"  class="form-control" id="mobile_number" name="mobile_number" >
                                  </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label >NID Number </label>
                                    <input type="text"  class="form-control" id="nid_number" name="nid_number" >
                                  </div>
                                </div>
                              </div>
                                
                              <div class="form-group">
                                <label >Present Address </label><br>
                                <textarea  name="present_address" class="summernote" id="present_address"></textarea>
                              </div>

                              <div class="form-group">
                                <label >Permanent Address </label><br>
                                <textarea  name="permanent_address" class="summernote" id="permanent_address" ></textarea>
                              </div>

                              <div class="row">
                                <div class="col-md-4 col-sm-12">
                                  <div class="form-group">
                                    <label >Date of Birth <small style="color: red">*</small></label>
                                    <input type="date" required class="form-control" id="birth_date" name="birth_date" >
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                  <div class="form-group">
                                    <label>Blood Group</label>
                                    <select class="form-control select2bs4"  name="blood_group" style="width: 100%;">                                  
                                        <option value="A+">A+</option>
                                        <option value="B+">B+</option>                                
                                        <option value="AB+">AB+</option>                                
                                        <option value="O+">O+</option>                            
                                        <option value="A-">A-</option>
                                        <option value="B-">B-</option>                                
                                        <option value="AB-">AB-</option>                                
                                        <option value="O-">O-</option>                              
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                  <div class="form-group">
                                    <label>Nationality</label>
                                    <input type="text" class="form-control" id="nationality" name="nationality">
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row">
                                <div class="col-md-4 col-sm-12">
                                  <div class="form-group">
                                    <label>Marital Status</label>
                                    <select class="form-control select2bs4"  name="marital_status" style="width: 100%;">                                  
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                                  </div>
    
                                </div>
                                <div class="col-md-4 col-sm-12">
                                  <div class="form-group">
                                    <label>Religion</label>
                                    <input type="text" class="form-control" id="religion" name="religion">
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                  <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control select2bs4" id="gender" name="gender" style="width: 100%;">                                  
                                        <option value="Male"> Male</option>
                                        <option value="Female">Female</option>                             
                                    </select>
                                  </div>
                                </div>
                              </div>
                      
<br>
<br>
                              <div class="card">
                                <div class="card-header">
                                  Emergency Contact Person Information
                                </div>
                              <div class="card-body">
                                <div class="row">
                                  <h2>1.</h2>
                                </div>
                                <div class="row">
                                  <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label>Name </label>
                                      <input type="text"   class="form-control" id="emergency_contact_name_one" name="emergency_contact_name_one">
                                    </div>
                                  </div>
                                <div class="col-md-4 col-sm-12">
                                  <div class="form-group">
                                    <label>Number </label>
                                    <input type="text"  class="form-control" id="emergency_contact_number_one" name="emergency_contact_number_one">
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                  <div class="form-group">
                                    <label>Relation </label>
                                    <input type="text"  class="form-control" id="emergency_contact_relation_one" name="emergency_contact_relation_one">
                                  </div>
                                </div>
                               </div>
                               <div class="row">
                                <h2>2.</h2>
                              </div>
                               <div class="row">
                                <div class="col-md-4 col-sm-12">
                                  <div class="form-group">
                                    <label>Name <</label>
                                    <input type="text"   class="form-control" id="emergency_contact_name_two" name="emergency_contact_name_two">
                                  </div>
                                </div>
                              <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                  <label>Number </label>
                                  <input type="text"  class="form-control" id="emergency_contact_number_two" name="emergency_contact_number_two">
                                </div>
                              </div>
                              <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                  <label>Relation</label>
                                  <input type="text" class="form-control" id="emergency_contact_relation_two" name="emergency_contact_relation_two">
                                </div>
                              </div>
                             </div>
                             <div class="row">
                              <h2>3.</h2>
                            </div>
                             <div class="row">
                              <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                  <label>Name</label>
                                  <input type="text"  class="form-control" id="emergency_contact_name_three" name="emergency_contact_name_three">
                                </div>
                              </div>
                            <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                <label>Number</label>
                                <input type="text" class="form-control" id="emergency_contact_number_three" name="emergency_contact_number_three">
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                <label>Relation</label>
                                <input type="text" class="form-control" id="emergency_contact_relation_three" name="emergency_contact_relation_three">
                              </div>
                            </div>
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
        $('.summernote').summernote();   
    });  


</script>
@endpush

