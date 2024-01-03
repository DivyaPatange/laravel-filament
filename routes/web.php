<?php

use App\Components\TextInput;
use App\Livewire\DemoForm;
use App\Livewire\DemoInfoList;
use App\Livewire\DemoTable;
use App\Livewire\TestForm;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/demo', TestForm::class);

Route::get('/form', DemoForm::class);

Route::get('/infolist', DemoInfoList::class);

Route::get('/table', DemoTable::class);
