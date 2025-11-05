@extends('layouts.master1')
@section('content')
<div class="row">
   <div class="col-md-12 col-lg-12">
      <div class="row row-cols-1">
         <div class="overflow-hidden d-slider1 ">
            <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 110px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style=" display: flex; align-items: center;">
                       <div class="icon">
                           <img src="{{ asset('/img/categori.png') }}" alt="" style="width: 60px; height: 60px; border-radius: 8px; margin-left : -5px">
                       </div>
                       
                       <div class="progress-detail" style="margin-left: 15px;">
                           <p style="margin: 0; font-size: 16px; color: #333;">
                               Total Kategori  
                               <a href="{{ route('kategori.index') }}" class="small-box-footer"
                                  style="font-size: .8rem; background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.3rem; margin-top: 4px; margin-bottom: 0; color: #111;">
                               {{ $kategori }} <span style="font-size: 1rem; font-weight: normal;">Kategori</span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 110px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style="margin-left: 4px; display: flex; align-items: center;">
                       <div class="icon">
                           <img src="{{ asset('/img/Product.png') }}" alt="" style="width: 60px; height: 60px; border-radius: 8px;">
                       </div>
                       
                       <div class="progress-detail" style="margin-left: 15px;">
                           <p style="margin: 0; font-size: 16px; color: #333;">
                               Total Produk  
                               <a href="{{ route('produk.index') }}" class="small-box-footer"
                                  style="font-size: .8rem; background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.3rem; margin-top: 4px; margin-bottom: 0; color: #111;">
                              {{ $produk }} <span style="font-size: 1rem; font-weight: normal;">Produk</span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 110px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style="display: flex; align-items: center;">
                       <div class="icon">
                           <img src="{{ asset('/img/memberIcon.png') }}" alt="" style="width: 60px; height: 60px; border-radius: 8px; margin-left : -4px">
                       </div>
                       
                       <div class="progress-detail" style="margin-left: 15px;">
                           <p style="margin: 0; font-size: 16px; color: #333;">
                               Total Member  
                               <a href="{{ route('member.index') }}" class="small-box-footer"
                                  style="font-size: .8rem; background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.3rem; margin-top: 4px; margin-bottom: 0; color: #111;">
                              {{ $member }}  <span style="font-size: 1rem; font-weight: normal;">Member</span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 110px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style="display: flex; align-items: center;">
                       <div class="icon">
                           <img src="{{ asset('/img/suplier.png') }}" alt="" style="width: 60px; height: 60px; border-radius: 8px; margin-left : -4px">
                       </div>
                       
                       <div class="progress-detail" style="margin-left: 15px;">
                           <p style="margin: 0; font-size: 16px; color: #333;">
                               Total Supplier
                               <a href="{{ route('supplier.index') }}" class="small-box-footer"
                                  style="font-size: .8rem; background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.3rem; margin-top: 4px; margin-bottom: 0; color: #111;">
                              {{ $supplier }}  <span style="font-size: 1rem; font-weight: normal;">Supplier</span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
             </ul>
            
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
   
     
@endsection


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




// document.addEventListener('DOMContentLoaded', function () {
// const welcomeText = document.getElementById('welcome-text')?.innerText;

// if (welcomeText) {
// const speech = new SpeechSynthesisUtterance(welcomeText);
// speech.lang = 'id-ID';
// speech.volume = 1;
// speech.rate = 1;
// speech.pitch = 1;

// let spoken = false; // ← Flag agar tidak dibaca lebih dari sekali

// const speakOnce = () => {
// if (spoken) return;
// const voices = speechSynthesis.getVoices();
// const indoVoice = voices.find(v => v.lang === 'id-ID') || voices[0];
// speech.voice = indoVoice;
// speechSynthesis.speak(speech);
// spoken = true; // ← Setelah dipanggil, ubah ke true
// };

// // Jika voice list sudah ada, langsung panggil
// if (speechSynthesis.getVoices().length > 0) {
// speakOnce();
// } else {
// // Jika belum, tunggu onvoiceschanged
// speechSynthesis.onvoiceschanged = speakOnce;
// }
// }
// });




</script>


@endpush

