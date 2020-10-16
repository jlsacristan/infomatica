<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

class InfoController extends Controller
{
	/*
	 * Método que retorna la información proporcionada por el encagargado de la store.
	 * Tmb conocida como 'Conócenos'.
	 */
    public function index()
	{
		$categories = Category::all();

		return view('store.info')->with('categories', $categories);
	}
}


