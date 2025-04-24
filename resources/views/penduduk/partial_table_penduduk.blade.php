@foreach ($penduduk as $p)
    <tr>
     <td>
          <!-- Buttons for Actions -->
          <div class="btn-group dropstart">
               <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                    <small>Action</small>
               </button>
               <ul class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <li><a class="dropdown-item" href="/{{ request()->segment(1) }}/detail/{{ $p->id }}">Detail Biodata</a></li>
                    <li><a class="dropdown-item" href="/{{ request()->segment(1) }}/list/{{ $p->no_kk }}">List Keluarga</a></li>
                    <li><button class="dropdown-item btn-delete" data-id="{{ $p->id }}">Hapus Biodata</button></li>
                </ul>
                
               </div>
          </td>
          @if ($p->image)
            <td><img src="{{ asset('storage/'.$p->image) }}" alt="" width="50"></td>
        @elseif ($p->image == null && $p->jenis_kelamin_id == 1)
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
          <td>{{ $p->banjar->banjar }}</td>
          <td>{{ $p->pendidikan->pendidikan }}</td>
          <td>{{ $p->umur }}</td>
          <td>{{ $p->pekerjaan->nama_pekerjaan }}</td>
          <td>{{ $p->kawin->status }}</td>
          <td>{{ $p->updated_at }}</td>
          <td>{{ $p->created_at }}</td>
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
