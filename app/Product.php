<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopeSearch($query, $search)
    {
    	//dd("scope: " . $name);
    	return $query->where('name', 'LIKE', "%$search%");
    }

    public function scopeSearchProducts($query, $id_category)
    {
    	return $query->where('category_id', '=', $id_category);
    }
}
