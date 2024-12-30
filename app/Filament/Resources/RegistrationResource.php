<?php

namespace App\Filament\Resources;

use Filament\Forms\Set;
use Filament\Forms\Get;
use App\Models\Package;
use App\Filament\Resources\RegistrationResource\Pages;
use App\Filament\Resources\RegistrationResource\RelationManagers;
use App\Filament\Resources\RegistrationResource\RelationManagers\JamaahRelationManager;
use App\Models\Registration;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistrationResource extends Resource
{
    protected static ?string $model = Registration::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Registration Information')->schema([
                        Select::make('user_id')
                            ->label('Registration Name')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('package_id')
                            ->relationship('package', 'package_name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->distinct()
                            ->reactive()
                            ->afterStateUpdated(function ($state, \Filament\Forms\Set $set) {
                                $set('unit_amount', Package::find($state)?->price ?? 0);
                            })
                            ->afterStateUpdated(function ($state, \Filament\Forms\Set $set) {
                                $set('total_amount', Package::find($state)?->price ?? 0);
                            }),
                            
                        TextInput::make('number_of_people')
                            ->numeric()
                            ->required()
                            ->default(1)
                            ->minValue(1)
                            ->reactive()
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                $set('total_amount', $state * $get('unit_amount'));
                            }),
                            
                        TextInput::make('unit_amount')
                            ->numeric()
                            ->required()
                            ->disabled()
                            ->dehydrated(),
                        
                            TextInput::make('total_amount')
                            ->numeric()
                            ->required()
                            ->dehydrated(),

                        Select::make('payment_method')
                            ->options([
                                'Bank Transfer' => 'Bank Transfer',
                                'Credit Card' => 'Credit Card',
                                'Cash' => 'Cash'
                            ])    
                            ->required(),

                        Select::make('payment_status')
                            ->options([
                                'Pending' => 'Pending',
                                'Completed' => 'Completed',
                                'Failed' => 'Failed'
                            ])
                            ->default('Pending')
                            ->required(),
                        
                        ToggleButtons::make('status')
                            ->inline()
                            ->default('New')
                            ->required()
                            ->options([
                                'New' => 'New',
                                'Confirmed' => 'Confirmed',
                                'Cancelled' => 'Cancelled'
                            ])
                            ->colors([
                                'New' => 'info',
                                'Confirmed' => 'success',
                                'Cancelled' => 'danger'
                            ])
                            ->icons([
                                'New' => 'heroicon-m-sparkles',
                                'Confirmed' => 'heroicon-m-check-badge',
                                'Cancelled' => 'heroicon-m-x-circle'
                            ]),
                        
                        Textarea::make('notes')
                            ->columnSpanFull()
                    ])->columns(2)
                
                ])->columnSpanFull()
            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Registrant')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable()
                    ->money('IDR', true) // Tetap mendeklarasikan IDR
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),

                TextColumn::make('payment_method')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('payment_status')
                    ->searchable()
                    ->sortable(),

                SelectColumn::make('status')
                    ->options([
                        'New' => 'New',
                        'Confirmed' => 'Confirmed',
                        'Cancelled' => 'Cancelled'
                    ])
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            JamaahRelationManager::class
        ];
    }

    public static function getNavigationBadge(): ?string {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array| null {
        return static::getModel()::count() > 10 ? 'danger' : 'success';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistrations::route('/'),
            'create' => Pages\CreateRegistration::route('/create'),
            'edit' => Pages\EditRegistration::route('/{record}/edit'),
            'view' => Pages\ViewRegistration::route('/{record}/view'),
        ];
    }
}
