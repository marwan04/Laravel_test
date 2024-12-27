<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/

use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\InstructorAuthController;

Route::prefix('student')->name('student.')->group(function () {
    Route::get('login', [StudentAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [StudentAuthController::class, 'login']);
    Route::post('logout', [StudentAuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth:student'])->group(function () {
        Route::get('dashboard', function () {
            return view('student.dashboard'); // Replace with StudentController@index if needed
        })->name('dashboard');
    });
});

Route::prefix('instructor')->name('instructor.')->group(function () {
    Route::get('login', [InstructorAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [InstructorAuthController::class, 'login']);
    Route::post('logout', [InstructorAuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth:instructor'])->group(function () {
        Route::get('dashboard', function () {
            return view('instructor.dashboard'); // Replace with InstructorController@index if needed
        })->name('dashboard');
    });
});


Route::middleware(['auth:student'])->group(function () {
    Route::get('dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
});

Route::middleware(['auth:instructor'])->group(function () {
    Route::get('dashboard', function () {
        return view('instructor.dashboard');
    })->name('instructor.dashboard');
});
