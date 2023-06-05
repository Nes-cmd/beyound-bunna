<?php

namespace App\Filament\Resources\TrainingResource\Pages;

use App\Filament\Resources\TrainingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTraining extends EditRecord
{
    protected static string $resource = TrainingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
