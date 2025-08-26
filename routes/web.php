<?php

use App\Livewire\Ambientes\AmbienteCreate;
use App\Livewire\Ambientes\AmbienteEdit;
use App\Livewire\Ambientes\AmbienteList;
use App\Livewire\Dashboard;
use App\Livewire\Sensores\SensorCreate;
use App\Models\Ambiente;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class);

Route::get('/sensor/create', SensorCreate::class);

Route::get('/ambiente/create', AmbienteCreate::class)->name('ambiente.create');

Route::get('/ambiente/edit', AmbienteEdit::class)->name('ambiente.edit');

Route::get('/ambiente/list', AmbienteList::class)->name('ambiente.list');