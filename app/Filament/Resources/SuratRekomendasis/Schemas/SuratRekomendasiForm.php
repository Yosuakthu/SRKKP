<?php

namespace App\Filament\Resources\SuratRekomendasis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SuratRekomendasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('rekom_request_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nomor_surat'),
                TextInput::make('file_path'),
                DatePicker::make('tanggal_surat'),
            ]);
    }
}
