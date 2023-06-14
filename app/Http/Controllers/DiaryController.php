<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiaryController extends Controller
{
	public function index(Request $request)
	{ 

		$items = Diary::all();
		return view('diary.index', ['items' => $items]);
	}
}
