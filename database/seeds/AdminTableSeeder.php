<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('admins')->insert(array(
        [
         'name' => 'ADMIN', 
         'email' => 'admin@gmail.com',
         'password' => bcrypt('admin123'),
         
        ]
      ));

    }
}
