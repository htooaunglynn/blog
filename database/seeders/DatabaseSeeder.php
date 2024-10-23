<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::truncate();
        // Comment::truncate();
        // Blog::truncate();
        // Category::truncate();
        // $mgmg = User::factory()->create(['name' => 'mg mg', 'username' => 'mg-mg']);
        // $aung = User::factory()->create(['name' => 'aung aung', 'username' => 'aung-aung']);

        // $category1 = Category::factory()->create(['name' => 'Category 1', 'slug' => 'category-1']);
        // $category2 = Category::factory()->create(['name' => 'Category 2', 'slug' => 'category-2']);

        /**
         * ! Faker Max unique value = 182
         */
        $blog1 = Blog::factory(100)->create();
        // $blog2 = Blog::factory()->create(['category_id' => $category1->id, 'user_id' => $aung->id]);
        // $blog3 = Blog::factory()->create(['category_id' => $category2->id, 'user_id' => $aung->id]);
        // $blog4 = Blog::factory()->create(['category_id' => $category2->id, 'user_id' => $mgmg->id]);

        // Comment::factory(2)->create(['blog_id' => $blog1->id, 'user_id' => $mgmg->id]);
        // Comment::factory(2)->create(['blog_id' => $blog1->id, 'user_id' => $aung->id]);
        // Comment::factory(2)->create(['blog_id' => $blog2->id, 'user_id' => $mgmg->id]);
        // Comment::factory(2)->create(['blog_id' => $blog2->id, 'user_id' => $aung->id]);
        // Comment::factory(2)->create(['blog_id' => $blog3->id, 'user_id' => $mgmg->id]);
        // Comment::factory(2)->create(['blog_id' => $blog3->id, 'user_id' => $aung->id]);
        // Comment::factory(2)->create(['blog_id' => $blog4->id, 'user_id' => $mgmg->id]);
        // Comment::factory(2)->create(['blog_id' => $blog4->id, 'user_id' => $aung->id]);
    }
}
