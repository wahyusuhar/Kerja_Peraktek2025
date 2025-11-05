<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D; 
// use Barryvdh\DomPDF\PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
    
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');

        return view('produk.index', compact('kategori'));
    }

    public function data()
    {
        $produk = Produk::leftJoin('kategori', 'kategori.id_kategori', 'produk.id_kategori')
            ->select('produk.*', 'nama_kategori')
            // ->orderBy('kode_produk', 'asc')
            ->get();

        return datatables()
            ->of($produk)
            ->addIndexColumn()
            ->addColumn('select_all', function ($produk) {
                return '
                    <input type="checkbox" name="id_produk[]" value="'. $produk->id_produk .'">
                ';
            })
            ->addColumn('kode_produk', function ($produk) {
                return '<span class="label label-success">'. $produk->kode_produk .'</span>';
            })
            ->addColumn('harga_beli', function ($produk) {
                return format_uang($produk->harga_beli);
            })
            ->addColumn('harga_jual', function ($produk) {
                return format_uang($produk->harga_jual);
            })
            ->addColumn('stok', function ($produk) {
                return format_uang($produk->stok);
            })
            ->addColumn('aksi', function ($produk) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('produk.update', $produk->id_produk) .'`)" class="btn btn-success btn-sm me-3" style="padding: 6px 15px; font-size: 18px; border-radius: 4px; box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;"><i class="fa fa-pencil"></i></button>
                    
                    <button type="button" onclick="deleteData(`'. route('produk.destroy', $produk->id_produk) .'`, `'. e($produk->nama_produk) .'`)" class="btn btn-danger btn-sm me-3" style="padding: 6px 15px; font-size: 18px; border-radius: 4px; box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'kode_produk', 'select_all'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   // Menambahkan response untuk alert di store
   public function store(Request $request)
   {
       $produk = Produk::latest()->first() ?? new Produk();
       $request['kode_produk'] = 'P'. tambah_nol_didepan((int)$produk->id_produk +1, 6);
   
       $produk = Produk::create($request->all());
   
       // Menambahkan response dengan SweetAlert, kirim nama produk
       return response()->json([
           'status' => 'success',
           'message' => 'Produk berhasil disimpan',
           'produk_nama' => $produk->nama_produk, // Mengirim nama produk
           'type' => 'success' // ini adalah tipe alert (success, error, info, etc)
       ], 200);
   }
// Menambahkan response untuk alert di update
// public function update(Request $request, $id)
// {
//     $produk = Produk::find($id);
//     $produk->update($request->all());

//     // Menambahkan response dengan SweetAlert, kirim nama produk
//     return response()->json([
//         'status' => 'success',
//         'message' => 'Produk berhasil disimpan',
//         'produk_nama' => $produk->nama_produk, // Mengirim nama produk
//         'type' => 'success'
//     ], 200);
// }

// Menambahkan response untuk a

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::find($id);

        return response()->json($produk);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, $id)
{
    $produk = Produk::find($id);
    $produk->update($request->all());

    // Menambahkan response dengan SweetAlert, kirim nama produk
    return response()->json([
        'status' => 'success',
        'message' => 'Produk berhasil disimpan',
        'produk_nama' => $produk->nama_produk, // Mengirim nama produk
        'type' => 'success'
    ], 200);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk_nama = $produk->nama_produk; // Menyimpan nama produk untuk ditampilkan di alert
        $produk->delete();
    
        // Menambahkan response dengan SweetAlert
        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil dihapus',
            'produk_nama' => $produk_nama, // Mengirim nama produk yang dihapus
            'type' => 'success'
        ], 200);
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request->id_produk as $id) {
            $produk = Produk::find($id);
            $produk->delete();
        }

        return response(null, 204);
    }
    public function cetakBarcode(Request $request) 
    {
        $dataproduk = [];
    
        foreach ($request->id_produk as $id) {
            $produk = Produk::find($id);
    
            if (!$produk) {
                return "Produk dengan id $id tidak ditemukan";
            }
    
            if (empty($produk->kode_produk)) {
                return "Produk dengan id $id tidak punya kode_produk";
            }
    
            // Ganti dari getBarcodePNG ke getBarcodeSVG
            $barcodeSVG = DNS1D::getBarcodeSVG($produk->kode_produk,'C128', 2.0, 80, 'black');

    
            if (!$barcodeSVG) {
                return "Gagal generate barcode untuk produk dengan kode {$produk->kode_produk}";
            }
    
            $produk->barcode = $barcodeSVG;
            $dataproduk[] = $produk;
        }
    
        return view('produk.barcode', compact('dataproduk'));
    }
    
    

    public function cari(Request $request)
    {
        $produk = Produk::where('kode_produk', $request->kode_produk)->first();
    
        if (!$produk) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produk tidak ditemukan'
            ]);
        }
    
        return response()->json([
            'status' => 'success',
            'data' => $produk
        ]);
    }
    
// public function cetakBarcode(Request $request)
// {
//     $dataproduk = Produk::whereIn('id', $request->id_produk)->get();
//     $no = 1;

//     $pdf = app('dompdf.wrapper');
//     $pdf->loadView('produk.barcode', compact('dataproduk', 'no'));
//     $pdf->setPaper('a4', 'portrait');
//     return $pdf->stream('produk.pdf');
// }


}
