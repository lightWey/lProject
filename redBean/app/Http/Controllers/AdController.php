<?php

namespace App\Http\Controllers;

use App\Ad;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    private $type = [1 => 'CPM', 2 => 'CPC'];

    public function index(Request $request)
    {
        $ad = Ad::with('user');

        if (Auth::user()->type) {
            if ($request->input('type')) {
                $ad->where('type', $request->input('type'));
            }

            if ($request->input('user')) {
                $ad->where('user_id', $request->input('user'));
            }

            if ($request->input('ctime')) {
                $ad->where('created_at','>=' ,$request->input('ctime'));
            }

            if ($request->input('etime')) {
                $ad->where('created_at','<=' ,$request->input('etime'));
            }

            $ad->whereHas('user', function ($query) {
                $query->where('type', 0);
            });
        } else {
            $ad->where('user_id', Auth::user()->type);
        }
        $ads = $ad->paginate(15);
        $ads = $ads->appends($request->all());
        $users = User::where('type',0)->where('status', 1)->select('id','name')->get();
        return view('admin.adList')->with('ads', $ads)->with('type', $this->type)->with('users', $users);
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
        $ad = Ad::whereHas('user', function (Builder $query) {
            $query->where('type', 0);
        })->with('user');
        if ($user->type == 0) {
            $ad->where('user_id',$user->id);
        }

        if ($request->input('user')) {
            $ad->where('user_id', $request->input('user'));
        }

        $ads = $ad->paginate(15);
        $ads = $ads->appends($request->all());
        $users = User::where('type',0)->where('status', 1)->select('id','name')->get();
        return view('admin.adListStat')->with('ads', $ads)->with('type', $this->type)->with('users', $users);
    }
}
