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
          @include('layout.content_tambah_penduduk')
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
     function updateProfileImage() {
    // Ambil nilai dari select jenis_kelamin
    var gender = document.getElementById("jenis_kelamin").value;
    
    // Ambil elemen gambar
    var profileImage = document.getElementById("profileImage");

    // Gunakan URL gambar langsung
    var maleImage = "{{ asset('lte/dist/assets/img/user1.png') }}";
    var femaleImage = "{{ asset('lte/dist/assets/img/user2.png') }}";
    var defaultImage = "{{ asset('lte/dist/assets/img/default.png') }}";

    // Perbarui sumber gambar berdasarkan jenis kelamin
    if (gender === "Laki-laki") {
        profileImage.src = maleImage;
    } else if (gender === "Perempuan") {
        profileImage.src = femaleImage;
    } else {
        profileImage.src = defaultImage;
    }
}

</script>

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