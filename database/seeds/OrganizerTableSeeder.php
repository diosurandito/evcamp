<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrganizerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('organizers')->insert(array(
        [
         'nama' => 'Hasim', 
         'email' => 'hasim@gmail.com',
         'password' => bcrypt('123456'),
         'nama_bank' => 'BRI',
         'nama_akun' => 'Hasim',
         'no_rek' => '11223344',
         'id_campus' => '1',
         'no_telp' => '+6285225454111',
         'foto_ktm' => 'foto_ktm/ktm01.jpg',
         'foto' => 'foto/user01.png',
         'email_verified_at' => Carbon::now(),
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Wahid', 
         'email' => 'wahid@gmail.com',
         'password' => bcrypt('123456'),
         'nama_bank' => 'BRI',
         'nama_akun' => 'Wahid',
         'no_rek' => '11223355',
         'id_campus' => '4',
         'no_telp' => '+6285225454222',
         'foto_ktm' => 'foto_ktm/ktm01.jpg',
         'foto' => 'foto/user02.png',
         'email_verified_at' => Carbon::now(),
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Dinda', 
         'email' => 'dinda@gmail.com',
         'password' => bcrypt('123456'),
         'nama_bank' => 'BRI',
         'nama_akun' => 'Dinda',
         'no_rek' => '11223366',
         'id_campus' => '1',
         'no_telp' => '+6285225454333',
         'foto_ktm' => 'foto_ktm/ktm01.jpg',
         'foto' => 'foto/user03.png',
         'email_verified_at' => Carbon::now(),
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Abdul', 
         'email' => 'abdul@gmail.com',
         'password' => bcrypt('123456'),
         'nama_bank' => 'BRI',
         'nama_akun' => 'Abdul',
         'no_rek' => '11223377',
         'id_campus' => '2',
         'no_telp' => '+6285225454444',
         'foto_ktm' => 'foto_ktm/ktm01.jpg',
         'foto' => 'foto/user01.png',
         'email_verified_at' => Carbon::now(),
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Wildan', 
         'email' => 'wildan@gmail.com',
         'password' => bcrypt('123456'),
         'nama_bank' => 'BRI',
         'nama_akun' => 'Wildan',
         'no_rek' => '11223388',
         'id_campus' => '5',
         'no_telp' => '085225454555',
         'foto_ktm' => 'foto_ktm/ktm01.jpg',
         'foto' => 'foto/user02.png',
         'email_verified_at' => Carbon::now(),
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Sari', 
         'email' => 'sari@gmail.com',
         'password' => bcrypt('123456'),
         'nama_bank' => 'BRI',
         'nama_akun' => 'Sari',
         'no_rek' => '11223399',
         'id_campus' => '3',
         'no_telp' => '085225454666',
         'foto_ktm' => 'foto_ktm/ktm01.jpg',
         'foto' => 'foto/user03.png',
         'email_verified_at' => Carbon::now(),
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Rizal', 
         'email' => 'rizal@gmail.com',
         'password' => bcrypt('123456'),
         'nama_bank' => 'BRI',
         'nama_akun' => 'Rizal',
         'no_rek' => '11223411',
         'id_campus' => '2',
         'no_telp' => '085225454777',
         'foto_ktm' => 'foto_ktm/ktm01.jpg',
         'foto' => 'foto/user01.png',
         'email_verified_at' => Carbon::now(),
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Wawan', 
         'email' => 'wawan@gmail.com',
         'password' => bcrypt('123456'),
         'nama_bank' => 'BRI',
         'nama_akun' => 'Wawan',
         'no_rek' => '11223422',
         'id_campus' => '2',
         'no_telp' => '+6285225454888',
         'foto_ktm' => 'foto_ktm/ktm01.jpg',
         'foto' => 'foto/user02.png',
         'email_verified_at' => Carbon::now(),
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Hamzah', 
         'email' => 'hamzah@gmail.com',
         'password' => bcrypt('123456'),
         'nama_bank' => 'BRI',
         'nama_akun' => 'Hamzah',
         'no_rek' => '11223433',
         'id_campus' => '1',
         'no_telp' => '+6285225454999',
         'foto_ktm' => 'foto_ktm/ktm01.jpg',
         'foto' => 'foto/user01.png',
         'email_verified_at' => Carbon::now(),
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Anita', 
         'email' => 'anita@gmail.com',
         'password' => bcrypt('123456'),
         'nama_bank' => 'BRI',
         'nama_akun' => 'Anita',
         'no_rek' => '11223444',
         'id_campus' => '1',
         'no_telp' => '+6285225455000',
         'foto_ktm' => 'foto_ktm/ktm01.jpg',
         'foto' => 'foto/user03.png',
         'email_verified_at' => Carbon::now(),
         'created_at' => Carbon::now()
        ],
        [
         'nama' => 'Hanif', 
         'email' => 'hanif@gmail.com',
         'password' => bcrypt('123456'),
         'nama_bank' => 'BCA',
         'nama_akun' => 'Hanif',
         'no_rek' => '11223455',
         'id_campus' => '1',
         'no_telp' => '+6285225455111',
         'foto_ktm' => 'foto_ktm/ktm01.jpg',
         'foto' => 'foto/user02.png',
         'email_verified_at' => Carbon::now(),
         'created_at' => Carbon::now()
        ]
      ));
    }
}
