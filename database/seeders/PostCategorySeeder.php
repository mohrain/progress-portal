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
                'name' => 'सूचना',
            ],
            [
                'name' => 'दैनिक कार्यसूची',
                'parent_id' => 1,
            ],
            [
                'name' => 'संसदीय सूचना',
                'parent_id' => 1,
            ],
            [
                'name' => 'सचिवालय सूचना',
                'parent_id' => 1,
            ],
        
         
            [
                'name' => 'ऐन, नियम',
            ],
            [
                'name' => 'प्रकाशन',
            ],
            [
                'name' => 'फाराम',
            ],
            [
                'name' => 'सम्पूर्ण विवरण',
            ],
            [
                'name' => 'प्रदेश संसद पुस्तकालय',
            ],
        ];
        foreach ($postCategories as $postCategory) {
            PostCategory::create($postCategory);
        }
    }
}
