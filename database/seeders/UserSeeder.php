<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'user'];
        for ($i = 1;$i <= 100;$i++){
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@'.Str::random(8).'.com',
                'password' => bcrypt('000000'),
                'role' => $roles[rand(0, 1)],
                'is_active' => !(rand(0, 1) == 1),
            ]);
        }

    }
}
