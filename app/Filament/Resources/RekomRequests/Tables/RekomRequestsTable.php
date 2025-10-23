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
use Filament\Forms\Components\TextInput;


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
                    ->formatStateUsing(fn ($state) => 'Lihat Sertifikat'),
                TextColumn::make('status')->badge(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([

                EditAction::make(),

                // 🟢 Operator: TERIMA permohonan dari nelayan
                Action::make('approve_operator')
                    ->label('Terima')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation()
                    ->schema([
                        TextInput::make('klasifikasi_gt')
                            ->label('Klasifikasi GT Mesin')
                            ->required(),

                        TextInput::make('tempat_pengambilan')
                            ->label('Tempat Pengambilan')
                            ->required(),

                        TextInput::make('alamat_penyalur')
                            ->label('Alamat Penyalur')
                            ->required(),

                        TextInput::make('no_penyalur')
                            ->label('Nomor Penyalur')
                            ->required(),
                    ])
                    ->action(function (array $data, $record) {
                        $record->update([
                            ...$data,
                            'status' => 'menunggu_kepala',
                        ]);
                    })
                    ->visible(fn ($record) =>
                        Filament::auth()->user()->hasRole('operator') &&
                        in_array($record->status, ['pending','menunggu_admin'])
                    ),

                // 🔴 Operator: TOLAK permohonan dari nelayan
                Action::make('reject_operator')
                    ->label('Tolak')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['status' => 'ditolak_operator']))
                    ->visible(fn ($record) =>
                        Filament::auth()->user()->hasRole('operator') &&
                        in_array($record->status, ['pending','menunggu_admin'])
                    ),

                // 🟡 Kepala Dinas: SETUJUI → langsung publikasi surat
                Action::make('approve_kepala')
                    ->label('Setujui')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        // 🟢 1. Buat nomor surat
                        $nomorSurat = '302-KAB/'.$record->id.'/PERIKANAN/JBKP/'.now()->format('m/Y');

                        // 🟢 2. Simpan dulu nomor surat ke DB (agar relasi terbentuk)
                        $surat = SuratRekomendasi::updateOrCreate(
                            ['rekom_request_id' => $record->id],
                            [
                                'nomor_surat' => $nomorSurat,
                                'tanggal_surat' => now(),
                            ]
                        );

                        // 🟢 3. Update status ke "dipublikasikan"
                        $record->update(['status' => 'dipublikasikan']);

                        // 🟢 4. Ambil ulang record dengan relasi surat
                        $record->load('suratRekomendasi');

                        // 🟢 5. Buat PDF dengan data terbaru (yang sudah punya nomor_surat)
                        $pdf = Pdf::loadView('pdf.surat_rekomendasi', [
                            'data' => $record,
                            'nomorSurat' => $surat->nomor_surat,
                            'tanggalSurat' => Carbon::now()->format('d F Y'),
                        ]);

                        // 🟢 6. Simpan PDF ke storage
                        $path = 'surat_rekomendasi/surat_'.$record->id.'.pdf';
                        Storage::disk('public')->put($path, $pdf->output());

                        // 🟢 7. Update path file di database
                        $surat->update(['file_path' => $path]);
                    })
                    ->visible(fn ($record) =>
                        Filament::auth()->user()->hasRole('kadis') &&
                        $record->status === 'menunggu_kepala'
                    ),

                // 🔴 Kepala Dinas: TOLAK
                Action::make('reject_kepala')
                    ->label('Tolak')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['status' => 'ditolak_kepala']))
                    ->visible(fn ($record) =>
                        Filament::auth()->user()->hasRole('kadis') &&
                        $record->status === 'menunggu_kepala'
                    ),





                // 👁 Kepala Dinas dan Operator: LIHAT SURAT hanya jika SUDAH DIPUBLIKASIKAN
                Action::make('lihat_surat')
                    ->label('Lihat Surat')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => Storage::url(optional($record->suratRekomendasi)->file_path))
                    ->openUrlInNewTab()
                    ->visible(fn ($record) =>
                        $record->status === 'dipublikasikan'
                    ),
            ]);
    }
}
