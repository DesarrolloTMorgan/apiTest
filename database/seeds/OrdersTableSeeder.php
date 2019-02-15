<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use Illuminate\Support\Str;

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
                'numero' => $faker->buildingNumber,
                'colonia' => $faker->secondaryAddress,
                'entre_calles' => Str::random(6),
                'referencia' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'telefono' => $faker->phoneNumber,
                'lugar_pedido' => $faker->company,
                'detalle_pedido' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'estatus' => 'Nuevo',
                'costo' => $faker->buildingNumber,
                'menasje_respuesta' => '',
                'customer_id' => 1,
            ]);
        }
    }
}
