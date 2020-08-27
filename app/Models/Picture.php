<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function bamboos()
    {
        return $this->belongsTo('App\Models\Bamboo');
    }
}
