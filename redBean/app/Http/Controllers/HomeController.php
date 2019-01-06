<?php

namespace App\Http\Controllers;


use App\Config;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function media()
    {
        return view('front.media');
    }
}
