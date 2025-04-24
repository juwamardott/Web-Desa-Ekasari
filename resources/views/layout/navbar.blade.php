<nav class="app-header navbar navbar-expand bg-body">
     <!--begin::Container-->
     <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
               <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                         <i class="bi bi-list"></i>
                    </a>
               </li>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
               <!--end::Notifications Dropdown Menu-->
               <!--begin::Fullscreen Toggle-->
               <li class="nav-item">
                    <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                         <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                         <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                    </a>
               </li>
               <!--end::Fullscreen Toggle-->
               <!--begin::User Menu Dropdown-->
               <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                         {{-- <img src="{{ asset('lte/dist/assets/img/user2-160x160.jpg') }}"
                              class="user-image rounded-circle shadow" alt="User Image" /> --}}
                              <i class="bi bi-person-circle"></i>
                         <span class="d-none d-md-inline">{{ ucfirst(Auth::user()->username) }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                         <!--begin::User Image-->
                         <li class="user-header text-bg-info">
                              <img src="{{ asset('lte/dist/assets/img/user1.png') }}" class="rounded-circle shadow"
                                   alt="User Image" />
                              <p>
                                   {{ ucfirst(Auth::user()->username) }} | {{ ucfirst(Auth::user()->banjar->banjar) }}
                                   <small>Member since Nov. 2023</small>
                              </p>
                         </li>
                         <!--end::User Image-->
                         <!--begin::Menu Body-->
                         <!--end::Menu Body-->
                         <!--begin::Menu Footer-->
                         <li class="user-footer">
                              <form action="{{ route('logout') }}" method="POST">
                                   @csrf
                                   <button type="submit" class="btn btn-danger">Logout</button>
                               </form>
                         </li>
                         <!--end::Menu Footer-->
                    </ul>
               </li>
               <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
     </div>
     <!--end::Container-->
</nav>