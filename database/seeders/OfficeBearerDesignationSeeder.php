<?php

namespace Database\Seeders;

use App\Models\OfficeBearerDesignation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeBearerDesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ob = [
            [
                'name' => 'नगर प्रमुख',
            ],
            [
                'name' => 'नगर उप-प्रमुख',
            ],
            [
                'name' => 'नगर प्रवक्ता',
            ],
            [
                'name' => 'अध्यक्ष',
                'type' => 'ward'
            ],
            [
                'name' => 'उपाध्यक्ष',
                'type' => 'ward'
            ]




        ];
        foreach ($ob as $position) {
            OfficeBearerDesignation::create($position);
        }
    }
}
