<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
class Total extends Model
{
    public function item($item_code){
    	return Item::where('id', $item_code)->first();
    }
}
