<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
	/* 
	 * Tabla order_items de BD
	 */
    protected $table = 'orderItems';

	/* 
	 * Escribir campos price, quantity, product_id, order_id en dicha tabla
	 */
	protected $fillable = ['price', 'quantity', 'product_id', 'order_id'];

	/* no usar timestamps */
	public $timestamps = false;
}
