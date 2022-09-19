<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $city_names = ['Skopje', 'Veles', 'Prilep', 'Bitola', 'Ohrid', 'Struga', 'Debar'];
        foreach ($city_names as $city_name) {
            City::updateOrCreate([
                'name' => $city_name
            ]);
        }
    }
}
