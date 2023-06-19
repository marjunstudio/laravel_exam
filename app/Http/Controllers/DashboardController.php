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
        $colNames = $items->first()->getFillable();
        return view('dashboard.user_index', compact('items', 'colNames'));
    }

    public function diary_index()
    {
        $items = Diary::all();
        $colNames = $items->first()->getFillable();
        return view('dashboard.diary_index', compact('items', 'colNames'));
    }
}
