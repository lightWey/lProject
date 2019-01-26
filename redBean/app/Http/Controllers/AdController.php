<?php

namespace App\Http\Controllers;

use App\Ad;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    private $type = [1 => 'CPM', 2 => 'CPC'];

    public function index()
    {
         $ad = Ad::whereHas('user', function ($query) {
            $query->where('type', 0);
             if (!Auth::user()->type) {
                 $query->where('id', Auth::user()->id);
             }
        })->with('user');
        $ads = $ad->paginate(15);

        return view('admin.adList')->with('ads', $ads)->with('type', $this->type);
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
        if ($request->input('id')) {
            $ad = Ad::find($request->input('id'));
            $ad->fill($validatedData);
        } else {
            $ad = new Ad($validatedData);
        }
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
        $user = $request->user();


        $ctime = date('Y-m-d', strtotime('-1 day'));
        $etime = date('Y-m-d');

        if ($request->input('ctime')) {
            $ctime = $request->input('ctime');
        }

        if ($request->input('etime')) {
            $etime = $request->input('etime');
        }
        if ($ctime > date('Y-m-d')) {
            $ctime = date('Y-m-d', strtotime('-1 day'));
        }

        if ($etime > date('Y-m-d')) {
            $etime = date('Y-m-d H:i:s');
        }

        $ad = Ad::whereHas('user', function (Builder $query) {
            $query->where('type', 0);
        })->with('user')->withCount(['stat as show'=>function (Builder $query) use ($ctime, $etime) {
            $query
                ->whereBetween('created_at', [$ctime, $etime])
                ->where('type', 1);
        }, 'stat as click'=>function (Builder $query) use ($ctime, $etime) {
            $query
                ->whereBetween('created_at', [$ctime, $etime])
                ->where('type', 2);
        }]);

        if ($user->type == 0) {
            $ad->where('user_id',$user->id);
        }

        $ads = $ad->paginate(15);
        $ads = $ads->appends($request->all());

        return view('admin.adListStat')->with('ads', $ads)->with('type', $this->type);
    }
}
