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
            {{-- <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i> --}}
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item" style="display: inline-block; border-radius: 6px; ">
                    <a class="nav-link " aria-current="page" href="{{ route('dashboard1') }}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                @if (auth()->user()->level == 1)
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Master</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>  
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}"
                        class="nav-link {{ request()->routeIs('kategori.index') ? 'active' : '' }}">
                        <i class="fa fa-cube"></i>
                        <span class="item-name">kategori</span>
                        </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('produk.index') }}"
                    class="nav-link {{ request()->routeIs('produk.index') ? 'active' : '' }}">
                    <i class="fa fa-cubes"></i> 
                    <span class="item-name">Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('member.index') }}"
                    class="nav-link {{ request()->routeIs('member.index') ? 'active' : '' }}">
                    <i class="fa fa-id-card"></i>
                    <span class="item-name">Member</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}"
                    class="nav-link {{ request()->routeIs('supplier.index') ? 'active' : '' }}">
                    <i class="fa fa-truck"></i> 
                    <span class="item-name">Supplier</span>
                    </a>
                </li>
         
             {{-- TRANSAKSI --}}

                {{-- ======================================================================================================= --}}
            
                <li><hr class="hr-horizontal"></li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Transaksi</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>  
                    
              
                <li class="nav-item">
                    <a href="{{ route('pengeluaran.index') }}"
                    class="nav-link {{ request()->routeIs('pengeluaran.index') ? 'active' : '' }}">
                    <i class="fa fa-money"></i>
                    <span class="item-name">Pengeluaran</span>
                    </a>
                </li>           
                <li class="nav-item">
                    <a href="{{ route('pembelian.index') }}"
                    class="nav-link {{ request()->routeIs('pembelian.index') ? 'active' : '' }}">
                    <i class="fa fa-download"></i>
                    <span class="item-name">Pembelian</span>
                    </a>
                </li>   
              
                <li class="nav-item">
                    <a href="{{ route('penjualan.index') }}"
                    class="nav-link {{ request()->routeIs('penjualan.index') ? 'active' : '' }}">
                    <i class="fa fa-upload"></i>
                    <span class="item-name">Penjualan</span>
                    </a>
                </li>
               
                <li class="nav-item">
                    <a href="{{ route('transaksi.index') }}"
                    class="nav-link {{ request()->routeIs('transaksi.index') ? 'active' : '' }}">
                    <i class="fa fa-cart-arrow-down"></i>
                    <span class="item-name">Transaksi Aktif</span>
                    </a>
                </li>  
                  
                <li class="nav-item">
                    <a href="{{ route('transaksi.baru') }}"
                    class="nav-link {{ request()->routeIs('transaksi.baru') ? 'active' : '' }}">
                    <i class="fa fa-cart-arrow-down"></i>
                    <span class="item-name">Transaksi Baru</span>
                    </a>
                </li>           
             
                <li><hr class="hr-horizontal"></li>

             {{-- --------------------------------------------------------------------------------------------------------------- --}}
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">REPORT</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}"
                    class="nav-link {{ request()->routeIs('laporan.index') ? 'active' : '' }}">
                    <i class="fa fa-file-pdf-o"></i> 
                    <span class="item-name">Laporan</span>
                    </a>
                </li>   
                <li><hr class="hr-horizontal"></li>
                
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">SYSTEM</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                    class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
                    <i class="fa fa-users"></i>
                    <span class="item-name">User</span>
                    </a>
                </li>   
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}"
                    class="nav-link {{ request()->routeIs('setting.index') ? 'active' : '' }}">
                    <i class="fa fa-cogs"></i>
                    <span class="item-name">Pengaturan</span>
                    </a>
                </li> 
{{-- ======================================================================================================================== --}}
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}"
                    class="nav-link {{ request()->routeIs('transaksi.baru') ? 'active' : '' }}">
                    {{-- <i class="fa fa-cogs"></i> --}}
                    <span class="item-name"></span>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}"
                    class="nav-link {{ request()->routeIs('transaksi.baru') ? 'active' : '' }}">
                    {{-- <i class="fa fa-cogs"></i> --}}
                    <span class="item-name"></span>
                    </a>
                </li> 
{{-- ======================================================================================================================== --}}
                @else

                <li class="nav-item">
                    <a href="{{ route('penjualan.index') }}"
                    class="nav-link {{ request()->routeIs('penjualan.index') ? 'active' : '' }}">
                    <i class="fa fa-upload"></i>
                    <span class="item-name">Penjualan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" id="transaksi-aktif-link"
                       class="nav-link nav-link-kasir {{ request()->routeIs('transaksi.index') ? 'active' : '' }}">
                        <i class="fa fa-cart-arrow-down"></i>
                        <span class="item-name">Transaksi Aktif</span>
                    </a>
                </li>  
            
                <li class="nav-item">
                    <a href="{{ route('transaksi.baru') }}"
                       class="nav-link nav-link-kasir {{ request()->routeIs('transaksi.baru') ? 'active' : '' }}">
                        <i class="fa fa-cart-arrow-down"></i>
                        <span class="item-name">Transaksi Baru</span>
                    </a>
                </li>  
                <li class="nav-item">
                    <a href="{{ route('kasir.chatBoot') }}"
                       class="nav-link nav-link-kasir {{ request()->routeIs('transaksi.baru') ? 'active' : '' }}">
                       <i class="fa-solid fa-robot"></i>
                        <span class="item-name"> Chatbot Kasir</span>
                    </a>
                </li>  
            @endif
            
             
            </ul>
            <!-- Sidebar Menu End -->        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside> 