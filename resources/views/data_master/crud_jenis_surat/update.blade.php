@section('title')
Tambah Data Banjar
@endsection
@include('layout.header')
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
     <!--begin::App Wrapper-->
     <div class="app-wrapper">
          <!--begin::Header-->
          @include('layout.navbar')
          <!--end::Header-->
          <!--begin::Sidebar-->
          @include('layout.sidebar')
          <!--end::Sidebar-->
          <!--begin::App Main-->
          <main class="app-main">
               <!--begin::App Content Header-->
               <div class="app-content-header">
                 <!--begin::Container-->
                 <div class="container-fluid">
                   <!--begin::Row-->
                   <div class="row">
                     <div class="col-sm-6"><h3 class="mb-0">Update Jenis Surat</h3></div>
                   </div>
                   <!--end::Row-->
                 </div>
                 <!--end::Container-->
               </div>
               <!--end::App Content Header-->
               <!--begin::App Content-->
               <div class="app-content">
                 <!--begin::Container-->
                 <div class="container-fluid">
                   <!--begin::Row-->
                   <div class="row g-4">
                     <!--begin::Col-->
                     <div class="col-md-6">
                       <!--begin::Quick Example-->
                       <div class="card card-primary card-outline mb-4">
                         <!--begin::Header-->
                         <div class="card-header"><div class="card-title">Form</div></div>
                         <!--end::Header-->
                         <!--begin::Form-->
                         <form action="{{ route('jenis_surat.update', $jenis_surat->id) }}" method="POST">
                              @csrf
                           <!--begin::Body-->
                           <div class="card-body">
                              <div class="mb-3">
                                  <label for="jenis_surat" class="form-label">Jenis Surat</label>
                                  <input
                                      type="text"
                                      name="jenis_surat"
                                      class="form-control @error('jenis_surat') is-invalid @enderror"
                                      id="jenis_surat"
                                      value="{{ $jenis_surat->jenis_surat }}"
                                      aria-describedby="jenis_surat"
                                  />
                                  @error('jenis_surat')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                              </div>
                          
                              <div class="mb-3">
                                  <label for="keterangan" class="form-label">Keterangan</label>
                                  <textarea
                                        class="form-control @error('keterangan') is-invalid @enderror"
                                        id="keterangan"
                                        name="keterangan"
                                        rows="2"
                                        
                                        placeholder="Input keterangan..."
                                   >{{ $jenis_surat->keterangan }}</textarea>

                                  @error('keterangan')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                          
                           <!--end::Body-->
                           <!--begin::Footer-->
                           <div class="card-footer">
                             <button type="submit" class="btn btn-success btn-sm">Submit</button>
                           </div>
                           <!--end::Footer-->
                         </form>
                         <!--end::Form-->
                       </div>
                       <!--end::Quick Example-->
                       <a href="/master/jenis_surat" class="btn btn-warning btn-sm">
                         <i class="bi bi-arrow-left"></i> Kembali
                     </a>
                     </div>
                     
                     <!--end::Col-->
                     <!--begin::Col-->
                     <!--end::Col-->
                   </div>
                   <!--end::Row-->
                 </div>
                 <!--end::Container-->
               </div>
               <!--end::App Content-->
             </main>
          <!--end::App Main-->
          @include('layout.copyright')
          <!--end::Footer-->
     </div>
     <!--end::App Wrapper-->
</body>
<!--end::Body-->
@include('layout.lib')
@include('layout.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <!-- Panggil Toast jika session 'success' ada -->
    <script>
        @if(session('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "2000",
                "toastClass": "toast-success"
            }
            toastr.success("{{ session('success') }}");
        @elseif (session('error'))
             toastr.options = {
                  "closeButton": true,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "timeOut": "2000",
                  "toastClass": "toast-error"
             }
             toastr.error("{{ session('error') }}");
        @endif
    </script>