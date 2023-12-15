<?php

namespace App\Filament\Resources\FormatsResource\Pages;

use App\Filament\Resources\FormatsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFormats extends CreateRecord
{
    protected static string $resource = FormatsResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
