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
             <div class="card card-info card-outline mb-4">
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
                       <label for="no_kk" class="form-label small px-2 py-1 rounded-top">NO KK</label>
                       <div class="input-group has-validation input-group-sm">
                          <input
                          type="number"
                          class="form-control"
                          id="no_kk"
                          value="{{ old('no_kk') }}"
                          name="no_kk"
                          required
                          placeholder="Input NO KK..."
                        />
                       </div>
                     </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                       <label for="nik" class="form-label small px-2 py-1 rounded-top">NIK</label>
                       <div class="input-group has-validation input-group-sm">
                        <input
                         type="number"
                         class="form-control"
                         id="nik"
                         name="nik"
                         value="{{ old('nik') }}"
                         required
                         placeholder="Input NIK..."
                       />
                       </div>
                       
                     </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                       <label for="nama" class="form-label small px-2 py-1 rounded-top">Nama lengkap</label>
                       <div class="input-group has-validation input-group-sm">
                         <span class="input-group-text" id=""><i class="bi bi-person-circle"></i></span>
                         <input
                           type="text"
                           class="form-control"
                           id="nama"
                           value="{{ old('nama') }}"
                           name="nama"
                           aria-describedby=""
                           required
                           placeholder="Input Nama Lengkap..."
                         />
                       </div>
                     </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="anak_ke" class="form-label small px-2 py-1 rounded-top">Anak Ke</label>
                      <div class="input-group has-validation input-group-sm">
                        <span class="input-group-text" id=""><i class="bi bi-person-standing-dress"></i></span>
                        <input
                          type="number"
                          class="form-control"
                          id="anak_ke"
                          name="anak_ke"
                          value="{{ old('anak_ke') }}"
                          aria-describedby=""
                          required
                          placeholder="Input Anak Ke..."
                        />
                      </div>
                    </div>
                  <!--end::Col-->
                  <!--begin::Col-->
                  <div class="col-md-6">
                    <label for="no_telepon" class="form-label small px-2 py-1 rounded-top">NO Telepon</label>
                    <div class="input-group has-validation input-group-sm">
                      <span class="input-group-text" id="">
                        <i class="bi bi-phone-vibrate me-2"></i>
                      </span>
                      <input
                        type="number"
                        class="form-control"
                        id="no_telepon"
                        name="no_telepon"
                        value="{{ old('no_telepon') }}"
                        aria-describedby=""
                        required
                        placeholder="Input No Telepon..."
                      />
                    </div>
                  </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6">
                  <label for="email" class="form-label small px-2 py-1 rounded-top">Email</label>
                  <div class="input-group has-validation input-group-sm">
                    <span class="input-group-text" id=""><i class="bi bi-inbox"></i></span>
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      name="email"
                      value="{{ old('email') }}"
                      aria-describedby=""
                      required
                      placeholder="Input Email..."
                    />
                  </div>
                </div>
              
              <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="nama_ayah" class="form-label small px-2 py-1 rounded-top">Nama Ayah</label>
                         <div class="input-group has-validation input-group-sm">
                           <span class="input-group-text" id=""><i class="bi bi-person-standing"></i></span>
                           <input
                             type="text"
                             class="form-control"
                             id="nama_ayah"
                             name="nama_ayah"
                             value="{{ old('nama_ayah') }}"
                             aria-describedby=""
                             required
                             placeholder="Input Nama Ayah Kandung..."
                           />
                         </div>
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="nama_ibu" class="form-label small px-2 py-1 rounded-top">Nama Ibu</label>
                         <div class="input-group has-validation input-group-sm">
                           <span class="input-group-text" id=""><i class="bi bi-person-standing-dress"></i></span>
                           <input
                             type="text"
                             class="form-control"
                             id="nama_ibu"
                             name="nama_ibu"
                             value="{{ old('nama_ibu') }}"
                             aria-describedby=""
                             required
                             placeholder="Input Nama Ibu Kandung..."
                           />
                         </div>
                       </div>
                     <!--end::Col-->
                     
                     <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="" class="form-label small px-2 py-1 rounded-top">NIK Ayah</label>
                         <div class="input-group has-validation input-group-sm">
                          <input
                           type="number"
                           class="form-control"
                           id="nik_ayah"
                           name="nik_ayah"
                           value="{{ old('nik_ayah') }}"
                           required
                           placeholder="Input NIK Ayah..."
                         />
                         </div>
                         
                       </div>
                     <!--end::Col-->
                      <!--begin::Col-->
                      <div class="col-md-6">
                         <label for="" class="form-label small px-2 py-1 rounded-top">NIK Ibu</label>
                         <div class="input-group has-validation input-group-sm">
                          <input
                           type="number"
                           class="form-control"
                           id="nik_ibu"
                           name="nik_ibu"
                           value="{{ old('nik_ibu') }}"
                           required
                           placeholder="Input NIK Ibu..."
                         />
                         </div>
                         
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                    <div class="col-md-6">
                         <label for="alamat" class="form-label small px-2 py-1 rounded-top">Alamat</label>
                         <div class="input-group has-validation input-group-sm">
                         <span class="input-group-text text-wrap"><i class="bi bi-geo-fill"></i></span>
                         <textarea
                              class="form-control"
                              id="alamat"
                              name="alamat"
                              rows="2"
                              required
                              placeholder="Input Alamat..."
                         >{{ old('alamat') }}</textarea>
                         </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                      <label for="warga_negara" class="form-label small px-2 py-1 rounded-top">Kewarganegaraan</label>
                      <div class="input-group has-validation input-group-sm">
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
                        <label for="negara_asal" class="form-label small px-2 py-1 rounded-top">Negara Asal</label>
                        <div class="input-group input-group-sm has-validation input-group-sm">
                        <span class="input-group-text text-wrap"><i class="bi bi-geo-fill"></i></span>
                        <input
                          type="text"
                          class="form-control"
                          id="negara_asal"
                          name="negara_asal"
                          value="{{ old('negara_asal') }}"
                          aria-describedby=""
                          required
                        />
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                         <label for="banjar" class="form-label small px-2 py-1 rounded-top">Banjar</label>
                         <div class="input-group has-validation input-group-sm">
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
                         <label for="pendidikan" class="form-label small px-2 py-1 rounded-top">Pendidikan</label>
                         <div class="input-group has-validation input-group-sm">
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
                      <label for="tgl_lahir" class="form-label small px-2 py-1 rounded-top">Tanggal Lahir</label>
                      <div class="input-group has-validation input-group-sm">
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
                         <label for="" class="form-label small px-2 py-1 rounded-top">Umur</label>
                         <div class="input-group has-validation input-group-sm">
                          <input
                           type="number"
                           class="form-control"
                           id="umur"
                           name="umur"
                           value="{{ old('umur') }}"
                           readonly
                         />
                         </div>
                         
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="kawin" class="form-label small px-2 py-1 rounded-top">Status Kawin</label>
                      <div class="input-group has-validation input-group-sm">
                        <select class="form-control" id="kawin" name="kawin" required>
                          <option value="">Pilih Status Perkawinan</option>
                          @foreach ($kawin as $k)
                            <option value="{{ $k->id }}" {{ old('kawin') == $k->status ? 'selected' : '' }}>{{ $k->status }}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>                  
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                      <label for="status_dasar" class="form-label small px-2 py-1 rounded-top">Status Dasar</label>
                      <div class="input-group has-validation input-group-sm">
                        <select class="form-control" id="status_dasar" name="status_dasar" required>
                          <option value="">Pilih Status Dasar</option>
                          @foreach ($status_dasar as $sd)
                            <option value="{{ $sd->id }}" {{ old('status_dasar') == $sd->status_dasar ? 'selected' : '' }}>{{ $sd->status_dasar }}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>                  
                    <!--end::Col-->
                         <!--begin::Col-->
                         <div class="col-md-6">
                          <label for="hubungan_keluarga" class="form-label small px-2 py-1 rounded-top">Hubungan Keluarga</label>
                          <div class="input-group has-validation input-group-sm">
                            <select class="form-control" id="hubungan_keluarga" name="hubungan_keluarga" required>
                              <option value="">Pilih Hubungan Keluarga</option>
                              @foreach ($hubungan_keluarga as $h)
                              <option value="{{ $h->id }}" {{ old('hubungan_keluarga') == $h->hubungan_keluarga ? 'selected' : '' }}>{{ $h->hubungan_keluarga }}</option>
                              @endforeach
                          </select>
                          </div>
                      </div>                      
                    <!--end::Col-->
                   <!--begin::Col-->
                          <div class="col-md-6">
                            <label for="jenis_kelamin" class="form-label small px-2 py-1 rounded-top">Jenis Kelamin</label>
                            <div class="input-group has-validation input-group-sm">
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
                         <label for="" class="form-label small px-2 py-1 rounded-top">Agama</label>
                         <div class="input-group has-validation input-group-sm">
                          <select class="form-control" id="agama" name="agama" required>
                            <option value="">Pilih Agama</option>
                            @foreach ($agama as $h)
                            <option value="{{ $h->id }}" {{ old('agama') == $h->agama ? 'selected' : '' }}>{{ $h->agama }}</option>
                            @endforeach
                        </select>
                         </div>
                       </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="status_penduduk" class="form-label small px-2 py-1 rounded-top">Status Penduduk</label>
                      <div class="input-group has-validation input-group-sm">
                        <select class="form-control" id="status_penduduk" name="status_penduduk" required>
                          <option value="">Pilih Status</option>
                          @foreach ($status_penduduk as $sp)
                          <option value="{{ $sp->id }}" {{ old('status_penduduk') == $sp->status_penduduk ? 'selected' : '' }}>{{ $sp->status_penduduk }}</option>
                          @endforeach
                      </select>
                      </div>
                  </div>
                    <!--end::Col-->
                       <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="" class="form-label small px-2 py-1 rounded-top">Akta kelahiran</label>
                         <div class="input-group has-validation input-group-sm">
                          <input
                           type="number"
                           class="form-control"
                           id="akta_kelahiran"
                           name="akta_kelahiran"
                           value="{{ old('akta_kelahiran') }}"
                           required
                         />
                         </div>
                         
                       </div>
                       <!--end::Col-->
                        <!--begin::Col-->
                     <div class="col-md-6">
                         <label for="tempat_lahir" class="form-label small px-2 py-1 rounded-top">Tempat Lahir</label>
                         <div class="input-group has-validation input-group-sm">
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
                         <label for="pendidikan_sedang_ditempuh" class="form-label small px-2 py-1 rounded-top">Pendidikan saat ini</label>
                         <div class="input-group has-validation input-group-sm">
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
                         <label for="pekerjaan" class="form-label small px-2 py-1 rounded-top">Pekerjaan</label>
                         <div class="input-group has-validation input-group-sm">
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
                        <label for="image" class="form-label small px-2 py-1 rounded-top">Upload Image</label>
                        <div class="input-group has-validation input-group-sm">
                          <input class="form-control" type="file" id="image" name="image">
                        </div>
                        
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


 