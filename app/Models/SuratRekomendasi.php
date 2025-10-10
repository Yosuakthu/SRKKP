<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratRekomendasi extends Model
{
    protected $fillable = [
        'rekom_request_id',
        'nomor_surat',
        'file_path',
        'tanggal_surat',
    ];

    public function request()
    {
        return $this->belongsTo(RekomRequests::class, 'rekom_request_id');
    }
}
