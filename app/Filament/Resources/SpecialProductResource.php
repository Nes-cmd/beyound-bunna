<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpecialProductResource\Pages;
use App\Filament\Resources\SpecialProductResource\RelationManagers;
use App\Models\SpecialProduct;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Product;

class SpecialProductResource extends Resource
{
    protected static ?string $model = SpecialProduct::class;
    protected static ?string $navigationGroup = 'Slider & Deal of day';
    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('title')->required(),
                    Forms\Components\Select::make('product_id')
                                            ->options(Product::all()->pluck('name', 'id'))
                                            ->label('Associated product')
                                            ->searchable()
                                            ->required(),
                    Forms\Components\TextInput::make('offer')->required(),
                    Forms\Components\TextInput::make('description'),
                    Forms\Components\Hidden::make('status')->default(1),
                    Forms\Components\DateTimePicker::make('count_down')->required()->minDate(now()),
                    Forms\Components\Select::make('popup_type')
                                            ->options(['2' => 'popup', '1' => 'deal of day'])->required(),
                    Forms\Components\FileUpload::make('path')->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('path'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('offer'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('popup_type'),
                Tables\Columns\TextColumn::make('count_down'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSpecialProducts::route('/'),
            'create' => Pages\CreateSpecialProduct::route('/create'),
            'edit' => Pages\EditSpecialProduct::route('/{record}/edit'),
        ];
    }    
}
