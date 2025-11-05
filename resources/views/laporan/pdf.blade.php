{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan</title>

    <link rel="stylesheet" href="{{ asset('/AdminLTE-2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <h3 class="text-center">Laporan Pendapatan</h3>
    <h4 class="text-center">
        Tanggal {{ tanggal_indonesia($awal, false) }}
        s/d
        Tanggal {{ tanggal_indonesia($akhir, false) }}
    </h4>

    <table class="table table-striped">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Penjualan</th>
                <th>Pembelian</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    @foreach ($row as $col)
                        <td>{{ $col }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendapatan</title>
    <style>
        body {
            font-family: Times New Roman, serif;
            font-size: 12px;
        }
        .kop-surat {
            width: 100%;
            border-bottom: 3px solid #000;
            padding-bottom: 8px;
            margin-bottom: 20px;
            
        }
        .kop-surat img {
            float: left;
            width: 150px;
            height: 150px;
            margin-right: 15px;
            margin-top: -20px;
        }
        .kop-text {
            text-align: center;
        }
        .kop-text h1, .kop-text h3, .kop-text p {
            margin: 0;
            padding: 2px;
        }
        .judul-laporan {
            text-align: center;
            margin: 20px 0 10px 0;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            margin-right: 140px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
    </style>
</head>
<body>

    {{-- KOP SURAT --}}
    <div class="kop-surat">
        <img src="{{ public_path('img/logo123.png') }}" alt="Logo">
        <div class="kop-text">
            <h1>TOKO TIGA PUTRA PT.AGROWIYANA</h1>
            <h3>PT.Agrowiyana Km.11 Kec. Tebing Tinggi, Kabupaten Tanjung Jabung Barat, Jambi</h3>
            <p style="font-style: italic;">Telepon: (021) 123456, Kode Pos: 36552</p>
            
        </div>
    </div>

    {{-- JUDUL LAPORAN --}}
    <div class="judul-laporan">
        LAPORAN PENDAPATAN <br>
        Periode: {{ $awal }} s/d {{ $akhir }}
    </div>

    {{-- TABEL DATA --}}
    <table>
        <thead>
            <tr>
                <th style="background-color: #09B009FF; color: white;">No</th>
                <th style="background-color: #09B009FF; color: white;">Tanggal</th>
                <th style="background-color: #09B009FF; color: white;">Penjualan</th>
                <th style="background-color: #09B009FF; color: white;">Pembelian</th>
                <th style="background-color: #09B009FF; color: white;">Pengeluaran</th>
                <th style="background-color: #09B009FF; color: white;">Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row['DT_RowIndex'] }}</td>
                    <td>{{ $row['tanggal'] }}</td>
                    <td>{{ $row['penjualan'] }}</td>
                    <td>{{ $row['pembelian'] }}</td>
                    <td>{{ $row['pengeluaran'] }}</td>
                    <td>{{ $row['pendapatan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
