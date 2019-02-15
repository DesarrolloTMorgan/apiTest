<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['nombre', 'direccion', 'telefono','email'];

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }
}
