@extends('auth_master')
@section('title')
Registration
@endsection

@section('content')
<section>
    <div class="container mt-1" style="background-color: #f1f6fa; animation: 1.5s fadeIn; border-radius: 15px;" >
      <div class="row d-flex align-items-center justify-content-center"  style="padding:20px; background-image: url('{{ asset('public/img/fd.png') }}');  background-size: cover;">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="{{asset('public/img/aaa.jpg')}}"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <br>
          {{-- <img src="{{asset('public/img/otithee_logo.png')}}"  height="auto" width="103px" alt="logo" style="align-content: center"> --}}
          <h4 style="font-family: system-ui;"><a href="" class="h2" style="color: #9b871a; font-family: 'Style Script', cursive; font-weight: bold; ">Jewellery Shop Management System</a></h4>    
            <br>
             {{-- <input type="hidden" id="myDashboardUrl" value="{{ route('welcome2') }}"> --}}
            <form method="POST" action="{{ route('register.custom') }}">
              @csrf
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label for="Email">Full Name</label>
              <input type="text" placeholder="Name"  id="name" class="form-control form-control-lg" name="name" required autofocus>
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
            </div>


            <div data-mdb-input-init class="form-outline mb-4">
              <label for="Email">Role</label>
              <select class="form-control select2bs4" id="role_id" name="role_id" style="width: 100%;">                        
                  <option value=''>Select Role</option>
                  @foreach ($roles as $role)
                  <option value="{{$role->id}}">{{$role->role_name}}</option> 
                  @endforeach                            
              </select>
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
                <label for="Email">Email</label>
              <input type="email" placeholder="Email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
            </div> 
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label for="password">Password</label>
              <input type="password" placeholder="Password" id="password" name="password" onkeyup="typePassword()" class="form-control form-control-lg"  required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
            </div>
            
            <!--Confirm Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label for="password">Confirm Password</label>
              <input type="password" required class="form-control form-control-lg" onkeyup="machPassword()" id="confirm_password" name="confirm_password">
              <p id="message"></p>
            </div> 
            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-lg btn-block">Register</button>
            <br>  
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('importantScripts')

<script>

   //Initialize Select2 Elements
   $('.select2bs4').select2({
            theme: 'bootstrap4'
            });
    const given_passoword = document.getElementById('password');
    const confirm_password = document.getElementById('confirm_password');
    const message = document.getElementById('message');

    function typePassword() {
    confirm_password.value = '';
    message.style.color = 'white';                 
        };

    function machPassword() {   
            // Check if passwords match
            if (given_passoword.value === confirm_password.value){
                message.textContent = 'Passwords match!';
                message.style.color = 'green';
            }else{
                message.textContent = 'Passwords do not match!';
                message.style.color = 'red';
            }             
        };
</script>

@endpush