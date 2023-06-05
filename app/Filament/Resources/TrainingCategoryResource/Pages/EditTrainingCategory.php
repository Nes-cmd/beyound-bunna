<?php

namespace App\Filament\Resources\TrainingCategoryResource\Pages;

use App\Filament\Resources\TrainingCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrainingCategory extends EditRecord
{
    protected static string $resource = TrainingCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
