<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    public function modify()
    {
        $user = Auth::user();
        return view('admin.userinfo', compact('user'));
    }

    public function edit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|between:1,20',
            'phone' => 'nullable|digits:11',
            'info.name' => 'required|between:1,10',
            'info.qq' => 'nullable|Digits Between:4,15',
            'info.wechat' => 'nullable|between:4,15|alpha_dash',
            'info.remark' => 'nullable|required|between:1,255',
        ]);

        $user = $request->user();
        $user->fill($validatedData);
        $user->info->fill($validatedData['info']);
        $user->push();
        return back()->with('success', '更新成功！');
    }

    public function index()
    {
        $users = User::where('type',0)->with('info')->paginate(15);
        return view('admin.userList')->with('users', $users);
    }

    public function status(Request $request)
    {
        $user = User::find($request->input('id'));

        if ($user->status) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->push();
        return ['msg'=>'成功'];
    }
}
