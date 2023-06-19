<?php

namespace App\Imports;

use App\Models\Diary;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;


class DiariesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Diary([
            'title' => $row[1],
            'content' => $row[2],
            'created_at' => $row[3],
            'updated_at' => $row[4],
            'user_id' => $row[5]
        ]);
    }
}
