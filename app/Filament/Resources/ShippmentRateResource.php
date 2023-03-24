<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShippmentRateResource\Pages;
use App\Filament\Resources\ShippmentRateResource\RelationManagers;
use App\Models\ShippmentRate;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Country;
use App\Models\CountryCity;
use App\Models\Zone;
use Filament\Tables\Columns\Column;

class ShippmentRateResource extends Resource
{
    protected static ?string $model = ShippmentRate::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Extras';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Select::make('product_type')
                                                ->options([
                                                    'non_document' => 'Non document',
                                                    'document' => 'Document',
                                                ])->required()->default('non_document'),
                    // Forms\Components\Select::make('country_id')
                    //                             ->options(
                    //                                 Country::all()->pluck('name', 'id')
                    //                             )->required()->reactive(),
                    // Forms\Components\Select::make('city_id')
                    //                             ->options(
                    //                                 function(callable $get){
                    //                                     $cities = CountryCity::where('country_id', $get('country_id'))->get();
                    //                                     return $cities->pluck('name', 'id');
                    //                                 }
                    //                             )->required(),
                    Forms\Components\Select::make('zone_id')
                                                ->options(
                                                    Zone::all()->pluck('zone_name','id')
                                                )->required(),
                    Forms\Components\TextInput::make('size')->label('Size in Kg')
                                                ->numeric()->required(),
                    Forms\Components\TextInput::make('price')->label('Price per Kg')
                                                ->numeric()->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('country.name')->sortable(),
                // Tables\Columns\TextColumn::make('city.name'),
                Tables\Columns\TextColumn::make('zone.zone_name')->sortable(),
                Tables\Columns\TextColumn::make('product_type'),
                Tables\Columns\TextColumn::make('size')->label('Size in Kg')->sortable(),
                Tables\Columns\TextColumn::make('price')->label('Price per Kg')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('Last update')->dateTime(),
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
            'index' => Pages\ListShippmentRates::route('/'),
            'create' => Pages\CreateShippmentRate::route('/create'),
            'edit' => Pages\EditShippmentRate::route('/{record}/edit'),
        ];
    }    
}
