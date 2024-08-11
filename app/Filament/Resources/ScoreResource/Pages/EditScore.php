<?php

namespace App\Filament\Resources\ScoreResource\Pages;

use App\Filament\Resources\ScoreResource;
use App\Models\Score;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScore extends EditRecord
{
    protected static string $resource = ScoreResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $scores = Score::where('parent_id', $data['parent_id'])->get();
        $attributes = [];
        foreach ($scores as $key => $score) {
            $attributes[$score->attribute_id] = $score->attribute_id;
        }
        $data['attributes_id'] = $attributes;
        return $data;
    }
}
