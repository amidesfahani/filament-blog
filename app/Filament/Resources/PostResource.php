<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getModelLabel(): string
    {
        return __('Post');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Posts');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Main Content')->schema([
                    TextInput::make('title')->label(__('Title'))->required()->afterStateUpdated(function ($operation, $state, \Filament\Forms\Set $set) {
                        $operation == 'create' ? $set('slug', Str::slug($state)) : '';
                    }),
                    TextInput::make('slug')->label(__('Slug'))->unique(ignoreRecord: true),
                    // RichEditor::make('content')->label(__('Content'))->required()->fileAttachmentsDisk('public')->fileAttachmentsVisibility('public')->fileAttachmentsDirectory('posts/images')->columnSpanFull(),
                    TinyEditor::make('content')->label(__('Content'))->required()->fileAttachmentsDisk('public')->fileAttachmentsVisibility('public')->fileAttachmentsDirectory('posts/images')->columnSpanFull(),
                ])->columns(2),
                Section::make('Meta')->schema([
                    FileUpload::make('image')->label(__('Image'))->image()->disk('public')->directory('posts/thumbnails')->nullable(),
                    DatePicker::make('published_at')->label(__('Published at'))->nullable()->displayFormat('Y-m-d')->jalali(),
                    Checkbox::make('featured')->label(__('Featured'))->nullable(),
                    Select::make('user_id')->label(__('Author'))->relationship('author', 'name')->searchable()->required(),
                    Select::make('categories')->label(__('Categories'))->multiple()->relationship('categories', 'title')->searchable(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label(__('Title'))->sortable()->searchable(),
                TextColumn::make('author.name')->label(__('Author'))->searchable(),
                TextColumn::make('published_at')->label(__('Published at'))->date('Y-m-d')->searchable()->jalaliDate('Y-m-d'),
                CheckboxColumn::make('featured')->label(__('Featured'))
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
