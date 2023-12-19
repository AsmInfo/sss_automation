<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Pages\Page;
use Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'User Management';
    protected static ?int $navigationSort = 3;
 
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([ TextInput::make('name')
                ->minLength(2)
                ->maxLength(255)
                ->unique(ignoreRecord:true),
                Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('password')
                ->password()
                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                ->dehydrated(fn ($state) => filled($state))
                ->required(fn (Page $livewire) => ($livewire instanceof CreateUser))
                ->maxLength(255),
                // Forms\Components\DateTimePicker::make('email_verified_at'),
                BelongsToSelect::make('role_id')->relationship('roles','name'),
                Forms\Components\Select::make('permissions')
                ->multiple()
                ->relationship('permissions','name')
                ->preload()
                ])->columns(2),
                // FileUpload::make('profile_images')->image()->resize(50)->imageEditor(),
                            
                //             ]) 
            ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(), 
                TextColumn::make('name'),
                TextColumn::make('roles.name'),
                TextColumn::make('created_at')
                    ->dateTime('d-m-y')
                    ->sortable() 
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
