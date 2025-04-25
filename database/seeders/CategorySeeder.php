<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Fiction',
            'Non-Fiction',
            'Science Fiction',
            'Fantasy',
            'Mystery',
            'Romance',
            'Biography',
            'History',
            'Self-Help',
            'Science'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'description' => "Books about $category"
            ]);
        }
    }
}
