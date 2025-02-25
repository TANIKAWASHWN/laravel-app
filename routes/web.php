<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// お問い合わせフォーム（入力、確認、送信）
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('contact/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');

// お問い合わせフォーム（リスト一覧、詳細）
Route::get('contact/list', [ContactController::class, 'list'])->name('contact.list');
Route::get('contact/{id}', [ContactController::class, 'detail'])->whereNumber('id')->name('contact.detail');

// 詳細にて、個別に削除
Route::delete('contact/{id}/delete', [ContactController::class, 'delete'])->name('contact.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
