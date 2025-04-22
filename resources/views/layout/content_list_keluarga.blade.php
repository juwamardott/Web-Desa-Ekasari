<main class="app-main">
{{-- @dd($kepala) --}}
     <!--begin::App Content Header-->
     <div class="app-content-header">
       <!--begin::Container-->
       <div class="container-fluid">
         <!--begin::Row-->
         <div class="row">
           <div class="col-sm-6"><h5 class="mb-0">Detail Keluarga</h5></div>

         </div>
         <!--end::Row-->
       </div>
       <!--end::Container-->
     </div>
     <div class="app-content">
       <!--begin::Container-->
       <div class="container-fluid">
         <!--begin::Row-->
         <div class="row">
           <div class="col-lg-4">
             <!-- /.card -->
             <div class="card mb-2">
               <div class="px-3 py-3 bg-info">
                    <div class="mb-2">
                      
                         @if ($kepala->image)
                         <img src="{{ asset('storage/'.$kepala->image) }}" class="rounded mx-auto d-block" alt="..." width="100">
                        @elseif ($kepala->image == null && $kepala->jenis_kelamin == "Laki-laki")
                        <img src="{{ asset('lte/dist/assets/img/user1.png') }}" class="rounded mx-auto d-block" alt="..." width="100">
                        @else
                        <img src="{{ asset('lte/dist/assets/img/user2.png') }}" class="rounded mx-auto d-block" alt="..." width="100">
                        @endif
                         
                      </div>
                    <div class="card shadow-sm rounded px-2">
                         <div class="card-body text-center d-flex flex-column align-items-center">
                             <h3 class="card-title text-primary fw-bold mb-2">{{ $kepala->nama }}</h3>
                             <span class="text-muted d-block">NIK: {{ $kepala->nik }}</span>
                             <span class="text-muted d-block">{{ $kepala->hubungan_keluarga->hubungan_keluarga }}</span>
                         </div>
                     </div>`


                                       
                 
               </div>
               
              
             </div>
             <div class="mt-3 mb-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="alert alert-secondary p-2 small mb-1">
                    <i class="bi bi-calendar-plus me-2"></i>
                    Terdaftar: <br><strong>{{ \Carbon\Carbon::parse($kepala->created_at)->translatedFormat('d F Y H:i') }}</strong>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="alert alert-secondary p-2 small mb-1">
                    <i class="bi bi-clock-history me-2"></i>
                    Terupdate : <br> <strong>{{ \Carbon\Carbon::parse($kepala->updated_at)->translatedFormat('d F Y H:i') }}</strong>
                  </div>
                </div>
              </div>
            </div>
             
             <!-- /.card -->
           </div>
           <div class="col-lg-12">
               <!-- /.card -->
               <div class="card mb-4">
                 <div class="card-header border-0">
                   <h3 class="card-title">List Keluarga</h3>
                 </div>
                 <div class="card-body table-responsive p-0">
                   <table class="table table-striped align-middle">
                     <thead>
                       <tr>
                         <th>NAMA</th>
                         <th>ALAMAT</th>
                         <th>NO KK</th>
                         <th>NIK</th>
                         <th>HUBUNGAN KELUARGA</th>
                       </tr>
                     </thead>
                     <tbody>
                         @foreach ($penduduk as $p)
                         <tr>
                              <td>
                                   @if ($p->image)
                                   <img
                                   src="{{ asset('storage/'.$p->image) }}"
                                   alt="Product 1"
                                   class="rounded-circle img-size-32 me-2"
                                 />
                                        @elseif ($p->image == null && $p->jenis_kelamin_id == 1)
                                        <img
                                   src="{{ asset('lte/dist/assets/img/user1.png') }}"
                                   alt="Product 1"
                                   class="rounded-circle img-size-32 me-2"
                                   />
                                        @else
                                        <img
                                  src="{{ asset('lte/dist/assets/img/user2.png') }}"
                                  alt="Product 1"
                                  class="rounded-circle img-size-32 me-2"
                                />
                                        @endif
                                {{ $p->nama }}
                              </td>
                              <td>{{ $p->alamat }}</td>
                              <td>{{ $p->no_kk }}</td>
                              <td>
                                <small class="text-success me-1">
                                {{ $p->nik }}
                              </td>
                              <td>
                                <span>{{ $p->hubungan_keluarga->hubungan_keluarga }}</span>
                              </td>
                            </tr>
                         @endforeach
                       
                     </tbody>
                   </table>
                 </div>
               </div>
               <!-- /.card -->
             </div>
             
         </div>
         <!--end::Row-->
         <!-- Tombol Kembali -->
         <a href="{{ url()->previous() }}" class="btn btn-warning btn-sm">
          <i class="bi bi-arrow-left"></i> Kembali
      </a>
       </div>
       <!--end::Container-->
     </div>
     <!--end::App Content-->
   </main>

   <style>
     @media (max-width: 767px) {
     .table th, .table td {
         padding: 0.8rem; /* Add padding for smaller screens */
         font-size: 12px; /* Slightly reduce font size */
     }
 }
   </style>

   <style>
     ul li a{
            font-size: 12px;
       }
  </style>