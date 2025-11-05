<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Kartu Member</title>
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
        }
        section {
            display: flex;
            flex-direction: column; /* susun vertikal */
            align-items: center;
            gap: 30px; /* jarak antar kartu */
        }
        .card {
            position: relative;
            width: 350px;
            height: 200px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
            margin-bottom: 10px; /* tambahan jarak ekstra antar kartu */
        }
        .bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }
        .info {
            position: absolute;
            bottom: 15px;
            left: 45px;
            display: flex;
            flex-direction: column;
            color: #fff;
            z-index: 2;
        }
        .barcode {
            position: absolute;
            bottom: 35px;
            right: 30px;
            width: 65px;
            height: 65px;
            background: #fff;
            padding: 5px;
            border-radius: 8px;
            z-index: 1;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .barcode img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .tanggal {
            position: absolute;
            bottom: 8px;
            right: 25px;
            font-size: 0.7rem;
            color: #fff;
            z-index: 2;
        }
        .nama {
            font-weight: 700;
            font-size: 1.2rem;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.7);
        }
        .telepon {
            font-size: 0.9rem;
            font-weight: 500;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }

        /* agar hasil cetak tidak potong */
        @media print {
            body {
                background: #fff;
                padding: 0;
            }
            section {
                gap: 40px;
                page-break-inside: avoid;
            }
            .card {
                page-break-inside: avoid;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <section>
        @foreach ($datamember as $item)
        <div class="card">
            <img src="file://{{ $setting->path_kartu_member }}" class="bg-image" alt="Kartu Background">

            <div class="barcode">
                <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($item->kode_member, 'QRCODE') }}" alt="QR Code">
            </div>

            <div class="tanggal">
                Dicetak: {{ \Carbon\Carbon::now()->format('d M Y') }}
            </div>

            <div class="info">
                <div class="nama">{{ $item->nama }}</div>
                <div class="telepon">{{ $item->telepon }}</div>
            </div>
        </div>
        @endforeach
    </section>
</body>
</html>