<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ChatBotKasirController extends Controller
{
    // Menampilkan halaman chatbot
    public function index()
    {
        return view('kasir.chatboot');
    }

   // API chatbot
public function ask(Request $request)
{
    $question = strtolower(trim($request->input('question')));

    // Bersihkan input dari spasi berlebih
    $question = preg_replace('/\s+/', ' ', $question);

    // ✅ Deteksi jika ada kata "berapa" di awal
    if (str_starts_with($question, 'berapa')) {
        // Hapus kata "berapa" supaya bisa diproses sama seperti query biasa
        $question = trim(str_replace('berapa', '', $question));
    }

    // ✅ Cek stok produk
    if (str_contains($question, 'stok')) {
        $productName = trim(str_replace('stok', '', $question));

        $produk = Produk::where('nama_produk', 'like', "%$productName%")
            ->orWhere('kode_produk', 'like', "%$productName%")
            ->first();

        if ($produk) {
            return response()->json([
                'answer' => "📦 Stok <b>{$produk->nama_produk}</b> adalah <b>{$produk->stok}</b> pcs."
            ]);
        }
        return response()->json(['answer' => "❌ Produk dengan nama \"$productName\" tidak ditemukan."]);
    }

    // ✅ Cek harga produk
    if (str_contains($question, 'harga')) {
        $productName = trim(str_replace('harga', '', $question));

        $produk = Produk::where('nama_produk', 'like', "%$productName%")
            ->orWhere('kode_produk', 'like', "%$productName%")
            ->first();

        if ($produk) {
            return response()->json([
                'answer' => "💰 Harga <b>{$produk->nama_produk}</b> adalah <b>Rp" . number_format($produk->harga_jual, 0, ',', '.') . "</b>"
            ]);
        }
        return response()->json(['answer' => "❌ Produk dengan nama \"$productName\" tidak ditemukan."]);
    }

    // ✅ Cek detail produk
    if (str_contains($question, 'detail')) {
        $productName = trim(str_replace('detail', '', $question));

        $produk = Produk::where('nama_produk', 'like', "%$productName%")
            ->orWhere('kode_produk', 'like', "%$productName%")
            ->first();

        if ($produk) {
            return response()->json([
                'answer' => "📋 <b>Detail Produk:</b><br>
                🔹 Nama: {$produk->nama_produk}<br>
                🔹 Merk: {$produk->merk}<br>
                🔹 Harga: Rp" . number_format($produk->harga_jual, 0, ',', '.') . "<br>
                🔹 Stok: {$produk->stok} pcs"
            ]);
        }
        return response()->json(['answer' => "❌ Produk dengan nama \"$productName\" tidak ditemukan."]);
    }

    // ✅ Dummy informasi toko
    if (str_contains($question, 'toko')) {
        return response()->json([
            'answer' => "🏪 <b>Informasi Toko Tiga Putra</b><br>
            📍 Alamat: Jl. Merdeka No.123, Wonosobo<br>
            ⏰ Jam Buka: 08.00 - 21.00 WIB<br>
            📞 Telp: 0812-3456-7890<br>
            💳 Layanan: Bayar tunai, transfer, QRIS"
        ]);
    }

    // ✅ Default jika tidak dikenali
    return response()->json([
        'answer' => "🤖 Perintah tidak dikenal.<br>Coba ketik:<br>
        - <b>stok [nama produk]</b><br>
        - <b>harga [nama produk]</b><br>
        - <b>detail [nama produk]</b><br>
        - <b>info toko</b>"
    ]);
}
}