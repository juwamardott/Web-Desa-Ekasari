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
             <div class="card card-info card-outline mb-2">
               <!--begin::Header-->
               <div class="card-header"><div class="card-title">Photo</div></div>
               <!--end::Header-->
               <!--begin::Form-->
                 <!--begin::Body-->
                 <div class="card-body">
                   <div class="mb-3">
                    @if ($penduduk->image)
                      <td><img src="{{ asset('storage/'.$penduduk->image) }}" alt="" width="200" class="rounded mx-auto d-block"></td>
                    @elseif ($penduduk->image == null && $penduduk->jenis_kelamin_id == 1)
                      <td><img src="{{ asset('lte/dist/assets/img/user1.png') }}" alt="" width="200" class="rounded mx-auto d-block"></td>
                    @else
                      <td><img src="{{ asset('lte/dist/assets/img/user2.png') }}" alt="" width="200" class="rounded mx-auto d-block"></td>
                    @endif
                    
                 </div>
      
                 <!--end::Body-->
               <!--end::Form-->
               
               </div>

  
               </div>

               <div class="mt-1 mb-3">
                <div class="row">
                  <div class="col-md-6">
                    <div class="alert alert-secondary p-2 small mb-1">
                      <i class="bi bi-calendar-plus me-2"></i>
                      Terdaftar: <br><strong>{{ \Carbon\Carbon::parse($penduduk->created_at)->translatedFormat('d F Y H:i') }}</strong>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="alert alert-secondary p-2 small mb-1">
                      <i class="bi bi-clock-history me-2"></i>
                      Terupdate : <br> <strong>{{ \Carbon\Carbon::parse($penduduk->updated_at)->translatedFormat('d F Y H:i') }}</strong>
                    </div>
                  </div>
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
                      <label for="no_kk" class="form-label small px-2 py-1 rounded-top">NO KK</label>
                      <div class="input-group has-validation input-group-sm">
                        <input
                          type="number"
                          class="form-control @error('no_kk') is-invalid @enderror"
                          id="no_kk"
                          value="{{ $penduduk->no_kk }}"
                          name="no_kk"
                          placeholder="Input NO KK..."
                        />
                        @error('no_kk')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="nik" class="form-label small px-2 py-1 rounded-top">NIK</label>
                      <div class="input-group has-validation input-group-sm">
                       <input
                        type="number"
                        class="form-control @error('nik') is-invalid @enderror"
                        id="nik"
                        name="nik"
                        value="{{ $penduduk->nik }}"
                      />
                      @error('nik')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
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
                          class="form-control @error('nama') is-invalid @enderror"
                          id="nama"
                          value="{{ $penduduk->nama }}"
                          name="nama"
                          aria-describedby=""
                        />
                        @error('nama')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                     <!--end::Col-->
                     <div class="col-md-6">
                      <label for="anak_ke" class="form-label small px-2 py-1 rounded-top">Anak Ke</label>
                      <div class="input-group has-validation input-group-sm">
                        <span class="input-group-text" id=""><i class="bi bi-person-standing-dress"></i></span>
                        <input
                          type="number"
                          class="form-control @error('anak_ke') is-invalid @enderror"
                          id="anak_ke"
                          name="anak_ke"
                          value="{{ $penduduk->anak_ke }}"
                          aria-describedby=""
                        />
                        @error('anak_ke')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-6">
                      <label for="tempat_lahir" class="form-label small px-2 py-1 rounded-top">Tempat Lahir</label>
                      <div class="input-group has-validation input-group-sm">
                        <span class="input-group-text" id=""><i class="bi bi-house-heart"></i></span>
                        <input
                          type="text"
                          class="form-control @error('tempat_lahir') is-invalid @enderror"
                          id="tempat_lahir"
                          name="tempat_lahir"
                          value="{{ $penduduk->tempat_lahir }}"
                          aria-describedby=""
                        />
                        @error('tempat_lahir')
                           <div class="invalid-feedback">
                               {{ $message }}
                           </div>
                       @enderror
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
                        class="form-control @error('no_telepon') is-invalid @enderror"
                        id="no_telepon"
                        name="no_telepon"
                        value="{{ $penduduk->no_telepon }}"
                        aria-describedby=""
                      />
                      @error('no_telepon')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
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
                      class="form-control @error('email') is-invalid @enderror"
                      id="email"
                      name="email"
                      value="{{ $penduduk->email }}"
                      aria-describedby=""
                    />
                    @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
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
                      class="form-control @error('nama_ayah') is-invalid @enderror"
                      id="nama_ayah"
                      name="nama_ayah"
                      value="{{ $penduduk->nama_ayah }}"
                      aria-describedby=""
                      
                      placeholder="Input Nama Ayah Kandung..."
                    />
                    @error('nama_ayah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
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
                      <label for="nama_ibu" class="form-label small px-2 py-1 rounded-top">Nama Ibu</label>
                      <div class="input-group has-validation input-group-sm">
                        <span class="input-group-text" id=""><i class="bi bi-person-standing-dress"></i></span>
                        <input
                          type="text"
                          class="form-control @error('nama_ibu') is-invalid @enderror"
                          id="nama_ibu"
                          name="nama_ibu"
                          value="{{ $penduduk->nama_ibu }}"
                          aria-describedby=""
                        />
                        @error('nama_ibu')
                           <div class="invalid-feedback">
                             {{ $message }}
                           </div>
                       @enderror
                      </div>
                    </div>
                  <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="nik_ayah" class="form-label small px-2 py-1 rounded-top">NIK Ayah</label>
                      <div class="input-group has-validation input-group-sm">
                       <input
                        type="number"
                        class="form-control @error('nik_ayah') is-invalid @enderror"
                        id="nik_ayah"
                        name="nik_ayah"
                        value="{{ $penduduk->nik_ayah }}"
                      />
                      @error('nik_ayah')
                           <div class="invalid-feedback">
                             {{ $message }}
                           </div>
                       @enderror
                      </div>
                      
                    </div>
                  <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="nik_ibu" class="form-label small px-2 py-1 rounded-top">NIK Ibu</label>
                      <div class="input-group has-validation input-group-sm">
                       <input
                        type="number"
                        class="form-control @error('nik_ibu') is-invalid @enderror"
                        id="nik_ibu"
                        name="nik_ibu"
                        value="{{ $penduduk->nik_ibu }}"
                      />
                      @error('nik_ibu')
                           <div class="invalid-feedback">
                             {{ $message }}
                           </div>
                       @enderror
                      </div>
                      
                    </div>
                  <!--end::Col-->
                     <!--begin::Col-->
                    <div class="col-md-6">
                      <label for="alamat" class="form-label small px-2 py-1 rounded-top">Alamat</label>
                      <div class="input-group has-validation input-group-sm">
                      <span class="input-group-text text-wrap"><i class="bi bi-geo-fill"></i></span>
                      <textarea
                           class="form-control @error('alamat') is-invalid @enderror"
                           id="alamat"
                           name="alamat"
                           rows="2"
                           placeholder="Input Alamat..."
                      >{{ $penduduk->alamat }}</textarea>
                      @error('alamat')
                           <div class="invalid-feedback">
                             {{ $message }}
                           </div>
                       @enderror
                      </div>
                 </div>
                 <!--end::Col-->
                  <!--begin::Col-->
                  <div class="col-md-6">
                    <label for="akta_kelahiran" class="form-label small px-2 py-1 rounded-top">Akta kelahiran</label>
                    <div class="input-group has-validation input-group-sm">
                     <input
                      type="text"
                      class="form-control @error('akta_kelahiran') is-invalid @enderror"
                      id="akta_kelahiran"
                      name="akta_kelahiran"
                      value="{{ $penduduk->akta_kelahiran }}"
                    />
                    @error('akta_kelahiran')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                  </div>
                  <!--end::Col-->
                   <!--begin::Col-->
                   <div class="col-md-6">
                    <label for="golongan_darah" class="form-label small px-2 py-1 rounded-top">Golongan Darah</label>
                    <div class="input-group has-validation input-group-sm">
                     <input
                      type="text"
                      class="form-control @error('golongan_darah') is-invalid @enderror"
                      id="golongan_darah"
                      name="golongan_darah"
                      value="{{ $penduduk->golongan_darah }}"
                    />
                      @error('golongan_darah')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                  </div>
                  <!--end::Col-->
                  <!--begin::Col-->
                  <div class="col-md-6">
                    <label for="warga_negara_id" class="form-label small px-2 py-1 rounded-top">Kewarganegaraan</label>
                    <div class="input-group has-validation input-group-sm">
                      <span class="input-group-text" id=""><i class="bi bi-flag-fill"></i></span>
                      <select class="form-control @error('warga_negara_id') is-invalid @enderror" id="warga_negara_id" name="warga_negara_id" required>
                       <option value="">Pilih Kewarganegaraan</option>
                       @foreach($warga_negara as $w)
                           <option value="{{ $w->id }}" {{ isset($penduduk->warga_negara_id) && $penduduk->warga_negara_id == $w->id ? 'selected' : '' }}>
                               {{ $w->warga_negara }}
                           </option>
                       @endforeach
                     </select>
                     @error('warga_negara_id')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                  </div>
                 <!--end::Col-->
                 <!--begin::Col-->
                    <div class="col-md-6" id="negaraAsal" style="display: none">
                      <label for="negara_asal" class="form-label small px-2 py-1 rounded-top">Negara Asal</label>
                      <div class="input-group input-group-sm has-validation input-group-sm">
                      <span class="input-group-text text-wrap"><i class="bi bi-geo-fill"></i></span>
                      <input
                        type="text"
                        class="form-control @error('negara_asal') is-invalid @enderror"
                        id="negara_asal"
                        name="negara_asal"
                        value="{{ $penduduk->negara_asal }}"
                        aria-describedby=""
                      />
                      @error('negara_asal')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                  </div>
              <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                         <label for="banjar_id" class="form-label">Banjar</label>
                         <div class="input-group has-validation">
                         <span class="input-group-text"><i class="bi bi-house-fill"></i></span>
                         <select class="form-control" id="banjar_id" name="banjar_id" required>
                              <option value="">Pilih Banjar</option>
                              @foreach($banjar as $b)
                                   <option value="{{ $b->id }}" {{ isset($penduduk->banjar_id) && $penduduk->banjar_id == $b->id ? 'selected' : '' }}>
                                        {{ $b->banjar }}
                                   </option>
                              @endforeach
                         </select>
                         </div>
                    </div>
                    <!--end::Col-->
                       <!--begin::Col-->
                       <div class="col-md-6">
                        <label for="pendidikan_id" class="form-label small px-2 py-1 rounded-top">Pendidikan </label>
                        <div class="input-group has-validation input-group-sm">
                          <span class="input-group-text" id=""><i class="bi bi-book-half"></i></span>
                          <select class="form-control @error('pendidikan_id') is-invalid @enderror" id="pendidikan_id" name="pendidikan_id" required>
                           <option value="">Pilih Pendidikan</option>
                           @foreach($pendidikan as $b)
                               <option value="{{ $b->id }}" {{ isset($penduduk->pendidikan_id) && $penduduk->pendidikan_id == $b->id ? 'selected' : '' }}>
                                   {{ $b->pendidikan }}
                               </option>
                           @endforeach
                         </select>
                           @error('pendidikan_id')
                               <div class="invalid-feedback">
                                 {{ $message }}
                               </div>
                             @enderror
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
                          class="form-control @error('tgl_lahir') is-invalid @enderror"
                          id="tgl_lahir"
                          name="tgl_lahir"
                          value="{{ $penduduk->tgl_lahir }}"
                          aria-describedby=""
                        />
                        @error('tgl_lahir')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                      </div>
                    </div>
                  <!--end::Col-->
                   <!--begin::Col-->
                    <div class="col-md-6">
                      <label for="kawin_id" class="form-label small px-2 py-1 rounded-top">Status Kawin</label>
                      <div class="input-group has-validation input-group-sm">
                        <select class="form-control @error('kawin_id') is-invalid @enderror" id="kawin_id" name="kawin_id" required>
                          <option value="">Pilih Status Perkawinan</option>
                          @foreach ($kawin as $k)
                            <option value="{{ $k->id }}" {{ isset($penduduk->kawin_id) && $penduduk->kawin_id == $k->id ? 'selected' : '' }}>{{ $k->status }}</option>
                          @endforeach
                      </select>
                        @error('kawin_id')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>                  
                  <!--end::Col-->
                  <!--begin::Col-->
                  <div class="col-md-6" id="div_tgl_perkawinan" style="display: none">
                    <label for="tgl_perkawinan" class="form-label small px-2 py-1 rounded-top">Tanggal Perkawinan</label>
                    <div class="input-group has-validation input-group-sm">
                      <span class="input-group-text" id=""><i class="bi bi-calendar-event"></i></span>
                      <input
                        type="date"
                        class="form-control @error('tgl_perkawinan') is-invalid @enderror"
                        id="tgl_perkawinan"
                        name="tgl_perkawinan"
                        value="{{ $penduduk->tgl_perkawinan }}"
                        aria-describedby=""
                      />
                      @error('tgl_perkawinan')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                        @enderror
                    </div>
                  </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 "id="div_tgl_perceraian" style="display: none;">
                  <label for="tgl_perceraian" class="form-label small px-2 py-1 rounded-top">Tanggal Perceraian</label>
                  <div class="input-group has-validation input-group-sm">
                    <span class="input-group-text" id=""><i class="bi bi-calendar-event"></i></span>
                    <input
                      type="date"
                      class="form-control @error('tgl_perceraian') is-invalid @enderror"
                      id="tgl_perceraian"
                      name="tgl_perceraian"
                      value="{{ $penduduk->tgl_perceraian }}"
                      aria-describedby=""
                      required
                    />
                    @error('tgl_perceraian')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                      @enderror
                  </div>
                </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-md-6 "id="div_akta_nikah" style="display: none;">
                <label for="akta_nikah" class="form-label small px-2 py-1 rounded-top">Akta Nikah</label>
                <div class="input-group has-validation input-group-sm">
                  <input
                    type="text"
                    class="form-control @error('akta_nikah') is-invalid @enderror"
                    id="akta_nikah"
                    name="akta_nikah"
                    value="{{ $penduduk->akta_nikah }}"
                    aria-describedby=""
                    required
                  />
                  @error('akta_nikah')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                    @enderror
                </div>
              </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 "id="div_akta_perceraian" style="display: none;">
              <label for="akta_perceraian" class="form-label small px-2 py-1 rounded-top">Akta Perceraian</label>
              <div class="input-group has-validation input-group-sm">
                <input
                  type="text"
                  class="form-control @error('akta_perceraian') is-invalid @enderror"
                  id="akta_perceraian"
                  name="akta_perceraian"
                  value="{{ $penduduk->akta_perceraian }}"
                  aria-describedby=""
                  required
                  placeholder="Input Akta Perceraian..."
                />
                @error('akta_perceraian')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                  @enderror
              </div>
            </div>
          <!--end::Col-->
            <!--begin::Col-->
                  <div class="col-md-6">
                    <label for="status_dasar_id" class="form-label small px-2 py-1 rounded-top">Status Dasar</label>
                    <div class="input-group has-validation input-group-sm">
                      <select class="form-control @error('status_dasar_id') is-invalid @enderror" id="status_dasar_id" name="status_dasar_id" required>
                        <option value="">Pilih Status Dasar</option>
                        @foreach ($status_dasar as $sd)
                          <option value="{{ $sd->id }}" {{ isset($penduduk->status_dasar_id) && $penduduk->status_dasar_id == $sd->id ? 'selected' : '' }}>{{ $sd->status_dasar }}</option>
                        @endforeach
                    </select>
                    @error('status_dasar_id')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                      @enderror
                    </div>
                  </div>                  
                  <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                          <label for="hubungan_keluarga_id" class="form-label small px-2 py-1 rounded-top">Hubungan Keluarga</label>
                          <div class="input-group has-validation input-group-sm">
                            <select class="form-control @error('hubungan_keluarga_id') is-invalid @enderror" id="hubungan_keluarga_id" name="hubungan_keluarga_id" required>
                              <option value="">Pilih Hubungan Keluarga</option>
                              @foreach ($hubungan_keluarga as $h)
                              <option value="{{ $h->id }}" {{ isset($penduduk->hubungan_keluarga_id) && $penduduk->hubungan_keluarga_id == $h->id ? 'selected' : '' }}>{{ $h->hubungan_keluarga }}</option>
                              @endforeach
                          </select>
                          @error('hubungan_keluarga_id')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                        @enderror
                          </div>
                      </div>                      
                    <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="jenis_kelamin_id" class="form-label small px-2 py-1 rounded-top">Jenis Kelamin</label>
                      <div class="input-group has-validation input-group-sm">
                          <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                          <select class="form-control @error('jenis_kelamin_id') is-invalid @enderror" id="jenis_kelamin_id" name="jenis_kelamin_id" required onchange="updateProfileImage()">
                              <option value="">Pilih Jenis Kelamin</option>
                              @foreach ($jenis_kelamin as $j)
                              <option value="{{ $j->id }}" {{ isset($penduduk->jenis_kelamin_id) && $penduduk->jenis_kelamin_id == $j->id ? 'selected' : '' }}>{{ $j->jenis_kelamin }}</option>                              
                              @endforeach
                          </select>
                          @error('jenis_kelamin_id')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                          @enderror
                      </div>
                  </div>                
              <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                      <label for="agama_id" class="form-label small px-2 py-1 rounded-top">Agama</label>
                      <div class="input-group has-validation input-group-sm">
                       <select class="form-control @error('agama_id') is-invalid @enderror" id="agama_id" name="agama_id" required>
                         <option value="">Pilih Agama</option>
                         @foreach ($agama as $h)
                         <option value="{{ $h->id }}" {{ isset($penduduk->agama_id) && $penduduk->agama_id == $h->id ? 'selected' : '' }}>{{ $h->agama }}</option>
                         @endforeach
                     </select>
                       @error('agama_id')
                           <div class="invalid-feedback">
                               {{ $message }}
                           </div>
                       @enderror
                      </div>
                    </div>
                  <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="status_penduduk_id" class="form-label small px-2 py-1 rounded-top">Status Penduduk</label>
                      <div class="input-group has-validation input-group-sm">
                        <select class="form-control @error('status_penduduk_id') is-invalid @enderror" id="status_penduduk_id" name="status_penduduk_id" required>
                          <option value="">Pilih Status</option>
                          @foreach ($status_penduduk as $sp)
                          <option value="{{ $sp->id }}" {{ isset($penduduk->status_penduduk_id) && $penduduk->status_penduduk_id == $sp->id ? 'selected' : '' }}>
                            {{ $sp->status_penduduk }}
                        </option>
                        
                          @endforeach
                      </select>
                      @error('status_penduduk_id')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
                  </div>
                    <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="pendidikan_sedang_id" class="form-label small px-2 py-1 rounded-top">Pendidikan saat ini</label>
                      <div class="input-group has-validation input-group-sm">
                        <span class="input-group-text" id=""><i class="bi bi-book"></i></span>
                        <select class="form-control @error('pendidikan_sedang_id') is-invalid @enderror" id="pendidikan_sedang_id" name="pendidikan_sedang_id" required>
                         <option value="">Pilih Pendidikan Sedang</option>
                         @foreach ($pendidikan_sedang as $sp)
                         <option value="{{ $sp->id }}" {{ isset($penduduk->pendidikan_sedang_id) && $penduduk->status_penduduk_id == $sp->id ? 'selected' : '' }}>{{ $sp->pendidikan_sedang }}</option>
                         @endforeach
                     </select>
                     @error('pendidikan_sedang_id')
                           <div class="invalid-feedback">
                               {{ $message }}
                           </div>
                       @enderror
                      </div>
                    </div>
                  <!--end::Col-->
                      <!--begin::Col-->
                     <div class="col-md-6">
                      <label for="pekerjaan_id" class="form-label small px-2 py-1 rounded-top">Pekerjaan</label>
                      <div class="input-group has-validation input-group-sm">
                        <span class="input-group-text" id=""><i class="bi bi-briefcase"></i></span>
                         <select class="form-control @error('pekerjaan_id') is-invalid @enderror" id="pekerjaan_id" name="pekerjaan_id" required>
                           <option value="">Pilih Pekerjaan</option>
                           @foreach ($pekerjaan as $sp)
                           <option value="{{ $sp->id }}" {{ isset($penduduk->pekerjaan_id) && $penduduk->pekerjaan_id == $sp->id ? 'selected' : '' }}>{{ $sp->nama_pekerjaan }}</option>
                           @endforeach
                       </select>
                       @error('pekerjaan_id')
                           <div class="invalid-feedback">
                               {{ $message }}
                           </div>
                       @enderror
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
  document.addEventListener("DOMContentLoaded", function () {
    const kawinSelect = document.getElementById("kawin_id");
    const tglPerkawinanDiv = document.getElementById("div_tgl_perkawinan");
    const perceraianDiv = document.getElementById("div_tgl_perceraian");
    const perceraianInput = document.getElementById("tgl_perceraian");
    const aktaPernikahan = document.getElementById("div_akta_nikah");
    const aktaPerceraian = document.getElementById("div_akta_perceraian");

    function togglePerceraianField() {
      const selectedValue = kawinSelect.value;
      if (selectedValue === "3") {
        perceraianDiv.style.display = "block";
        tglPerkawinanDiv.style.display = "block";
        aktaPernikahan.style.display = "block";
        aktaPerceraian.style.display = "block";
        perceraianInput.required = true;
      }else if(selectedValue === "4"){
        perceraianDiv.style.display = "block";
        tglPerkawinanDiv.style.display = "block";
        aktaPernikahan.style.display = "block";
        aktaPerceraian.style.display = "block";
        perceraianInput.required = true;
      }else if(selectedValue === "2"){
        tglPerkawinanDiv.style.display = "none";
        perceraianDiv.style.display = "none";
        aktaPernikahan.style.display = "none";
        aktaPerceraian.style.display = "none";
      }else if(selectedValue === "1"){
        tglPerkawinanDiv.style.display = "block";
        aktaPernikahan.style.display = "block";
        perceraianDiv.style.display = "none";
        aktaPerceraian.style.display = "none";
      }else {
        perceraianDiv.style.display = "none";
        perceraianInput.value = "";
        aktaPernikahan.style.display = "none ";
        aktaPerceraian.style.display = "none";
        perceraianInput.required = false;
      }
    }

    kawinSelect.addEventListener("change", togglePerceraianField);
    togglePerceraianField(); // Initial call on load
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const wargaSelect = document.getElementById("warga_negara_id");
    const negaraAsalDiv = document.getElementById("negaraAsal");
    const negaraAsalInput = document.getElementById("negara_asal");
    function toggleNegaraAsal() {
      if (wargaSelect.value === "2") {
        negaraAsalDiv.style.display = "block";
        negaraAsalInput.required = true;
      } else {
        negaraAsalDiv.style.display = "none";
        negaraAsalInput.value = "";
        negaraAsalInput.required = false;
      }
    }
    wargaSelect.addEventListener("change", toggleNegaraAsal);
    toggleNegaraAsal(); // Initial call in case there's old selected value
  });
</script>