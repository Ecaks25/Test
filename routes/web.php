<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\TtpbController;
use App\Http\Controllers\MonitoringController;

Route::get('/', function () {
  return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::view('monitoring', 'monitoring')
  ->middleware(['auth', 'verified'])
  ->name('monitoring');

Route::get('monitoring/export', [MonitoringController::class, 'export'])
  ->middleware(['auth', 'verified'])
  ->name('monitoring.export');

Route::view('stock', 'stock.index')
  ->middleware(['auth', 'verified'])
  ->name('gudang.stock.index');

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

  Route::resource('ttpb', TtpbController::class);
});

require __DIR__ . '/auth.php';
