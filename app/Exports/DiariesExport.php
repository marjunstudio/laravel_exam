<?php

namespace App\Exports;

use App\Models\Diary;
use Maatwebsite\Excel\Concerns\FromCollection;

class DiariesExport implements FromCollection
{
	public function collection()
	{
		return Diary::all();
	}
}
