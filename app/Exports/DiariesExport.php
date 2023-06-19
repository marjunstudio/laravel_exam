<?php

namespace App\Exports;

use App\Models\Diary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiariesExport implements FromCollection
{
	public function collection()
	{
		return Diary::all();
	}
}
