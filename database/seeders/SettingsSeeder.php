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
            'website' => 'http://pga.sudurpashchim.gov.np/',
            'twitter' => 'https://twitter.com/pradeshsabha7',
            'youtube' => 'https://www.youtube.com/@sudurpaschimpradeshsabha6853',
            
            // 'letter_font_size' => '16px',
            // 'letter_application_recipient' => '<div><div>श्रीमान् प्रमुख प्रशासकीय अधिकृत ज्यू,</div>
            // <div>घोडाघोडी नगरपालिकाको कार्यालय</div>
            // <div>सुदूरपश्चिम प्रदेश, सुखड, कैलाली ।</div></div>',
            // 'letter_officer_name' => 'छविलाल विनाडी',
            // 'letter_officer_designation' => 'अधिकृत छैठाैं'
        ]);
    }
}
