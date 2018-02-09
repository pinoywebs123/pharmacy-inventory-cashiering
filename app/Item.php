<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function order(){
    	return $this->hasOne('App\Order');
    }
}
