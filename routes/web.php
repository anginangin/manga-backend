<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\AddsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RilisanTerbaru;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PopulerController;
use App\Http\Controllers\MangajobController;
use App\Http\Controllers\TrendingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecommendController;
use App\Http\Controllers\SettingWebController;
use App\Http\Controllers\ThemeColorController;
use App\Http\Controllers\BlacklistMangaController;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/config-cache', function () {
    \Artisan::call('config:cache');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('administrator', [UserController::class, 'administrator'])->name('administrator');
    Route::get('member', [UserController::class, 'member'])->name('member');
    Route::get('administrator/create', [UserController::class, 'create'])->name('add-administrator');
    Route::post('administrator/store', [UserController::class, 'store'])->name('store-administrator');
    Route::get('administrator/edit/{id}', [UserController::class, 'edit'])->name('edit-administrator');
    Route::put('administrator/update/{id}', [UserController::class, 'update'])->name('update-administrator');
    Route::get('administrator/permission', [UserController::class, 'permission'])->name('permission');
    Route::put('administrator/permission/update/', [UserController::class, 'permissionUpdate'])->name('permission.update');
    Route::get('administrator/delete/{id}', [UserController::class, 'delete'])->name('delete-administrator');

    Route::resource('manga', MangaController::class);
    Route::get('manga/chapter/delete/{id}', [MangaController::class, 'delete_chapter'])->name('delete_chapter');
    Route::put('manga/blacklist/{id}', [MangaController::class, 'blacklist'])->name('blacklist');

    Route::resource('blacklist', BlacklistMangaController::class);
    Route::put('manga/restore/{id}', [BlacklistMangaController::class, 'restore'])->name('restore');

    Route::get('mangajob', [MangajobController::class, 'index'])->name('mangajob');
    Route::get('mangajob/new', [MangajobController::class, 'create'])->name('add-mangajob');
    Route::post('mangajob/check-scraping', [MangajobController::class, 'checkScraping']);
    Route::post('mangajob/store', [MangajobController::class, 'store'])->name('save-mangajob');
    Route::get('mangajob/delete/{id}', [MangajobController::class, 'delete'])->name('delete-mangajob');

    Route::get('seo-artikel', [SEOController::class, 'index'])->name('seo-artikel');
    Route::get('seo-artikel/create', [SEOController::class, 'create'])->name('add-seo-artikel');
    Route::post('seo-artikel/store', [SEOController::class, 'store'])->name('store-seo-artikel');
    Route::get('seo-artikel/edit/{id}', [SEOController::class, 'edit'])->name('edit-seo-artikel');
    Route::put('seo-artikel/update/{id}', [SEOController::class, 'update'])->name('update-seo-artikel');

    Route::get('setting-web', [SettingWebController::class, 'index'])->name('setting-web');
    Route::get('setting-web/create', [SettingWebController::class, 'create'])->name('add-setting-web');
    Route::post('setting-web/store', [SettingWebController::class, 'store'])->name('store-setting-web');
    Route::get('setting-web/edit/{id}', [SettingWebController::class, 'edit'])->name('edit-setting-web');
    Route::put('setting-web/update/{id}', [SettingWebController::class, 'update'])->name('update-setting-web');

    Route::resource('theme-color', ThemeColorController::class);
    Route::put('theme-color/update/{id}', [ThemeColorController::class, 'updateTheme'])->name('update-theme');

    Route::resource('adds', AddsController::class);

    Route::resource('banners', BannerController::class);
    Route::resource('pages', PageController::class);

    Route::resource('sliders', SliderController::class);
    Route::put('update-title-slider/{id}', [SliderController::class, 'update_title'])->name('update-title-slider');

    Route::resource('rilisan-terbaru', RilisanTerbaru::class);

    Route::resource('slider-trending', TrendingController::class);
    Route::put('update-title-trending/{id}', [TrendingController::class, 'update_title'])->name('update-title-trending');

    Route::resource('slider-recommend', RecommendController::class);
    Route::put('update-title-recommend/{id}', [RecommendController::class, 'update_title'])->name('update-title-recommend');

    Route::resource('manga-populer', PopulerController::class);
    Route::put('update-title-mv/{id}', [PopulerController::class, 'update_title'])->name('update-title-mv');

    Route::get('comment', [CommentController::class, 'index'])->name('comment.index');
    Route::post('comment/reply/{comment_id}/{manga_id}', [CommentController::class, 'reply'])->name('comment.reply');
    Route::get('comment/delete/{comment_id}', [CommentController::class, 'delete'])->name('comment.delete');
});
