<?php

namespace App\Filament\Resources\Years;

use App\Filament\Resources\Years\Pages\ManageYears;
use App\Models\Year;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class YearResource extends Resource
{
    protected static ?string $model = Year::class;
    protected static ?string $modelLabel = 'Años';
    protected static ?int $navigationSort = 1;


    protected static string|BackedEnum|null $navigationIcon = Heroicon::CalendarDays;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Año')
                    ->required()
                    ->maxLength(4),
                Checkbox::make('active')
                    ->label('Activo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Año')
                    ->sortable()
                    ->searchable(),
                BooleanColumn::make('active')
                    ->label('Activo')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageYears::route('/'),
        ];
    }
}
