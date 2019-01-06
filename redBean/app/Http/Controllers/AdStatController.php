<?php

namespace App\Http\Controllers;

use App\Ad;
use App\AdStat;
use App\User;
use Illuminate\Http\Request;

class AdStatController extends Controller
{
    public function index()
    {
        $stats = AdStat::with('ad')->paginate(15);
        return view('admin.adStatList')->with('stats', $stats);
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

    public function add()
    {
        $ads = Ad::all();
        $type = [
            1 => '展示',
            2 => '点击'
        ];
        return view('admin.adStatAdd')->with('ads', $ads)->with('type', $type);
    }
}
