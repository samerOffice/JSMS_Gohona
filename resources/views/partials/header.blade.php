<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          {{ Auth::user()->name }}&nbsp;<i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route('password_reset')}}"><i class="fa fa-key"></i>&nbsp;Password Reset</a>
          <a class="dropdown-item" href="{{route('signout')}}" onclick="event.preventDefault();
                                                                       document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                            <form id="logout-form" action="{{ route('signout') }}" method="POST">
                                @csrf
                            </form>
        </div>
      </li>
      
    
    
    </ul>
  </nav>