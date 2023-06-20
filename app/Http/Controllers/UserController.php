<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
		return view('user.profile', ['user'=> $user, 'diaries' => $diaries]);;
	}

	// CSVをエクスポート
	public function csvExport(): \Symfony\Component\HttpFoundation\BinaryFileResponse
	{
		return Excel::download(new UsersExport, 'users.csv');
	}

	public function csvImport(Request $request)
	{
		$file = $request->file('file');
		Excel::import(new UsersImport, $file);
		return redirect('dashboard/user')->with('msg', 'CSVファイルをインポートしました。');
	}
}
