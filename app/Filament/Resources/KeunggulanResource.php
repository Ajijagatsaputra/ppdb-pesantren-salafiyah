<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeunggulanResource\Pages;
use App\Models\Keunggulan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KeunggulanResource extends Resource
{
    protected static ?string $model = Keunggulan::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Keunggulan';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $pluralModelLabel = 'Keunggulan';
    protected static ?string $modelLabel = 'Keunggulan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Keunggulan')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('icon')
                            ->label('Icon / Gambar')
                            ->image()
                            ->imagePreviewHeight('100')
                            ->directory('keunggulan-icons')
                            ->downloadable()
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml'])
                            ->helperText('Unggah gambar ikon (PNG, JPG, atau SVG)'),

                        Forms\Components\TextInput::make('order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0)
                            ->helperText('Angka untuk mengurutkan tampilan keunggulan'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->default(true)
                            ->helperText('Aktifkan untuk menampilkan di landing page'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable()
                    ->width(80),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(100)
                    ->wrap(),

                Tables\Columns\ImageColumn::make('icon')
                    ->label('Icon')
                    ->height(40)
                    ->width(40),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif')
                    ->placeholder('Semua')
                    ->trueLabel('Aktif')
                    ->falseLabel('Tidak Aktif'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Lihat'),
                Tables\Actions\EditAction::make()->label('Edit'),
                Tables\Actions\DeleteAction::make()->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Hapus Terpilih'),
                ]),
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKeunggulans::route('/'),
            'create' => Pages\CreateKeunggulan::route('/create'),
            'edit' => Pages\EditKeunggulan::route('/{record}/edit'),
        ];
    }
}
