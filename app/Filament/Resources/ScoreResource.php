<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScoreResource\Pages;
use App\Models\Alternative;
use App\Models\Attribute;
use App\Models\Criteria;
use App\Models\Score;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ScoreResource extends Resource
{
    protected static ?string $model = Score::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderBy('created_at', 'DESC')->groupBy('parent_id');
    }

    public static function form(Form $form): Form
    {
        $criterias = Criteria::all();
        $columns = [
            Select::make('alternative_id')
                ->label('Nama Alternatif')
                ->required()
                ->options(Alternative::all()->pluck('name', 'id'))
                ->searchable()
                ->columnSpan('full'),
        ];

        // Dynamic columns from criteria
        $criteriaColumns = $criterias->map(function ($item) {
            return Select::make('attributes_id.' . $item->id)
                ->label('Kriteria')
                ->required()
                ->options(Attribute::where('criteria_id', $item->id)->get()->pluck('name', 'id'))
                ->searchable()
                ->columnSpan('full');
        })->toArray();

        // Merge static and dynamic columns
        $columns = array_merge($columns, $criteriaColumns);
        return $form
            ->schema($columns);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->mutateRecordDataUsing(function ($data) {
                    $scores = Score::where('parent_id', $data['parent_id'])->get();
                    $attributes = [];
                    foreach ($scores as $key => $score) {
                        $attributes[$score->attribute_id] = $score->attribute_id;
                    }
                    $data['attributes_id'] = $attributes;
                    return $data;
                })->mutateFormDataUsing(function ($data) {
                    $data_to_save = [];
                    foreach ($data['attributes_id'] as $key => $value) {
                        $data_to_save['attribute_id'] = $value;
                        $data_to_save[] = [
                            'alternative_id' => $data['alternative_id'],
                            'attribute_id' => $value,
                        ];
                    }
                    return $data_to_save;
                })->action(function ($data) {
                    foreach ($data as $item) {
                        if (is_array($item)) {
                            Score::updateOrCreate(
                                [
                                    'alternative_id' => $item['alternative_id'],
                                    'attribute_id' => $item['attribute_id'],
                                ],
                                $item
                            );
                        }
                    }
                }),
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
            'index' => Pages\ListScores::route('/'),
            'create' => Pages\CreateScore::route('/create'),
            'edit' => Pages\EditScore::route('/{record}/edit'),
        ];
    }
}
