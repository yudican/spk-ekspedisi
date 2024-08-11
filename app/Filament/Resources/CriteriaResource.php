<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CriteriaResource\Pages;
use App\Filament\Resources\CriteriaResource\RelationManagers;
use App\Models\Criteria;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CriteriaResource extends Resource
{
    protected static ?string $model = Criteria::class;
    protected static ?string $navigationLabel = 'Data Kriteria';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Kriteria')
                    ->required()
                    ->columnSpan('full'),
                TextInput::make('weight')
                    ->label('Bobot')
                    ->numeric()
                    ->required()
                    ->minValue(0.1)
                    ->maxValue(1)
                    ->placeholder('0.1 - 1')
                    ->columnSpan('full'),
                Select::make('is_benefit')
                    ->required()
                    ->label('Cost/Benefit')
                    ->options([
                        0 => 'Cost',
                        1 => 'Benefit',
                    ])
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Alternative'),
                TextColumn::make('weight')->label('Bobot'),
                TextColumn::make('is_benefit')->label('Cost/Benefit')->formatStateUsing(function (string $state) {
                    if ($state == 0) {
                        return 'Cost';
                    }
                    return 'Benefit';
                }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListCriterias::route('/'),
            // 'create' => Pages\CreateCriteria::route('/create'),
            // 'edit' => Pages\EditCriteria::route('/{record}/edit'),
        ];
    }
}
