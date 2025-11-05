@extends('layouts.master1')

@section('content')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endpush

<style>
    .dashboard-container {
        background: #f4f6f9;
        padding: 30px;
        border-radius: 16px;
    }

    .marquee {
        background-color: #163696;
        color: #fff;
        padding: 12px 20px;
        font-weight: 600;
        font-size: 18px;
        border-radius: 10px;
        overflow: hidden;
        white-space: nowrap;
        margin-bottom: 30px;
    }

    .marquee span {
        display: inline-block;
        padding-left: 100%;
        animation: marquee 12s linear infinite;
    }

    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }

    .info-stat-box {
        background: white;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.07);
        text-align: center;
    }

    .info-stat-box i {
        font-size: 32px;
        color: #163696;
        margin-bottom: 15px;
    }

    .info-stat-box h3 {
        margin: 10px 0 0;
        font-size: 20px;
        font-weight: 700;
    }

    .btn-transaksi {
        background-color: #28a745;
        color: #fff;
        padding: 14px 30px;
        border-radius: 12px;
        font-size: 18px;
        font-weight: 600;
        margin-top: -60px;
        display: inline-block;
        transition: 0.3s;
    }

    .btn-transaksi:hover {
        background-color: #218838;
        transform: translateY(-2px);
    }

    .swiper {
        padding-top: 10px;
        padding-bottom: 30px;
    }

    .swiper-slide {
        width: auto;
        margin-right: 20px;
    }

    .card-slide {
        height: 110px;
        min-width: 360px;
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
        box-shadow: rgba(38, 57, 77, 0.3) 0px 20px 30px -10px;
    }

    .card-slide img {
        width: 60px;
        height: 60px;
        border-radius: 8px;
    }


    .info-section {
        margin-top: 40px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(420px, 1fr));
        gap: 25px;
    }

    .info-card {
        background: #fff;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(22, 54, 150, 0.2);
    }

    .info-card h3 {
        color: #163696;
        font-weight: 700;
        margin-bottom: 12px;
        font-size: 20px;
    }

    .info-card p {
        color: #555;
        font-size: 15px;
        line-height: 1.6;
    }

    .info-card ul {
        padding-left: 18px;
        color: #444;
        line-height: 1.8;
        font-size: 15px;
        margin: 0;
    }

    .info-card ul li {
        list-style: none;
        position: relative;
        padding-left: 8px;
    }
</style>

<div class="dashboard-container">
    <!-- Logo berjalan -->
    <div class="marquee">
        <span>🚀 Selamat datang di <strong>E-Kasir Toko 3 Putra</strong> — Pantau stok, transaksi, dan data toko Anda secara real-time. — <strong>SELAMAT BEKERJA</strong> </span>
    </div>

    <!-- Slider Info Cards -->
    <div class="swiper mySwiper">
        <ul class="swiper-wrapper list-inline p-0 m-0 mb-2">
            <!-- Kategori -->
            <li class="swiper-slide card card-slide" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                <div class="card-body d-flex align-items-center">
                    <div class="icon">
                        <img src="{{ asset('/img/categori.png') }}" alt="">
                    </div>
                    <div class="progress-detail ms-3">
                        <p class="mb-1">
                            Total Kategori
                           
                        </p>
                        <h3>{{ $kategori }} <small>Kategori</small></h3>
                    </div>
                </div>
            </li>

            <!-- Produk -->
            <li class="swiper-slide card card-slide" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                <div class="card-body d-flex align-items-center">
                    <div class="icon">
                        <img src="{{ asset('/img/Product.png') }}" alt="">
                    </div>
                    <div class="progress-detail ms-3">
                        <p class="mb-1">
                            Total Produk
                           
                        </p>
                        <h3>{{ $produk }} <small>Produk</small></h3>
                    </div>
                </div>
            </li>

            <!-- Member -->
            <li class="swiper-slide card card-slide" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                <div class="card-body d-flex align-items-center">
                    <div class="icon">
                        <img src="{{ asset('/img/memberIcon.png') }}" alt="">
                    </div>
                    <div class="progress-detail ms-3">
                        <p class="mb-1">
                            Total Member
                         
                        </p>
                        <h3>{{ $member }} <small>Member</small></h3>
                    </div>
                </div>
            </li>

            <!-- Supplier -->
            <li class="swiper-slide card card-slide" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                <div class="card-body d-flex align-items-center">
                    <div class="icon">
                        <img src="{{ asset('/img/suplier.png') }}" alt="">
                    </div>
                    <div class="progress-detail ms-3">
                        <p class="mb-1">
                            Total Supplier
                          
                        </p>
                        <h3>{{ $supplier }} <small>Supplier</small></h3>
                    </div>
                </div>
            </li>
        </ul>
    </div>
     
  
<!-- Info tentang Kasir Toko 3 Putra -->
<div class="info-section mt-4">
    <div class="info-grid">
        <!-- Tentang Kasir -->
        <div class="info-card">
            <h3>🛒 Tentang Kasir Toko 3 Putra</h3>
            <p>
                Sistem <strong>E-Kasir</strong> ini dirancang untuk membantu proses transaksi di 
                <strong>Toko 3 Putra</strong> secara cepat, mudah, dan efisien.  
                Dengan fitur pemantauan real-time, pengguna dapat mengontrol stok, transaksi,
                serta data pelanggan dan supplier kapan saja.
            </p>
        </div>

        <!-- Fitur Unggulan -->
        <div class="info-card">
            <h3>⚙️ Fitur Unggulan</h3>
            <ul>
                <li>📊 Monitoring stok & transaksi real-time</li>
                <li>💰 Proses penjualan cepat dan akurat</li>
                <li>👥 Manajemen data pelanggan & supplier</li>
                <li>📦 Laporan penjualan otomatis</li>
                <li>🔒 Sistem login dengan keamanan tinggi</li>
            </ul>
        </div>

        <!-- Manfaat Sistem -->
        <div class="info-card">
            <h3>🚀 Manfaat Sistem</h3>
            <p>
                Dengan sistem ini, seluruh aktivitas penjualan dapat dilakukan secara digital, 
                meminimalkan kesalahan input, meningkatkan efisiensi, serta mempercepat laporan bulanan toko Anda.
            </p>
        </div>

        <!-- Dukungan & Pengembang -->
        <div class="info-card">
            <h3>💡 Pengembang & Dukungan</h3>
            <p>
                Aplikasi ini dikembangkan oleh <strong>Wahyu Suhardiyono</strong> untuk mendukung digitalisasi UMKM.  
                Hubungi tim pengembang untuk dukungan teknis dan pembaruan sistem.
            </p>
        </div>
    </div>
</div>
<!-- Copyright -->
<div class="text-center mt-4 text-muted" style="font-size: 14px;">
    © 2025 Wahyu Suhardiyono. All rights reserved.
</div>

</div>





@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 'auto',
        spaceBetween: 20,
        grabCursor: true,
    });
</script>




@endpush
@endsection
