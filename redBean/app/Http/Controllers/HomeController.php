<?php

namespace App\Http\Controllers;

use App\Advisory;
use App\Consume;
use App\ContentConfig;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $customers = ContentConfig::all();
        $coder = $ader = null;

        foreach ($customers as $customer) {
            if (!isset($coder) && $customer->type == 0) {
                $coder = $customer;
            }
            if (!isset($ader) && $customer->type == 1) {
                $ader = $customer;
            }
        }

        return view('front.about')->with('flag','about')->with('customers', $customers)->with('coder', $coder)->with('ader', $ader);
    }

    public function privacy()
    {
        return view('front.privacy');
    }

    public function terms()
    {
        return view('front.terms');
    }

    public function advisory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|between:1,20',
            'phone' => 'required|digits:11',
            'company' => 'nullable|between:1,50'
        ]);
        $advisory = new Advisory($validatedData);
        $advisory->push();
        return ['msg'=>'成功'];
    }
}
