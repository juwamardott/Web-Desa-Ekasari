<main class="app-main">
     <!--begin::App Content Header-->
     <div class="app-content-header">
       <!--begin::Container-->
       <div class="container-fluid">
         <!--begin::Row-->
         <div class="row">
           <div class="col-sm-6"><h3 class="mb-0">Update User</h3></div>
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
               <form action="{{ Route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                 <!--begin::Body-->
                 <div class="card-body">
                   <div class="mb-3">
                     <label for="username" class="form-label">Username</label>
                     <input
                       type="username"
                       name="username"
                       class="form-control"
                       id="username"
                       value="{{ $user->username }}"
                       aria-describedby="username"
                     />
                   </div>
                   
                   <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            id="password"
                            value=""
                            placeholder="Kosongkan jika tidak ingin mengubah password"
                            aria-describedby="password"
                        />
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                         👁️
                     </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="banjar" class="form-label">Banjar</label>
                    <select name="banjar" id="banjar" class="form-control" aria-describedby="banjar">
                        <option value="">-- Pilih Banjar --</option>
                        <option value="Root" {{ (old('banjar', $user->banjar ?? '') == 'Root') ? 'selected' : '' }}>Root</option>
                        @foreach ($banjar as $b)
                            <option value="{{ $b->banjar }}" {{ (old('banjar', $user->banjar ?? '') == $b->banjar) ? 'selected' : '' }}>
                                {{ $b->banjar }}
                            </option>
                        @endforeach
                    </select>
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
             <a href="/user" class="btn btn-warning btn-sm">
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

   <script>
     document.getElementById('togglePassword').addEventListener('click', function () {
         const passwordField = document.getElementById('password');
         const isPassword = passwordField.type === 'password';
         passwordField.type = isPassword ? 'text' : 'password';
         this.textContent = isPassword ? '🙈' : '👁️';
     });
 </script>