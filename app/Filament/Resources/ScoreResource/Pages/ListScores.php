<?php

namespace App\Filament\Resources\ScoreResource\Pages;

use App\Filament\Resources\ScoreResource;
use App\Models\Score;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScores extends ListRecords
{
    protected static string $resource = ScoreResource::class;



    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function ($data) {
                $data_to_save = [];
                $parent_id = time();
                foreach ($data['attributes_id'] as $key => $value) {
                    $data_to_save[] = [
                        'parent_id' => $parent_id,
                        'alternative_id' => $data['alternative_id'],
                        'attribute_id' => $value,
                    ];
                }
                return $data_to_save;
            })->action(function ($data) {
                foreach ($data as $item) {
                    if (is_array($item)) {
                        Score::create($item);
                    }
                }
            }),
        ];
    }
}
