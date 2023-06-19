<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	// ユーザープロフィール画面
    public function profile()
		{
			$user = User::find(Auth::id());

			$diaries = Diary::with('user')->where('user_id', '=', Auth::id())->get();
			return view('user.profile', ['user'=> $user, 'diaries' => $diaries]);;
		}
}
