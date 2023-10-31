<?php

namespace Database\Seeders;

use App\Models\Committee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $committees  = collect([
            'विधायन तथा प्रदेश समिति',
            'सबजनिक लेखा समिति',
            'अर्थ विकास तथा प्राकृतिक स्रोत समिति',
            'सार्बजनिक विकास समिति'
        ]);

        $committees->each(
            fn ($committee) => Committee::query()->updateOrCreate([
                'name' => $committee
            ])
        );
    }
}
