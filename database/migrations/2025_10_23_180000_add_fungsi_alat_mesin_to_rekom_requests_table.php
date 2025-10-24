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
            if (!Schema::hasColumn('rekom_requests', 'fungsi_alat_mesin')) {
                $table->string('fungsi_alat_mesin')->nullable()->after('jenis_alat_mesin');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rekom_requests', function (Blueprint $table) {
            $table->dropColumn('fungsi_alat_mesin');
        });
    }
};
