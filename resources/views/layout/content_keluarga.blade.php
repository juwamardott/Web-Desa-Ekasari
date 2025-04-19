<main class="app-main">
     <div id="loading" style="display: none;">
          <div class="spinner"></div>
          <p>Sedang Memproses...</p>
      </div>
     <!--begin::App Content Header-->
     <div class="app-content-header">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 2-->
                <div class="small-box text-bg-warning">
                     <div class="inner">
                          <h3 id="total_keluarga">{{ $total }}</h3>
                          <p>Total Keluarga</p>
                     </div>
                     <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                          <path
                               d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                          </path>
                     </svg>
                     <a href="#"
                          class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                          More info <i class="bi bi-link-45deg"></i>
                     </a>
                </div>
                <!--end::Small Box Widget 2-->
           </div>
            </div>
             <div class="row">
                
                 <div class="col-sm-6">
                     <h5 class="mb-0">Data Keluarga</h5>
                 </div>
                 <div class="d-flex mt-3 align-items-center border-top border-info border-4" id="filter">
                    <!-- Container Filter (Kiri) -->
                    <div class="d-flex gap-2 my-2">
                        <input type="hidden" name="hubungan_keluarga" id="type" value="Kepala Keluarga">
                        <select id="statusFilter" class="form-select">
                            <option value="">-- Pilih Status --</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                        </select>
                
                        <select id="jenisKelaminFilter" class="form-select">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>

                        @if (Auth::user()->username == 'admin')
                        <select id="banjarFilter" class="form-select">
                            <option value="">-- Pilih Banjar --</option>
                            @foreach($banjar as $b)
                                <option value="{{ $b->banjar }}">{{ $b->banjar }}</option>
                            @endforeach
                        </select>
                        @endif
                        
                        <select id="umurFilter" class="form-select">
                            <option value="">-- Pilih Umur --</option>
                            @for ($i = 1; $i <= 100; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <select id="statusDasarFilter" class="form-select">
                            <option value="">-- Pilih Status Dasar --</option>
                            <option value="Hidup">Hidup</option>
                            <option value="Mati">Mati</option>
                            <option value="Pindah">Pindah</option>
                            <option value="Hilang">Hilang</option>
                            <option value="Pergi">Pergi</option>
                        </select>
                    </div>

                    
                </div>

                <div class="d-flex justify-between align-items-center">
                    <div class="">
                        <a id="export-button" href="#" class="btn btn-danger" target="_blank">Export Excel</a>
                        
                    </div>
                    <div class="ms-auto" style="width: 250px;">
                        <input type="text" id="searchInput" class="form-control" placeholder="Cari Penduduk...">
                    </div>
                    
                </div>
                
             </div>
         </div>
     </div>
     <!--end::App Content Header-->
 
     <!--begin::App Content-->
     <div class="app-content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12">
                     <!-- Begin responsive table -->
                     <div class="table-responsive">
                         <table class="table table-bordered  table-hover">
                             <thead class="table-light">
                                 <tr>
                                     <th>ACTION</th>
                                     <th>PHOTO</th>
                                     <th>NO KK</th>
                                     <th>NAMA</th>
                                     <th>NIK</th>
                                     <th>NAMA AYAH</th>
                                     <th>NAMA IBU</th>
                                     <th>ALAMAT</th>
                                     <th>BANJAR</th>
                                     <th>PENDIDIKAN</th>
                                     <th>UMUR</th>
                                     <th>PEKERJAAN</th>
                                     <th>KAWIN</th>
                                     <th>TGL PERISTIWA</th>
                                     <th>TGL TERDAFTAR</th>
                                 </tr>
                             </thead>
                             <tbody id="keluarga-table-body">
                              @foreach ($keluarga as $p)
                                   <tr>
                                        <td>
                                        <!-- Buttons for Actions -->
                                        <div class="btn-group dropstart">
                                             <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                  <small>Action</small>
                                             </button>
                                             <ul class="dropdown-menu">
                                                  <!-- Dropdown menu links -->
                                                  <li><a class="dropdown-item" href="/keluarga/detail/{{ $p->id }}">Detail Biodata</a></li>
                                                  <li><a class="dropdown-item" href="/keluarga/list/{{ $p->no_kk }}">List Keluarga</a></li>
                                                  <li><button class="dropdown-item btn-delete" data-id="{{ $p->id }}">Hapus Biodata</button></li>
                                             </ul>
                                             </div>
                                        </td>
                                        @if ($p->image)
                                        <td><img src="{{ asset('storage/'.$p->image) }}" alt="" width="50"></td>
                                        @elseif ($p->image == null && $p->jenis_kelamin == "Laki-laki")
                                        <td><img src="{{ asset('lte/dist/assets/img/user1.png') }}" alt="" width="50"></td>
                                        @else
                                        <td><img src="{{ asset('lte/dist/assets/img/user2.png') }}" alt="" width="50"></td>
                                        @endif
                                        <td class="text-info">{{ $p->no_kk }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td class="text-info">{{ $p->nik }}</td>
                                        <td>{{ $p->nama_ayah }}</td>
                                        <td>{{ $p->nama_ibu }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>{{ $p->banjar }}</td>
                                        <td>{{ $p->pendidikan }}</td>
                                        <td>{{ $p->umur }}</td>
                                        <td>{{ $p->pekerjaan }}</td>
                                        <td>{{ $p->kawin }}</td>
                                        <td>{{ $p->updated_at }}</td>
                                        <td>{{ $p->created_at }}</td>
                                   </tr>
                              @endforeach
                             </tbody>
                         </table>
                         <div class="d-flex justify-content-center pagination-container">
                            {{ $keluarga->links('pagination::bootstrap-5') }}
                        </div>                        
                     </div>
                     <!-- End responsive table -->
                 </div>
             </div>
         </div>
     </div>
     <!--end::App Content-->
 </main>
<style>
 @media (max-width: 767px) {
     .table th, .table td {
         padding: 0.8rem; /* Add padding for smaller screens */
         font-size: 12px; /* Slightly reduce font size */
     }

     #filter{
        display: block !important;
     }

     ul li a,
     ul li button{
          font-size: 12px;
     }

     td .btn-group small{
          font-size: 12px
     }
     #statusFilter,
     #jenisKelaminFilter,
     #banjarFilter,
     #searchInput,
     #umurFilter,
     #statusDasarFilter,
     #export-button{
        font-size: 12px;
     }
 }
 ul li a,
 ul li button{
          font-size: 12px;
     }

     td .btn-group small{
          font-size: 12px
     }

     .table th, .table td {
         padding: 0.8rem; /* Add padding for smaller screens */
         font-size: 12px;
     }
     #statusFilter,
     #jenisKelaminFilter,
     #banjarFilter,
     #searchInput,
     #umurFilter,
     #statusDasarFilter,
     #export-button{
        font-size: 12px;
     }

     thead tr {
    background-color: #20c997 !important; /* Warna teal */
    color: white !important ; /* Agar teks terlihat jelas */
}

</style>

<style>
     /* Center the loading div */
     #loading {
    position: fixed;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
}
 
     /* Small Spinner */
     .spinner {
         border: 4px solid #f3f3f3; /* Light gray */
         border-top: 4px solid #3498db; /* Blue */
         border-radius: 50%;
         width: 30px;
         height: 30px;
         animation: spin 1s linear infinite;
         margin: 0 auto;
     }
 
     /* Keyframes for rotation */
     @keyframes spin {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(360deg); }
     }
 
     /* Small Text */
     #loading p {
         font-size: 12px;
         color: #555;
         margin-top: 5px;
     }
 </style>

@if (Auth::user()->username == 'admin')

<script>
    $(document).ready(function () {
        function loadData(search, status, jenis_kelamin, banjar,umur,status_dasar ,page = 1) {
    
         $('#loading').show();
            $.ajax({
                url: "{{ route('keluarga.filter') }}?page=" + page,
                type: "GET",
                data: {search: search, status: status, jenis_kelamin: jenis_kelamin, banjar: banjar, umur:umur, status_dasar:status_dasar},
                success: function (data) {
                    $('#keluarga-table-body').html(data.table);
                    $('.pagination-container').html(data.pagination);
                    $('#total_keluarga').html(data.total_keluarga);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                },
                complete: function () {
                    // ✅ Sembunyikan loading spinner setelah data selesai dimuat
                    setTimeout(function() {
                        $('#loading').hide();
                    }, 500);
                }
            }); // ✅ Pastikan ada kurung tutup di sini
        }
    
        // ✅ Event saat user mengetik di search input
        $('#searchInput').on('keyup', function () {
            let search = $(this).val();
            let status = $('#statusFilter').val();
            let jenis_kelamin = $('#jenisKelaminFilter').val();
            let banjar = $('#banjarFilter').val();
            let umur = $('#umurFilter').val();
            let status_dasar = $('#statusDasarFilter').val();
            
            loadData(search, status, jenis_kelamin, banjar,umur, status_dasar ,1);
        });
    
        // ✅ Saat salah satu filter berubah, reload data
        $('#statusFilter, #jenisKelaminFilter, #banjarFilter, #umurFilter, #statusDasarFilter').on('change', function () {
            let search = $('#searchInput').val();
            let status = $('#statusFilter').val();
            let jenis_kelamin = $('#jenisKelaminFilter').val();
            let banjar = $('#banjarFilter').val();
            let umur = $('#umurFilter').val();
            let status_dasar = $('#statusDasarFilter').val();
            
            loadData(search, status, jenis_kelamin, banjar, umur, status_dasar , 1);
        });
    
        // ✅ AJAX Pagination
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            let search = $('#searchInput').val();
            let status = $('#statusFilter').val();
            let jenis_kelamin = $('#jenisKelaminFilter').val();
            let banjar = $('#banjarFilter').val();
            let umur = $('#umurFilter').val();
            let status_dasar = $('#statusDasarFilter').val();
            
            loadData(search, status, jenis_kelamin, banjar, umur, status_dasar,page);
        });
    });
    </script>

@else

<script>
    $(document).ready(function () {
        function loadData(search, status, jenis_kelamin, umur, status_dasar ,page = 1) {
            $('#loading').show();
            $.ajax({
                url: "{{ route('keluarga.filter') }}?page=" + page,
                type: "GET",
                data: { 
                    search: search, 
                    status: status, 
                    jenis_kelamin: jenis_kelamin, 
                    umur: umur,
                    status_dasar:status_dasar
                },
                success: function (data) {
                    $('#keluarga-table-body').html(data.table);
                    $('.pagination-container').html(data.pagination);
                    $('#total_keluarga').html(data.total_keluarga);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                },
                complete: function () {
                    setTimeout(function() {
                        $('#loading').hide();
                    }, 500);
                }
            });
        }

        // Event: Ketik di search
        $('#searchInput').on('keyup', function () {
            let search = $(this).val();
            let status = $('#statusFilter').val();
            let jenis_kelamin = $('#jenisKelaminFilter').val();
            let umur = $('#umurFilter').val();
            let status_dasar = $('#statusDasarFilter').val();
            loadData(search, status, jenis_kelamin, umur, status_dasar,  1);
        });

        // Event: Filter berubah
        $('#statusFilter, #jenisKelaminFilter, #umurFilter, #statusDasarFilter').on('change', function () {
            let search = $('#searchInput').val();
            let status = $('#statusFilter').val();
            let jenis_kelamin = $('#jenisKelaminFilter').val();
            let umur = $('#umurFilter').val();
            let status_dasar = $('#statusDasarFilter').val();
            
            loadData(search, status, jenis_kelamin, umur,status_dasar, 1);
        });

        // Event: Pagination
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            let search = $('#searchInput').val();
            let status = $('#statusFilter').val();
            let jenis_kelamin = $('#jenisKelaminFilter').val();
            let umur = $('#umurFilter').val();
            let status_dasar = $('#statusDasarFilter').val();
            
            loadData(search, status, jenis_kelamin, umur,status_dasar ,page);
        });
    });
</script>

{{-- KEluarga --}}



@endif


<script>
    $(document).ready(function() {
    // Ketika tombol hapus diklik
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();  // Mencegah aksi default

        // Ambil ID dari data yang ingin dihapus
        var id = $(this).data('id');
        
        // Konfirmasi menggunakan SweetAlert2
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data ini akan dihapus secara permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan permintaan AJAX DELETE untuk menghapus data
                $.ajax({
                    url: '/penduduk/delete/' + id,  // URL untuk penghapusan
                    type: 'DELETE',  // Menggunakan metode DELETE
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Menambahkan CSRF token
                    },
                    success: function(response) {
                        // Menampilkan alert sukses dan reload halaman
                        Swal.fire(
                            'Dihapus!',
                            'Data berhasil dihapus.',
                            'success'
                        );
                        location.reload();  // Reload halaman untuk memperbarui data
                    },
                    error: function(xhr, status, error) {
                        // Menampilkan alert gagal jika terjadi error
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menghapus data.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});


</script>



<script>
    function updateExportLink() {
        let search = $('#searchInput').val();
        let status = $('#statusFilter').val();
        let jenis_kelamin = $('#jenisKelaminFilter').val();
        let banjar = $('#banjarFilter').val();
        let umur = $('#umurFilter').val();

        let query = $.param({
            search: search,
            status: status,
            jenis_kelamin: jenis_kelamin,
            banjar: banjar,
            umur: umur
        });

        $('#export-button').data('href', "/export-keluarga?" + query); // Simpan link di data-href
    }

    $('#searchInput, #statusFilter, #jenisKelaminFilter, #banjarFilter, #umurFilter').on('change keyup', function () {
        updateExportLink();
    });

    updateExportLink();

    // Tambahkan event handler untuk konfirmasi SweetAlert
    $('#export-button').on('click', function (e) {
        e.preventDefault(); // Cegah link langsung jalan

        const exportUrl = $(this).data('href'); // Ambil URL dari data-href

        Swal.fire({
            title: 'Yakin ingin export data?',
            text: "File akan diunduh dalam format Excel.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, export sekarang!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.open(exportUrl, '_blank'); // Buka link export di tab baru
            }
        });
    });
</script>



