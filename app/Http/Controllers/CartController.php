<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class CartController extends Controller
{

	/*
	 * Constructor del Controlador del carrito
	 */
	public function __construct()
	{
		//si no existe la variable de sesión Cart, se crea, y en ella se guarda un array vacio...
		if(!\Session::has('cart')) \Session::put('cart', array());
	}

    /*
     * Mostrar el contenido del Carrito
     */
    public function show()
    {
        $categories = Category::all();

    	//enviar contenido de la variable de sesión Cart a la vista
    	$cart = \Session::get('cart');

    	//total
    	$total = $this->total();
    	//retornar a la vista donde se muestra el carrito de compra
    	return view('store.cart', compact('cart', 'total'))->with('categories', $categories);
    }

    /*
     * Agregar un producto al Carrito
     */
    public function add(Product $product)
    {
        $categories = Category::all();

    	//almacenar la variable de sesión de tipo array
    	$cart = \Session::get('cart');
    	$product->quantity_item = 1;
    	//almacenar todo el contenido del objeto de tipo de Product
    	//esto es almacenado en una variable de tipo array
    	//usando como índice el link del propio producto....
    	$cart[$product->link] = $product;

    	//actualizar variable de sesión... para no insertar el mismo producto varias veces
    	\Session::put('cart', $cart);

    	//redireccionar al método show... para siempre acabar mostrando lo que contiene el carrito
    	return redirect()->route('cart-show')->with('categories', $categories);
    }

    /*
     * Borrar un producto del Carrito
     */
    public function delete(Product $product)
    {
        $categories = Category::all();

    	//almacenar la variable de sesión de tipo array
    	$cart = \Session::get('cart');
    	//eliminar el objeto de tipo producto recogido según su Url...
    	unset($cart[$product->link]);

     	//actualizar variable de sesión... 
    	\Session::put('cart', $cart);

    	//redireccionar al método show... para siempre acabar mostrando lo que contiene el carrito
    	return redirect()->route('cart-show')->with('categories', $categories);
    }

    /*
     * Vaciar el carrito por completo
     */
    public function trash()
    {
        $categories = Category::all();

    	//eliminar la variable de sesión Cart
    	\Session::forget('cart');

    	//redireccionar para mostrar el carrito
    	return redirect()->route('cart-show')->with('categories', $categories);
    }

    /*
     * Actualizar las unidades del mismo artículo seleccionadas por el Usuario
     * Ya que por defecto su valor es 1
     */
    public function update(Product $product, $quantity)
    {
        $categories = Category::all();

        //almacenar la variable de sesión de tipo array
    	$cart = \Session::get('cart');
        //almacenar en $quantity, la cantidad de items seleccionados de un mismo producto...
    	$cart[$product->link]->quantity_item = $quantity;
    	
        //actualizar variable de sesión... 
    	\Session::put('cart', $cart);

        //redireccionar a la vista donde se muestra el carrito...
    	return redirect()->route('cart-show')->with('categories', $categories);
    }


    /*
     * Obtener el total a pagar
     */
    public function total() 
    {
    	//almacenar la variable de sesión de tipo array
    	$cart = \Session::get('cart');
    	//variable que almacenara el total
    	$total = 0;
    	//recorrer cada articulo del carrito
    	foreach($cart as $articulo) {
    		//obtener el total
    		$total += $articulo->price * $articulo->quantity_item;
    	}
    	return $total;
    }

    /*
     * Detalle del Pedido
     */
    public function orderDetail()
    {
        $categories = Category::all();
        
        //si los artículos que hay en el carrito es igual o mayor a cero.. redireccionar a home
        if(count(\Session::get('cart')) <= 0) 
            return redirect()->route('home');
        //guardar el contenido del carrito
        $cart = \Session::get('cart');
        //almacenar el total de la cuantía de todo lo del carrito
        $total = $this->total();

        //Devolver la vista Detalle del pedido
        return view('store.order-detail', compact('cart', 'total'))->with('categories', $categories);
    }

}
