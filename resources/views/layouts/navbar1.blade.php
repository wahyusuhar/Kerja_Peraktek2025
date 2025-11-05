<nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
  <div class="container-fluid navbar-inner">
    <a href="../dashboard/index.html" class="navbar-brand">
        
        <!--Logo start-->
        <div class="logo-main">
            <div class="logo-normal">
                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                </svg>
            </div>
            <div class="logo-mini">
                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                </svg>
            </div>
        </div>
        <!--logo End-->
        
        
        
        
       
    </a>
    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
        <i class="icon">
         <svg  width="20px" class="icon-20" viewBox="0 0 24 24">
            <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
        </svg>
        </i>
    </div>
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
          <span class="mt-2 navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
       
    
      
    
        <li class="nav-item dropdown">
          <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('template/dist/assets/images/avatars/01.png') }}" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                <img src="{{ asset('template/dist/assets/images/avatars/avtar_1.png') }}" alt="User-Profile" class="theme-color-purple-img img-fluid avatar avatar-50 avatar-rounded">
                <img src="{{ asset('template/dist/assets/images/avatars/avtar_2.png') }}" alt="User-Profile" class="theme-color-blue-img img-fluid avatar avatar-50 avatar-rounded">
                <img src="{{ asset('template/dist/assets/images/avatars/avtar_4.png') }}" alt="User-Profile" class="theme-color-green-img img-fluid avatar avatar-50 avatar-rounded">
                <img src="{{ asset('template/dist/assets/images/avatars/avtar_5.png') }}" alt="User-Profile" class="theme-color-yellow-img img-fluid avatar avatar-50 avatar-rounded">
                <img src="{{ asset('template/dist/assets/images/avatars/avtar_3.png') }}" alt="User-Profile" class="theme-color-pink-img img-fluid avatar avatar-50 avatar-rounded">
                <div class="caption ms-3 d-none d-md-block">
                  <h6 class="mb-0 caption-title"> {{ auth()->user()->name }}</h6>
                  @auth
                  <p>
                      @if (Auth::user()->level == 0)
                          Penitip
                      @elseif (Auth::user()->level == 1)
                          Admin
                      @elseif (Auth::user()->level == 2)
                         Kasir
                      @elseif (Auth::user()->level == 3)
                          Toko
                      @else
                          Tidak Dikenal
                      @endif
                      toko tiga putra
                  </p>
              @endauth
                  
                </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            {{-- <li><a class="dropdown-item" href="../dashboard/app/user-profile.html">Profile</a></li>
          
            <li><hr class="dropdown-divider"></li> --}}

            <form id="logout-form" action="/logout" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>   
       <!-- Nav Header Component Start -->
       <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1 id="welcome-text" data-voice="Selamat Datang {{ auth()->user()->name }}">Selamat Datang {{ auth()->user()->name }}</h1>
                            <h1 id="after-text" class="italianno-text">Hai {{ auth()->user()->name }} 🙋</h1>
{{--                         
                            <p id="thanks-text" data-voice="Terima kasih telah login">Terima kasih telah login</p> --}}
                            @auth
                                <p id="position-text">
                                    Posisi Anda Sebagai
                                    @if (Auth::user()->level == 0)
                                        Penitip
                                    @elseif (Auth::user()->level == 1)
                                        Admin
                                    @elseif (Auth::user()->level == 2)
                                        Kasir
                                    @elseif (Auth::user()->level == 3)
                                        Toko
                                    @else
                                        Tidak Dikenal
                                    @endif
                                    di toko tiga putra
                                </p>
                            @endauth
                        
                            @guest
                                <p>Belum login</p>
                            @endguest
                        </div>
                        
                  
                    </div>
                </div>
            </div>
        </div>
        <div class="iq-header-img">
          <img src="{{ asset('template/dist/assets/images/dashboard/top-header.png') }}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
          <img src="{{ asset('template/dist/assets/images/dashboard/top-header1.png') }}" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
          <img src="{{ asset('template/dist/assets/images/dashboard/top-header2.png') }}" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
          <img src="{{ asset('template/dist/assets/images/dashboard/top-header3.png') }}" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
          <img src="{{ asset('template/dist/assets/images/dashboard/top-header4.png') }}" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
          <img src="{{ asset('template/dist/assets/images/dashboard/top-header5.png') }}" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
        </div>

    </div>  