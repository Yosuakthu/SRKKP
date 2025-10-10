<?php

namespace App\Filament\Resources\RekomRequests\Pages;

use App\Filament\Resources\RekomRequests\RekomRequestsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRekomRequests extends ListRecords
{
    protected static string $resource = RekomRequestsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
