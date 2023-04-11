<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TravelResource\Pages;
use App\Filament\Resources\TravelResource\RelationManagers;
use App\Models\Travel;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TravelResource extends Resource
{
    protected static ?string $model = Travel::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('title')->required(),
                    Forms\Components\TextInput::make('description')->required()->maxLength(255)->label('Short Description'),
                    Forms\Components\RichEditor::make('content')->required(),
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\DatePicker::make('closing_date')->required()->minDate(now()),
                        Forms\Components\TagsInput::make('tags'),
                    ]),
                    Forms\Components\FileUpload::make('images')->image()->multiple()->minFiles(1)->enableReordering(),
                    Forms\Components\FileUpload::make('video')->label('Video promo(Optional)'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('images.0'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('bookings_count')->counts('bookings')->label('Booked by(count)'),
                Tables\Columns\TagsColumn::make('tags'),
                Tables\Columns\TextColumn::make('created_at')->view('filament.table.date'),
                Tables\Columns\TextColumn::make('closing_date')->view('filament.table.date'),
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
            RelationManagers\BookingsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTravel::route('/'),
            'create' => Pages\CreateTravel::route('/create'),
            'edit' => Pages\EditTravel::route('/{record}/edit'),
        ];
    }
}
