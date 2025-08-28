<?php

use App\Livewire\Ambientes\AmbienteCreate;
use App\Livewire\Ambientes\AmbienteEdit;
use App\Livewire\Ambientes\AmbienteList;
use App\Livewire\Dashboard;
use App\Livewire\Sensores\SensorCreate;
use App\Livewire\Sensores\SensorEdit;
use App\Livewire\Sensores\SensorList;
use App\Models\Ambiente;
use App\Models\Sensor;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', Dashboard::class)->name('dashboard');

//ambientes
Route::get('/ambiente/create', AmbienteCreate::class)->name('ambiente.create');
Route::get('/ambiente/{id}/edit', AmbienteList::class)->name('ambiente.edit');
Route::get('/ambiente/list', AmbienteList::class)->name('ambiente.list');

//sensores
Route::get('/sensor/create', SensorCreate::class)->name('sensor.create');
Route::get('/sensor/{id}/edit', SensorEdit::class)->name('sensor.edit');
Route::get('/sensor/list', SensorList::class)->name('sensor.list');
