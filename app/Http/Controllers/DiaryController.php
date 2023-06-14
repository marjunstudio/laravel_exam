<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiaryController extends Controller
{
	// Diary一覧表示
	public function index(Request $request)
	{ 

		$items = Diary::all();
		return view('diary.index', ['items' => $items]);
	}

	// 入力フォーム表示
	public function add()
	{
		return view('diary.add');
	}

	// 保存処理
	public function create(Request $request)
	{
		// $this->validate($request, Diary::$rules);
		$diary = new Diary;
		$form = $request->all();
		unset($form['_token']);
		$diary->fill($form)->save();
		return redirect('/index');
	}
}
