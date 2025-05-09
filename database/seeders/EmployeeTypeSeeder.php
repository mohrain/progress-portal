<?php

namespace Database\Seeders;

use App\Models\EmployeeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $empTypes = ["स्थायी", "अस्थायी", "करार", "ज्यालादारी"];

        foreach ($empTypes as $type) {
            EmployeeType::create([
                'name' => $type
            ]);
        }
    }
}
