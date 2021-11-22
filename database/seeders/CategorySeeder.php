<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::insert([
            [
                'name' => 'general'
            ],
            [
                'name' => 'entertainment'
            ],
            [
                'name' => 'sports'
            ],
            [
                'name' => 'movies'
            ],
            [
                'name' => 'politics'
            ],
            [
                'name' => 'cars'
            ]
        ]);
    }
}
