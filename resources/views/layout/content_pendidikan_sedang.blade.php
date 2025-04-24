<main class="app-main">
     <!--begin::App Content Header-->
     <div class="app-content-header">
         <div class="container-fluid">
             <div class="row">
                
                 <div class="col-sm-12 d-flex align-items-center">
                     <h5 class="mb-0">Data Pendidikan Sedang</h5>
                     <div class="ms-auto block">
                        <a href="/penduduk/tambah" class="btn btn-primary btn-sm">Tambah Data</a>
                        
                    </div>
                 </div>                 
                
             </div>
         </div>
     </div>
     <!--end::App Content Header-->

   <div class="app-content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-12">
                   <!-- Begin responsive table -->
                   <div class="table-responsive">
                       <table class="table table-bordered  table-hover">
                           <thead class="">
                               <tr class="table-light">
                                   <th>ACTION</th>
                                   <th>ID</th>
                                   <th>PENDIDIKAN</th>
                                   <th>TGL PERISTIWA</th>
                                   <th>TGL TERDAFTAR</th>
                               </tr>
                           </thead>
                           <tbody id="penduduk-table-body">
                            @foreach ($pendidikan_sedang as $p)
                                 <tr>
                                      <td>
                                      <!-- Buttons for Actions -->
                                          <div class="btn-group dropstart">
                                              <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                                  <small>Action</small>
                                              </button>
                                              <ul class="dropdown-menu">
                                                  <!-- Dropdown menu links -->
                                                  <li><a class="dropdown-item" href="/penduduk/detail/{">Detail Biodata</a></li>
                                                  <li><a class="dropdown-item" href="/penduduk/list/">List Keluarga</a></li>
                                                  <li>
                                                      <button class="dropdown-item btn-delete" data-id="">Hapus Biodata</button>
                                                  </li>
                                              </ul>
                                           </div>
                                      </td>                                        
                                      <td class="text-info">{{ $p->id }}</td>
                                      <td>{{ $p->pendidikan_sedang }}</td>
                                      <td>{{ $p->updated_at }}</td>
                                      <td>{{ $p->created_at }}</td>
                                 </tr>
                            @endforeach
                           </tbody>
                       </table>                      
                   </div>
                   <!-- End responsive table -->
                   <div class="d-flex justify-content-center pagination-container">
                       {{ $pendidikan_sedang->links('pagination::bootstrap-5') }}
                   </div> 
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

     thead tr {
    background-color: #20c997 !important; /* Warna teal */
    color: white !important ; /* Agar teks terlihat jelas */
}

</style>




