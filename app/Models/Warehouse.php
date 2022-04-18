<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{

      protected $fillable = ['name', 'available_quantity', 'delivery_time', 'min_order_amount'];

      public function item()
      {
            return $this->hasOne('App\Models\Item')->withDefault();
      }
}
