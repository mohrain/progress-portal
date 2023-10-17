<?php

namespace Database\Seeders;

use App\Models\Ministry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MinistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ministries = [
            [
                'name' => 'आर्थिक मामिला मन्त्रालय',
                'name_english' => 'Ministry of Economic Affairs',
            ],
            [
                'name' => 'आन्तरिक मामिला तथा कानून मन्त्रालय',
                'name_english' => 'Ministry of Home Affairs and Law',
            ],
            [
                'name' => 'सामाजिक विकास मन्त्रालय',
                'name_english' => 'Ministry of Social Development',
            ],
            [
                'name' => 'भुमि व्यवस्था, कृषि तथा सहकारी मन्त्रालय',
                'name_english' => 'Ministry of Land Management, Agriculture and Cooperatives',
            ],
            [
                'name' => 'उद्योग, पर्यटन, वन तथा वातावरण मन्त्रालय',
                'name_english' => 'Ministry of Industry, Tourism, Forests and Environment',
            ],
            [
                'name' => 'भौतिक पूर्वाधार विकास मन्त्रालय',
                'name_english' => 'Ministry of Physical Infrastructure Development',
            ],
        ];

        foreach ($ministries as $ministry) {
            Ministry::create($ministry);
        }
    }
}
