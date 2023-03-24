<?php

namespace App\Filament\Resources\ShippmentRateResource\Pages;

use App\Filament\Resources\ShippmentRateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShippmentRates extends ListRecords
{
    protected static string $resource = ShippmentRateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
