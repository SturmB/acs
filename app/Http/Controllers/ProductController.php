<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category, $subcategory)
    {
        return view('product');
    }
}
