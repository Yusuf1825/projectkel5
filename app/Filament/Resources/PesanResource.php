<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesanResource\Pages;
use App\Filament\Resources\PesanResource\RelationManagers;
use App\Models\Pesan;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PesanResource extends Resource
{
    protected static ?string $model = Pesan::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationLabel = 'Pemesanan';
    protected static ?string $pluralLabel = 'Pemesanan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required()->prefixIcon('heroicon-o-user'),
                TextInput::make('asal')->required()->prefixIcon('heroicon-o-map-pin'),
                Select::make('jadwal_id')
                    ->relationship('jadwal', 'rute')
                    ->required()
                    ->prefixIcon('heroicon-o-map-pin')->label('Tujuan')->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $rute = \App\Models\Jadwal::find($state)?->rute ?? '';
                        $set('tujuan', $rute);
                    }),
                DateTimePicker::make('tanggal')->required()->prefixIcon('heroicon-o-calendar')->default(now()),
                TextInput::make('penumpang')->numeric()->minValue(1)->required()->prefixIcon('heroicon-o-ticket')->label('Jumlah Penumpang'),
                Hidden::make('tujuan')
                    ->dehydrated()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('asal'),
                TextColumn::make('tujuan'),
                TextColumn::make('tanggal'),
                TextColumn::make('penumpang'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPesans::route('/'),
            'create' => Pages\CreatePesan::route('/create'),
            'edit' => Pages\EditPesan::route('/{record}/edit'),
        ];
    }
}
