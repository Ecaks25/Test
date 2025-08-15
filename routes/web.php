<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\TtpbController;

Route::get('/', function () {
  return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::view('monitoring', 'monitoring')
  ->middleware(['auth', 'verified'])
  ->name('monitoring');

Route::view('bpgs', 'bpgs.index')
  ->middleware(['auth', 'verified'])
  ->name('bpgs.index');

Route::view('bpgs/create', 'bpgs.create')
  ->middleware(['auth', 'verified'])
  ->name('bpgs.create');

Route::middleware(['auth'])->group(function () {
  Route::redirect('settings', 'settings/profile');

  Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
  Volt::route('settings/password', 'settings.password')->name('settings.password');

  Route::resource('ttpbs', TtpbController::class);
});

require __DIR__ . '/auth.php';
