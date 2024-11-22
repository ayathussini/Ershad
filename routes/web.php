<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\AssistantController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\ProfileController;

Route::get('/home', function () {
    return view('home'); 
})->name('home');

Route::get('/',function(){
    return view('auth.register');
});
Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Routes related to the profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes related to applications
    Route::prefix('application')->group(function () {
        Route::get('/index', [ApplicationController::class, 'index'])->name('application.index');
        Route::get('/create', [ApplicationController::class, 'create'])->name('application.create');
        Route::post('/store', [ApplicationController::class, 'store'])->name('application.store');
        Route::get('/{id}/show', [ApplicationController::class, 'show'])->name('application.show');
        Route::get('/{id}/edit', [ApplicationController::class, 'edit'])->name('application.edit');
        Route::put('/{id}/update', [ApplicationController::class, 'update'])->name('application.update');
        Route::delete('/{id}/delete', [ApplicationController::class, 'delete'])->name('application.delete');
        Route::get('/archive', [ApplicationController::class, 'archive'])->name('application.archive');
        Route::post('/{id}/restore', [ApplicationController::class, 'restore'])->name('application.restore');
        Route::delete('/{id}/forceDelete', [ApplicationController::class, 'forceDelete'])->name('application.forceDelete');
    }); 
    Route::prefix('agent')->group(function () {
        Route::get('/index', [agentController::class, 'index'])->name('agent.index');
        Route::get('/create', [agentController::class, 'create'])->name('agent.create');
        Route::post('/store', [agentController::class, 'store'])->name('agent.store');
        Route::get('/{id}/show', [agentController::class, 'show'])->name('agent.show');
        Route::get('/{id}/edit', [agentController::class, 'edit'])->name('agent.edit');
        Route::put('/{id}/update', [agentController::class, 'update'])->name('agent.update');
        Route::delete('/{id}/delete', [agentController::class, 'delete'])->name('agent.delete');
        Route::get('/archive', [agentController::class, 'archive'])->name('agent.archive');
        Route::post('/{id}/restore', [agentController::class, 'restore'])->name('agent.restore');
        Route::delete('/{id}/forceDelete', [agentController::class, 'forceDelete'])->name('application.forceDelete');
    });
     Route::prefix('student')->group(function () {
        Route::get('/index', [studentController::class, 'index'])->name('student.index');
        Route::get('/create', [studentController::class, 'create'])->name('student.create');
        Route::post('/store', [studentController::class, 'store'])->name('student.store');
        Route::get('/{id}/show', [studentController::class, 'show'])->name('student.show');
        Route::get('/{id}/edit', [studentController::class, 'edit'])->name('student.edit');
        Route::put('/{id}/update', [studentController::class, 'update'])->name('student.update');
        Route::delete('/{id}/delete', [studentController::class, 'delete'])->name('student.delete');
        Route::get('/archive', [studentController::class, 'archive'])->name('student.archive');
        Route::post('/{id}/restore', [studentController::class, 'restore'])->name('student.restore');
        Route::delete('/{id}/forceDelete', [studentController::class, 'forceDelete'])->name('student.forceDelete');
    });
     Route::prefix('assistant')->group(function () {
        Route::get('/index', [assistantController::class, 'index'])->name('assistant.index');
        Route::get('/create', [assistantController::class, 'create'])->name('assistant.create');
        Route::post('/store', [assistantController::class, 'store'])->name('assistant.store');
        Route::get('/{id}/show', [assistantController::class, 'show'])->name('assistant.show');
        Route::get('/{id}/edit', [assistantController::class, 'edit'])->name('assistant.edit');
        Route::put('/{id}/update', [assistantController::class, 'update'])->name('assistant.update');
        Route::delete('/{id}/delete', [assistantController::class, 'delete'])->name('assistant.delete');
        Route::get('/archive', [assistantController::class, 'archive'])->name('assistant.archive');
        Route::post('/{id}/restore', [assistantController::class, 'restore'])->name('assistant.restore');
        Route::delete('/{id}/forceDelete', [assistantController::class, 'forceDelete'])->name('assistant.forceDelete');
    });
     Route::prefix('job')->group(function () {
        Route::get('/index', [jobController::class, 'index'])->name('job.index');
        Route::get('/create', [jobController::class, 'create'])->name('job.create');
        Route::post('/store', [jobController::class, 'store'])->name('job.store');
        Route::get('/{id}/show', [jobController::class, 'show'])->name('job.show');
        Route::get('/{id}/edit', [jobController::class, 'edit'])->name('job.edit');
        Route::put('/{id}/update', [jobController::class, 'update'])->name('job.update');
        Route::delete('/{id}/delete', [jobController::class, 'delete'])->name('job.delete');
        Route::get('/archive', [jobController::class, 'archive'])->name('job.archive');
        Route::post('/{id}/restore', [jobController::class, 'restore'])->name('job.restore');
        Route::delete('/{id}/forceDelete', [jobController::class, 'forceDelete'])->name('job.forceDelete');
    });
     Route::prefix('course')->group(function () {
        Route::get('/index', [courseController::class, 'index'])->name('course.index');
        Route::get('/create', [courseController::class, 'create'])->name('course.create');
        Route::post('/store', [courseController::class, 'store'])->name('course.store');
        Route::get('/{id}/show', [courseController::class, 'show'])->name('course.show');
        Route::get('/{id}/edit', [courseController::class, 'edit'])->name('course.edit');
        Route::put('/{id}/update', [courseController::class, 'update'])->name('course.update');
        Route::delete('/{id}/delete', [courseController::class, 'delete'])->name('course.delete');
        Route::get('/archive', [courseController::class, 'archive'])->name('course.archive');
        Route::post('/{id}/restore', [courseController::class, 'restore'])->name('course.restore');
        Route::delete('/{id}/forceDelete', [courseController::class, 'forceDelete'])->name('course.forceDelete');
    });
});

require __DIR__.'/auth.php';
