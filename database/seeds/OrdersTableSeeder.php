<?php

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();

        $faker = \Faker\Factory::create();

        // Create a few 'Repartidores' in our database:
        for ($i = 0; $i < 2; $i++) {
            Order::create([
                'nombre_recibe' => $faker->name,
                'calle' => $faker->streetName,
                'numero' => $faker->word,
                'colonia' => $faker->colorName,
                'entre_calles' => Str::random(6),
                'referencia' => $faker->colorName,
                'telefono' => $faker->colorName,
                'lugar_pedido' => $faker->colorName,
                'detalle_pedido' => $faker->colorName,
                'estatus' => $faker->colorName,
                'costo' => $faker->colorName,
                'menasje_respuesta' => $faker->colorName,
                'customer_id' => $faker->colorName,
                'repartidor_id' => $faker->colorName,
                'store_id' => $faker->colorName,
            ]);
        }
    }
}
