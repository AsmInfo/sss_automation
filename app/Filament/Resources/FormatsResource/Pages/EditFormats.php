<?php

namespace App\Filament\Resources\FormatsResource\Pages;

use App\Filament\Resources\FormatsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormats extends EditRecord
{
    protected static string $resource = FormatsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
