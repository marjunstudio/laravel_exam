<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// Laravel Excel用
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
	// ユーザープロフィール画面
	public function profile()
	{
		$user = User::find(Auth::id());

		$diaries = Diary::with('user')->where('user_id', '=', Auth::id())->get();
		return view('user.profile', ['user'=> $user, 'diaries' => $diaries]);
	}

	// プロフィール編集フォームを表示
	public function edit()
	{
		$user = User::find(Auth::id());
		return view('user.edit', ['user' => $user]);
	}

	// ユーザー情報の更新処理
	public function update(Request $request)
	{
		$user = User::find($request->id);
    $user->name = $request->name;
    $user->email = $request->email;
    // アバターの更新
    if ($request->hasFile('image'))
		{
			$path = Storage::disk('s3')->put('images', $request->file('image'), 'public');
			$user->image = Storage::disk('s3')->url($path);
		}

    $user->save();
		return redirect()->route('user.profile', ['id' => $user->id])->with('msg', 'プロフィールを更新しました。');
	}

	// CSVをエクスポート
	public function csvExport(): \Symfony\Component\HttpFoundation\BinaryFileResponse
	{
		return Excel::download(new UsersExport, 'users.csv');
	}

	// CSVをインポート
	public function csvImport(Request $request)
	{
		$file = $request->file('file');
		Excel::import(new UsersImport, $file);
		return redirect('profile')->with('msg', 'CSVファイルをインポートしました。');
	}
}
