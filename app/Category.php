<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Comprobar el $id con el id existentes en la BD
    public function scopeSearchCategory($query, $id)
    {
    	return $query->where('id', '=', $id);
    }
}
