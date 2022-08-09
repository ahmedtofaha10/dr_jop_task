<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_categories')->truncate();
        $categories = ['Laravel','Livewire', 'PHP', 'JavaScript', 'Vue.js'];
        foreach ($categories as $category)
            DB::table('post_categories')->insert([
                'name' => $category,
            ]);
    }
}
