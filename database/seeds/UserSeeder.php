<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arraySeksi = array('Pelayanan',
                            'Pengolahan Data dan Informasi',
                            'Subbagian Umum dan Kepatuhan Internal',
                            'Penagihan',
                            'Pemeriksaan',
                            'Ekstensifikasi dan Penyuluhan',
                            'Pengawasan dan Konsultasi I',
                            'Pengawasan dan Konsultasi II',
                            'Pengawasan dan Konsultasi III',
                            'Pengawasan dan Konsultasi IV'
                        );

        $faker = Faker::create('id_ID');

        for ($i=1; $i < count($arraySeksi) + 1; $i++) { 
            DB::table('users')->insert([
                'name' => $faker->name, 
                'username' => $faker->userName, 
                'password' => Hash::make(12345678), 
                'role_id' => 2, 
                'position' => "Seksi " . $arraySeksi[$i - 1],
            ]);
        }
    }
}
