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
            'app_name' => 'सूची दर्ता',
            'app_name_en' => 'सूची दर्ता',
            'municipality_name' => 'घोडाघोडी नगरपालिका',
            'municipality_tagline' => 'नगर कार्यपालिकाको कार्यालय',
            'municipality_address_line_one' => 'सुखड, कैलाली',
            'municipality_address_line_two' => '',
            'municipality_phone' => '091-403064, 403029',
            'municipality_email' => 'ghodaghodimun@gmail.com',
            'municipality_website' => 'ghodaghodimun.gov.np',
            
            'letter_font_size' => '16px',
            'letter_application_recipient' => '<div><div>श्रीमान् प्रमुख प्रशासकीय अधिकृत ज्यू,</div>
            <div>घोडाघोडी नगरपालिकाको कार्यालय</div>
            <div>सुदूरपश्चिम प्रदेश, सुखड, कैलाली ।</div></div>',
            'letter_officer_name' => 'छविलाल विनाडी',
            'letter_officer_designation' => 'अधिकृत छैठाैं'
        ]);
    }
}
