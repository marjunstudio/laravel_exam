<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiaryController extends Controller
{
	// Diary一覧表示
	public function index()
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
		$this->validate($request, Diary::$rules);
		$diary = new Diary;
		$form = $request->all();
		unset($form['_token']);
		$diary->fill($form)->save();
		return redirect('/index');
	}

	public function edit(Request $request)
	{
		$diary = Diary::find($request->id);
		return view('diary.edit', ['form' => $diary]);
	}

	public function update(Request $request)
	{
		$this->validate($request, Diary::$rules);
		$diary = Diary::find($request->id);
		$form = $request->all();
		unset($form['_token']);
		$diary->fill($form)->save();
		return redirect('/index');
	}
}
