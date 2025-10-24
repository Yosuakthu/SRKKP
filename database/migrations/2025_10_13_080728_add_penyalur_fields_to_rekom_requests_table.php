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
        Schema::table('rekom_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('rekom_requests', 'tempat_pengambilan')) {
                $table->string('tempat_pengambilan')->nullable();
            }
            if (!Schema::hasColumn('rekom_requests', 'no_penyalur')) {
                $table->string('no_penyalur')->nullable();
            }
            if (!Schema::hasColumn('rekom_requests', 'alamat_penyalur')) {
                $table->string('alamat_penyalur')->nullable();
            }
            if (!Schema::hasColumn('rekom_requests', 'klasifikasi_gt')) {
                $table->string('klasifikasi_gt')->nullable(); // ✅ kolom baru ditambahkan di sini
            }
        });
    }

    public function down(): void
    {
        Schema::table('rekom_requests', function (Blueprint $table) {
            $table->dropColumn([
                'tempat_pengambilan',
                'no_penyalur',
                'alamat_penyalur',
                'klasifikasi_gt', // ✅ hapus juga saat rollback
            ]);
        });
    }
};
