<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use App\Order;
use App\orderItem;

class PaypalController extends Controller
{
	//variable privada que contiene las configuraciones y entorno utilizadas
	private $_api_context;

	/*
	 * Construct
	 * Utilizando los datos de nuestro archivo de configuración de Paypal
	 */
	public function __construct()
	{
		//setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	/*
	 * Configurar todo lo que se envía a Paypal al confirmar el pedido
	 */
	public function postPayment()
	{
		//instanciar un objeto de tipo Payer, el cual contiene atributos como: el cliente que realiza el pago y el método de pago...
		$payer = new Payer();
		//configurar método de pago
		$payer->setPaymentMethod('paypal');

		//crear un array para los artículos
		$articles = array();
		//variable subtotal a 0
		$subtotal = 0;
		//info del carrito
		$cart = \Session::get('cart');
		//moneda a utilizar
		$currency = 'EUR';

		//recorrer el carrito
		foreach ($cart as $product) {
			//por cada artículo que hay en el carrito crear un objeto de tipo Article...
			$article = new Item();
			$article->setName($product->name)
			//después configurar a través de métodos de Paypal la info de dicho artículo según nos indica Paypal...
			->setCurrency($currency)
			->setDescription($product->short_description)
			->setQuantity($product->quantity_item)
			->setPrice($product->price);
			//array articles lleno de objetos de tipo Article, cada articulo cuenta con su propia información...
			$articles[] = $article;
			//subtotal del pedido
			$subtotal += $product->quantity_item * $product->price;
		} 

		//instanciar un objeto de tipo ArticleList
		$article_list = new ItemList();
		//almacenar en él el array que ya tenemos(articles)...
		$article_list->setItems($articles);

		//instanciar un objeto de tipo Details
		$details = new Details();
		//agregar el coste de envío
		$details->setSubtotal($subtotal)
		->setShipping(5.50);

		//agregar al total el coste de envío
		$total = $subtotal + 5.50;

		//instanciar un objeto de tipo Amount
		$amount = new Amount();
		//amount contendrá la moneda, el total a pagar y los detalles del pedido...
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);

		//instanciar un objeto de tipo Transaction	
		$transaction = new Transaction();
		//transaction contendrá amount, los artículos y una pequeña descripción...
		$transaction->setAmount($amount)
			->setItemList($article_list)
			->setDescription('Pedido de prueba en mi Laravel App Store');

		//instanciar un objeto de tipo RedirectUrls
		$redirect_urls = new RedirectUrls();
		//ruta donde se dedirige el usuario si acepta o desestime el pago...
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));

		//instanciar un objeto de tipo Payment
		$payment = new Payment();
		//realizar el pago
		$payment->setIntent('Sale')
			//venta directa
			//con el objeto Payer, urls y el objeto Transaction
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));		

		try {
			//realizar la conexión con la api de Paypal...
			$payment->create($this->_api_context);
			//si ocurre algún problema, salta la excepción...	
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			//si debug esta habilitado...
			if (\Config::get('app.debug')) {
				//excepción exacta
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			//sino esta debug habilitado...	
			} else {
				//acaba el proceso y muestra mensaje
				die('Ups! Algo salió mal');
			}
		}

		//si todo va correctamente...
		//Paypal devuelve cierta información, esta incluye hay un enlace donde se redirigira al usuario para loguearse y continuar con el proceso...
		foreach($payment->getLinks() as $link) {
			//dicho enlace tiene en su atributo Rel el valor approval_url... si es así todo ok
			if($link->getRel() == 'approval_url') {
				//recoger esa url que contiene un atributo Rel con dicho valor
				$redirect_url = $link->getHref();
				break;
			}
		}

		//Paypal en su respuesta...
		//tmb otorga un id, para dar seguimiento a la sesión del usuario...
		\Session::put('paypal_payment_id', $payment->getId());

		//si todo va bien...
		if(isset($redirect_url)) {
			//redirect hacia paypal
			return \Redirect::away($redirect_url);
		}

		//si no va bien... vuelve al carito
		return \Redirect::route('cart-show')
			//con mensaje de error
			->with('error', 'Ups! Error desconocido.');			
	}

	/* 
	 * Configurar el método por el que Paypal nos proporciona una respuesta
	 */
	public function getPaymentStatus()
	{
		//si la sesión y la info del usuario está ok...
		//Paypal redirecciona al sitio, y obtenermos el id de seguimiento...
		$payment_id = \Session::get('paypal_payment_id');

		//eliminar variable de sesión
		\Session::forget('paypal_payment_id');

		//dos datos de respuesta de Paypal
		$payerId = \Input::get('PayerID');
		$token = \Input::get('token');

		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		//si están vacios...
		if (empty($payerId) || empty($token)) {
			//volver al home
			return \Redirect::route('home')
				//mensaje de error
				->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}

		//recoger el objeto de tipo Payment si todo ha ido bien
		$payment = Payment::get($payment_id, $this->_api_context);

		// Objeto PaymentExecution incluye información necesaria
		// Para ejecutar un pago con cuenta PayPal.
		// El payer_id se añade a los parámetros de consulta de solicitud
		// Cuando se redirige al usuario de PayPal a su sitio
		
		//instanciar un objeto de tipo PaymentExecution
		$execution = new PaymentExecution();
		//configurar el PayerId que devuelve Paypal
		$execution->setPayerId(\Input::get('PayerID'));

		//realizar la compra realmente
		$result = $payment->execute($execution, $this->_api_context);

		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

		//si la respuesta devuelve approved...
		if ($result->getState() == 'approved') { //pago realizado

			//llamar al método saveOrder y redireccionar
			$this->saveOrder(\Session::get('cart'));

			//eliminar el carrito
			\Session::forget('cart');

			//ir al home
			return \Redirect::route('home')
				//mensaje de compra exitosa
				->with('message', 'Compra realizada de forma correcta');
		}
		//compra no exitosa, ir al home
		return \Redirect::route('home')
			//mensaje 'algo salio mal'
			->with('message', 'La compra fue cancelada');
	}

	/*
	 * Almacenar en BD la información del pedido
	 */
	private function saveOrder($cart)
	{
	    $subtotal = 0;
	    //recorrer el carrito...
	    foreach($cart as $product){
	    	//recoger la cuantía de cada producto
	        $subtotal += $product->price * $product->quantity_item;
	    }
	    
	    //almacenar info necesaria en Orders para realizar el pedido
	    $order = Order::create([
	        'subtotal' => $subtotal,
	        'shipping' => 5.50,
	        'user_id' => \Auth::user()->id
	    ]);
	    
	    //recorrer el carrito...
	    foreach($cart as $product){
	    	//por cada producto en el carrito, llamar al método saverOrderItem... encargado de almacenar la info necesaria de cada producto incluido en el pedido
	        $this->saveOrderItem($product, $order->id);
	    }
	}

	/*
	 * Almacenar en BD la información de cada artículo comprado en cada pedido
	 */
	private function saveOrderItem($product, $order_id)
	{
		//alacemnar info necesaria en orderItem para completar el pedido
		OrderItem::create([
			'quantity' => $product->quantity_item,
			'price' => $product->price,
			'product_id' => $product->id,
			'order_id' => $order_id
		]);
	}	
}