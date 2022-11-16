<?php

namespace Database\Seeders;

use App\Models\HomeAppliance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeApplianceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeAppliance::factory()->state([
            'name' => 'Geladeira Frost Free',
            'description' => 'Este produto é totalmente versátil. Tudo para ser personalizado para comportar o que você preferir.',
            'voltage' => 220,
            'manufacturer_id' => 1
        ])->create();
        HomeAppliance::factory()->count(3)->create();
    }
}
