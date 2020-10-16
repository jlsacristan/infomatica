<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

class ContactController extends Controller
{
	/*
	 * Retornar a la vista contacto localizada en index
	 */
    public function index()
	{
		$categories = Category::all();

		return view('store.contact')->with('categories', $categories);
	}	
}