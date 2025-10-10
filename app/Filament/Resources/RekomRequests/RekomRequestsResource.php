<?php

namespace App\Filament\Resources\RekomRequests;

use App\Filament\Resources\RekomRequests\Pages\CreateRekomRequests;
use App\Filament\Resources\RekomRequests\Pages\EditRekomRequests;
use App\Filament\Resources\RekomRequests\Pages\ListRekomRequests;
use App\Filament\Resources\RekomRequests\Schemas\RekomRequestsForm;
use App\Filament\Resources\RekomRequests\Tables\RekomRequestsTable;
use App\Models\RekomRequests;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RekomRequestsResource extends Resource
{
    protected static ?string $model = RekomRequests::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return RekomRequestsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RekomRequestsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRekomRequests::route('/'),
            'create' => CreateRekomRequests::route('/create'),
            'edit' => EditRekomRequests::route('/{record}/edit'),
        ];
    }
}
