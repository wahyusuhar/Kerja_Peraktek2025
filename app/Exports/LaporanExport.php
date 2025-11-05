<?php

namespace App\Exports;

use App\Models\Penjualan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    protected $awal;
    protected $akhir;

    public function __construct($awal, $akhir)
    {
        $this->awal = $awal;
        $this->akhir = $akhir;
    }

    public function view(): View
    {
        $data = Penjualan::whereBetween('created_at', [$this->awal, $this->akhir])->get();

        return view('laporan.excel', [
            'data' => $data,
            'awal' => $this->awal,
            'akhir' => $this->akhir
        ]);
    }
}

