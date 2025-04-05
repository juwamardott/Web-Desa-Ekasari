<main class="app-main">
     <!--begin::App Content Header-->
     <div class="app-content-header">
       <!--begin::Container-->
       <div class="container-fluid">
         <!--begin::Row-->
         <div class="row">
           <div class="col-sm-6"><h3 class="mb-0">Update Banjar</h3></div>
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
           <div class="col-md-6">
             <!--begin::Quick Example-->
             <div class="card card-primary card-outline mb-4">
               <!--begin::Header-->
               <div class="card-header"><div class="card-title">Form</div></div>
               <!--end::Header-->
               <!--begin::Form-->
               <form action="{{ Route('banjar.update',$banjar->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                 <!--begin::Body-->
                 <div class="card-body">
                   <div class="mb-3">
                     <label for="banjar" class="form-label">Banjar</label>
                     <input
                       type="banjar"
                       name="banjar"
                       class="form-control"
                       id="banjar"
                       value="{{ $banjar->banjar }}"
                       aria-describedby="banjar"
                     />
                   </div>
                 </div>
                 <!--end::Body-->
                 <!--begin::Footer-->
                 <div class="card-footer">
                   <button type="submit" class="btn btn-success btn-sm">Submit</button>
                 </div>
                 <!--end::Footer-->
               </form>
               <!--end::Form-->
             </div>
             <!--end::Quick Example-->
             <a href="/banjar" class="btn btn-warning btn-sm">
               <i class="bi bi-arrow-left"></i> Kembali
           </a>
           </div>
           
           <!--end::Col-->
           <!--begin::Col-->
           <!--end::Col-->
         </div>
         <!--end::Row-->
       </div>
       <!--end::Container-->
     </div>
     <!--end::App Content-->
   </main>