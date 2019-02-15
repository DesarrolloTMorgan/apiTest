<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['nombre', 'push_token'];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }


}
