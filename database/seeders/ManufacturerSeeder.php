<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturers = ['Electrolux', 'Brastemp', 'Fischer', 'Samsung', 'LG'];
        foreach ($manufacturers as $manufacturer) {
            Manufacturer::create(['name' => $manufacturer]);
        }
    }
}
