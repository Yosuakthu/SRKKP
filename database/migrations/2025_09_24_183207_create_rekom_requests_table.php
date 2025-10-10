<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rekom_requests', function (Blueprint $table) {
            $table->id();

            // Data pemohon
            $table->string('nama');
            $table->string('nik');
            $table->text('alamat');

            // Data usaha & kapal
            $table->string('konsumen_pengguna')->nullable(); // contoh: Usaha Perikanan
            $table->string('jenis_usaha')->nullable();       // contoh: Penangkapan Ikan
            $table->string('nama_kapal')->nullable();

            // Data alat/mesin
            $table->string('jenis_alat_mesin')->nullable();
            $table->integer('jumlah_alat_mesin')->nullable();
            $table->string('daya_alat_mesin')->nullable();
            $table->integer('lama_penggunaan_jam_per_hari')->nullable();
            $table->string('lama_operasi')->nullable(); // Harian / Mingguan / Bulanan
            $table->decimal('usulan_volume_konsumsi', 12, 2)->nullable(); // liter per minggu/bulan
            $table->decimal('estimasi_sisa_jbkp', 12, 2)->nullable();     // liter

            // Upload file
            $table->string('sertifikat_mesin_path')->nullable();

            // Tracking status verifikasi
            $table->enum('status', [
                'pending',          // baru diajukan oleh nelayan
                'menunggu_admin',   // menunggu verifikasi admin
                'tinjau_ulang',     // admin minta revisi
                'menunggu_kepala',  // menunggu keputusan kepala
                'disetujui',        // kepala setuju & rekom keluar
                'revisi_admin',     // dikembalikan untuk revisi
                'ditolak'           // permohonan ditolak
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekom_requests');
    }
};
