<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Forms\Form;
use App\Forms\Components\Section;
use App\Forms\Components\ColorPicker;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class DemoForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount()
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Colors')
                    ->description('Pick your own color pick for the app.')
                    ->icon('heroicon-o-swatch')
                    ->schema([
                        ColorPicker::make('primary')
                            ->default('#fbbf24')
                            ->width(100),
                        ColorPicker::make('secondary')
                            ->default('#c084fc')
                            ->width(100),
                        ColorPicker::make('success')
                            ->default('#84cc16')
                            ->width(100),
                        ColorPicker::make('warning')
                            ->default('#facc15')
                            ->width(100),
                        ColorPicker::make('danger')
                            ->default('#ef4444')
                            ->width(100),
                        ColorPicker::make('gray')
                            ->default('#a1a1aa')
                            ->width(100)
                    ])
                    ->columns(3)
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();
    }

    public function render()
    {
        return view('livewire.demo-form');
    }
}
