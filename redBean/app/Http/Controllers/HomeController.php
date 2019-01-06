<?php

namespace App\Http\Controllers;


use App\Config;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home')->with('config', Config::first());
    }
}
