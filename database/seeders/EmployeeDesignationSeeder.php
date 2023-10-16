<?php

namespace Database\Seeders;

use App\Models\EmployeeDesignation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeDesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employeeDesignations = [
            [
                'name' => 'प्रदेश सभा सचिव',
            ],
            [
                'name' => 'प्रवक्ता',
            ],
            [
                'name' => 'सूचना अधिकारी',
            ],
        ];
        foreach ($employeeDesignations as $employeeDesignation) {
            EmployeeDesignation::create($employeeDesignation);
        }
    }
}
