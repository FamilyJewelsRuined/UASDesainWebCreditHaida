<?php

namespace App\Filament\Resources\RegistrationResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JamaahRelationManager extends RelationManager
{
    protected static string $relationship = 'jamaah';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('nama')
                    ->required()
                    ->maxLength(100),

                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                
                TextInput::make('no_telepon')
                    ->required()
                    ->tel()
                    ->maxLength(15),

                TextInput::make('email')
                    ->maxLength(100),

                DatePicker::make('tanggal_lahir')
                    ->required(),

                Select::make('jenis_kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan'
                    ])    
                    ->required(),
                
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('nama'),

                TextColumn::make('no_telepon'),

                TextColumn::make('tanggal_lahir'),
                
                TextColumn::make('jenis_kelamin'),
                    
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
