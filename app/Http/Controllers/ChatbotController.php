<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // sesuaikan dengan model produk kamu

class ChatbotController extends Controller
{
    public function ask(Request $request)
    {
        $question = strtolower($request->input('question'));

        // ✅ Cek stok
        if (str_contains($question, 'stok')) {
            $productName = trim(str_replace('stok', '', $question));
            $product = Produk::where('name', 'like', "%$productName%")->first();

            if ($product) {
                return response()->json([
                    'answer' => "Stok {$product->name} adalah {$product->stock} pcs."
                ]);
            }
            return response()->json(['answer' => "Produk tidak ditemukan."]);
        }

        // ✅ Cek harga
        if (str_contains($question, 'harga')) {
            $productName = trim(str_replace('harga', '', $question));
            $product = Produk::where('name', 'like', "%$productName%")->first();

            if ($product) {
                return response()->json([
                    'answer' => "Harga {$product->name} adalah Rp" . number_format($product->price, 0, ',', '.')
                ]);
            }
            return response()->json(['answer' => "Produk tidak ditemukan."]);
        }

        // ✅ Default response
        return response()->json([
            'answer' => "Perintah tidak dikenal. Coba ketik: 'stok [nama produk]' atau 'harga [nama produk]'."
        ]);
    }
}
