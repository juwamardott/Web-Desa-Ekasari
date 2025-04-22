@section('title')
Login
@endsection
@include('layout.header')
<body class="login-page" style="background: url('{{ asset('lte/dist/assets/img/bg.jpg') }}') no-repeat center center fixed; background-size: cover;">

     <!--begin::App Wrapper-->
     <div class="login-box">
          
          <!-- /.login-logo -->
          <div class="card">
            
            <div class="card-body login-card-body ">
              <div class="login-logo">
                <img src="{{ asset('lte/dist/assets/img/logo.png') }}" alt="">
                <a href="" class="d-block text-uppercase"><b>Desa</b> Ekasari</a>
              </div>
              <p class="login-box-msg">Sign in to start your session</p>
              <form action="{{ route('post.login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username"  value="{{ old('username') }}"/>
                  <div class="input-group-text"><span class="bi bi-person"></span></div>
                  @error('username')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" id="password" />
                  <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                  @error('password')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="bi bi-caret-down-square-fill"></i></span>
                  <select class="form-control @error('password') is-invalid @enderror" id="banjar" name="banjar">
                      <option selected disabled>Pilih Banjar</option>
                      @foreach ($banjar as $b)
                      <option value="{{ $b->id }}">{{ $b->banjar }}</option>
                      @endforeach
                      
                  </select>
                  @error('banjar')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                  @enderror
              </div>
              
                <!--begin::Row-->
                <div class="row">
                  <div class="col-8">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="show_password" />
                      <label class="form-check-label" for="show_password"> Show password </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <div class="d-grid gap-2">
                      <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!--end::Row-->
              </form>
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
     <!--end::App Wrapper-->
</body>
<!--end::Body-->

<style>
  @media (max-width: 767px) {
     select option {
         padding: 0.8rem; /* Add padding for smaller screens */
         font-size: 12px; /* Slightly reduce font size */
     }
 }
</style>
@include('layout.lib_login')
@include('layout.footer')

<script>
  // Mendapatkan elemen checkbox dan input password
  const showPasswordCheckbox = document.getElementById('show_password');
  const passwordInput = document.getElementById('password');

  // Menambahkan event listener untuk checkbox
  showPasswordCheckbox.addEventListener('change', function() {
    if (this.checked) {
      passwordInput.type = 'text';  // Ubah tipe input menjadi teks
    } else {
      passwordInput.type = 'password';  // Kembalikan tipe input menjadi password
    }
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <!-- Panggil Toast jika session 'success' ada -->
    <script>
        @if(session('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "2000",
                "toastClass": "toast-success"
            }
            toastr.success("{{ session('success') }}");
        @elseif (session('error'))
             toastr.options = {
                  "closeButton": true,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "timeOut": "2000",
                  "toastClass": "toast-error"
             }
             toastr.error("{{ session('error') }}");
        @endif
    </script>
