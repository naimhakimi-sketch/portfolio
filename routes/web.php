<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use Illuminate\Support\Facades\Route;

// ============================================
// PUBLIC ROUTES - Anyone can access
// ============================================

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Dashboard (authenticated users only)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ============================================
// PROFILE ROUTES - Authenticated users
// ============================================

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============================================
// ADMIN ROUTES - Only authenticated users
// ============================================

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // About (edit only - single record)
    Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about', [AboutController::class, 'update'])->name('about.update');
    
    // Education CRUD
    Route::resource('education', EducationController::class, [
        'names' => [
            'index' => 'education.index',
            'create' => 'education.create',
            'store' => 'education.store',
            'edit' => 'education.edit',
            'update' => 'education.update',
            'destroy' => 'education.destroy',
        ]
    ]);
    
    // Work CRUD
    Route::resource('work', WorkController::class, [
        'names' => [
            'index' => 'work.index',
            'create' => 'work.create',
            'store' => 'work.store',
            'edit' => 'work.edit',
            'update' => 'work.update',
            'destroy' => 'work.destroy',
        ]
    ]);
    
    // Certification CRUD
    Route::resource('certification', CertificationController::class, [
        'names' => [
            'index' => 'certification.index',
            'create' => 'certification.create',
            'store' => 'certification.store',
            'edit' => 'certification.edit',
            'update' => 'certification.update',
            'destroy' => 'certification.destroy',
        ]
    ]);
    
    // Skill CRUD
    Route::resource('skill', SkillController::class, [
        'names' => [
            'index' => 'skill.index',
            'create' => 'skill.create',
            'store' => 'skill.store',
            'edit' => 'skill.edit',
            'update' => 'skill.update',
            'destroy' => 'skill.destroy',
        ]
    ]);
    
    // Project CRUD
    Route::resource('project', ProjectController::class, [
        'names' => [
            'index' => 'project.index',
            'create' => 'project.create',
            'store' => 'project.store',
            'edit' => 'project.edit',
            'update' => 'project.update',
            'destroy' => 'project.destroy',
        ]
    ]);
    
    // Contact Messages (view & delete)
    Route::get('/contact', [AdminContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/{contact}', [AdminContactController::class, 'show'])->name('contact.show');
    Route::delete('/contact/{contact}', [AdminContactController::class, 'destroy'])->name('contact.destroy');
});

require __DIR__.'/auth.php';
