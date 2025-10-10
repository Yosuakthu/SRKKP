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
        Schema::create('surat_rekomendasis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('rekom_request_id')->constrained()->cascadeOnDelete();
        $table->string('nomor_surat')->nullable();
        $table->string('file_path')->nullable(); // path file pdf hasil generate
        $table->date('tanggal_surat')->nullable();
        $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_rekomendasis');
    }
};
