<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        settings()->set([
            'app_name' => 'प्रदेश सभा',
            'app_name_en' => 'Province Parliament',
            'office_name' => 'प्रदेश सभा सचिवालय',
            'province_name' => 'सुदूरपश्‍चिम प्रदेश',
            'address_line_one' => 'धनगढी, कैलाली',
            'address_line_two' => '',
            'phone' => '०९१-५२२४८९',
            'email' => ' pradeshsabha7@gmail.com',
            'election_id' => 2,
            'website' => 'http://pga.sudurpashchim.gov.np/',
            'twitter' => 'https://twitter.com/pradeshsabha7',
            'youtube' => 'https://www.youtube.com/@sudurpaschimpradeshsabha6853',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1749.7355871576397!2d80.58499976017696!3d28.70546172694278!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a1ecd8316bb2b5%3A0x28f50776ac757f21!2sOffice%20of%20District%20Coordination%20Committee%20Kailali!5e0!3m2!1sen!2sus!4v1699008231867!5m2!1sen!2sus" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
          
        ]);
    }
}
