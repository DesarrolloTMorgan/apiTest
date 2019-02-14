<?php

use Illuminate\Database\Seeder;
use App\Models\Repartidor;
use Illuminate\Support\Str;

class RepartidoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Repartidor::truncate();

        $faker = \Faker\Factory::create();

        // Create a few 'Repartidores' in our database:
        for ($i = 0; $i < 2; $i++) {
            Repartidor::create([
                'nombre' => $faker->name,
                'foto' => $faker->url,
                'modelo_vehiculo' => $faker->word,
                'color_vehiculo' => $faker->colorName,
                'placas_vehiculo' => Str::random(6),
            ]);
        }

    }
}
