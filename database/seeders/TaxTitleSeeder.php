<?php

namespace Database\Seeders;

use App\Models\TaxTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $taxes = [
            ['code' => '11313', 'title' => 'सम्पत्ती कर'],
            ['code' => '11314', 'title' => 'भूमिकर/मालपोत'],
            ['code' => '11331', 'title' => 'वाहन कर'],
            ['code' => '11315', 'title' => 'व्यवसायी भुक्तानी गर्ने'],
            ['code' => '11323', 'title' => 'कृषिजन्य पशुपन्छी वस्तुको व्यवसायिक कारोबारमा लाग्ने कर'],
            ['code' => '11328', 'title' => 'अन्य कर'],
            ['code' => '11413', 'title' => 'अन्य सेवा शुल्क तथा बिक्री'],
            ['code' => '11414', 'title' => 'शिक्षा क्षेत्रको आम्दानी'],
            ['code' => '11424', 'title' => 'परीक्षा शुल्क'],
            ['code' => '11425', 'title' => 'अन्य प्रशासनिक सेवा शुल्क'],
            ['code' => '11431', 'title' => 'नविकरण दस्तुर'],
            ['code' => '11434', 'title' => 'सिफारिश दस्तुर'],
            ['code' => '11435', 'title' => 'व्यक्तिगत घटना दर्ता दस्तुर'],
            ['code' => '11439', 'title' => 'अन्य दस्तुर'],
            ['code' => '11441', 'title' => 'व्यावसाय दर्ता दस्तुर'],
            ['code' => '11442', 'title' => 'प्रशासनिक जरिवाना, दण्ड र जफत'],
            ['code' => '11499', 'title' => 'अन्य राजस्व'],
            ['code' => '14229', 'title' => 'व्यवस्थाप'],
            ['code' => '13336', 'title' => 'दरखास्त बहाल शुल्क'],
        ];

        foreach ($taxes as $tax) {
            TaxTitle::create([
                'code' => $tax['code'],
                'title' => $tax['title'],
            ]);
        }
    }
}
