<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiariesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $param = [
      'title' => 'テスト投稿',
      'content' => 'これはテスト用の投稿です。',
      'create_at' => now(),
      'updated_at' => now(),
      'user_id' => 1
    ];
    DB::table('diaries')->insert($param);
  }
}
