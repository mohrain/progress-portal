<?php

namespace Database\Seeders;

use App\Models\Election;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elections = [
            [
                'name' => '2074',
                'start' => '2074-02-15',
                'end' => '2079-02-15',
            ],
            [
                'name' => '2079',
                'start' => '2079-04-15',
            ],
        ];

        foreach ($elections as $election) {
            Election::create($election);
        }
    }
}
