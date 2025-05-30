<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistrationResource\Pages;
use App\Filament\Resources\RegistrationResource\RelationManagers;
use App\Models\Registrations;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistrationResource extends Resource
{
    protected static ?string $model = Registrations::class;

    protected static ?string $navigationGroup = 'Manajemen Data';

    public static function getNavigationLabel(): string
    {
        return 'Pendaftaran Santri';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-document-text';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('full_name')->required(),
            Forms\Components\TextInput::make('phone')->required(),
            Forms\Components\TextInput::make('school_origin')->required(),
            Forms\Components\DatePicker::make('birth_date')->required(),
            Forms\Components\TextInput::make('nisn'),
            Forms\Components\Radio::make('gender')
                ->options(['male' => 'Laki-laki', 'female' => 'Perempuan'])
                ->required(),
            Forms\Components\FileUpload::make('document_path')
                ->label('Dokumen')
                ->directory('documents')
                ->preserveFilenames()
                ->downloadable(),
            Forms\Components\Select::make('payment_status')
                ->options([
                    'pending' => 'Pending',
                    'gagal' => 'Gagal',
                    'sukses' => 'Sukses',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('full_name')->searchable(),
            Tables\Columns\TextColumn::make('phone'),
            Tables\Columns\TextColumn::make('school_origin'),
            Tables\Columns\TextColumn::make('birth_date'),
            Tables\Columns\TextColumn::make('nisn'),
            Tables\Columns\TextColumn::make('gender')->label('Jenis Kelamin'),
            Tables\Columns\TextColumn::make('payment_status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'sukses' => 'success',
                    'gagal' => 'danger',
                }),
            Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime(),
        ])
        ->filters([
            SelectFilter::make('gender')
                ->label('Jenis Kelamin')
                ->options([
                    'male' => 'Laki-laki',
                    'female' => 'Perempuan',
                ]),

            SelectFilter::make('payment_status')
                ->label('Status Pembayaran')
                ->options([
                    'pending' => 'Pending',
                    'sukses' => 'Sukses',
                    'gagal' => 'Gagal',
                ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistrations::route('/'),
            'create' => Pages\CreateRegistration::route('/create'),
            'edit' => Pages\EditRegistration::route('/{record}/edit'),
        ];
    }
}