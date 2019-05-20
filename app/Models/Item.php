<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function bill(){
        return $this->hasMany(Bill::class);
    }
}
