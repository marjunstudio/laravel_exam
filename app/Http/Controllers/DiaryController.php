<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use App\Http\Requests\DiaryRequest;

class DiaryController extends Controller
{
	// Diary一覧表示
	public function index()
	{ 
		$items = Diary::orderBy('created_at', 'desc')->get();
		return view('diary.index', ['items' => $items]);
	}

	// 入力フォーム表示
	public function create()
	{
		return view('diary.create');
	}

	// 保存処理
	public function store(DiaryRequest $request)
	{
		$diary = new Diary;
		$form = $request->all();
		unset($form['_token']);
		$diary->fill($form)->save();
		return redirect()->route('diary.index')->with('msg', '日記を投稿しました。');
	}

	public function show(Request $request)
	{
		$diary = Diary::find($request->id);
		return view('diary.show', ['diary'=> $diary]);
	}

	// 日記更新フォームを表示
	public function edit(Request $request)
	{
		$diary = Diary::find($request->id);
		return view('diary.edit', ['form' => $diary]);
	}

	// 日記更新処理
	public function update(DiaryRequest $request)
	{
		$diary = Diary::find($request->id);
		$form = $request->all();
		unset($form['_token']);
		$diary->fill($form)->save();
		return redirect()->route('diary.index')->with('msg', '日記を更新しました。');
	}

	// 日記削除処理
	public function destroy(Request $request)
	{
		Diary::find($request->id)->delete();
		return redirect()->route('diary.index')->with('msg', '日記を削除しました。');
	}
}
