<?php

namespace App;
use App\Item;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function item($item_code){
    	return Item::where('item_code', $item_code)->first();
    }
}
