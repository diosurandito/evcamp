<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CampusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campuses')->insert(array(
        [
         'nama_kampus' => 'Politeknik Harapan Bersama',
         'alamat' => 'Jl. Mataram No.9, Kel. Pesurungan Lor, Pesurungan Lor, Kec. Margadana, Kota Tegal, Jawa Tengah',
         'latitude' => '-6.868314',
         'longitude' => '109.107880',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'Universitas Pancasakti Tegal',
         'alamat' => 'Jl. Halmahera No.KM. 01, Mintaragen, Kec. Tegal Tim., Kota Tegal, Jawa Tengah',
         'latitude' => '-6.852141',
         'longitude' => '109.147955',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'STMIK YMI Tegal',
         'alamat' => 'Jl. Pendidikan No.1, Pesurungan Lor, Kec. Margadana, Kota Tegal, Jawa Tengah',
         'latitude' => '-6.869233',
         'longitude' => '109.115673',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'STIKES Bhamada Slawi',
         'alamat' => 'Jalan Cut Nyak Dien No.16, Kalisapu, Slawi, Griya Prajamukti, Kalisapu, Slawi, Tegal, Jawa Tengah',
         'latitude' => '-6.991501',
         'longitude' => '109.120523',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'STKIP Nahdlatul Ulama Kab. Tegal',
         'alamat' => 'Jl. Raya Sel. Banjaran No.21, Procot, Slawi, Tegal, Jawa Tengah',
         'latitude' => '-6.971906',
         'longitude' => '109.139127',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'STIKES Muhammadiyah Tegal',
         'alamat' => 'Ketengahan, Lebaksiu Kidul, Lebaksiu, Tegal, Jawa Tengah',
         'latitude' => '-7.046791',
         'longitude' => '109.145311',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'AMIK YMI Tegal',
         'alamat' => 'Jl. Raya Dampyak No.KM 4, Kedondong, Padaharja, Kec. Kramat, Tegal, Jawa Tengah',
         'latitude' => '-6.863244',
         'longitude' => '109.170111',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'Akademi Perikanan Baruna',
         'alamat' => 'Jl. Slawi-Jatibarang Km 04, Dukuhwaru, Kab.Tegal, Jawa Tengah',
         'latitude' => '-6.972698',
         'longitude' => '109.104276',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'Akademi Kebidanan Siti Fatimah',
         'alamat' => 'JL. Raya Slawi Jatibarang Km. 4, Dukuhwaru, Kalipinang, Kalisapu, Slawi, Tegal, Jawa Tengah',
         'latitude' => '-6.970874',
         'longitude' => '109.105416',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'AMIK BSI Tegal',
         'alamat' => 'Jl. Sipelem No.22, Kraton, Kec. Tegal Barat, Kota Tegal, Jawa Tengah',
         'latitude' => '-6.864314',
         'longitude' => '109.121005',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'Politeknik Purbaya',
         'alamat' => 'Jl. Pancakarya No.1, Kalimati, Kajen, Kec. Talang, Tegal, Jawa Tengah',
         'latitude' => '-6.922119',
         'longitude' => '109.135859',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'Politeknik Muhammadiyah Tegal',
         'alamat' => 'Jl. Melati No.27, Slerok, Kec. Tegal Timur, Kota Tegal, Jawa Tengah',
         'latitude' => '-6.874815',
         'longitude' => '109.140363',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'Politeknik Trisila Dharma',
         'alamat' => 'Jl. Halmahera No.1, Mintaragen, Kec. Tegal Tim., Kota Tegal, Jawa Tengah',
         'latitude' => '-6.850048',
         'longitude' => '109.146772',
         'created_at' => Carbon::now()
        ],
        [
         'nama_kampus' => 'Politeknik Baja Tegal',
         'alamat' => 'Jl. Raya Barat, Dukuhwaru, Keplik, Dukuhwaru, Tegal, Jawa Tengah',
         'latitude' => '-6.969727',
         'longitude' => '109.095774',
         'created_at' => Carbon::now()
        ]
      ));
        
    }
}
