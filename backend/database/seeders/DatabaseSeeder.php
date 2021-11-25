<?php
/*****************************************************/
# Company Name      :
# Author            :
# Created Date      :
# Page/Class name   : DatabaseSeeder
# Purpose           : Table declaration
/*****************************************************/

namespace Database\Seeders;

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
        $this->call(AdminUserSeeder::class);
        $this->call(RoleSeeder::class);
    }
}