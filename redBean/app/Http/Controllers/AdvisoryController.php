<?php

namespace App\Http\Controllers;

use App\Advisory;
use Illuminate\Http\Request;

class AdvisoryController extends Controller
{
    public function index()
    {
        $advisorys = Advisory::orderBy('id', 'desc')->paginate(15);
        return view('admin.advisory')->with('advisorys', $advisorys);
    }
}
