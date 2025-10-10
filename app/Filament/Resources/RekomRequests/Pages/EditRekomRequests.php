<?php

namespace App\Filament\Resources\RekomRequests\Pages;

use App\Filament\Resources\RekomRequests\RekomRequestsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRekomRequests extends EditRecord
{
    protected static string $resource = RekomRequestsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
