<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EkstrakulikulerResource\Pages;
use App\Models\Ekstrakulikuler;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EkstrakulikulerResource extends Resource
{
    protected static ?string $model = Ekstrakulikuler::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Ekstrakulikuler';
    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Ekstrakulikuler'),

                Forms\Components\Select::make('kategori')
                    ->required()
                    ->options([
                        'hadroh' => 'Hadroh',
                        'tilawatil-quran' => 'Seni Baca Al-Qur\'an',
                        'ziarah' => 'Ziarah & Wisata Religi',
                        'marching-band' => 'Marching Band',
                        'pramuka' => 'Pramuka',
                    ])
                    ->label('Kategori'),

                Forms\Components\Textarea::make('deskripsi')
                    ->rows(4)
                    ->label('Deskripsi'),

                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->directory('ekstrakulikuler')
                    ->label('Gambar Ekstrakulikuler'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->label('Nama'),

                Tables\Columns\TextColumn::make('kategori')
                    ->badge()
                    ->label('Kategori')
                    ->color(fn (string $state): string => match($state) {
                        'hadroh' => 'primary',
                        'tilawatil-quran' => 'success',
                        'ziarah' => 'warning',
                        'marching-band' => 'info',
                        'pramuka' => 'danger',
                        default => 'secondary',
                    }),

                Tables\Columns\ImageColumn::make('gambar')
                    ->circular()
                    ->label('Gambar'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEkstrakulikulers::route('/'),
            'create' => Pages\CreateEkstrakulikuler::route('/create'),
            'edit' => Pages\EditEkstrakulikuler::route('/{record}/edit'),
        ];
    }
}
