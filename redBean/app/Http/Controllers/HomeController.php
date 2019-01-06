<?php

namespace App\Http\Controllers;


use App\Config;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home')->with('flag','home');
    }

    public function media()
    {
        return view('front.media')->with('flag','media');
    }

    public function about()
    {
        return view('front.about')->with('flag','about');
    }
}
