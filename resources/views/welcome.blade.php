@extends('auth_master')

@section('title')
Login
@endsection

@section('content')
<section >
    <div class="container" style="background-color: #f1f6fa; animation: 1.5s fadeIn; border-radius: 15px;" >
      <div class="row d-flex align-items-center justify-content-center" style="padding:20px; background-image: url('{{ asset('public/img/fd.png') }}');  background-size: cover;">
        <div class="col-md-7 col-lg-7 col-xl-6">
          <img src="{{asset('public/img/aaa.jpg')}}"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1" >
          <br>
          {{-- <img src="{{asset('public/img/otithee_logo.png')}}"  height="auto" width="130px" alt="logo" style="align-content: center"> --}}
            <h4 style="font-family: system-ui;"><a href="" class="h2" style="color: #9b871a; font-family: 'Style Script', cursive; font-weight: bold; ">Jewellery Shop Management System</a></h4>    
            <br>
            
             {{-- <input type="hidden" id="myDashboardUrl" value="{{ route('welcome2') }}"> --}}
            <form method="POST" action="{{ route('login.custom') }}">
              @csrf
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label for="Email">Email</label>
              {{-- <input type="email" placeholder="Email" id="email" name="email" class="form-control form-control-lg" /> --}}
              <input style="border-color: #2aa62a" type="email" placeholder="Email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
            </div> 
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label for="password">Password</label>
              {{-- <input type="password" placeholder="Password" id="password" name="password" class="form-control form-control-lg" /> --}}
              <input type="password" style="border-color: #2aa62a" placeholder="Password" id="password" class="form-control form-control-lg" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
            </div>       
            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block" style="background-color: #2aa62a; color:white; border-color: #2aa62a">Login</button>
            <br>
            <a href="{{route('register')}}" style="text-align: right !important; margin-left: 50%">Create New Account</a>  
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection