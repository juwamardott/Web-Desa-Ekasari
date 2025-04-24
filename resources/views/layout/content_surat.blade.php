<main class="app-main">
     <!--begin::App Content Header-->
     <div class="app-content-header">
       <!--begin::Container-->
       <div class="container-fluid">
         <!--begin::Row-->
         <div class="row">
           <div class="col-sm-6"><h3 class="mb-0">Pembuatan Surat</h3></div>
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
           <div class="col-md-12">
             <!--begin::Quick Example-->
             <div class="card card-primary card-outline mb-4">
               <!--begin::Header-->
               <div class="card-header"><div class="card-title">Form Pembuatan Surat</div></div>
               <!--end::Header-->
               <!--begin::Form-->
               <form action="{{ route('post.surat') }}" method="POST" >
                    @csrf
                 <!--begin::Body-->
                 <div class="card-body">
                    <div class="mb-3">
                         <label for="nomor_surat" class="form-label">Nomor surat</label>
                         <input
                         type="nomor_surat"
                         name="nomor_surat"
                         class="form-control @error('nomor_surat') is-invalid @enderror"
                         id="nomor_surat"
                         aria-describedby="nomor_surat"
                         />
                         @error('nomor_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    <div class="mb-3">
                         <label for="jenis_surat" class="form-label">Jenis Surat</label>
                         <select name="jenis_surat" id="jenis_surat" class="form-control @error('jenis_surat') is-invalid @enderror" aria-describedby="banjar">
                         <option value="">-- Pilih Jenis Surat --</option>
                         @foreach ($jenis_surat as $s)
                              
                              <option value="{{ $s->id }}">{{ $s->jenis_surat }}</option>
                         @endforeach
                         </select>
                         @error('jenis_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <input
                      type="keterangan"
                      name="keterangan"
                      class="form-control"
                      id="keterangan"
                      aria-describedby="keterangan"
                      />
                 </div>
                    <div class="mb-3">
                         <label for="penduduk_id" class="form-label">Cari Penduduk</label>
                         <select name="penduduk_id" id="penduduk_id" class="form-control @error('penduduk_id') is-invalid @enderror" style="width: 100%;">
                             <option value="">-- Cari berdasarkan Nama / NIK --</option>
                             @foreach ($penduduks as $p)
                                 <option value="{{ $p->id }}">{{ $p->nik }} - {{ $p->nama }}</option>
                             @endforeach
                         </select>
                         @error('penduduk_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                     </div>                     
                    <div class="mb-3">
                         <label for="keperluan" class="form-label">Keperluan</label>
                         <input
                         type="keperluan"
                         name="keperluan"
                         class="form-control @error('keperluan') is-invalid @enderror"
                         id="keperluan"
                         aria-describedby="keperluan"
                         />
                         @error('keperluan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                         <label for="tanggal_dibuat" class="form-label">Tanggal Dibuat</label>
                         <input
                             type="date"
                             name="tanggal_dibuat"
                             class="form-control @error('tanggal_dibuat') is-invalid @enderror"
                             id="tanggal_dibuat"
                             aria-describedby="tanggal_dibuat"
                         />
                         @error('tanggal_dibuat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                     </div>
                 </div>
                 <!--end::Body-->
                 <!--begin::Footer-->
                 <div class="card-footer">
                   <button type="submit" class="btn btn-success btn-sm">Submit & Donwload</button>
                 </div>
                 <!--end::Footer-->
               </form>
               <!--end::Form-->
             </div>
             <!--end::Quick Example-->
             <a href="/dashboard" class="btn btn-warning btn-sm">
               <i class="bi bi-arrow-left"></i> Kembali
           </a>
           </div>

           {{-- <div class="col-md-6">
               <div class="card card-success card-outline">
                    <div class="card-header"><div class="card-title">Contoh Surat</div></div>
                   <div class="card-body " style="font-family: 'Times New Roman', Times, serif;">
           
                       <!-- KOP SURAT -->
                       <div class="text-center mb-3">
                           <div class="row align-items-center">
                               <div class="col-2">
                                   <img src="{{ asset('lte/dist/assets/img/logo.png') }}" width="80" height="80" alt="Logo Desa">
                               </div>
                               <div class="col-10">
                                   <h5 style="margin: 0;">PEMERINTAH KABUPATEN JEMBRANA</h5>
                                   <h5 style="margin: 0;">KECAMATAN MELAYA</h5>
                                   <h4 style="margin: 0;"><strong>DESA EKASARI</strong></h4>
                                   <p style="margin: 0; font-size: 14px;">Alamat: Jl. Contoh Alamat No.123, Kode Pos 12345</p>
                               </div>
                           </div>
                           <hr style="border: 2px solid black;">
                       </div>
           
                       <!-- ISI SURAT -->
                       <div class="text-center mb-3">
                           <h5><u>SURAT KETERANGAN DOMISILI</u></h5>
                           <p>Nomor: 123/SKD/IV/2025</p>
                       </div>
           
                       <p>Yang bertanda tangan di bawah ini, Kepala Desa Ekasari, menerangkan bahwa:</p>
           
                       <table style="margin-left: 20px;">
                           <tr>
                               <td style="width: 150px;">Nama</td>
                               <td>: John Doe</td>
                           </tr>
                           <tr>
                               <td>Tempat/Tgl Lahir</td>
                               <td>: Jakarta, 01 Januari 1990</td>
                           </tr>
                           <tr>
                               <td>Alamat</td>
                               <td>: Jl. Melati No. 5, RT 01 / RW 02</td>
                           </tr>
                           <tr>
                               <td>Keperluan</td>
                               <td>: Mengurus SKCK</td>
                           </tr>
                       </table>
           
                       <p class="mt-3" style="text-align: justify;">Adalah benar yang bersangkutan adalah warga Desa Ekasari dan surat keterangan ini dibuat sebagai kelengkapan administrasi untuk keperluan tersebut di atas.</p>
           
                       <div class="text-end mt-4">
                           <p>Ekasari, {{ date('d F Y') }}</p>
                           <p><strong>Kepala Desa Ekasari</strong></p>
                           <br><br>
                           <p><strong><u>Nama Kepala Desa</u></strong></p>
                       </div>
           
                   </div>
               </div>
         </div> --}}
         <!--end::Row-->
       </div>
       <!--end::Container-->
     </div>
     <!--end::App Content-->
   </main>

   