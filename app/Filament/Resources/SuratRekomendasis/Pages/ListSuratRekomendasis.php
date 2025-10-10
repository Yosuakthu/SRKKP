<?php

namespace App\Filament\Resources\SuratRekomendasis\Pages;

use App\Filament\Resources\SuratRekomendasis\SuratRekomendasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSuratRekomendasis extends ListRecords
{
    protected static string $resource = SuratRekomendasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
