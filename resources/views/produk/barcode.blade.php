{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cetak Barcode</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center; 
            gap: 10px;
           
        }
    
        .barcode-container {
            width: 180px; 
            padding: 10px;
            border: 1px solid #333;
            border-radius: 6px;
            text-align: center;
            box-sizing: border-box;
            page-break-inside: avoid;
            
        }
    
        .barcode-container p {
            margin: 4px 0 6px;
            font-size: 12px;
        }
    
        .barcode-container svg {
            width: 100%;
            max-height: 150px;
            height: 100%;
        }
    
        .barcode-code {
            font-size: 12px;
            font-weight: bold;
            color: #0033cc;
            margin-top: 4px;
        }
    </style>
    
    <body>
        @foreach ($dataproduk as $produk)
        <div class="barcode-container">
            <p>{{ $produk->nama_produk }}<br>Rp. {{ number_format($produk->harga_jual, 0, ',', '.') }}</p>
    
            @if (!empty($produk->barcode))
                {!! $produk->barcode !!}
               
            @else
                <p style="color:red">Barcode gagal!</p>
            @endif
        </div>
        @endforeach
    </body>
    

</html> --}}




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cetak Barcode</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 16px;
      background-color: #fff; /* latar putih agar kontras */
    }

    .barcode-container {
      width: 220px;
      padding: 12px;
      border: 2px solid #000;
      border-radius: 6px;
      text-align: center;
      box-sizing: border-box;
      page-break-inside: avoid;
      background-color: #fff; /* latar putih untuk hasil crop yang bersih */
    }

    .barcode-container p {
      margin: 6px 0;
      font-size: 13px;
      color: #000;
    }

    .barcode-container svg {
      width: 100%;
      height: auto;
      max-height: 150px;
      background-color: #fff;
      padding: 4px;
    }

    .barcode-code {
      font-size: 13px;
      font-weight: bold;
      color: #000;
      margin-top: 4px;
      letter-spacing: 1px;
    }
  </style>
</head>

<body>
  @foreach ($dataproduk as $produk)
    <div class="barcode-container">
      <p>{{ $produk->nama_produk }}<br>Rp. {{ number_format($produk->harga_jual, 0, ',', '.') }}</p>

      @if (!empty($produk->barcode))
        {!! $produk->barcode !!}
        {{-- <div class="barcode-code">{{ $produk->kode_produk }}</div> --}}
      @else
        <p style="color:red">Barcode gagal!</p>
      @endif
    </div>
  @endforeach
</body>
</html>
