<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\UserController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('students')->group(function(){
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/', [StudentController::class, 'store'])->name('students.store');
    Route::get('/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::patch('/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
});

Route::prefix('study-programs')->group(function () {
    Route::get('/', [StudyProgramController::class, 'index'])->name('study-programs.index');
    Route::get('/create', [StudyProgramController::class, 'create'])->name('study-programs.create');
    Route::post('/', [StudyProgramController::class, 'store'])->name('study-programs.store');
    Route::get('/{id}', [StudyProgramController::class, 'show'])->name('study-programs.show');
    Route::get('/{id}/edit', [StudyProgramController::class, 'edit'])->name('study-programs.edit');
    Route::patch('/{id}', [StudyProgramController::class, 'show'])->name('study-programs.update');
    Route::delete('/{id}', [StudyProgramController::class, 'destroy'])->name('study-programs.destroy');
});
