<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerDashboardController extends Controller
{
    public function index()
    {
        return view('website.customer.index');
    }

    public function order()
    {
        return view('website.customer.order');
    }
    public function information()
    {
        return view('website.customer.information');
    }
    public function password()
    {
        return view('website.customer.password');
    }
}
