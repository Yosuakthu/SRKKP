<?php

namespace App\Filament\Resources\Permohonans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PermohonansTable
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
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
