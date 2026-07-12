<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Halaman aplikasi SkillSwap (App shell)
Route::middleware(['auth', 'verified'])->group(function () {

    // DashboardView
    Route::get('/dashboard', function () {
        $skills = Skill::latest()->take(5)->get();
        $ownedCount = Skill::where('skill_type', 'owned')->count();
        $neededCount = Skill::where('skill_type', 'needed')->count();
        $totalCount = Skill::count();

        return view('dashboard', compact('skills', 'ownedCount', 'neededCount', 'totalCount'));
    })->name('dashboard');

    // HomeSection
    Route::get('/home', function () {
        $skills = Skill::latest()->get();

        return view('home', compact('skills'));
    })->name('home');

    // ChatSection
    Route::get('/chat', function () {
        return view('chat');
    })->name('chat');

    // ProfileSection
    Route::get('/profile', function () {
        $ownedSkills = Skill::where('user_id', auth()->id())->where('skill_type', 'owned')->latest()->get();
        $neededSkills = Skill::where('user_id', auth()->id())->where('skill_type', 'needed')->latest()->get();
        $ownedCount = $ownedSkills->count();
        $neededCount = $neededSkills->count();

        return view('profile', compact('ownedSkills', 'neededSkills', 'ownedCount', 'neededCount'));
    })->name('profile');

});

// Semua fitur yang membutuhkan login
Route::middleware('auth')->group(function () {

    // Profile Breeze (edit / update / destroy)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // CRUD SkillSwap
    Route::resource('skills', SkillController::class);

});

require __DIR__.'/auth.php';
