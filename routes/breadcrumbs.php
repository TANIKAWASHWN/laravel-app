<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('ホーム', route('home'));
});

Breadcrumbs::for('contact.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('お問い合わせ入力', route('contact.index'));
});

Breadcrumbs::for('contact.confirm', function (BreadcrumbTrail $trail) {
    $trail->parent('contact.index');
    $trail->push('お問い合わせ確認', route('contact.confirm'));
});

Breadcrumbs::for('contact.thanks', function (BreadcrumbTrail $trail) {
    $trail->parent('contact.confirm');
    $trail->push('送信完了', route('contact.thanks'));
});

Breadcrumbs::for('contact.list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('お問い合わせ管理', route('contact.list'));
});

Breadcrumbs::for('contact.detail', function (BreadcrumbTrail $trail) {
    $trail->parent('contact.list');
    $trail->push('お問い合わせ詳細', route('contact.detail'));
});

Breadcrumbs::for('contact.search', function (BreadcrumbTrail $trail) {
    $trail->parent('contact.list');
    $trail->push('検索結果', route('contact.search'));
});


// 参考資料を基に実装を試みるも、予想以上に難航。時間的な制約もあったため、
// コーディングはAIに任せて進め、最終的に微調整を加える形で作業を完了した。
// 参考資料
// https://laratech.jp/posts/laravel-breadcrumbs/
// https://zenn.dev/deliku0306/articles/a3e96f3079daaf