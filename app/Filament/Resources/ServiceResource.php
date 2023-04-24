<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\RelationManagers\ServicesRelationManager;
use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers\JobsRelationManager;
use App\Models\Department;
use App\Models\Service;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;


class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('department')
                        ->required()
                        ->options([
                            Department::pluck('name', 'id')
                        ])
                        ->hidden(),
                    Forms\Components\TextInput::make('user')
                        ->required()
                        ->hidden(),
                    Forms\Components\TextInput::make('eqptName')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('serial')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('model')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('reportedBy')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('telephone')
                        ->tel()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('designation')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('fault')
                        ->required()
                        ->options([
                            'Hardware/Software/Technical' => 'Hardware/Software/Technical',
                            'Networks/Wireless' => 'Networks/Wireless',
                            'Other: Please Specify' => 'Other: Please Specify'
                        ])->disabled(),
                    Forms\Components\Textarea::make('description')
                        ->required()
                        ->maxLength(65535),
                ])->columns(2)
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('department')->label('Ministry'),
                Tables\Columns\TextColumn::make('user')->label('ICT Officer'),
                Tables\Columns\TextColumn::make('eqptName'),
                Tables\Columns\TextColumn::make('serial'),
                Tables\Columns\TextColumn::make('model'),
                Tables\Columns\TextColumn::make('reportedBy'),
                Tables\Columns\TextColumn::make('telephone'),
                Tables\Columns\TextColumn::make('designation'),
                Tables\Columns\TextColumn::make('fault'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            JobsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }    
}
