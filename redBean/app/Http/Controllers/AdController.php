<?php

namespace App\Http\Controllers;

use App\Ad;
use App\User;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $type=[1 => 'CPM', 2 => 'CPC'];
        $ads = Ad::whereHas('user', function ($query) {
            $query->where('type', 0);
        })->with('user')->paginate(15);
        return view('admin.adList')->with('ads', $ads)->with('type', $type);
    }

    public function detail(Ad $ad)
    {
        $users = User::where('type',0)->get();
        return view('admin.ad-edit')->with('users', $users)->with('ad', $ad);
    }

    public function add()
    {
        $users = User::where('type',0)->get();
        return view('admin.ad-add')->with('users', $users);
    }

    public function storage(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'exists:users,id',
            'name' => 'required|between:1,20',
            'once' => 'required|Between:0.01,100',
            'remark' => '',
            'status' => 'Digits Between:0,1',
            'type' => 'Digits Between:1,2',
            'url' => 'URL',
        ]);

        $ad = new Ad($validatedData);
        $ad->save();
        return ['msg'=>'成功'];
    }

    public function status(Request $request)
    {
        $user = Ad::find($request->input('id'));

        if ($user->status) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->push();
        return ['msg'=>'成功'];
    }

    public function stat(Request $request)
    {

    }
}
