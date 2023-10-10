<?php

namespace Database\Seeders;

use App\BillType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $billTypes = [
            [
                'name' => 'दर्ता विधेयक',
            ],
            [
                'name' => 'प्रक्रियामा रहेको विधेयक',
            ],
            [
                'name' => 'पारित विधेयक',
            ],
            [
                'name' => 'प्रमाणीकरण भएका विधेयक',
            ],
        ];

        foreach ($billTypes as $billType) {
            BillType::create($billType);
        }
    }
}
