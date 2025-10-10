<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekomRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','nama','nik','alamat','konsumen_pengguna','jenis_usaha','nama_kapal',
        'jenis_alat_mesin','fungsi_alat_mesin','jumlah_alat_mesin','daya_alat_mesin',
        'lama_penggunaan_jam_per_hari','lama_operasi','usulan_volume_konsumsi',
        'estimasi_sisa_jbkp','status','admin_id','admin_verified_at','admin_note',
        'kepala_id','kepala_action_at','kepala_note','sertifikat_mesin_path','surat_rekom_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // nelayan
    }
public function suratRekomendasi()
{
    return $this->hasOne(SuratRekomendasi::class, 'rekom_request_id');
    // ganti 'nama_foreign_key' sesuai kolom di database
}



}
