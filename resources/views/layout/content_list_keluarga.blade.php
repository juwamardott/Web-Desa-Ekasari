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
           <div class="col-lg-6">
             <!-- /.card -->
             <div class="card mb-3 shadow">
              <div class="card-header bg-info text-white text-center py-3">
                  <strong>Data Kepala Keluarga</strong>
              </div>
              <div class="card-body text-center">
                  <div class="mb-3">
                      @if ($kepala->image)
                          <img src="{{ asset('storage/'.$kepala->image) }}" class="rounded-circle shadow" alt="Foto Kepala Keluarga" width="100" height="100">
                      @elseif ($kepala->jenis_kelamin_id == 1)
                          <img src="{{ asset('lte/dist/assets/img/user1.png') }}" class="rounded-circle shadow" alt="Laki-laki" width="100" height="100">
                      @else
                          <img src="{{ asset('lte/dist/assets/img/user2.png') }}" class="rounded-circle shadow" alt="Perempuan" width="100" height="100">
                      @endif
                  </div>
                  <h4 class="fw-bold text-primary">{{ $kepala->nama }}</h4>
                  <p class="mb-1 text-muted">NIK: {{ $kepala->nik }}</p>
                  <span class="badge bg-secondary">{{ $kepala->hubungan_keluarga->hubungan_keluarga }}</span>
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
           {{-- Ubah NO KK --}}
           <div class="col-lg-6">
            <div class="card shadow rounded">
              <div class="card-header bg-success text-white">
                <h5 class="mb-0">Perbarui Nomor KK</h5>
              </div>
              <div class="card-body">
                <form action="/{{ request()->segment(1) }}/list/{{ $kepala->no_kk }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="no_kk_baru" class="form-label fw-semibold">Nomor KK Baru</label>
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-text"></i></span>
                      <input type="text" name="no_kk_baru" id="no_kk_baru" class="form-control" placeholder="Masukkan No KK baru..." aria-describedby="basic-addon1" required>
                    </div>
                  </div>
                  <div class="text-end">
                    <button class="btn btn-success px-4" type="submit">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          
          {{-- End --}}
           <div class="col-lg-12">
               <!-- /.card -->
               <div class="card mb-4">
                 {{-- <div class="card-header border-0">
                 </div> --}}
                 <div class="card-body table-responsive p-0">
                   <table class="table table-striped align-middle">
                     <thead class="">
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
                            @if ($p->jenis_kelamin_id == 1)
                              <i class="bi bi-gender-male text-primary me-1"></i>
                            @else
                              <i class="bi bi-gender-female text-danger me-1"></i>
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
        <a href="/{{ request()->segment(1) }}" class="btn btn-warning btn-sm">
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