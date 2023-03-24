<?php

namespace App\Filament\Resources\SpecialProductResource\Pages;

use App\Filament\Resources\SpecialProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpecialProducts extends ListRecords
{
    protected static string $resource = SpecialProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
