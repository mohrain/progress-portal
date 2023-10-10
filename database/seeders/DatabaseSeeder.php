<?php

namespace Database\Seeders;

use App\BudgetSource;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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

        if (app()->environment() == 'production') {
        } else {
        }
    }
}
