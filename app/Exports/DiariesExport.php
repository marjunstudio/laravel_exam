<?php

namespace App\Exports;

use App\Models\Diary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiariesExport implements FromCollection, WithHeadings
{
	public function collection()
	{
		return Diary::all();
	}

	public function headings(): array
{
    return [
        'id',
        'タイトル',
        'コンテンツ',
        '作成日時',
        '更新日時',
				'ユーザーID',
    ];
}
}
