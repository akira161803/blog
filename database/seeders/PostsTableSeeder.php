<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\post;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // post::factory()->count(50)->create();

        for ($i = 0; $i < 100; $i++) { // 50 は挿入したい行数です。
            \DB::table('posts')->insert([
                'user_id' => rand(1, 100), // 例としてランダムなユーザーIDを設定
                'title' => \Str::random(10),
                'content' => \Str::random(100),
                'postCategory' => rand(0, 35), // 0 から 30 の範囲
                'typeBCategory' => 100,
                'toWhomCategory' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
