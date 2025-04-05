<main class="app-main">
     <!-- Loading Spinner -->
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
                           <h3 id="total_banjar">{{ $total_banjar }}</h3>
                           <p>Total Banjar</p>
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
                 
                  <div class="col-sm-12 d-flex align-items-center">
                      <h5 class="mb-0">Data Banjar</h5>
                      <div class="ms-auto block">
                         <a href="/banjar/tambah" class="btn btn-primary btn-sm">Tambah Data</a>
                     </div>
                  </div>
                  
                  <div class="d-flex mt-3 align-items-center border-top border-info border-4" id="filter">                 
                     <!-- Input Search (Kanan) -->
                     <div class="ms-auto mt-2" style="width: 250px;">
                         <input type="text" id="searchInput" class="form-control" placeholder="Cari Banjar...">
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
                          <table class="table table-bordered  table-hover ">
                              <thead class="">
                                  <tr>
                                      <th>ACTIONS</th>
                                      <th>ID</th>
                                      <th>Banjar</th>
                                      <th>TGL PERISTIWA</th>
                                      <th>TGL TERDAFTAR</th>
                                  </tr>
                              </thead>
                              <tbody id="banjar-table-body">
                               @foreach ($banjar as $b)
                                    <tr>
                                         <td>
                                         <!-- Buttons for Actions -->
                                             <div class="btn-group dropstart">
                                                 <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                                     <small>Action</small>
                                                 </button>
                                                 <ul class="dropdown-menu">
                                                     <!-- Dropdown menu links -->
                                                     <li><a class="dropdown-item" href="/banjar/edit/{{ $b->id }}">Update Biodata</a></li>
                                                     <li>
                                                       <button class="dropdown-item btn-delete" data-id="{{ $b->id }}">Hapus Banjar</button>
                                                     </li>
                                                 </ul>
                                              </div>
                                         </td>
                                         <td>{{ $b->id }}</td>
                                         <td>{{ $b->banjar }}</td>
                                         <td>{{ $b->updated_at }}</td>
                                         <td>{{ $b->created_at }}</td>
                                    </tr>
                               @endforeach
                              </tbody>
                          </table>
                          <div class="d-flex justify-content-center pagination-container-banjar">
                             {{ $banjar->links('pagination::bootstrap-5') }}
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
      #searchInput{
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
      #searchInput{
         font-size: 12px;
      }
 
      thead tr {
     background-color: #20c997 !important; /* Warna teal */
     color: white !important ; /* Agar teks terlihat jelas */
 }
 
 
 </style>
 
 <style>
     #loading {
    position: fixed;
    top: 50%;
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
 

 <script>
     $(document).ready(function () {
         function loadData(search,page = 1) {
     
          $('#loading').show();
             $.ajax({
                 url: "{{ route('banjar.filter') }}?page=" + page,
                 type: "GET",
                 data: { search: search},
                 success: function (data) {
                     $('#banjar-table-body').html(data.table);
                     $('.pagination-container-banjar').html(data.pagination);
                     $('#total_banjar').html(data.total_banjar);
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
             loadData(search, 1);
         });
         // ✅ AJAX Pagination
         $(document).on('click', '.pagination a', function (e) {
             e.preventDefault();
             let page = $(this).attr('href').split('page=')[1];
             let search = $('#searchInput').val();
             loadData(search,page);
         });
     });
     </script>
 
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
                      url: '/banjar/delete/' + id,  // URL untuk penghapusan
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
 
     
     
 
 
 
  