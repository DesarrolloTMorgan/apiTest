<?php

use Illuminate\Database\Seeder;
use App\Models\Store;
use Illuminate\Support\Str;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::truncate();

        $faker = \Faker\Factory::create();
        // Create a few 'Stores' in our database:
        for ($i = 0; $i < 2; $i++) {
            Store::create([
                'nombre' => $faker->company,
                'direccion' => $faker->address,
                'telefono' => $faker->phoneNumber,
                'email' => $faker->email,
            ]);
        }
    }
}
