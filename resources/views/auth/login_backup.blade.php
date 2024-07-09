@extends('auth_master')

@section('title')
Login
@endsection

@section('content')
<section >
    <div class="container" style="background-color: #f5ffdf; animation: 1.5s fadeIn; border-radius: 15px;" >
      <div class="row d-flex align-items-center justify-content-center"  style="padding: 50px">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="{{asset('public/img/login_side_image4.jpg')}}"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <br>
          {{-- <img src="{{asset('public/img/otithee_logo.png')}}"  height="auto" width="130px" alt="logo" style="align-content: center"> --}}
            <h4 style="font-family: system-ui;"><a href="" class="h4" style="color: #1a8084; font-weight: bold; ">Jewellery Shop Management System</a></h4>    
            <br>
            
             {{-- <input type="hidden" id="myDashboardUrl" value="{{ route('welcome2') }}"> --}}
            <form method="POST" action="{{ route('login.custom') }}">
              @csrf
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label for="Email">Email</label>
              {{-- <input type="email" placeholder="Email" id="email" name="email" class="form-control form-control-lg" /> --}}
              <input type="email" placeholder="Email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
            </div> 
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label for="password">Password</label>
              {{-- <input type="password" placeholder="Password" id="password" name="password" class="form-control form-control-lg" /> --}}
              <input type="password" placeholder="Password" id="password" class="form-control form-control-lg" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
            </div>       
            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block" style="background-color: #145b5d; color:white; border-color: #145b5d">Login</button>
            <br>  
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection