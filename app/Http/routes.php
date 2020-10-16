<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 |
 |----------------------------------------------------------------------------
 | Rutas 
 |----------------------------------------------------------------------------
 |
 */

/*
 * Vinculación de una Ruta / Método dinámico
 * 
 * Si usas el objeto Product en nuestras peticiones o métodos, busca el producto asociado 
 * a su propio link, nos devuelve un resultado...
 * Esto queda vinculado a los métodos de nuestro archivo routes.php
 */
Route::bind('product', function($link){
	return App\Product::where('link', $link)->first();
});

/*
 * Petición a la raíz del sitio
 */
//peticiones que llegan al Home del sitio
Route::get('/', [
	'as'	=>	'home', //alias
	'uses' => 'StoreController@index' //respuesta: index del controlador StoreController
]);

/*
-----------------------------------------------
/*Route::get('home/searchredirect', function(){
	$search = urldecode(e(Input::get('search')));
	$route = "home/search/$search";
	return redirect($route);
});

Route::get('home/search/{search}', 'StoreController@search');*/

/*Route::get('search/{search}', [
	'as'	=>	'search',
	'uses' => 'StoreController@search' //respuesta: index del controlador StoreController
]);*/

/*Route::get('home/search', function(){
   if (empty(Input::get('search'))) return redirect()->back();
    $search = urlencode(e(Input::get('search')));
    $route = "home/search/$search";
    return redirect($route);
});
Route::get("home/search/{search}", "StoreController@search");
-------------------------------------------------
*/

/*
 * Petición al botón Detalle del producto
 */
//si aparece producto/url...
Route::get('product/{link}', [
	'as' => 'product-detail', //nombre de la ruta o alias, se devuevle al generar una respuesta
	'uses' => 'StoreController@show' //respuesta: método show del controlador StoreController
]);

/*
 * Petición a una categoría en concreto
 */
Route::get('category/{link}', [
 'as' => 'category',
 'uses' => 'StoreController@category'
]);

/*
 * Ruta a la pestaña Conócenos
 */
Route::get('conocenos', [
	'as' => 'conocenos', 
	'uses' => 'InfoController@index'
]);

/*
 * Ruta a la pestaña Contacto
 */
Route::get('contacto', [
	'as' => 'contacto', 
	'uses' => 'ContactController@index'
]); 

/*
 * Ruta al Carrito
 */

/* Mostrar el Carrito */
//Al aparecer en la Url 'cart/show' se lanzar la petición asociada al Carrito...
Route::get('cart/show', [
	//nombre de la ruta
	'as' => 'cart-show', 
	//petición asociada a la ruta
	'uses' => 'CartController@show'
]);

/* Add producto al Carrito */
//al añadir un producto al carrito, se realiza la siguiente petición...
Route::get('cart/add/{product}', [
	//nombre de la ruta
	'as' => 'cart-add', 
	//petición asociada a la ruta
	'uses' => 'CartController@add'
]);

/* Eliminar un producto del carrito */
Route::get('cart/delete/{product}',[
	'as' => 'cart-delete',
	'uses' => 'CartController@delete'
]);

/* Actualizar el precio de los items del carrito en función de la cantidad elegida por el usuario - Se ayuda de JQuery */
Route::get('cart/update/{product}/{quantity_item?}', [
	'as' => 'cart-update',
	'uses' => 'CartController@update'
]);

/* Vaciar por completo el carrito */
Route::get('cart/trash', [
	'as' => 'cart-trash',
	'uses' => 'CartController@trash'
]);

/*
 * Cuando un usuario quiera ir al Detalle del Pedido, comprobar que el 
 * usuario hay iniciado sesión 
 */
Route::get('order-detail', [
	//middleware = código entre la petición del usuario y la respuesta del sistema
	//'middleware' => 'auth:user',
	'middleware' => 'auth',
	'as' => 'order-detail',
	'uses' => 'CartController@orderDetail'
]);

/*
 * Ruta al Login
 */

/* Inicio de Sesión - Redirrecionar al método encargado de realizar el formulario de inicio de sesión */
Route::get('auth/login', [
	'as' => 'login-get',
	'uses' => 'Auth\AuthController@getLogin'
]);

/* Verificación/validación de que tanto el correo, como el password sean correctos al hacer click en Iniciar Sesión */
Route::post('auth/login', [
	'as' => 'login-post',
	'uses' => 'Auth\AuthController@postLogin'
]);

/* Cerrar Sesión */
Route::get('auth/logout', [
	'as' => 'logout',
	'uses' => 'Auth\AuthController@getLogout'
]);

/* 
 * Ruta al Registro de Usuario
 */

/* Ir al formulario de Registro de Usuario */
Route::get('auth/register', [
	'as' => 'register-get',
	'uses' => 'Auth\AuthController@getRegister'
]);

/* Validar que los datos introducidor al formulario de registro son correctos */
Route::post('auth/register', [
	'as' => 'register-post',
	'uses' => 'Auth\AuthController@postRegister'
]);

/*
 * Peticiones a la API de Paypal
 */

//enviamos nuestro pedido a PayPal
Route::get('payment', array(
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));

//después de realizar el pago Paypal redirecciona a esta ruta
Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));

/*
 * Dashboard - Panel de Control
 */

/* Acceso sólo para admin */
Route::group(['namespace' => 'Admin', 'middleware' => ['auth'], 'prefix' => 'admin'], function()
{

	/* Home */
	Route::get('home', function(){
		return view('admin.home');
	});

});
