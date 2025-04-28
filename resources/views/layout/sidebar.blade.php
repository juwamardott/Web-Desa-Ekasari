<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
     <!--begin::Sidebar Brand-->
     <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="" class="brand-link">
               <!--begin::Brand Image-->
               <img src="{{ asset('lte/dist/assets/img/logo.png') }}" alt="AdminLTE Logo"
                    class="brand-image opacity-75 shadow"/>
               <!--end::Brand Image-->
               <!--begin::Brand Text-->
               <span class="brand-text fw-light">Desa Ekasari</span>
               <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
     </div>
     <!--end::Sidebar Brand-->
     <!--begin::Sidebar Wrapper-->
     <div class="sidebar-wrapper">
          <nav class="mt-2">
               <!--begin::Sidebar Menu-->
               <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                   <!-- Dashboard -->
                   @php
                         $isMasterActive = 
                         request()->is('dashboard');
                    @endphp
                   <li class="nav-item {{ $isMasterActive ? 'menu-open' : '' }}">
                       <a href="#" class="nav-link {{ $isMasterActive ? 'active' : '' }}">
                           <i class="bi bi-pie-chart-fill"></i>
                           <p>
                               Dashboard
                               <i class="nav-arrow bi bi-chevron-right"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview" style="display: {{ $isMasterActive ? 'block' : 'none' }};">
                           <li class="nav-item">
                               <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                                   <i class="nav-icon bi bi-circle"></i>
                                   <p>Dashboard</p>
                               </a>
                           </li>
                       </ul>
                   </li>
           
                   <!-- Penduduk -->
                   @php
                         $isMasterActive = 
                         request()->is('penduduk') ||
                         request()->is('keluarga');
                    @endphp
                   <li class="nav-item {{ $isMasterActive ? 'menu-open' : '' }}">
                       <a href="#" class="nav-link {{ $isMasterActive ? 'active' : '' }}">
                         <i class="bi bi-person-circle"></i>     
                           <p>
                               Penduduk
                               <i class="nav-arrow bi bi-chevron-right"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview" style="display: {{ $isMasterActive ? 'block' : 'none' }};">
                           <li class="nav-item">
                               <a href="/penduduk" class="nav-link {{ request()->is('penduduk') ? 'active' : '' }}">
                                   <i class="nav-icon bi bi-circle"></i>
                                   <p>Data Penduduk</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="/keluarga" class="nav-link {{ request()->is('keluarga') ? 'active' : '' }}">
                                   <i class="nav-icon bi bi-circle"></i>
                                   <p>Keluarga</p>
                               </a>
                           </li>
                       </ul>
                   </li>
           
                   <!-- Banjar -->
                   {{-- @if (Auth::user()->username == 'admin')
                              @php
                                   $isMasterActive = 
                                   request()->is('banjar');
                                   
                              @endphp
                    <li class="nav-item {{ $isMasterActive ? 'menu-open' : '' }}">
                         <a href="#" class="nav-link {{ $isMasterActive ? 'active' : '' }}">
                         <i class="bi bi-house-add-fill"></i>
                         <p>
                              Banjar
                              <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                         </a>
                         <ul class="nav nav-treeview" style="display: {{ $isMasterActive ? 'block' : 'none' }};">
                         <li class="nav-item">
                              <a href="/banjar" class="nav-link {{ request()->is('banjar') ? 'active' : '' }}">
                                   <i class="nav-icon bi bi-circle"></i>
                                   <p>Data Banjar</p>
                              </a>
                         </li>
                         </ul>
                    </li>
                   @endif --}}
                   
                   <!-- User -->
                   @if (Auth::user()->username == 'admin')
                              @php
                                   $isMasterActive = 
                                   request()->is('user');
                                   
                              @endphp
                    <li class="nav-item {{ $isMasterActive ? 'menu-open' : '' }}">
                         <a href="#" class="nav-link {{ $isMasterActive ? 'active' : '' }}">
                              <i class="bi bi-people-fill"></i>
                         <p>
                              User
                              <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                         </a>
                         <ul class="nav nav-treeview" style="display: {{ $isMasterActive ? 'block' : 'none' }};">
                         <li class="nav-item">
                              <a href="/user" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
                                   <i class="nav-icon bi bi-circle"></i>
                                   <p>Data User</p>
                              </a>
                         </li>
                         </ul>
                    </li>
                   @endif

                   @if (Auth::user()->username == 'admin')
                              @php
                                   $isMasterActive = 
                                   request()->is('surat');
                                   
                              @endphp
                    <li class="nav-item {{ $isMasterActive ? 'menu-open' : '' }}">
                         <a href="#" class="nav-link {{ $isMasterActive ? 'active' : '' }}">
                            <i class="bi bi-envelope-fill"></i>
                         <p>
                              Surat
                              <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                         </a>
                         <ul class="nav nav-treeview" style="display: {{ $isMasterActive ? 'block' : 'none' }};">
                         <li class="nav-item">
                              <a href="/surat" class="nav-link {{ request()->is('surat') ? 'active' : '' }}">
                                   <i class="nav-icon bi bi-circle"></i>
                                   <p>Buat Surat</p>
                              </a>
                         </li>
                         </ul>
                    </li>
                   @endif
                         @if (Auth::user()->username == 'admin')
                              @php
                                   $isMasterActive = 
                                   request()->is('master/pendidikan') ||
                                   request()->is('master/status_dasar') ||
                                   request()->is('master/pekerjaan') ||
                                   request()->is('master/jenis_surat') ||
                                   request()->is('banjar') ||
                                   request()->is('master/pendidikan_sedang');
                                   
                              @endphp
                              <li class="nav-item {{ $isMasterActive ? 'menu-open' : '' }}">
                                   <a href="#" class="nav-link {{ $isMasterActive ? 'active' : '' }}">
                                        <i class="bi bi-database-fill-gear"></i>
                                        <p>
                                             Data Master
                                             <i class="nav-arrow bi bi-chevron-right"></i>
                                        </p>
                                   </a>
                                   <ul class="nav nav-treeview" style="display: {{ $isMasterActive ? 'block' : 'none' }};">
                                        <li class="nav-item">
                                             {{-- <a href="/master/pendidikan" class="nav-link {{ request()->is('master/pendidikan') ? 'active' : '' }}">
                                                  <i class="nav-icon bi bi-circle"></i>
                                                  <p>Data Pendidikan</p>
                                             </a>
                                             <a href="/master/pendidikan_sedang" class="nav-link {{ request()->is('master/pendidikan_sedang') ? 'active' : '' }}">
                                                  <i class="nav-icon bi bi-circle"></i>
                                                  <p>Data Pendidikan Sedang</p>
                                             </a>
                                             <a href="/master/status_dasar" class="nav-link {{ request()->is('master/status_dasar') ? 'active' : '' }}">
                                                  <i class="nav-icon bi bi-circle"></i>
                                                  <p>Data Status Dasar</p>
                                             </a>
                                             <a href="/master/pekerjaan" class="nav-link {{ request()->is('master/pekerjaan') ? 'active' : '' }}">
                                                  <i class="nav-icon bi bi-circle"></i>
                                                  <p>Data Pekerjaan</p>
                                             </a> --}}
                                             <a href="/master/jenis_surat" class="nav-link {{ request()->is('master/jenis_surat') ? 'active' : '' }}">
                                                  <i class="nav-icon bi bi-circle"></i>
                                                  <p>Data Surat</p>
                                             </a>

                                             <a href="/banjar" class="nav-link {{ request()->is('banjar') ? 'active' : '' }}">
                                                  <i class="nav-icon bi bi-circle"></i>
                                                  <p>Data Banjar</p>
                                             </a>
                                        </li>
                                   </ul>
                              </li>
                              @endif

                   
               </ul>
               <!--end::Sidebar Menu-->
           </nav>
           
     </div>
     <!--end::Sidebar Wrapper-->
</aside>