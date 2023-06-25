<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Diary;
use App\Models\User;

class DiariesTableSeeder extends Seeder
{
    public function run()
    {
        // ユーザーをランダムに取得
        $users = User::all();

        // サンプルデータを生成
        $diaries = [
            [
                'title' => 'テスト投稿1',
                'content' => 'これはテスト用の投稿です。',
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'テスト投稿2',
                'content' => 'これはテスト用の投稿です。',
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => $users->random()->id,
            ],
            // さらにデータを追加する場合は、同様の形式で追記してください
        ];

        // データをデータベースに挿入
        Diary::insert($diaries);
    }
}
