<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\LibraryExt;

class ImportCountryCodes extends Command
{
    protected $signature = 'import:country-codes';
    protected $description = 'Import country codes from JSON file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $jsonFile = storage_path('app/CountryCodes.json');
        $data = json_decode(file_get_contents($jsonFile), true);

        foreach ($data as $item) {
            $existingData = LibraryExt::where('country_code', $item['code'])->first();
            
            if ($existingData) {
                // Jika data sudah ada, perbarui data yang ada
                $existingData->update([
                    'country_code' => $item['code'],
                    'country_name' => $item['name'],
                    'country_ext' => $item['dial_code'],
                ]);
            } else {
                // Jika data belum ada, tambahkan data baru
                LibraryExt::create([
                    'country_code' => $item['code'],
                    'country_name' => $item['name'],
                    'country_ext' => $item['dial_code'],
                ]);
            }
        }

        $this->info('Country codes imported successfully.');
    }
}
