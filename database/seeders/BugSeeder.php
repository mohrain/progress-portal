<?php

namespace Database\Seeders;

use App\Post;
use App\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $posts = PostCategory::whereColumn('id', 'parent_id')->get();

        foreach ($posts as $post) {
            $post->parent_id = null;
            $post->save();
        }
    }
}
