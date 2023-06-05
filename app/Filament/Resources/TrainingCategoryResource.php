<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingCategoryResource\Pages;
use App\Filament\Resources\TrainingCategoryResource\RelationManagers;
use App\Models\TrainingCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrainingCategoryResource extends Resource
{
    protected static ?string $model = TrainingCategory::class;
    protected static ?string $navigationGroup = 'Travel & Trainings';
    protected static ?string $navigationIcon = 'heroicon-o-view-boards';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('title')->required(),
                    Forms\Components\Textarea::make('description')->required(),
                    Forms\Components\FileUpload::make('icon')->image()->label('Icon(optional)'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTrainingCategories::route('/'),
            'create' => Pages\CreateTrainingCategory::route('/create'),
            'edit' => Pages\EditTrainingCategory::route('/{record}/edit'),
        ];
    }    
}
