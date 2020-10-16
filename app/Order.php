<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	/*
	 * Tabla de la BD
	 */
    protected $table = 'orders';

    /*
	 * Escribir en los campos subtotal, shipping, user_id de la tabla orders 
	 */
    protected $fillable = ['subtotal', 'shipping', 'user_id'];
}
