<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function item($item_code){
    	return Item::where('id', $item_code)->first();
    }

    public function inventory($item_code){
    	return Inventory::where('id', $item_code)->first();
    }
}
