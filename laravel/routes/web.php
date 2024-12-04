<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('posts')->name('posts.')->group(function () {
    // 投稿一覧 (公開済みの投稿のみ表示)
    Route::get('/', [PostController::class, 'index'])->name('index');

    // 公開・非公開ステータスを更新 (PUTメソッド)
    Route::put('/{id}/update-status', [PostController::class, 'updateStatus'])->name('updateStatus');
});