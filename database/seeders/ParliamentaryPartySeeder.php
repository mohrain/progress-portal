<?php

namespace Database\Seeders;

use App\ParliamentaryParty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParliamentaryPartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parliamentaryParties = [
            [
                'name' => 'नेपाली काँग्रेस',
            ],
            [
                'name' => 'नेपाल कम्युनिष्‍ट पार्टी (एमाले)',
            ],
            [
                'name' => 'नेपाल कम्युनिष्‍ट पार्टी (माओवादी केन्द्र)',
            ],
            [
                'name' => 'राष्‍ट्रिय स्वतन्त्र पार्टी',
            ],
            [
                'name' => 'राष्‍ट्रिय प्रजातन्त्र पार्टी',
            ],
            [
                'name' => 'जनता समाजवादी पार्टी, नेपाल',
            ],
            [
                'name' => 'नेपाल कम्युनिष्‍ट पार्टी (एकीकृत समाजवादी)',
            ],
            [
                'name' => 'जनमत पार्टी',
            ],
            [
                'name' => 'लोकतान्त्रिक समाजवादी पार्टी नेपाल',
            ],
            [
                'name' => 'नागरिक उन्मुक्ति पार्टी',
            ],
            [
                'name' => 'नेपाल मजदुर किसान पार्टी',
            ],
            [
                'name' => 'राष्‍ट्रिय जनमोर्चा',
            ],
            [
                'name' => 'आम जनता पार्टी',
            ],
            [
                'name' => 'स्वतन्त्र',
            ],
        ];
        foreach ($parliamentaryParties as $parliamentaryParty) {
            ParliamentaryParty::create($parliamentaryParty);
        }
    }
}
