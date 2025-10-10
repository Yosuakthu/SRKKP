<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekomRequests;
use Barryvdh\DomPDF\Facade\Pdf;

class RekomController extends Controller
{
    // Menampilkan data untuk cetak PDF
    public function cetakSurat($id)
    {
        // Ambil data utama + relasi surat rekomendasi
        $data = RekomRequests::with('suratRekomendasi')->find($id);

        if (!$data) {
            abort(404, 'Data tidak ditemukan');
        }

        // Generate PDF dari view
        $pdf = Pdf::loadView('pdf.surat_rekomendasi', compact('data'))->setPaper('A4', 'portrait');

        // Tampilkan langsung di browser
        return $pdf->stream('Surat-Rekomendasi-'.$data->nama.'.pdf');
    }
}
