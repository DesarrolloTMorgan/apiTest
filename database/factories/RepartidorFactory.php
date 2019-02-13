<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Repartidor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'foto' => $faker->url,
        'modelo_vehiculo' => $faker->name,
        'color_vehiculo' => $faker->name, // secret
        'placas_vehiculo' => str::random(6),
    ];
});
