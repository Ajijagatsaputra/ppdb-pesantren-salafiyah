<?php

// app/Filament/Resources/VisionMissionResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\VisionMissionResource\Pages;
use App\Models\VisiMisi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;

class VisionMissionResource extends Resource
{
    protected static ?string $model = VisiMisi::class;
    protected static ?string $navigationLabel = 'Visi & Misi';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('type')
                ->label('Tipe')
                ->options([
                    'visi' => 'Visi',
                    'misi' => 'Misi',
                ])
                ->required(),

            Forms\Components\TextInput::make('title')
                ->label('Judul')
                ->required(),

            Forms\Components\FileUpload::make('image')
                ->label('Gambar')
                ->directory('vision-mission')
                ->image()
                ->imagePreviewHeight('150')
                ->downloadable(),

            Forms\Components\Repeater::make('points')
                ->label('Poin-poin')
                ->schema([
                    Forms\Components\TextInput::make('text')->label('Poin'),
                ])
                ->minItems(1)
                ->columns(1)
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')->label('Tipe')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('title')->label('Judul')->limit(30),
                Tables\Columns\ImageColumn::make('image')->label('Gambar')->circular(),
                Tables\Columns\TextColumn::make('points')
                    ->label('Jumlah Poin')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) . ' Poin' : '0'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')->options([
                    'visi' => 'Visi',
                    'misi' => 'Misi',
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisionMissions::route('/'),
            'create' => Pages\CreateVisionMission::route('/create'),
            'edit' => Pages\EditVisionMission::route('/{record}/edit'),
        ];
    }
}
