<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    RoleController,
    UnitController,
    PeriodController,
    StandardController,
    AuthenticateSessionController
};

Route::get('/', function () { return view('welcome'); });
Route::get('login', [AuthenticateSessionController::class, 'create'])->name('login.create');
Route::post('login', [AuthenticateSessionController::class, 'store'])->name('login.store');
Route::post('logout', [AuthenticateSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth'])->group(function() {
    Route::get('/home', function() {
        $stats = [
            'users'     => \App\Models\User::count(),
            'roles'     => \App\Models\Role::count(),
            'units'     => \App\Models\Unit::count(),
            'periods'   => \App\Models\Period::count(),
            'standards' => \App\Models\Standard::count(),
            'active_period' => \App\Models\Period::where('is_active', true)->first(),
        ];
        return view('home', compact('stats'));
    })->name('home');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('units', UnitController::class);
    Route::resource('periods', PeriodController::class);
    Route::resource('standards', StandardController::class);
});
