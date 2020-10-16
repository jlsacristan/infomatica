<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Category;

class StoreController extends Controller
{
	/*
	 * Método que devuelve la muestra principal, Index de la app
	 * Recoger el total de productos, mostrarlos de forma aleatoria
	 */ 
    public function index()
	{
		//dd($request->get('name'));

		//todas las categorias de la BD = para el menú de navegación
		$categories = Category::all();
		/* Recoge el total de productos, son ordenados de forma aleatoria, y el método de paginación los prepara para mostrarlos de 10 en 10 */
		//$products = Product::search($request->name)->orderByRaw('RAND()')->paginate(5);
		$products = Product::orderBy('id', 'ASC')->paginate(8);
		//$products = Product::Search($request->name)->orderBy('id', 'ASC')->paginate(5);
		//retornar la vista de los productos en Index
		return view('store.index')->with('products', $products)->with('categories', $categories);
	}

	/*
	 * Método que devuelve la Url del producto
	 * Busca el producto que se le pasa como parámetro, devuelve el campo link
	 */
	public function show($link)
	{
		//todas las categorias de la BD
		$categories = Category::all();
		//sólo devuelve el primer link que encuentra sobre el producto elegido por usuario
		$product = Product::where('link', $link)->first();
		//retorna la vista del producto, detalle del producto...
		return view('store.show', compact('product'))->with('categories', $categories);		
	}

	/*
	 * Método que devuelve los productos de una categoría en concreto.
	 * Dicha categoría es elegida previamente por el usuario.
	 */
	public function category($id)
	{
		//todas las categorias de la BD
		$categories = Category::all();
		//buscar categoria por id, duelve una única categoría
		//$category = Category::searchCategory($id)->first();

		//Recoge el total de productos de la categoría elegida, son ordenados de forma aleatoria, y el método de paginación los prepara para mostrarlos de 10 en 10 
		//$products = Product::searchProducts($id)->orderByRaw('RAND()')->paginate(2);
		$products = Product::searchProducts($id)->orderBy('id', 'ASC')->paginate(8);
		//retornar la vista donde aparecen los productos de la categoría elegida por el usuario
		return view('store.category', compact('products'))->with('categories', $categories);
	}

	/*public function search(Request $request, $search)
	{
		$products = Product::Search($request->name)->orderBy('id', 'ASC');
		dd($products);
		//return urldecode($search);
		$names = Product::select()
			->where('name', 'LIKE', '%'.$search.'%')
			->orderBy('id', 'ASC')
			->get();

		if(count($names) ==0 ) 
		{
			return view('store.search')
				->with('message', 'No hay resultados que mostrar')
				->with('search', $search);
		}	
		else 
		{
			return view('store.search')
				->with('name', $names)
				->with('search', $search);
		}
	}*/

}



