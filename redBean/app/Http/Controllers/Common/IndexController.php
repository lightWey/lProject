<?php
/**
 * Created by PhpStorm.
 * User: lightWay
 * Date: 2018/12/26
 * Time: 2:55 PM
 */

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function welcome()
    {
        $data = new \stdClass();
        $data->userCount = User::where('type', '=', 0)->count();
        return view('admin.welcome')->with('data', $data);
    }

    public function resetPassword(Request $request)
    {
        Session::flash('type','pwd');
        $vData = $request->validate([
            'pw1' => 'required|between:1,50',
            'pw2' => 'required|confirmed|between:1,50'
        ]);

        if (!Hash::check($vData['pw1'],$request->user()->password)) {
            return back()->withErrors(['pw2'=>'密码错误']);
        }

        $user = $request->user();
        $user->password = bcrypt($vData['pw2']);
        $user->push();
        return $this->exit($request);
    }

    public function exit(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        return redirect('/home');
    }
}