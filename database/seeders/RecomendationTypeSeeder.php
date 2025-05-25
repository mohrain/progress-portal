<?php

namespace Database\Seeders;

use App\Models\RecomendationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecomendationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $type = ["English Format", "समाजिक/पारिवारिक", "मुचुल्का", "नागरिकता सम्बन्धि", "घर/जग्गा जमिन", "शैक्षिक", "'व्यापार/व्यवसाय", "संस्था", "व्यक्तिगत", "पशुपालन", "कार्यालय प्रयोजन", "योजना", "अन्य"];

        foreach ($type as $t) {
            RecomendationType::create([
                'name' => $t,
            ]);
        }
    }
}
