<?php

namespace App\Filament\Resources\SuratRekomendasis;

use App\Filament\Resources\SuratRekomendasis\Pages\CreateSuratRekomendasi;
use App\Filament\Resources\SuratRekomendasis\Pages\EditSuratRekomendasi;
use App\Filament\Resources\SuratRekomendasis\Pages\ListSuratRekomendasis;
use App\Filament\Resources\SuratRekomendasis\Schemas\SuratRekomendasiForm;
use App\Filament\Resources\SuratRekomendasis\Tables\SuratRekomendasisTable;
use App\Models\SuratRekomendasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SuratRekomendasiResource extends Resource
{
    protected static ?string $model = SuratRekomendasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nomor_surat';

    public static function form(Schema $schema): Schema
    {
        return SuratRekomendasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SuratRekomendasisTable::configure($table);
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
            'index' => ListSuratRekomendasis::route('/'),
            'create' => CreateSuratRekomendasi::route('/create'),
            'edit' => EditSuratRekomendasi::route('/{record}/edit'),
        ];
    }
}
