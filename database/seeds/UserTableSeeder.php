<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
        [
         'nama' => 'Hasim', 
         'email' => 'hasim@gmail.com',
         'password' => bcrypt('123456'),
         'alamat' => 'Brebes',
         'jenis_klmn' => 'Laki-laki',
         'no_telp' => '085225454111',
         'foto' => 'user.png',
         'verifikasi' => '1',
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Hasan', 
         'email' => 'hasan@gmail.com',
         'password' => bcrypt('123456'),
         'alamat' => 'Tegal',
         'jenis_klmn' => 'Laki-laki',
         'no_telp' => '085225454112',
         'foto' => 'user.png',
         'verifikasi' => '1',
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Ujank', 
         'email' => 'ujank@gmail.com',
         'password' => bcrypt('123456'),
         'alamat' => 'Brebes',
         'jenis_klmn' => 'Laki-laki',
         'no_telp' => '085225454113',
         'foto' => 'user.png',
         'verifikasi' => '1',
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Echa', 
         'email' => 'echa@gmail.com',
         'password' => bcrypt('123456'),
         'alamat' => 'Pemalang',
         'jenis_klmn' => 'Perempuan',
         'no_telp' => '085225454114',
         'foto' => 'user.png',
         'verifikasi' => '1',
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Siska', 
         'email' => 'siska@gmail.com',
         'password' => bcrypt('123456'),
         'alamat' => 'Brebes',
         'jenis_klmn' => 'Perempuan',
         'no_telp' => '085225454115',
         'foto' => 'user.png',
         'verifikasi' => '1',
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Nussa', 
         'email' => 'nussa@gmail.com',
         'password' => bcrypt('123456'),
         'alamat' => 'Jakarta',
         'jenis_klmn' => 'Laki-laki',
         'no_telp' => '085225454116',
         'foto' => 'user.png',
         'verifikasi' => '1',
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Rara', 
         'email' => 'rara@gmail.com',
         'password' => bcrypt('123456'),
         'alamat' => 'Jakarta',
         'jenis_klmn' => 'Perempuan',
         'no_telp' => '085225454117',
         'foto' => 'user.png',
         'verifikasi' => '1',
         'created_at' => Carbon::now()
        ]
        ));
        
    }
}
