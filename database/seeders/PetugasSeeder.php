<?php

namespace Database\Seeders;
use App\Models\Petugas;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'nama_petugas' => 'Ayyub Indra R',
                'username' => 'admin1',
                'password' => bcrypt('admin1'),
                'jk' => 'Pria',
                'telp' => '09786675',
                'alamat_petugas' => 'Tajur',
                'level' => 'admin'

            ],
            [
                'nama_petugas' => 'Putin',
                'username' => 'admin2',
                'password' => bcrypt('admin2'),
                'jk' => 'Pria',
                'telp' => '09786675',
                'Alamat_petugas' => 'Ciawi',
                'level' => 'admin'

            ],
            [
                'nama_petugas' => 'RDJ',
                'username' => 'petugas1',
                'password' => bcrypt('petugas1'),
                'jk' => 'Pria',
                'telp' => '077665658',
                'Alamat_petugas' => 'Unitex',
                'level' => 'petugas'
            ]
        ];
            Petugas::insert($data);
    }
}
