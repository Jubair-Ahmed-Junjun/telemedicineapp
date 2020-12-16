<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('/home') }}" class="brand-link">
      <img src="{{asset('/')}}admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">JNRS_CRUD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/')}}admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          <p class="text-white" style="font-size: 12px;">{{ Auth::user()->roles }}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('appointment.index') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home

              </p>
            </a>
          </li>
 @if(Auth::user()->roles == 'admin')
          <li class="nav-item">
            <a href="{{ route('doctors.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                 Doctors
              </p>
            </a>
          </li>
  @endif
       <li class="nav-item">
            <a href="{{ route('my-file.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                My files
              </p>
            </a>
          </li>
           <li class="nav-item">
               <a href="{{ route('chatify') }}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Chat
              </p>
            </a>
          </li>
            <li class="nav-item">
               <a href="{{ route('video-call.index') }}" class="nav-link">
              <i class="nav-icon fas fa-video"></i>
              <p>
                Video Call
              </p>
            </a>
          </li>


          <li class="nav-item">
               <a href="{{ route('my-account.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                My Account
              </p>
            </a>
          </li>


                                        <!-- Right navbar links -->

      <li class="nav-item">
         <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            {{ __('Logout') }}
         </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>

      </li>
    </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
