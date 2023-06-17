<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use App\Http\Requests\DiaryRequest;

class DiaryController extends Controller
{
	// Diary一覧表示
	public function index(Request $request)
	{
		$keyword = $request->input('q');
		$query = Diary::orderBy('created_at', 'desc');

		// 検索された場合クエリ実行
		if(!empty($keyword)) {
				$query->where('title', 'LIKE', "%{$keyword}%")
						->orWhere('content', 'LIKE', "%{$keyword}%");
		}

		$items = $query->get();
		return view('diary.index', compact('items', 'keyword'));
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
		$diary->fill($request->validated())->save();
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
		$diary->fill($request->validated())->save();
		return redirect()->route('diary.index')->with('msg', '日記を更新しました。');
	}

	// 日記削除処理
	public function destroy(Request $request)
	{
		Diary::find($request->id)->delete();
		return redirect()->route('diary.index')->with('msg', '日記を削除しました。');
	}
}