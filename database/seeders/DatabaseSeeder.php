<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 categories, then create 50 posts using those categories
        $categories = Category::factory(10)->create();

        Post::factory(50)
            ->recycle($categories) // Randomly assigns one of the 10 categories to each post
            ->create();
    }
}
