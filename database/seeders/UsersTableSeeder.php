<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // サンプルユーザーデータを生成
        $users = [
            [
                'name' => '管理人',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Adminkanri1'),
                'is_admin' => 'true',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '山田 太郎',
                'email' => 'yamada@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => 'false',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '鈴木 一郎',
                'email' => 'suzuki@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => 'false',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // さらにデータを追加する場合は、同様の形式で追記してください
        ];

        // データをデータベースに挿入
        User::insert($users);
    }
}
