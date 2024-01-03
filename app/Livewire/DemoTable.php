<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Filament\Tables\Table;
use App\Tables\Columns\ColorColumn;
use Filament\Forms\Contracts\HasForms;
use App\Tables\Filters\DateRangeFilter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class DemoTable extends Component implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->columns([
                TextInputColumn::make('name')
                    ->rules(['required']),
                ColorColumn::make('color'),
                TextColumn::make('email_verified_at')
                    ->since(),
            ])
            ->filters([
                DateRangeFilter::make('email_verified_at')
                    ->maxDate(now())
            ]);
    }


    public function render()
    {
        return view('livewire.demo-table');
    }
}
