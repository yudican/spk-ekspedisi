<?php

namespace App\Filament\Resources\ScoreResource\Pages;

use App\Filament\Resources\ScoreResource;
use App\Models\Score;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateScore extends CreateRecord
{
    protected static string $resource = ScoreResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data_to_save = [];
        $parent_id = time(); // Generate a unique parent ID

        // Prepare data for saving
        foreach ($data['attributes_id'] as $value) {
            $data_to_save[] = [
                'parent_id' => $parent_id,
                'alternative_id' => $data['alternative_id'],
                'attribute_id' => $value,
            ];
        }

        return $data_to_save;
    }

    protected function handleRecordCreation(array $data): Model
    {
        // Perform a bulk insert
        static::getModel()::insert($data);

        // Extract identifiers if needed; assume 'parent_id' is unique or use other identifiers
        $parentId = $data[0]['parent_id'] ?? null;

        // Retrieve the created records
        return static::getModel()::where('parent_id', $parentId)->first();
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
