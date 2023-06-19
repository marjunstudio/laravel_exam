<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use App\Http\Requests\DiaryRequest;
use Illuminate\Support\Facades\Auth;
// Laravel Excel用
use App\Exports\DiariesExport;
use Excel;

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

		$items = $query->with('user')->get();
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
		$diary->fill($request->validated());
		$diary->user_id = Auth::id();
		$diary->save();
		return redirect()->route('diary.show', ['id' => $diary->id])->with('msg', '日記を投稿しました。');
	}

	public function show(Request $request)
	{
		$diary = Diary::with('user')->find($request->id);
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
		return redirect()->route('diary.show', ['id' => $diary->id])->with('msg', '日記を更新しました。');
	}

	// 日記削除処理
	public function destroy(Request $request)
	{
		$diary = Diary::find($request->id);

    // ログインユーザーと投稿の作成ユーザーを比較
    if (Auth::id() !== $diary->user_id) {
        return redirect()->route('diary.index')->with('msg', '削除権限がありません。');
    }

    $diary->delete();

		return redirect()->route('diary.index')->with('msg', '日記を削除しました。');
	}

	public function csvExport(): \Symfony\Component\HttpFoundation\BinaryFileResponse
	{
		return Excel::download(new DiariesExport, 'diaries.csv');
	}
}