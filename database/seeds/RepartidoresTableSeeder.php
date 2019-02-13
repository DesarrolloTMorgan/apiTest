<?php

use Illuminate\Database\Seeder;
use App\Models\Repartidor;

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
            Article::create([
                'nombre' => $faker->name,
                'foto' => $faker->url,
                'modelo_vehiculo' => $faker->name,
                'color_vehiculo' => $faker->name, // secret
                'placas_vehiculo' => str::random(6),
            ]);
        }

    }
}
