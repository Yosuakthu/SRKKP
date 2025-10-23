<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekomRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PermohonanController extends Controller
{
    public function create()
    {
        return view('permohonan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'alamat' => 'required|string',
            'konsumen_pengguna' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:255',
            'nama_kapal' => 'required|string|max:255',
            'jenis_alat_mesin' => 'required|string|max:255',
            'fungsi_alat_mesin' => 'required|string|max:255',
            'jumlah_alat_mesin' => 'required|integer|min:1',
            'daya_alat_mesin' => 'required|string|max:255',
            'lama_penggunaan_jam_per_hari' => 'required|integer|min:1',
            'lama_operasi' => 'required|string|max:255',
            'usulan_volume_konsumsi' => 'required|numeric|min:0',
            'estimasi_sisa_jbkp' => 'required|numeric|min:0',
            'sertifikat_mesin_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['status'] = 'draft';

        // Handle file upload
        if ($request->hasFile('sertifikat_mesin_path')) {
            $file = $request->file('sertifikat_mesin_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('sertifikat_mesin', $filename, 'public');
            $data['sertifikat_mesin_path'] = $path;
        }

        RekomRequests::create($data);

        return redirect()->route('dashboard')->with('success', 'Permohonan berhasil diajukan dan menunggu verifikasi.');
    }

    public function show($id)
    {
        $permohonan = RekomRequests::where('user_id', Auth::id())->findOrFail($id);
        return view('permohonan.show', compact('permohonan'));
    }

    public function edit($id)
    {
        $permohonan = RekomRequests::where('user_id', Auth::id())->findOrFail($id);

        // Only allow editing if status is draft
        if ($permohonan->status !== 'draft') {
            return redirect()->route('dashboard')->with('error', 'Permohonan yang sudah diajukan tidak dapat diedit.');
        }

        return view('permohonan.edit', compact('permohonan'));
    }

    public function update(Request $request, $id)
    {
        $permohonan = RekomRequests::where('user_id', Auth::id())->findOrFail($id);

        if ($permohonan->status !== 'draft') {
            return redirect()->route('dashboard')->with('error', 'Permohonan yang sudah diajukan tidak dapat diupdate.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'alamat' => 'required|string',
            'konsumen_pengguna' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:255',
            'nama_kapal' => 'required|string|max:255',
            'jenis_alat_mesin' => 'required|string|max:255',
            'fungsi_alat_mesin' => 'required|string|max:255',
            'jumlah_alat_mesin' => 'required|integer|min:1',
            'daya_alat_mesin' => 'required|string|max:255',
            'lama_penggunaan_jam_per_hari' => 'required|integer|min:1',
            'lama_operasi' => 'required|string|max:255',
            'usulan_volume_konsumsi' => 'required|numeric|min:0',
            'estimasi_sisa_jbkp' => 'required|numeric|min:0',
            'sertifikat_mesin_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('sertifikat_mesin_path')) {
            // Delete old file if exists
            if ($permohonan->sertifikat_mesin_path && Storage::disk('public')->exists($permohonan->sertifikat_mesin_path)) {
                Storage::disk('public')->delete($permohonan->sertifikat_mesin_path);
            }

            $file = $request->file('sertifikat_mesin_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('sertifikat_mesin', $filename, 'public');
            $data['sertifikat_mesin_path'] = $path;
        }

        $permohonan->update($data);

        return redirect()->route('dashboard')->with('success', 'Permohonan berhasil diupdate.');
    }

    public function submit($id)
    {
        $permohonan = RekomRequests::where('user_id', Auth::id())->findOrFail($id);

        if ($permohonan->status !== 'draft') {
            return redirect()->route('dashboard')->with('error', 'Permohonan sudah diajukan.');
        }

        $permohonan->update(['status' => 'menunggu_operator']);

        return redirect()->route('dashboard')->with('success', 'Permohonan berhasil diajukan dan menunggu verifikasi operator.');
    }
}
