<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up(): void
    {
        DB::statement("
            ALTER TABLE rekom_requests
            MODIFY COLUMN status ENUM(
                'pending',
                'menunggu_admin',
                'tinjau_ulang',
                'menunggu_kepala',
                'disetujui',
                'revisi_admin',
                'siap_publikasi',
                'dipublikasikan',
                'ditolak'
            ) NOT NULL DEFAULT 'pending'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE rekom_requests
            MODIFY COLUMN status ENUM(
                'pending',
                'menunggu_admin',
                'tinjau_ulang',
                'menunggu_kepala',
                'disetujui',
                'revisi_admin',
                'siap_publikasi',
                'dipublikasikan',
                'ditolak''
            ) NOT NULL DEFAULT 'pending'
        ");
    }
};
