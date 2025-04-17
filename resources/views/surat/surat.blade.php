@section('title')
Data Surat
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
          @include('layout.content_surat')
          <!--end::App Main-->
          @include('layout.copyright')
          <!--end::Footer-->
     </div>
     <!--end::App Wrapper-->
</body>
<!--end::Body-->
@include('layout.lib')
@include('layout.footer')
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

 <!-- Di bagian <head> -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Di bagian bawah sebelum </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#penduduk_id').select2({
            placeholder: "-- Cari berdasarkan Nama / NIK --",
            allowClear: true
        });
    });
</script>



