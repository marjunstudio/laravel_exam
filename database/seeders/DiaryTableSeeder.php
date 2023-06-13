<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaryTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $param = [
      'title' => 'テスト投稿',
      'content' => 'これはテスト用の投稿です。'
    ];
    DB::table('diary')->insert($param);
  }
}
