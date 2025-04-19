<main class="app-main">
     <!--begin::App Content Header-->
     <div class="app-content-header">
       <!--begin::Container-->
       <div class="container-fluid">
         <!--begin::Row-->
         <div class="row">
           <div class="col-sm-6"><h5 class="mb-0">Detail Penduduk</h5></div>
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
           <div class="col-md-3">
             <!--begin::Quick Example-->
             <div class="card card-primary card-outline mb-4">
               <!--begin::Header-->
               <div class="card-header"><div class="card-title">Photo</div></div>
               <!--end::Header-->
               <!--begin::Form-->
                 <!--begin::Body-->
                 <div class="card-body">
                   <div class="mb-3">
                    {{-- @if ($penduduk->jenis_kelamin == "Laki-laki")
                    <img src="{{ asset('lte/dist/assets/img/user1.png') }}" alt="" width="200" class="rounded mx-auto d-block">
                    @else
                    <img src="{{ asset('lte/dist/assets/img/user2.png') }}" alt="" width="200" class="rounded mx-auto d-block">
                    @endif --}}

                    @if ($penduduk->image)
                      <td><img src="{{ asset('storage/'.$penduduk->image) }}" alt="" width="200" class="rounded mx-auto d-block"></td>
                    @elseif ($penduduk->image == null && $penduduk->jenis_kelamin == "Laki-laki")
                      <td><img src="{{ asset('lte/dist/assets/img/user1.png') }}" alt="" width="200" class="rounded mx-auto d-block"></td>
                    @else
                      <td><img src="{{ asset('lte/dist/assets/img/user2.png') }}" alt="" width="200" class="rounded mx-auto d-block"></td>
                    @endif
                    
                 </div>
      
                 <!--end::Body-->
               <!--end::Form-->
               
               </div>
  
               </div>
             <!--end::Quick Example-->
                                      <!-- Tombol Kembali -->
            <a href="{{ url()->previous() }}" class="btn btn-warning btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
                                    
           </div>
           <!--end::Col-->
           <!--begin::Col-->
           <div class="col-md-9">
             <!--begin::Different Height-->
             
             <!--end::Different Height-->
             <!--begin::Form Validation-->
             <div class="card card-info card-outline mb-4">
               <!--begin::Header-->
               <div class="card-header"><div class="card-title">Biodata Penduduk</div></div>
               <!--end::Header-->
               <!--begin::Form-->
               <form class="needs-validation" novalidate action="{{ Route($type. '.update', $penduduk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                 <!--begin::Body-->
                 <input type="hidden" name="type" value="{{ $type }}">
                 <input type="hidden" name="oldImage" value="{{ $penduduk->image }}">
                 <div class="card-body">
                   <!--begin::Row-->
                   <div class="row g-3">
                     <!--begin::Col-->
                     <div class="col-md-6">
                       <label for="no_kk" class="form-label">No KK</label>
                       <input
                         type="number"
                         class="form-control"
                         id="no_kk"
                         value="{{ $penduduk->no_kk }}"
                         name="no_kk"
                         required
                       />
                     </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                       <label for="nik" class="form-label">NIK</label>
                       <input
                         type="number"
                         class="form-control"
                         id="nik"
                         name="nik"
                         value="{{ $penduduk->nik }}"
                         required
                       />
                     </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                       <label for="nama" class="form-label">Nama lengkap</label>
                       <div class="input-group has-validation">
                         <span class="input-group-text" id=""><i class="bi bi-person-circle"></i></span>
                         <input
                           type="text"
                           class="form-control"
                           id="nama"
                           value="{{ $penduduk->nama }}"
                           name="nama"
                           aria-describedby=""
                           required
                         />
                       </div>
                     </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="warga_negara" class="form-label">Kewarganegaraan</label>
                         <div class="input-group has-validation">
                           <span class="input-group-text" id=""><i class="bi bi-flag-fill"></i></span>
                           <input
                             type="text"
                             class="form-control"
                             id="warga_negara"
                             name="warga_negara"
                             value="{{ $penduduk->warga_negara }}"
                             aria-describedby=""
                             required
                           />
                         </div>
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="nama_ayah" class="form-label">Nama Ayah</label>
                         <div class="input-group has-validation">
                           <span class="input-group-text" id=""><i class="bi bi-person-standing"></i></span>
                           <input
                             type="text"
                             class="form-control"
                             id="nama_ayah"
                             name="nama_ayah"
                             value="{{ $penduduk->nama_ayah }}"
                             aria-describedby=""
                             required
                           />
                         </div>
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="nama_ibu" class="form-label">Nama Ibu</label>
                         <div class="input-group has-validation">
                           <span class="input-group-text" id=""><i class="bi bi-person-standing-dress"></i></span>
                           <input
                             type="text"
                             class="form-control"
                             id="nama_ibu"
                             name="nama_ibu"
                             value="{{ $penduduk->nama_ibu }}"
                             aria-describedby=""
                             required
                           />
                         </div>
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="" class="form-label">NIK Ayah</label>
                         <input
                           type="number"
                           class="form-control"
                           id="nik_ayah"
                           name="nik_ayah"
                           value="{{ $penduduk->nik_ayah }}"
                           required
                         />
                       </div>
                     <!--end::Col-->
                      <!--begin::Col-->
                      <div class="col-md-6">
                         <label for="" class="form-label">NIK Ibu</label>
                         <input
                           type="number"
                           class="form-control"
                           id="nik_ibu"
                           name="nik_ibu"
                           value="{{ $penduduk->nik_ibu      }}"
                           required
                         />
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                    <div class="col-md-6">
                         <label for="alamat" class="form-label">Alamat</label>
                         <div class="input-group has-validation">
                         <span class="input-group-text text-wrap"><i class="bi bi-geo-fill"></i></span>
                         <textarea
                              class="form-control"
                              id="alamat"
                              name="alamat"
                              rows="2"
                              required
                         >{{ $penduduk->alamat }}</textarea>
                         </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                         <label for="banjar" class="form-label">Banjar</label>
                         <div class="input-group has-validation">
                         <span class="input-group-text"><i class="bi bi-house-fill"></i></span>
                         <select class="form-control" id="banjar" name="banjar" required>
                              <option value="">Pilih Banjar</option>
                              @foreach($banjar as $b)
                                   <option value="{{ $b->banjar }}" {{ isset($penduduk->banjar) && $penduduk->banjar == $b->banjar ? 'selected' : '' }}>
                                        {{ $b->banjar }}
                                   </option>
                              @endforeach
                         </select>
                         </div>
                    </div>
                    <!--end::Col-->
 
 
                      <!--begin::Col-->
                      <div class="col-md-6">
                         <label for="pendidikan" class="form-label">Pendidikan</label>
                         <div class="input-group has-validation">
                           <span class="input-group-text" id=""><i class="bi bi-book-half"></i></span>
                           <input
                             type="text"
                             class="form-control"
                             id="pendidikan"
                             name="pendidikan"
                             value="{{ $penduduk->pendidikan }}"
                             aria-describedby=""
                             required
                           />
                         </div>
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id=""><i class="bi bi-calendar-event"></i></span>
                        <input
                          type="date"
                          class="form-control"
                          id="tgl_lahir"
                          name="tgl_lahir"
                          value="{{ $penduduk->tgl_lahir }}"
                          aria-describedby=""
                          required
                          onchange="hitungUmur()"
                        />
                      </div>
                    </div>
                  <!--end::Col-->
                      <!--begin::Col-->
                      <div class="col-md-6">
                         <label for="" class="form-label">Umur</label>
                         <input
                           type="number"
                           class="form-control"
                           id="umur"
                           name="umur"
                           value="{{ $penduduk->umur }}"
                           
                           readonly
                         />
                       </div>
                     <!--end::Col-->
                      <!--begin::Col-->
                      <div class="col-md-6">
                         <label for="kawin" class="form-label">Status Kawin</label>
                         <select class="form-control" id="kawin" name="kawin" required>
                             <option value="">Pilih Status</option>
                             <option value="Kawin" {{ $penduduk->kawin == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                             <option value="Belum Kawin" {{ $penduduk->kawin == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                             <option value="Cerai" {{ $penduduk->kawin == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                             <option value="Cerai Mati" {{ $penduduk->kawin == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                         </select>
                     </div>                     
                       <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                          <label for="status_dasar" class="form-label">Status Dasar</label>
                          <select class="form-control" id="status_dasar" name="status_dasar" required>
                              <option value="">Pilih Status Dasar</option>
                              <option value="Pindah" {{ $penduduk->status_dasar == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                              <option value="Mati" {{ $penduduk->status_dasar == 'Mati' ? 'selected' : '' }}>Mati</option>
                              <option value="Pergi" {{ $penduduk->status_dasar == 'Pergi' ? 'selected' : '' }}>Pergi</option>
                              <option value="Hidup" {{ $penduduk->status_dasar == 'Hidup' ? 'selected' : '' }}>Hidup</option>
                              <option value="Hilang" {{ $penduduk->status_dasar == 'Hilang' ? 'selected' : '' }}>Hilang</option>s
                          </select>
                      </div>                     
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                         <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                         <select
                           class="form-control"
                           id="hubungan_keluarga"
                           name="hubungan_keluarga"
                           required
                         >
                           <option value="Kepala Keluarga" {{ $penduduk->hubungan_keluarga == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                           <option value="Istri" {{ $penduduk->hubungan_keluarga == 'Istri' ? 'selected' : '' }}>Istri</option>
                           <option value="Anak" {{ $penduduk->hubungan_keluarga == 'Anak' ? 'selected' : '' }}>Anak</option>
                           <option value="Menantu" {{ $penduduk->hubungan_keluarga == 'Menantu' ? 'selected' : '' }}>Menantu</option>
                           <option value="Menantu" {{ $penduduk->hubungan_keluarga == 'Saudara' ? 'selected' : '' }}>Saudara</option>
                           <option value="Family Lain" {{ $penduduk->hubungan_keluarga == 'Family Lain' ? 'selected' : '' }}>Family Lain</option>
                           <option value="Anak Angkat" {{ $penduduk->hubungan_keluarga == 'Anak Angkat' ? 'selected' : '' }}>Anak Angkat</option>
                         </select>
                       </div>
                       
                     <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                         <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                         <div class="input-group has-validation">
                         <span class="input-group-text" id=""><i class="bi bi-gender-ambiguous"></i></span>
                         <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                              <option value="">Pilih Jenis Kelamin</option>
                              <option value="Laki-laki" {{ $penduduk->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                              <option value="Perempuan" {{ $penduduk->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                         </select>
                         </div>
                    </div>
                    <!--end::Col-->
 
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="" class="form-label">Agama</label>
                         <input
                           type="text"
                           class="form-control"
                           id="agama"
                           name="agama"
                           value="{{ $penduduk->agama }}"
                           required
                         />
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="status_penduduk" class="form-label">Status Penduduk</label>
                         <select class="form-control" id="status_penduduk" name="status_penduduk" required>
                             <option value="">Pilih Status</option>
                             <option value="Aktif" {{ $penduduk->status_penduduk == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                             <option value="Tidak Aktif" {{ $penduduk->status_penduduk == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                         </select>
                     </div>
                     
                       <!--end::Col-->
                       <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="" class="form-label">Akta kelahiran</label>
                         <input
                           type="number"
                           class="form-control"
                           id="akta_kelahiran"
                           name="akta_kelahiran"
                           value="{{ $penduduk->akta_kelahiran }}"
                           required
                         />
                       </div>
                       <!--end::Col-->
                        <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                         <div class="input-group has-validation">
                           <span class="input-group-text" id=""><i class="bi bi-house-heart"></i></span>
                           <input
                             type="text"
                             class="form-control"
                             id="tempat_lahir"
                             name="tempat_lahir"
                             value="{{ $penduduk->tempat_lahir }}"
                             aria-describedby=""
                             required
                           />
                         </div>
                       </div>
                     <!--end::Col-->
                         
                      <!--begin::Col-->
                      <div class="col-md-6">
                         <label for="pendidikan_sedang_ditempuh" class="form-label">Pendidikan saat ini</label>
                         <div class="input-group has-validation">
                           <span class="input-group-text" id=""><i class="bi bi-book"></i></span>
                           <input
                             type="text"
                             class="form-control"
                             id="pendidikan_sedang_ditempuh"
                             name="pendidikan_sedang_ditempuh"
                             value="{{ $penduduk->pendidikan_sedang_ditempuh }}"
                             aria-describedby=""
                             required
                           />
                         </div>
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="pekerjaan" class="form-label">Pekerjaan</label>
                         <div class="input-group has-validation">
                           <span class="input-group-text" id=""><i class="bi bi-briefcase"></i></span>
                           <input
                             type="text"
                             class="form-control"
                             id="pekerjaan"
                             value="{{ $penduduk->pekerjaan }}"
                             name="pekerjaan"
                             aria-describedby=""
                             required
                           />
                         </div>
                       </div>


                       
                       <div class="col-md-12">
                        <label for="image" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                      </div>
                     <!--end::Col-->







                   </div>
                   <!--end::Row-->
                 </div>
                 <!--end::Body-->
                 <!--begin::Footer-->
                 <div class="card-footer">
                   <button class="btn btn-success btn-sm text-white " type="submit">Update</button>
                 </div>
                 <!--end::Footer-->
               </form>
               <!--end::Form-->
             </div>
             <!--end::Form Validation-->
           </div>
           <!--end::Col-->
         </div>
         <!--end::Row-->
       </div>
       <!--end::Container-->
     </div>
     <!--end::App Content-->
   </main>

<style>
   ul li a{
          font-size: 12px;
     }
</style>
<script>
  function hitungUmur() {
    const tglLahir = document.getElementById('tgl_lahir').value;
    if (!tglLahir) return;
  
    const lahir = new Date(tglLahir);
    const hariIni = new Date();
  
    let umur = hariIni.getFullYear() - lahir.getFullYear();
    const bulan = hariIni.getMonth() - lahir.getMonth();
    const tanggal = hariIni.getDate() - lahir.getDate();
  
    // Cek jika belum ulang tahun tahun ini
    if (bulan < 0 || (bulan === 0 && tanggal < 0)) {
      umur--;
    }
  
    document.getElementById('umur').value = umur;
  }
  </script> 