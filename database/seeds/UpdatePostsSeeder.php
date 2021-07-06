<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder;

class UpdatePostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            $data = [
                'category_id' => Category::inRandomOrder()->first()->id
            ];
            $post->update($data);
        }
    }
}