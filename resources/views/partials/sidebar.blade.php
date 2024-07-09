<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light" style="font-size: 102%; color: gold; font-family: 'Style Script', cursive; font-weight: bold;">Jewellery Shop Management Sys.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         

          <li  class="nav-item nav-link {{ Request::is('home') ? 'nav-link active' : ''}}" style="{{ Request::is('home') ? 'background-color: #17a2b8; !important' : ''}}">
            <a href="{{url('/home')}}" >
              <i class="nav-icon fas fa-gauge" {{ Request::is('home') ? 'color: white; !important' : ''}}"></i>
              <p style="{{ Request::is('home') ? 'color: white; !important' : ''}}">
                Dashboard
              </p>
            </a>
          </li>
          @if(in_array(15, $permitted_menus_array))
          <li  class="nav-item nav-link {{ Request::is('sale/create') ? 'nav-link active' : ''}}" style="{{ Request::is('sale/create') ? 'background-color: #17a2b8; !important' : ''}}">
            <a href="{{url('/sale/create')}}" >
              <i class="nav-icon fa-regular fa-gem" {{ Request::is('sale/create') ? 'color: white; !important' : ''}}"></i>
              <p style="{{ Request::is('sale/create') ? 'color: white; !important' : ''}}">
              Add Sale
              </p>
            </a>
          </li>
          @endif

          @if(in_array(16, $permitted_menus_array))
          <li  class="nav-item nav-link {{ Request::is('sale') ? 'nav-link active' : ''}}" style="{{ Request::is('sale') ? 'background-color: #17a2b8; !important' : ''}}">
            <a href="{{url('/sale')}}" >
              <i class="nav-icon fa-regular fa-gem" {{ Request::is('sale') ? 'color: white; !important' : ''}}"></i>
              <p style="{{ Request::is('sale') ? 'color: white; !important' : ''}}">
              Sales List
              </p>
            </a>
          </li>
          @endif

          @if(in_array(2, $permitted_menus_array))
          <li  class="nav-item nav-link {{ Request::is('booking/create') ? 'nav-link active' : ''}}" style="{{ Request::is('booking/create') ? 'background-color: #17a2b8; !important' : ''}}">
            <a href="{{url('/booking/create')}}" >
              <i class="nav-icon fa-regular fa-gem" {{ Request::is('booking/create') ? 'color: white; !important' : ''}}"></i>
              <p style="{{ Request::is('booking/create') ? 'color: white; !important' : ''}}">
              Add Booking
              </p>
            </a>
          </li>
          @endif

          @if(in_array(3, $permitted_menus_array))
          <li  class="nav-item nav-link {{ Request::is('booking') ? 'nav-link active' : ''}}" style="{{ Request::is('booking') ? 'background-color: #17a2b8; !important' : ''}}">
            <a href="{{url('/booking')}}" >
              <i class="nav-icon fa-regular fa-gem" {{ Request::is('booking') ? 'color: white; !important' : ''}}"></i>
              <p style="{{ Request::is('booking') ? 'color: white; !important' : ''}}">
                Bookings
              </p>
            </a>
          </li>
          @endif

          @if(in_array(6, $permitted_menus_array))
      
          <li  class="nav-item nav-link {{ Request::is('customer') ? 'nav-link active' : ''}}" style="{{ Request::is('customer') ? 'background-color: #17a2b8; !important' : ''}}">
            <a href="{{url('/customer')}}" >
              <i class="nav-icon fa-solid fa-users" {{ Request::is('customer') ? 'color: white; !important' : ''}}"></i>
              <p style="{{ Request::is('customer') ? 'color: white; !important' : ''}}">
                Customers
              </p>
            </a>
          </li>
          @endif
      
          <li class="nav-item @if(Request::is('employee')) menu-open 
                              @elseif(Request::is('payroll')) menu-open
                              @elseif(Request::is('payroll_list')) menu-open
                              @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-wallet"></i>
              <p>
                Payroll Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if(in_array(35, $permitted_menus_array))
              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('employee.index')}}" class="nav-link {{ Request::is('employee') ? 'nav-link active' : ''}}" style="{{ Request::is('employee') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('employee') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('employee') ? 'color: white; !important' : ''}}">Employees</p>
                </a>
              </li>
              @endif

              
              @if(in_array(40, $permitted_menus_array))
              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('payroll.index')}}" class="nav-link {{ Request::is('payroll') ? 'nav-link active' : ''}}" style="{{ Request::is('payroll') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('payroll') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('payroll') ? 'color: white; !important' : ''}}">Add Payroll</p>
                </a>
              </li>
              @endif


              @if(in_array(39, $permitted_menus_array))
              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('payroll_list')}}" class="nav-link {{ Request::is('payroll_list') ? 'nav-link active' : ''}}" style="{{ Request::is('payroll_list') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('payroll_list') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('payroll_list') ? 'color: white; !important' : ''}}">Payroll List</p>
                </a>
              </li>
             @endif
      
              <li class="nav-item" style="padding-left: 10px">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
            </ul>
          </li>

          @if(in_array(9, $permitted_menus_array))
          <li  class="nav-item nav-link {{ Request::is('product') ? 'nav-link active' : ''}}" style="{{ Request::is('product') ? 'background-color: #17a2b8; !important' : ''}}">
            <a href="{{url('/product')}}" >
              <i class="nav-icon fa-regular fa-gem" {{ Request::is('product') ? 'color: white; !important' : ''}}"></i>
              <p style="{{ Request::is('product') ? 'color: white; !important' : ''}}">
                Products
              </p>
            </a>
          </li>
          @endif





          <li class="nav-item @if(Request::is('customer_transaction')) menu-open 
                              @elseif(Request::is('supplier_transaction')) menu-open
                              @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-diamond"></i>
              <p>
                Advance and Due
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if(in_array(18, $permitted_menus_array))
              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('customer_transaction.index')}}" class="nav-link {{ Request::is('customer_transaction') ? 'nav-link active' : ''}}" style="{{ Request::is('customer_transaction') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('customer_transaction') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('customer_transaction') ? 'color: white; !important' : ''}}">Customer Transaction</p>
                </a>
              </li>
              @endif

              @if(in_array(27, $permitted_menus_array))
              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('supplier_transaction.index')}}" class="nav-link {{ Request::is('supplier_transaction') ? 'nav-link active' : ''}}" style="{{ Request::is('supplier_transaction') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('supplier_transaction') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('supplier_transaction') ? 'color: white; !important' : ''}}">Supplier Transaction</p>
                </a>
              </li>
              @endif

              <li class="nav-item" style="padding-left: 10px">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
            </ul>
          </li>

          @if(in_array(13, $permitted_menus_array))
         
          <li  class="nav-item nav-link {{ Request::is('stock') ? 'nav-link active' : ''}}" style="{{ Request::is('stock') ? 'background-color: #17a2b8; !important' : ''}}">
            <a href="{{url('/stock')}}" >
              <i class="nav-icon fa-solid fa-window-restore" {{ Request::is('stock') ? 'color: white; !important' : ''}}"></i>
              <p style="{{ Request::is('stock') ? 'color: white; !important' : ''}}">
                Stocks
              </p>
            </a>
          </li>
          @endif

          <li class="nav-item @if(Request::is('product_category_list')) menu-open 
          @elseif(Request::is('today_rate_list')) menu-open
          @elseif(Request::is('sale_type')) menu-open 
          @elseif(Request::is('zone')) menu-open 
          @elseif(Request::is('supplier')) menu-open 
          @elseif(Request::is('customer_category')) menu-open 
          @elseif(Request::is('payment_method')) menu-open 
          @elseif(Request::is('terms_and_conditions')) menu-open
          @elseif(Request::is('booking_terms_and_conditions')) menu-open
          @elseif(Request::is('settings')) menu-open
          @elseif(Request::is('roles_and_permissions')) menu-open
          @elseif(Request::is('user_list')) menu-open
          @endif">

          {{-- @if(in_array(41, $permitted_menus_array))
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-gears"></i>
              <p>
                Sale Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            @endif --}}


            @if(in_array(13, $permitted_menus_array))
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-gears"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            @endif
           

            <ul class="nav nav-treeview">
                   
              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('product_category_list')}}" class="nav-link {{ Request::is('product_category_list') ? 'nav-link active' : ''}}" style="{{ Request::is('product_category_list') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('product_category_list') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('product_category_list') ? 'color: white; !important' : ''}}">Product Category</p>
                </a>
              </li>
              

              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('today_rate_list')}}" class="nav-link {{ Request::is('today_rate_list') ? 'nav-link active' : ''}}" style="{{ Request::is('today_rate_list') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('today_rate_list') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('today_rate_list') ? 'color: white; !important' : ''}}">Today Rate</p>
                </a>
              </li>

              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('sale_type.index')}}" class="nav-link {{ Request::is('sale_type') ? 'nav-link active' : ''}}" style="{{ Request::is('sale_type') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('sale_type') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('sale_type') ? 'color: white; !important' : ''}}">Sale Type</p>
                </a>
              </li>

              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('zone.index')}}" class="nav-link {{ Request::is('zone') ? 'nav-link active' : ''}}" style="{{ Request::is('zone') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('zone') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('zone') ? 'color: white; !important' : ''}}">Zones</p>
                </a>
              </li>

              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('supplier.index')}}" class="nav-link {{ Request::is('supplier') ? 'nav-link active' : ''}}" style="{{ Request::is('supplier') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('supplier') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('supplier') ? 'color: white; !important' : ''}}">Suppliers</p>
                </a>
              </li>

              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('customer_category.index')}}" class="nav-link {{ Request::is('customer_category') ? 'nav-link active' : ''}}" style="{{ Request::is('customer_category') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('customer_category') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('customer_category') ? 'color: white; !important' : ''}}">Customer Category</p>
                </a>
              </li>

              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('payment_method.index')}}" class="nav-link {{ Request::is('payment_method') ? 'nav-link active' : ''}}" style="{{ Request::is('payment_method') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('payment_method') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('payment_method') ? 'color: white; !important' : ''}}">Payment Methods</p>
                </a>
              </li>
                     
              <li class="nav-item" style="padding-left: 10px">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wage Settings</p>
                </a>
              </li>

              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('terms_and_conditions.index')}}" class="nav-link {{ Request::is('terms_and_conditions') ? 'nav-link active' : ''}}" style="{{ Request::is('terms_and_conditions') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('terms_and_conditions') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('terms_and_conditions') ? 'color: white; !important' : ''}}">Terms & Conditions</p>
                </a>
              </li>


              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('booking_terms_and_conditions.index')}}" class="nav-link {{ Request::is('booking_terms_and_conditions') ? 'nav-link active' : ''}}" style="{{ Request::is('booking_terms_and_conditions') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('booking_terms_and_conditions') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('booking_terms_and_conditions') ? 'color: white; !important' : ''}}">Booking T&C</p>
                </a>
              </li>


              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('settings.index')}}" class="nav-link {{ Request::is('settings') ? 'nav-link active' : ''}}" style="{{ Request::is('settings') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('settings') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('settings') ? 'color: white; !important' : ''}}">Settings</p>
                </a>
              </li>


              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('roles_and_permissions.index')}}" class="nav-link {{ Request::is('roles_and_permissions') ? 'nav-link active' : ''}}" style="{{ Request::is('roles_and_permissions') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('roles_and_permissions') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('roles_and_permissions') ? 'color: white; !important' : ''}}">Roles & Permissions</p>
                </a>
              </li>

              @if((auth()->user()->role_id)==1)
              <li class="nav-item" style="padding-left: 10px">
                <a href="{{route('user_list')}}" class="nav-link {{ Request::is('user_list') ? 'nav-link active' : ''}}" style="{{ Request::is('user_list') ? 'background-color: #17a2b8; !important' : ''}}">
                  <i class="far fa-circle nav-icon" style="{{ Request::is('user_list') ? 'color: white; !important' : ''}}"></i>
                  <p style="{{ Request::is('user_list') ? 'color: white; !important' : ''}}">Users</p>
                </a>
              </li>
              @endif
             <br>
             <br>
            </ul>
          </li>  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>