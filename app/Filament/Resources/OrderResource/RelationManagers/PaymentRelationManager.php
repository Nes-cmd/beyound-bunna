<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentRelationManager extends RelationManager
{
    protected static string $relationship = 'payment';

    protected static ?string $recordTitleAttribute = 'payment_method';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                ->options(['approved' => 'approved', 'cancelled' => 'cancelled', 'completed' => 'completed', 'refunded' => 'refunded'])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('transaction_id')->label('Transaction'),
                Tables\Columns\TextColumn::make('payment_method'),
                Tables\Columns\TextColumn::make('currency'),
                Tables\Columns\TextColumn::make('payment_fee'),
                Tables\Columns\TextColumn::make('tax'),
                Tables\Columns\TextColumn::make('vat'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('payer_email'),
            ])
            ->filters([
                //
            ])
            // ->headerActions([
            //     Tables\Actions\CreateAction::make(),
            // ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
