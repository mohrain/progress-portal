<?php

namespace Database\Seeders;

use App\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postCategories = [
            [
                'name' => 'संसदीय सूचना',
            ],
            [
                'name' => 'सचिवालय सूचना',
            ],
            [
                'name' => 'ऐन, नियम',
            ],
            [
                'name' => 'प्रकाशन',
            ],
            [
                'name' => 'फारम',
            ],
            [
                'name' => 'डाउनलोड',
            ],
        ];
        foreach ($postCategories as $postCategory) {
            PostCategory::create($postCategory);
        }
    }
}
