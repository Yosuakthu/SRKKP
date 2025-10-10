<?php

namespace App\Filament\Resources\RekomRequests\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;
use Carbon\Carbon;
use App\Models\SuratRekomendasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class RekomRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable(),
                TextColumn::make('nik')->searchable(),
                TextColumn::make('konsumen_pengguna')->searchable(),
                TextColumn::make('jenis_usaha')->searchable(),
                TextColumn::make('nama_kapal')->searchable(),
                TextColumn::make('jenis_alat_mesin')->searchable(),
                TextColumn::make('jumlah_alat_mesin')->numeric()->sortable(),
                TextColumn::make('daya_alat_mesin')->searchable(),
                TextColumn::make('lama_penggunaan_jam_per_hari')->numeric()->sortable(),
                TextColumn::make('lama_operasi')->searchable(),
                TextColumn::make('usulan_volume_konsumsi')->numeric()->sortable(),
                TextColumn::make('estimasi_sisa_jbkp')->numeric()->sortable(),
                TextColumn::make('sertifikat_mesin_path')
                    ->label('Sertifikat Mesin')
                    ->url(fn ($record) => asset('storage/' . $record->sertifikat_mesin_path))
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn ($state) => 'Sertifikat Mesin'),
                TextColumn::make('status')->badge(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([

                EditAction::make(),

                // --- Operator: TERIMA ---
                Action::make('approve_operator')
                    ->label('Terima')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['status' => 'menunggu_kepala']))
                    ->visible(fn ($record) =>
                        Filament::auth()->user()
                        ->hasRole('operator') &&
                        in_array($record->status, ['pending','menunggu_admin'])
                    ),

                // --- Operator: TOLAK ---
                Action::make('reject_operator')
                    ->label('Tolak')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['status' => 'ditolak_operator']))
                    ->visible(fn ($record) =>
                        Filament::auth()->user()
                        ->hasRole('operator') &&
                        in_array($record->status, ['pending','menunggu_admin'])
                    ),

                // --- Kepala Dinas: TERIMA ---
                Action::make('approve_kepala')
    ->label('Terima')
    ->color('success')
    ->icon('heroicon-o-check-circle')
    ->requiresConfirmation()
    ->action(function ($record) {
        // 1️⃣ Update status permintaan
        $record->update(['status' => 'disetujui']);

        // 2️⃣ Buat nomor surat otomatis
        $nomorSurat = '302-KAB/'.$record->id.'/PERIKANAN/JBKP/'.now()->format('m/Y');

        // 3️⃣ Generate PDF surat rekomendasi
        $pdf = Pdf::loadView('pdf.surat_rekomendasi', [
            'data' => $record,
            'nomorSurat' => $nomorSurat,
            'tanggalSurat' => Carbon::now()->format('d F Y'),
        ]);

        // 4️⃣ Simpan PDF ke storage
        $path = 'surat_rekomendasi/surat_'.$record->id.'.pdf';
        Storage::disk('public')->put($path, $pdf->output());

        // 5️⃣ Simpan ke tabel surat_rekomendasi
        SuratRekomendasi::create([
            'rekom_request_id' => $record->id,
            'nomor_surat' => $nomorSurat,
            'file_path' => $path,
            'tanggal_surat' => now(),
        ]);
    })
    ->visible(fn ($record) =>
        Filament::auth()->user()->hasRole('kadis') &&
        $record->status === 'menunggu_kepala'
    ),
    Action::make('lihat_surat')
    ->label('Lihat Surat')
    ->icon('heroicon-o-eye')
    ->url(fn ($record) => Storage::url(optional($record->suratRekomendasi)->file_path))
    ->openUrlInNewTab()
    ->visible(fn ($record) => $record->status === 'disetujui'),



                // --- Kepala Dinas: TOLAK ---
                Action::make('reject_kepala')
                    ->label('Tolak')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['status' => 'ditolak_kepala']))
                    ->visible(fn ($record) =>
                        Filament::auth()->user()
                        ->hasRole('kadis') &&
                        $record->status === 'menunggu_kepala'
                ),
            ]);
    }
}
