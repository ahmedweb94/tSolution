<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded=[];
    protected $table='bills';

    public function item(){
        return $this->belongsTo(Item::class,'item_id');
    }
}
