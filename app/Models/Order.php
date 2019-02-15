<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'nombre_recibe',
        'calle',
        'numero',
        'colonia',
        'entre_calles',
        'referencia',
        'telefono',
        'lugar_pedido',
        'detalle_pedido',
        'estatus',
        'costo',
        'menasje_respuesta',
        'customer_id',
        'repartidor_id',
        'store_id'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function repartidor()
    {
        return $this->belongsTo('App\Models\Repartidor');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }
}
