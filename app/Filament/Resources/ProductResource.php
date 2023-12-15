<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use App\Models\Category;
use App\Models\Subcategory;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;



class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    BelongsToSelect::make('category_id')->required()->relationship('category', 'name')->live(),
                    BelongsToSelect::make('subcategory_id')->required()->relationship('subcategory', 'name')
                        ->options(fn(Get $get): array => Subcategory::query()
                            ->where('category_id', $get('category_id'))
                            ->pluck('name', 'id')->toArray())->live(),
                    TextInput::make('title')->unique(ignorable: fn($record) => $record)->required(),

                    SpatieMediaLibraryFileUpload::make('thumbnail')
                        ->collection('products')
                        ->multiple()
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            null,
                            '16:9',
                            '4:3',
                            '1:1',
                        ]),

                    RichEditor::make('description')->maxLength(17000)->required(),
                    TextInput::make('price')->numeric(),
                    Select::make('comp_id')
                        ->multiple()
                        ->relationship('components', 'comp_name')
                        ->required()
                        ->preload()
                        ->searchable(),
                    Select::make('formats_id')
                        ->multiple()
                        ->relationship('formats', 'type')
                        ->required()
                        ->preload()
                        ->searchable(),
                    Toggle::make('is_published'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
