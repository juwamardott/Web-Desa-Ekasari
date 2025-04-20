<main class="app-main">
     <!--begin::App Content Header-->
     <div class="app-content-header">
       <!--begin::Container-->
       <div class="container-fluid">
         <!--begin::Row-->
         <div class="row">
           <div class="col-sm-6"><h5 class="mb-0">Tambah Penduduk</h5></div>
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
                    <img id="profileImage" src="{{ asset('lte/dist/assets/img/user1.png') }}" alt="" width="200" class="rounded mx-auto d-block">                    
                 </div>
      
                 <!--end::Body-->
               <!--end::Form-->
               
               </div>
  
               </div>
             <!--end::Quick Example-->
                                      <!-- Tombol Kembali -->
               <a href="/penduduk" class="btn btn-warning btn-sm">
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
               <form class="needs-validation" novalidate action="{{ Route('penduduk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                 <!--begin::Body-->
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
                         value="{{ old('no_kk') }}"
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
                         value="{{ old('nik') }}"
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
                           value="{{ old('nama') }}"
                           name="nama"
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
                             value="{{ old('nama_ayah') }}"
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
                             value="{{ old('nama_ibu') }}"
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
                           value="{{ old('nik_ayah') }}"
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
                           value="{{ old('nik_ibu') }}"
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
                         >{{ old('alamat') }}</textarea>
                         </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                      <label for="warga_negara" class="form-label">Kewarganegaraan</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id=""><i class="bi bi-flag-fill"></i></span>
                        <select class="form-control" id="warga_negara" name="warga_negara" required>
                         <option value="">Pilih Kewarganegaraan</option>
                         @foreach($warga_negara as $w)
                             <option value="{{ $w->id }}" {{ old('warga_negara') == $w->warga_negara ? 'selected' : '' }}>
                                 {{ $w->warga_negara }}
                             </option>
                         @endforeach
                       </select>
                      </div>
                    </div>
                   <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <label for="negara_asal" class="form-label">Negara Asal</label>
                        <div class="input-group has-validation">
                        <span class="input-group-text text-wrap"><i class="bi bi-geo-fill"></i></span>
                        <textarea
                            class="form-control"
                            id="negara_asal"
                            name="negara_asal"
                            rows="2"
                        >{{ old('negara_asal') }}</textarea>
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
                                    <option value="{{ $b->banjar }}" {{ old('banjar') == $b->banjar ? 'selected' : '' }}>
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
                           <select class="form-control" id="pendidikan" name="pendidikan" required>
                            <option value="">Pilih Pendidikan</option>
                            @foreach($pendidikan as $b)
                                <option value="{{ $b->id }}" {{ old('pendidikan') == $b->pendidikan ? 'selected' : '' }}>
                                    {{ $b->pendidikan }}
                                </option>
                            @endforeach
                          </select>
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
                          value="{{ old('tgl_lahir') }}"
                          aria-describedby=""
                          required
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
                           value="{{ old('umur') }}"
                           readonly
                         />
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="kawin" class="form-label">Status Kawin</label>
                      <select class="form-control" id="kawin" name="kawin" required>
                          <option value="">Pilih Status Perkawinan</option>
                          @foreach ($kawin as $k)
                            <option value="{{ $k->id }}" {{ old('kawin') == $k->kawin ? 'selected' : '' }}>{{ $k->kawin }}</option>
                          @endforeach
                      </select>
                    </div>                  
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                      <label for="status_dasar" class="form-label">Status Dasar</label>
                      <select class="form-control" id="status_dasar" name="status_dasar" required>
                          <option value="">Pilih Status Dasar</option>
                          @foreach ($status_dasar as $sd)
                            <option value="{{ $sd->id }}" {{ old('status_dasar') == $sd->status_dasar ? 'selected' : '' }}>{{ $sd->status_dasar }}</option>
                          @endforeach
                      </select>
                    </div>                  
                    <!--end::Col-->
                         <!--begin::Col-->
                         <div class="col-md-6">
                          <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                          <select class="form-control" id="hubungan_keluarga" name="hubungan_keluarga" required>
                              <option value="">Pilih Hubungan Keluarga</option>
                              @foreach ($hubungan_keluarga as $h)
                              <option value="{{ $h->id }}" {{ old('hubungan_keluarga') == $h->hubungan_keluarga ? 'selected' : '' }}>{{ $h->hubungan_keluarga }}</option>
                              @endforeach
                          </select>
                      </div>                      
                    <!--end::Col-->
                   <!--begin::Col-->
                          <div class="col-md-6">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required onchange="updateProfileImage()">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    @foreach ($jenis_kelamin as $j)
                                    <option value="{{ $j->id }}" {{ old('jenis_kelamin') == $j->jenis_kelamin ? 'selected' : '' }}>{{ $j->jenis_kelamin }}</option>                              
                                    @endforeach
                                </select>
                            </div>
                        </div>                
                    <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="" class="form-label">Agama</label>
                         <select class="form-control" id="agama" name="agama" required>
                          <option value="">Pilih Agama</option>
                          @foreach ($agama as $h)
                          <option value="{{ $h->id }}" {{ old('agama') == $h->agama ? 'selected' : '' }}>{{ $h->agama }}</option>
                          @endforeach
                      </select>
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="status_penduduk" class="form-label">Status Penduduk</label>
                      <select class="form-control" id="status_penduduk" name="status_penduduk" required>
                          <option value="">Pilih Status</option>
                          @foreach ($status_penduduk as $sp)
                          <option value="{{ $sp->id }}" {{ old('status_penduduk') == $sp->status_penduduk ? 'selected' : '' }}>{{ $sp->status_penduduk }}</option>
                          @endforeach
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
                           value="{{ old('akta_kelahiran') }}"
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
                             value="{{ old('tempat_lahir') }}"
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
                           <select class="form-control" id="pendidikan_sedang_ditempuh" name="pendidikan_sedang_ditempuh" required>
                            <option value="">Pilih Pendidikan Sedang</option>
                            @foreach ($pendidikan_sedang as $sp)
                            <option value="{{ $sp->id }}" {{ old('status_penduduk') == $sp->pendidikan_sedang ? 'selected' : '' }}>{{ $sp->pendidikan_sedang }}</option>
                            @endforeach
                        </select>
                         </div>
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="pekerjaan" class="form-label">Pekerjaan</label>
                         <div class="input-group has-validation">
                           <span class="input-group-text" id=""><i class="bi bi-briefcase"></i></span>
                            <select class="form-control" id="pekerjaan" name="pekerjaan" required>
                              <option value="">Pilih Pekerjaan</option>
                              @foreach ($pekerjaan as $sp)
                              <option value="{{ $sp->id }}" {{ old('pekerjaan') == $sp->nama_pekerjaan ? 'selected' : '' }}>{{ $sp->nama_pekerjaan }}</option>
                              @endforeach
                          </select>
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
                   <button class="btn btn-success btn-sm text-white " type="submit">Tambah</button>
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


 