<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// TOP 第1階層
Breadcrumbs::for('site.top', function (BreadcrumbTrail $trail) {
    $trail->push('入力画面', route('contact'));
});

// カテゴリTOP 第2階層
Breadcrumbs::for('site.category', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('site.top');
    $trail->push($category->name, route('contact.confirm', $category->id));
});

// カテゴリ別記事一覧 第3階層
Breadcrumbs::for('site.category.article', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('site.category', $category);
}
$trail->push("{$category->name}", route('contact.thanks', $category->id));
});

// https://laratech.jp/posts/laravel-breadcrumbs/
// https://zenn.dev/deliku0306/articles/a3e96f3079daaf