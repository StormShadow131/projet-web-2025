<?php

use App\Http\Controllers\CohortController;
use App\Http\Controllers\CommonLifeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

// Redirect the root path to /dashboard
Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('verified')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Cohorts
        Route::get('/cohorts', [CohortController::class, 'index'])->name('cohort.index');
        Route::get('/cohort/{cohort}', [CohortController::class, 'show'])->name('cohort.show');
        Route::get('/cohorts/{cohort}/edit', [CohortController::class, 'show'])->name('cohort.edit');

        Route::get('/cohorts/{cohort}', [CohortController::class, 'update'])->name('cohort.update');
        Route::post('/cohorts', [CohortController::class, 'store'])->name('cohort.store');
        Route::delete('/cohorts/{cohort}', [CohortController::class, 'delete'])->name('cohort.delete');

        // Teachers
        Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
        Route::get('/student/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
        Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'show'])->name('teacher.edit');

        Route::get('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::post('/teachers', [TeacherController::class, 'store'])->name('teacher.store');
        Route::delete('/teachers/{teacher}', [TeacherController::class, 'delete'])->name('teacher.delete');

        // Students
        Route::get('students', [StudentController::class, 'index'])->name('student.index');
        Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
        Route::get('/students/{student}/edit', [StudentController::class, 'show'])->name('student.edit');

        Route::get('/students/{student}', [StudentController::class, 'update'])->name('student.update');
        Route::post('/students', [StudentController::class, 'store'])->name('student.store');
        Route::delete('/students/{student}', [StudentController::class, 'delete'])->name('student.delete');

        // Knowledge
        Route::get('knowledge', [KnowledgeController::class, 'index'])->name('knowledge.index');

        // Groups
        Route::get('groups', [GroupController::class, 'index'])->name('group.index');

        // Retro
        route::get('retros', [RetroController::class, 'index'])->name('retro.index');

        // Common life
        Route::get('common-life', [CommonLifeController::class, 'index'])->name('common-life.index');
    });

});

require __DIR__.'/auth.php';
