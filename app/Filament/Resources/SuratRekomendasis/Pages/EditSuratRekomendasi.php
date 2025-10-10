<?php

namespace App\Filament\Resources\SuratRekomendasis\Pages;

use App\Filament\Resources\SuratRekomendasis\SuratRekomendasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSuratRekomendasi extends EditRecord
{
    protected static string $resource = SuratRekomendasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
