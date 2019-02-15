<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Customer::truncate();

        $orders = Order::count('id');

        if($orders == '0')
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Customer::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        $faker = \Faker\Factory::create();

        // Create a few 'Customers' in our database:
        for ($i = 0; $i < 2; $i++) {
            Customer::create([
                'nombre' => $faker->name(),
                'push_token' => Str::random(32),
            ]);
        }
    }
}
