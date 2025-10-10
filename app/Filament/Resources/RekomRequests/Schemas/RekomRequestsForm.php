<?php

namespace App\Filament\Resources\RekomRequests\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class RekomRequestsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nik')
                    ->required(),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('konsumen_pengguna'),
                TextInput::make('jenis_usaha'),
                TextInput::make('nama_kapal'),
                TextInput::make('jenis_alat_mesin'),
                TextInput::make('jumlah_alat_mesin')
                    ->numeric(),
                TextInput::make('daya_alat_mesin'),
                TextInput::make('lama_penggunaan_jam_per_hari')
                    ->numeric(),
                TextInput::make('lama_operasi'),
                TextInput::make('usulan_volume_konsumsi')
                    ->numeric(),
                TextInput::make('estimasi_sisa_jbkp')
                    ->numeric(),
                FileUpload::make('sertifikat_mesin_path')
                    ->label('Sertifikat Mesin')
                    ->directory('sertifikat-mesin') // folder penyimpanan di storage/app/public/sertifikat-mesin
                    ->visibility('public')
                    ->disk('public')          // supaya bisa diakses publik
                    ->acceptedFileTypes(['application/pdf', 'image/*']) // hanya PDF / gambar
                    ->maxSize(2048),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'menunggu_admin' => 'Menunggu admin',
            'tinjau_ulang' => 'Tinjau ulang',
            'menunggu_kepala' => 'Menunggu kepala',
            'disetujui' => 'Disetujui',
            'revisi_admin' => 'Revisi admin',
            'ditolak' => 'Ditolak',
        ])
                    ->default('pending')
                    ->hiddenOn('create')
                    ->required(),
            ]);
    }
}
