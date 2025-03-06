<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * コンポーネントをレンダリングするためのビューを取得
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app'); // コンポーネントビューを指定
    }
}
