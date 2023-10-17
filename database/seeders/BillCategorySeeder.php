<?php

namespace Database\Seeders;

use App\Models\BillCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $billCategories = [
            [
                'name' => 'साधारण',
                'name_english' => 'General',
            ],
            [
                'name' => 'अर्थ',
                'name_english' => 'Economic',
            ],
        ];

        foreach ($billCategories as $billCategory) {
            BillCategory::create($billCategory);
        }
    }
}
