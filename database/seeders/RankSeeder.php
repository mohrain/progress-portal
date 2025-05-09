<?php

namespace Database\Seeders;

use App\Models\Rank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ranks = ['रा.प दितीय', "उप-सचिब दसौं", "उप-सचिब नवौं", "अधिकृत आठौं", "अधिकृत सातौं", " अधिकृत छैठौं", "सहायक पाँचौं", "सहायक चौथो", "श्रेणी विहिन"];

        foreach ($ranks as $rank) {
            Rank::create([
                'name' => $rank
            ]);
        }
    }
}
