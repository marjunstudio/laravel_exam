<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $message = 'ログインが必要です。'; // 表示するメッセージを設定する

        // メッセージとスタイルを連想配列として保存する
        Session::flash('msg', $message);

        return $request->expectsJson() ? null : route('login');
    }
}
