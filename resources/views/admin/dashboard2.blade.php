
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Sistem Kasir 3 Putra</title>
    <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('template/dist/assets/images/favicon.ico') }}">

        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="{{ asset('template/dist/assets/css/core/libs.min.css') }}">

        <!-- Aos Animation Css -->
        <link rel="stylesheet" href="{{ asset('template/dist/assets/vendor/aos/dist/aos.css') }}">

        <!-- Hope UI Design System Css -->
        <link rel="stylesheet" href="{{ asset('template/dist/assets/css/hope-ui.min.css?v=4.0.0') }}">

      
      <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('template/dist/assets/css/custom.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template/dist/assets/css/custom.css') }}">

        <!-- Dark CSS -->
        <link rel="stylesheet" href="{{ asset('template/dist/assets/css/dark.min.css') }}">

        <!-- Customizer CSS -->
        <link rel="stylesheet" href="{{ asset('template/dist/assets/css/customizer.min.css') }}">

        <!-- RTL CSS -->
        <link rel="stylesheet" href="{{ asset('template/dist/assets/css/rtl.min.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        

      
      
  </head>
  <body class="  ">
    <!-- loader Start -->
    {{-- <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body">
          </div>
      </div>    </div> --}}
    <!-- loader END -->
    
    <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="../dashboard/index.html" class="navbar-brand">
                
                <!--Logo start-->
                <div class="logo-main">
                    <div class="logo-normal">
                        <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                            <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="logo-mini">
                        <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                            <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                        </svg>
                    </div>
                </div>
                <!--logo End-->
                
                
                
                
                <h4 class="logo-title">E-Kasir 3 Putra</h4>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        
       @include('layouts.sidebar1')
        <div class="sidebar-footer"></div>


    </aside>    
    <main class="main-content">
      @include('layouts.navbar1')
      <div class="conatiner-fluid content-inner mt-n5 py-0">

         
<div class="row">
   <div class="col-md-12 col-lg-12">
      <div class="row row-cols-1">
         <div class="overflow-hidden d-slider1 ">
            <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-01" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg>
                  
                        </div>
                        <div class="inner" style="margin-left: 30px">
                            <p>Total Kategori   <a href="{{ route('kategori.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a></p>
                          
                            <h3>{{ $kategori }} <span>Kategori</span></h3>
                        </div>
                       
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" style="animation-delay: 800ms; margin-left: 10px; margin-right: 10px; " data-aos=" fade-up" data-aos-delay="800">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="inner" style="margin-left: 30px">
                            <p>Total Produk</p>
                            <h3>{{ $produk }} <span>Produk</span></h3>
            
                            
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-03" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="inner" style="margin-left: 30px">
                            <p>Total Member</p>
                            <h3>{{ $member }} Member</h3>
            
                            
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-04" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="60" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24px"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg>
                        </div>
                        <div class="inner" style="margin-left: 30px">
                            
                            <p>Total Supplier</p>
                            <h3>{{ $supplier }} Supplier</h3>
            
                        </div>
                     </div>
                  </div>
               </li>
             
            </ul>
            {{-- <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div> --}}
         </div>
      </div>
   </div>

   {{-- ======================================== --}}
   <div class="col-12">
    <div class="row g-3"> <!-- g-3 memberi jarak antar elemen, g-0 jika ingin tanpa spasi sama sekali -->
  
      <!-- Gross Sales -->
      <div class="chart-fullscreen">
        <div class="card">
          <div class="card-header">
            <h3 class="box-title">
              Grafik Pendapatan {{ tanggal_indonesia($tanggal_awal, false) }} s/d {{ tanggal_indonesia($tanggal_akhir, false) }}
            </h3>
          </div>
          <div class="card-body">
            <div class="chart-container"  >
              <canvas id="salesChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      
  
    </div>
  </div>
  
    
    
    {{-- ===================================================================== --}}
      </div>
      <div class="btn-download">
          <a class="btn btn-success px-3 py-2" href="https://iqonic.design/product/admin-templates/hope-ui-admin-free-open-source-bootstrap-admin-template/" target="_blank" >
              <svg class="icon-24"  width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.4" d="M17.554 7.29614C20.005 7.29614 22 9.35594 22 11.8876V16.9199C22 19.4453 20.01 21.5 17.564 21.5L6.448 21.5C3.996 21.5 2 19.4412 2 16.9096V11.8773C2 9.35181 3.991 7.29614 6.438 7.29614H7.378L17.554 7.29614Z" fill="currentColor"></path>
                  <path d="M12.5464 16.0374L15.4554 13.0695C15.7554 12.7627 15.7554 12.2691 15.4534 11.9634C15.1514 11.6587 14.6644 11.6597 14.3644 11.9654L12.7714 13.5905L12.7714 3.2821C12.7714 2.85042 12.4264 2.5 12.0004 2.5C11.5754 2.5 11.2314 2.85042 11.2314 3.2821L11.2314 13.5905L9.63742 11.9654C9.33742 11.6597 8.85043 11.6587 8.54843 11.9634C8.39743 12.1168 8.32142 12.3168 8.32142 12.518C8.32142 12.717 8.39743 12.9171 8.54643 13.0695L11.4554 16.0374C11.6004 16.1847 11.7964 16.268 12.0004 16.268C12.2054 16.268 12.4014 16.1847 12.5464 16.0374Z" fill="currentColor"></path>
              </svg>
          </a>
      </div>
      <!-- Footer Section Start -->
      
      <!-- Footer Section End -->    </main>
  
  
    <!-- Wrapper End-->
    <!-- offcanvas start -->
  

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
<script src="{{ asset('template/dist/assets/vendor/aos/dist/aos.js') }}"></script>

<!-- App Script -->
<script src="{{ asset('template/dist/assets/js/hope-ui.js') }}" defer></script>

    
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> {{-- Gunakan Chart.js modern --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('salesChart').getContext('2d');

        const data = {
            labels: {!! json_encode($data_tanggal) !!},
            datasets: [{
                label: 'Pendapatan',
                data: {!! json_encode($data_pendapatan) !!},
                borderColor: '#3b8bba',
                backgroundColor: 'rgba(59, 139, 186, 0.2)',
                tension: 0.4, // buat smooth line
                fill: true,
                pointBackgroundColor: '#3b8bba',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#3b8bba'
            }]
        };

        const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false, // ⬅️ WAJIB agar tinggi di CSS berfungsi
        plugins: {
            legend: {
                display: true,
                labels: {
                    color: '#333'
                }
            }
        },
        scales: {
            x: {
                ticks: { color: '#333' },
                grid: { display: false }
            },
            y: {
                ticks: { color: '#333' },
                grid: { color: '#e0e0e0' }
            }
        }
    }
};


        new Chart(ctx, config);
    });
</script>
@endpush




<script>
    function preview(selector, temporaryFile, width = 200)  {
        $(selector).empty();
        $(selector).append(`<img src="${window.URL.createObjectURL(temporaryFile)}" width="${width}">`);
    }
</script>
@stack('scripts')
    



  </body>
</html>