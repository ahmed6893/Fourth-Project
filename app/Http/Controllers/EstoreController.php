<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstoreController extends Controller
{
    public function index()
    {
        return view('website.home.index');
    }

    public function product()
    {
        return view('website.product.index');
    }
    public function productDetails()
    {
        return view('website.product.details');
    }
}
