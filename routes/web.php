<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AchievementController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// News Routes
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{news:slug}', [NewsController::class, 'show'])->name('news.show');

// Announcement Routes
Route::get('/pengumuman', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/pengumuman/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');

use App\Http\Controllers\PageController;

// Achievement Routes
Route::get('/prestasi', [AchievementController::class, 'index'])->name('achievements.index');
Route::get('/prestasi/{achievement}', [AchievementController::class, 'show'])->name('achievements.show');

// Static & Page Content Routes
Route::get('/pages/{page_name}', [PageController::class, 'show'])->name('pages.show');
Route::get('/akademik', [PageController::class, 'akademik'])->name('pages.akademik');
Route::get('/kontak', [PageController::class, 'kontak'])->name('pages.kontak');
