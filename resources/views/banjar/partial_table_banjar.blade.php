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
