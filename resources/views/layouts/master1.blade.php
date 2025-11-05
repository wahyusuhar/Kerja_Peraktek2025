<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Kasir 3 Putra</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('template/dist/assets/images/favicon.ico') }}">

    <!-- Core Library / Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/core/libs.min.css') }}">

    <!-- Aos Animation -->
    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendor/aos/dist/aos.css') }}">

    <!-- Hope UI Core -->
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/hope-ui.min.css?v=4.0.0') }}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/custom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/custom.css') }}">

    <!-- Dark Mode, RTL, Customizer -->
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/customizer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/rtl.min.css') }}">

    <!-- Icon Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/AdminLTE-2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- (Optional) Tema lebih modern -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">


</head>

<body>

  @include('layouts.sidebar1')

  <main class="main-content">
    <div class="position-relative iq-banner">
      @include('layouts.navbar1')
    </div>

    <div class="container-fluid content-inner mt-n5 py-0">
      @yield('content')
    </div>

    @include('layouts.footer1')
  </main>

  <!-- ========================== -->
  <!--        JAVASCRIPTS        -->
  <!-- ========================== -->

  <!-- jQuery WAJIB sebelum plugin lainnya -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap 4 BUNDLE WAJIB -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

  <script src="https://unpkg.com/html5-qrcode"></script>
  <!-- Tambahkan ini di head atau sebelum </body> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Library Plugin Hope UI -->
  <script src="{{ asset('template/dist/assets/js/core/libs.min.js') }}"></script>
  <script src="{{ asset('template/dist/assets/js/core/external.min.js') }}"></script>

  <!-- Chart & Vector -->
  <script src="{{ asset('template/dist/assets/js/charts/widgetcharts.js') }}"></script>
  <script src="{{ asset('template/dist/assets/js/charts/vectore-chart.js') }}"></script>
  <script src="{{ asset('template/dist/assets/js/charts/dashboard.js') }}"></script>

  <!-- Plugin Tambahan -->
  <script src="{{ asset('template/dist/assets/js/plugins/fslightbox.js') }}"></script>
  <script src="{{ asset('template/dist/assets/js/plugins/setting.js') }}"></script>
  <script src="{{ asset('template/dist/assets/js/plugins/slider-tabs.js') }}"></script>
  <script src="{{ asset('template/dist/assets/js/plugins/form-wizard.js') }}"></script>
  <script src="{{ asset('template/dist/assets/vendor/aos/dist/aos.js') }}"></script>

  <!-- DataTables -->
  <script src="{{ asset('AdminLTE-2/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

  <!-- AdminLTE -->
  <script src="{{ asset('AdminLTE-2/dist/js/adminlte.min.js') }}"></script>

  <!-- Validator -->
  <script src="{{ asset('js/validator.min.js') }}"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- App Script -->
  <script src="{{ asset('template/dist/assets/js/hope-ui.js') }}" defer></script>
  <!-- Flatpickr JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <!-- Bahasa Indonesia -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>


<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>


<!-- Inisialisasi -->
<script>
    flatpickr(".datepicker", {
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "d F Y",
        locale: "id"  // jika ingin bahasa Indonesia, perlu import lokal juga
    });
</script>


  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const welcomeText = document.getElementById('welcome-text');
        const thanksText = document.getElementById('thanks-text');
        const afterText = document.getElementById('after-text');
        const positionText = document.getElementById('position-text');
        const welcomeShown = localStorage.getItem('welcomeShown');
    
       

        if (!welcomeShown) {
            // Tampilkan Welcome dan Thanks selama 5 detik
            if (welcomeText) welcomeText.style.display = 'block';
            if (thanksText) thanksText.style.display = 'block';
            if (afterText) afterText.style.display = 'none';
            if (positionText) positionText.style.display = 'none';
    
            setTimeout(function () {
                if (welcomeText) welcomeText.style.display = 'none';
                if (thanksText) thanksText.style.display = 'none';
                if (afterText) afterText.style.display = 'block';
                if (positionText) positionText.style.display = 'block';
                localStorage.setItem('welcomeShown', 'true');
            }, 5000);
        } else {
            // Jika sudah pernah login, langsung tampil afterText dan positionText
            if (welcomeText) welcomeText.style.display = 'none';
            if (thanksText) thanksText.style.display = 'none';
            if (afterText) afterText.style.display = 'block';
            if (positionText) positionText.style.display = 'block';
        }
    
        // Tangani logout: hapus localStorage
        const logoutForm = document.getElementById('logout-form');
        if (logoutForm) {
            logoutForm.addEventListener('submit', function () {
                localStorage.removeItem('welcomeShown');
            });
        }
    });
    </script>
    
    <script>
      let hasTransaksi = {{ session()->has('id_penjualan') ? 'true' : 'false' }};
      let transaksiUrl = "{{ route('transaksi.index') }}";
  </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const linkTransaksi = document.getElementById('transaksi-aktif-link');

    if (linkTransaksi) {
        linkTransaksi.addEventListener('click', function (e) {
            e.preventDefault(); // mencegah langsung redirect

            if (hasTransaksi) {
                window.location.href = transaksiUrl;
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Tidak Ada Transaksi',
                    text: 'Silakan mulai transaksi baru terlebih dahulu.',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Oke'
                });
            }
        });
    }
});
</script>




  {{-- <script>
    setTimeout(function () {
        document.getElementById("welcome-text").style.display = "none";
        document.getElementById("thanks-text").style.display = "none";
        document.getElementById("after-text").style.display = "block";
        document.getElementById("position-text").style.display = "block";
    }, 5000);
</script> --}}



  <!-- Preview Gambar -->
  <script>
      function preview(selector, temporaryFile, width = 200) {
          $(selector).empty();
          $(selector).append(`<img src="${window.URL.createObjectURL(temporaryFile)}" width="${width}">`);
      }
  </script>

  @stack('scripts')

</body>
</html>
