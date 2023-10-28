<?php

use Illuminate\Database\Seeder;
use App\IndonesiaProvince;

class IndonesiaProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
        //
        public function run()
    {
        $provinces = [
            'Aceh',
            'Bali',
            'Bangka Belitung',
            'Banten',
            'Bengkulu',
            'DKI Jakarta',
            'Gorontalo',
            'Jambi',
            'Jawa Barat',
            'Jawa Tengah',
            'Jawa Timur',
            'Kalimantan Barat',
            'Kalimantan Selatan',
            'Kalimantan Tengah',
            'Kalimantan Timur',
            'Kalimantan Utara',
            'Kepulauan Riau',
            'Lampung',
            'Maluku',
            'Maluku Utara',
            'Nusa Tenggara Barat',
            'Nusa Tenggara Timur',
            'Papua',
            'Papua Barat',
            'Riau',
            'Sulawesi Barat',
            'Sulawesi Selatan',
            'Sulawesi Tengah',
            'Sulawesi Tenggara',
            'Sulawesi Utara',
            'Sumatera Barat',
            'Sumatera Selatan',
            'Sumatera Utara',
            'Yogyakarta',
        ];

        foreach ($provinces as $provinceName) {
            IndonesiaProvince::create(['name' => $provinceName]);
        }
    }
}
