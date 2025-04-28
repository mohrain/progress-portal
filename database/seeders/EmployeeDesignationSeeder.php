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
                'name' => 'प्रमुख प्रशासकीय अधिकृत',
            ],
            [
                'name' => 'शाखा अधिकृत / सूचना अधिकारी',
            ],
            // [
            //     'name' => 'सूचना अधिकारी',
            // ],
        ];
        foreach ($employeeDesignations as $employeeDesignation) {
            EmployeeDesignation::create($employeeDesignation);
        }
    }
}
