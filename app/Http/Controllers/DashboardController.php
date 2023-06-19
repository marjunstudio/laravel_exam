<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function user_index()
    {
        $items = User::all();
        return view('dashboard.user_index', ['items' => $items]);
    }

    public function diary_index()
    {
        $items = Diary::all();
        return view('dashboard.diary_index', ['items' => $items]);
    }
}
