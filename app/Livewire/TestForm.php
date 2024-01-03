<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Components\TextInput;

class TestForm extends Component
{
    public $email;

    public function render()
    {
        TextInput::configureUsing(function ($input) {
            $input->maxLength(10);
        });

        TextInput::macro('foo', fn () => dd('macro'));

        $nameInput = TextInput::make('name')
            // ->foo()
            ->livewire($this);

        $emailInput = TextInput::make('email')
            ->livewire($this);
        // $input = TextInput::make('email')
        //     ->label(function($random, $test, $state) {
        //         return $state;
        //     })
        //     ->maxLength(10)
        //     ->livewire($this);

        return view('livewire.test-form', [
            'nameInput' => $nameInput,
            'emailInput' => $emailInput,
        ]);
    }
}
