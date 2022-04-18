<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeOption extends Model
{
    protected $fillable = ['attribute_id', 'name', 'keyword', 'price', 'stock', 'length', 'height', 'broad', 'quantity','image','description'];

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute')->withDefault();
    }

    public $timestamps = false;
}
