<?php

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
        $this->call(OrganizerTableSeeder::class);
        //$this->call(CampusTableSeeder::class);
        //$this->call(UserTableSeeder::class);
    }
}
