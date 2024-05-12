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
        Category::create([
            'name' => 'Money',
        ]);
        Category::create([
            'name' => 'Papers',
        ]);
        Category::create([
            'name' => 'Phone',
        ]);
        Category::create([
            'name' => 'Laptop',
        ]);
        Category::create([
            'name' => 'Camera',
        ]);
        Category::create([
            'name' => 'Clouthes',
        ]);
        Category::create([
            'name' => 'Skirt',
        ]);
        Category::create([
            'name' => 'Shirt',
        ]);
        Category::create([
            'name' => 'Papers',
        ]);
    }
}
