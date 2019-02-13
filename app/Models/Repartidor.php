<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repartidor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'repartidores';
    protected $fillable = ['nombre', 'foto', 'modelo_vehiculo','color_vehiculo','placas_vehiculo'];
}
