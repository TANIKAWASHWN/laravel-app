<?php

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
