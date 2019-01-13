<?php

namespace App\Http\Controllers;


use App\Config;
use App\ContentConfig;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home')->with('flag','home')->with('customers', ContentConfig::all());
    }

    public function media()
    {
        return view('front.media')->with('flag','media')->with('customers', ContentConfig::all());
    }

    public function about()
    {
        return view('front.about')->with('flag','about')->with('customers', ContentConfig::all());
    }
}
