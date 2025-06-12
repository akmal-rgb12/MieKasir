<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'Mie Ayam', 'slug' => 'mie-ayam'],
            ['id' => 2, 'name' => 'Mie Bakso', 'slug' => 'mie-bakso'],
            ['id' => 3, 'name' => 'Minuman', 'slug' => 'minuman'],
            ['id' => 4, 'name' => 'Lainnya', 'slug' => 'lainnya'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
