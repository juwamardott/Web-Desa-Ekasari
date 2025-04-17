@section('title')
Tambah Data Penduduk
@endsection
@include('layout.header')
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
     <!--begin::App Wrapper-->
     <div class="app-wrapper">
          <!--begin::Header-->
          @include('layout.navbar')
          <!--end::Header-->
          <!--begin::Sidebar-->
          @include('layout.sidebar')
          <!--end::Sidebar-->
          <!--begin::App Main-->
          @include('layout.content_tambah_user')
          <!--end::App Main-->
          @include('layout.copyright')
          <!--end::Footer-->
     </div>
     <!--end::App Wrapper-->
</body>
<!--end::Body-->
@include('layout.lib')
@include('layout.footer')
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