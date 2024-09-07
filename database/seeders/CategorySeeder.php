<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Category::factory(5)->create();
        Category::create([
            'name' => 'Politik',
            'slug' => 'politik'
        ]);

        Category::create([
            'name' => 'Ekonomi',
            'slug' => 'Ekonomi'
        ]);

        Category::create([
            'name' => 'Olahraga',
            'slug' => 'Olahraga'
        ]);

    }
}
