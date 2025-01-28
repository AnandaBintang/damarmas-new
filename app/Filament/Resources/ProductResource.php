<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationGroup = 'Toko';

    protected static ?string $navigationLabel = 'Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Produk')
                    ->columns(2)
                    ->schema([
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->readonly(),
                        TextInput::make('name')
                            ->label('Nama Produk')
                            ->maxLength(255)
                            ->required()
                            ->reactive()
                            ->debounce(500)
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', strtolower(str_replace(' ', '-', $state)))),
                        TextInput::make('price')
                            ->label('Harga Produk')
                            ->numeric()
                            ->required()
                            ->prefix('Rp'),
                        Select::make('category_id')
                            ->label('Kategori Produk')
                            ->required()
                            ->relationship(name: 'category', titleAttribute: 'name'),
                        RichEditor::make('description')
                            ->label('Deskripsi Produk')
                            ->columnSpanFull()
                            ->required()
                    ]),

                Section::make('Foto Produk')
                    ->columns(1)
                    ->schema([
                        Repeater::make('media')
                            ->relationship('media')
                            ->schema([
                                CuratorPicker::make('path')
                                    ->directory('product-images/' . Auth::user()->id)
                                    ->label('Gambar Produk')
                                    ->acceptedFileTypes(['image/*'])
                                    ->maxSize(3072),
                            ])
                            ->label('Daftar Gambar Produk')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->description(fn(Product $record): string => Str::limit($record->description, 50))
                    ->sortable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR', locale: 'id_ID')
                    ->sortable(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
