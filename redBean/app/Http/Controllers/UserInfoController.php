<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInfo;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    public function modify(User $user)
    {
        if (empty(Auth::user()->type) && Auth::user()->id != $user->id) {
            return new AuthenticationException('失败');
        }
        return view('admin.userinfo', compact('user'));
    }

    public function edit(User $user, Request $request)
    {
        if (empty(Auth::user()->type) && Auth::user()->id != $user->id) {
            return back()->with('success', '更新失败！');
        }

        $validatedData = $request->validate([
            'name' => 'required|between:1,20',
            'phone' => 'nullable|digits:11',
            'info.name' => 'required|between:1,10',
            'info.qq' => 'nullable|Digits Between:4,15',
            'info.wechat' => 'nullable|between:4,15|alpha_dash',
            'info.remark' => 'nullable|between:1,255',
        ]);

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

    public function add()
    {
        return view('admin.addUser');
    }

    public function storage(Request $request)
    {
        $validatedDatas = $request->validate([
            'name' => 'required|between:1,20',
            'password' => 'required|between:1,20',
            'phone' => 'nullable|digits:11',
            'email' => 'required|email',
            'info.name' => 'required|between:1,10',
            'info.qq' => 'nullable|Digits Between:4,15',
            'info.wechat' => 'nullable|between:4,15|alpha_dash',
            'info.remark' => 'nullable|between:1,255',
        ]);

        $user = new User();
        $userInfo = new UserInfo();
        foreach ($validatedDatas as $key => $data) {
            if ($key == 'info') {
                foreach ($data as $k=>$v)
                if (isset($v)) {
                    $userInfo->$k = $v;
                }
            } else {
                if (isset($data)) {
                    $user->$key = $data;
                }
            }
        }
        $user->type=0;
        $user->save();
        $user->info()->save($userInfo);
        return ['msg'=>'成功'];

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
