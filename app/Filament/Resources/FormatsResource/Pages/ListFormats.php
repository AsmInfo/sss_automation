<?php

namespace App\Filament\Resources\FormatsResource\Pages;

use App\Filament\Resources\FormatsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormats extends ListRecords
{
    protected static string $resource = FormatsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
