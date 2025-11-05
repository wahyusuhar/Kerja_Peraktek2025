


<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>LOGIN SISTEM KASIR</title>
      
                    <!-- Favicon -->
                <link rel="shortcut icon" href="{{ asset('template/dist/assets/images/favicon.ico') }}">

                <!-- Library / Plugin Css Build -->
                <link rel="stylesheet" href="{{ asset('template/dist/assets/css/core/libs.min.css') }}">

                <!-- Hope UI Design System Css -->
                <link rel="stylesheet" href="{{ asset('template/dist/assets/css/hope-ui.min.css?v=4.0.0') }}">

                <!-- Custom Css -->
                <link rel="stylesheet" href="{{ asset('template/dist/assets/css/custom.min.css?v=4.0.0') }}">

                <!-- Dark Css -->
                <link rel="stylesheet" href="{{ asset('template/dist/assets/css/dark.min.css') }}">

                <!-- Customizer Css -->
                <link rel="stylesheet" href="{{ asset('template/dist/assets/css/customizer.min.css') }}">

                <!-- RTL Css -->
                <link rel="stylesheet" href="{{ asset('template/dist/assets/css/rtl.min.css') }}">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">



                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      
  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    {{-- @if ($errors->any())
    @dd($errors->all())
    @endif --}}
   {{-- Success Message --}}
{{-- ✅ Sukses Login / Logout --}}
{{-- 🔔 SweetAlert: Sukses Login / Logout --}}
@if (session('success'))
<script>
    // Mainkan suara sukses
    const audioSuccess = new Audio("{{ asset('template/dist/assets/sounds/alert.wav') }}");
    audioSuccess.play();

    Swal.fire({
        title: '🎉 Berhasil!',
        text: '{{ session("success") }}',
        icon: 'success',
        timer: 3000,
        timerProgressBar: true,
        background: '#1e1e2f',
        color: '#fff',
        iconColor: '#2ecc71',
        confirmButtonText: '<i class="fas fa-check-circle"></i> Lanjut',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    });
</script>
@endif

@if (session('login_error'))
<script>
    // Mainkan suara error
    const audioError = new Audio("{{ asset('template/dist/assets/sounds/gagal.wav') }}");
    audioError.play();

    Swal.fire({
        title: '❌ Login Gagal',
        text: '{{ session("login_error") }}',
        icon: 'error',
        background: '#2c2f33',
        color: '#fff',
        iconColor: '#e74c3c',
        confirmButtonText: '<i class="fas fa-user-times"></i> Coba Lagi',
        showClass: {
            popup: 'animate__animated animate__shakeX'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOut'
        }
    });
</script>
@endif





    <!-- loader Start -->
    {{-- <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body">
          </div>
      </div>    </div> --}}
    <!-- loader END -->
    
    <div class="wrapper" style="height: 100vh; width: 100vw; background: url('{{ asset('template/dist/assets/images/auth/login.jpg') }}') no-repeat center center / cover; position: relative;">
      <div style="position: absolute; inset: 0; background-color: rgba(255,255,255,0.3); backdrop-filter: blur(1px); display: flex; justify-content: center; align-items: center;  ">
         <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card" style="width: 100%; max-width: 400px; background-color: #ededed; padding: 30px; border-radius: 15px;">
            <div class="card-body" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               <h2 class="mb-2 text-center">Login</h2>
               <p class="text-center">Login to stay connected.</p>
               <form action="/login" method="POST">
                  @csrf
                  @method('POST')
                  <div class="form-group mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                  </div>
                  <div class="form-group mb-3">
                     <label for="password" class="form-label">Password</label>
                     <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                  </div>
                  <div class="d-grid mb-3">
                     <button type="submit" class="btn btn-primary">Masuk</button>
                  </div>
                  {{-- <p class="text-center my-3">or sign in with other accounts?</p>
                  <div class="d-flex justify-content-center mb-3">
                     <ul class="list-group list-group-horizontal list-group-flush">
                        <li class="list-group-item  pb-0">
                           <a href="#"><img src="{{ asset('template/dist/assets/images/brands/fb.svg') }}" alt="fb" width="30"></a>
                        </li>
                        <li class="list-group-item border-0 pb-0">
                           <a href="#"><img src="{{ asset('template/dist/assets/images/brands/gm.svg') }}" alt="gm" width="30"></a>
                        </li>
                        <li class="list-group-item border-0 pb-0">
                           <a href="#"><img src="{{ asset('template/dist/assets/images/brands/im.svg') }}" alt="im" width="30"></a>
                        </li>
                        <li class="list-group-item border-0 pb-0">
                           <a href="#"><img src="{{ asset('template/dist/assets/images/brands/li.svg') }}" alt="li" width="30"></a>
                        </li>
                     </ul>
                  </div> --}}
                  {{-- <p class="mt-3 text-center">
                     Don’t have an account? <a href="/register" class="text-underline">Click here to sign up.</a>
                  </p> --}}
               </form>
            </div>
         </div>
      </div>
   </div>
   
    
<!-- Library Bundle Script -->
<script src="{{ asset('template/dist/assets/js/core/libs.min.js') }}"></script>

<!-- External Library Bundle Script -->
<script src="{{ asset('template/dist/assets/js/core/external.min.js') }}"></script>

<!-- Widgetchart Script -->
<script src="{{ asset('template/dist/assets/js/charts/widgetcharts.js') }}"></script>

<!-- mapchart Script -->
<script src="{{ asset('template/dist/assets/js/charts/vectore-chart.js') }}"></script>
<script src="{{ asset('template/dist/assets/js/charts/dashboard.js') }}"></script>

<!-- fslightbox Script -->
<script src="{{ asset('template/dist/assets/js/plugins/fslightbox.js') }}"></script>

<!-- Settings Script -->
<script src="{{ asset('template/dist/assets/js/plugins/setting.js') }}"></script>

<!-- Slider-tab Script -->
<script src="{{ asset('template/dist/assets/js/plugins/slider-tabs.js') }}"></script>

<!-- Form Wizard Script -->
<script src="{{ asset('template/dist/assets/js/plugins/form-wizard.js') }}"></script>

<!-- AOS Animation Plugin-->
{{-- Jika ada file AOS, bisa tambahkan juga di sini --}}

<!-- App Script -->
<script src="{{ asset('template/dist/assets/js/hope-ui.js') }}" defer></script>

    
    
  </body>
</html>