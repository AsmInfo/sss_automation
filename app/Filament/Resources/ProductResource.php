<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Components;
use App\Models\Formats;
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
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Product Management';
    
    protected static ?int $navigationSort = 3;

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
                            ->pluck('name', 'id')->toArray()),
                        
                    TextInput::make('title')->unique(ignorable: fn($record) => $record)->required(),
                    TextInput::make('slug')->unique(ignorable: fn($record) => $record)->required(),
                    SpatieMediaLibraryFileUpload::make('thumbnail')
                        ->collection('products')
                        ->multiple()
                        ->maxSize(1024)
                        ->required(),
                     FileUpload::make('product_attachments')
                        ->multiple()
                        ->maxSize(1024)
                        ->storeFileNamesIn('product_attachments'),
                    RichEditor::make('description')->maxLength(17000)->required(),
                    TextInput::make('price')->label('Price')->numeric()->numeric()
                    ->inputMode('decimal')->required(),
                    TextInput::make('offer_price')->label('Offer Price')->numeric()
                    ->inputMode('decimal')->required(),
                        Repeater::make('ProductComponent')
                        ->label('Add Components to Products')
                        ->relationship()
                        ->schema([
                            
                            Select::make('components_id')
                            ->label('Components')
                            ->options(Components::all()->pluck('comp_name', 'id'))
                            ->required()
                            ->searchable(),
                            Select::make('formats_id')
                            ->label('Formats')
                            ->options(Formats::all()->pluck('type', 'id'))
                            ->required()
                            ->searchable(), 
                    
                        ])->createItemButtonLabel('Add Row') ->columns(2),
                    Toggle::make('is_published'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('category.name'),
                TextColumn::make('subcategory.name'),
                TextColumn::make('title')->limit(50)->sortable()->searchable(),
                SpatieMediaLibraryImageColumn::make('thumbnail')
            ->collection('products'),
            TextColumn::make('price')->limit(50)->sortable()->searchable(),
            TextColumn::make('offer_price')->limit(50)->sortable()->searchable(),
            
                BooleanColumn::make('is_active'),
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
