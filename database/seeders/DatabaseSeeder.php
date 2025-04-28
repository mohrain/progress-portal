<?php

namespace Database\Seeders;

use App\BudgetSource;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::firstOrCreate(['name' => 'sachib']);
        $admin = Role::firstOrCreate(['name' => 'librarian']);
        $admin = Role::firstOrCreate(['name' => 'hod']);



        // $this->call(UserSeeder::class);
        // $this->call(UsersTableSeeder::class);


        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(FiscalYearSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(PostCategorySeeder::class);
        $this->call(BillTypeSeeder::class);
        $this->call(ParliamentaryPartySeeder::class);
        $this->call(ElectionSeeder::class);
        $this->call(EmployeeDesignationSeeder::class);
        $this->call(MinistrySeeder::class);
        $this->call(BillCategorySeeder::class);
        $this->call(CommitteeSeeder::class);

        $this->call(OfficeBearerDesignationSeeder::class);
        // if (app()->environment() == 'production') {
        // } else {
        // }
    }
}
