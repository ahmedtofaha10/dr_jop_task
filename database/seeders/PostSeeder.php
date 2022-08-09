<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['draft', 'publish', 'private'];
        for ($i = 1;$i <= 500;$i++){
            DB::table('posts')->insert([
                'title' => Str::random(10),
                'content' => Str::random(199),
                'post_category' => PostCategory::all()->random()->id,
                'user_id' => User::query()->where('role', 'user')->get()->random()->id,
                'status' => $status[rand(0, 2)],
            ]);
        }
    }
}
