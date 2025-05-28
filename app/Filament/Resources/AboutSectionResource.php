<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutSectionResource\Pages;
use App\Models\AboutSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutSectionResource extends Resource
{
    protected static ?string $model = AboutSection::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'About Sections';
    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Judul Section'),

                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->label('Deskripsi')
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ]),

                Forms\Components\TagsInput::make('facilities')
                    ->placeholder('Ketik fasilitas dan tekan Enter')
                    ->label('Fasilitas'),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('about-sections')
                    ->required()
                    ->label('Gambar'),
                Forms\Components\FileUpload::make('thumbnail')
                    ->image()
                    ->directory('about-sections')
                    ->required()
                    ->label('thumbnail'),

                Forms\Components\TextInput::make('video_link')
                    ->url()
                    ->label('Link Video')
                    ->placeholder('https://youtube.com/watch?v=...'),

                Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->label('Status Aktif'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('Judul'),

                Tables\Columns\TextColumn::make('description')
                    ->html()
                    ->limit(50)
                    ->label('Deskripsi'),

                Tables\Columns\TextColumn::make('facilities')
                    ->badge()
                    ->separator(',')
                    ->limitList(2)
                    ->label('Fasilitas'),

                Tables\Columns\TextColumn::make('video_link')
                    ->label('Video')
                    ->formatStateUsing(fn ($state) => $state ? '✓ Ada Video' : '-')
                    ->color(fn ($state) => $state ? 'success' : 'gray'),

                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->label('Gambar'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->label('Status'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueLabel('Hanya Aktif')
                    ->falseLabel('Hanya Tidak Aktif')
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                
                Tables\Actions\BulkAction::make('activate')
                    ->label('Aktifkan')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(function ($records) {
                        $records->each(function ($record) {
                            $record->update(['is_active' => true]);
                        });
                    }),

                Tables\Actions\BulkAction::make('deactivate')
                    ->label('Nonaktifkan')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->action(function ($records) {
                        $records->each(function ($record) {
                            $record->update(['is_active' => false]);
                        });
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutSections::route('/'),
            'create' => Pages\CreateAboutSection::route('/create'),
            'edit' => Pages\EditAboutSection::route('/{record}/edit'),
        ];
    }
}