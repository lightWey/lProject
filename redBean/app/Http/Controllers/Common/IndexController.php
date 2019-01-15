<?php
/**
 * Created by PhpStorm.
 * User: lightWay
 * Date: 2018/12/26
 * Time: 2:55 PM
 */

namespace App\Http\Controllers\Common;

use App\Ad;
use App\Http\Controllers\Controller;
use App\User;
use http\Env\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        $admin = [
            [
                'name' => '广告主管理',
                'url' => route('admin.user.list'),
                'id' => 1,
                'icon' => ""
            ],
            [
                'name' => '客服设置',
                'url' => route('admin.c-config.index'),
                'id' => 2,
                'icon' => ''
            ],
            [
                'name' => '调度管理',
                'url' => route('admin.schema.index'),
                'id' => 3,
                'icon' => ''
            ],
            [
                'name' => '系统设置',
                'url' => route('admin.config.index'),
                'id' => 4,
                'icon' => ""
            ],
        ];

        $user = [
            [
                'name' => '个人信息',
                'url' => route('admin.info.modify'),
                'id' => 5,
                'icon' => ''
            ],
            [
                'name' => '广告管理',
                'url' => route('admin.ad.list'),
                'id' => 10,
                'icon' => '',
            ],
            [
                'name' => '数据统计',
                'icon' => '',
                'list' => [
                    [
                        'name' => '广告统计',
                        'url' => route('admin.ad.stat.group'),
                        'id' => 11,
                    ],
                    [
                        'name' => '数据详情',
                        'url' => route('admin.ad.stat'),
                        'id' => 12,
                    ]
                ]
            ]
        ];
        if (Auth::user()->type == 0) {
            $list = $user;
        } else {
            $list = array_merge($user, $admin);
        }

        return view('admin.home')->with('list', $list);
    }

    public function welcome()
    {
        $data = new \stdClass();
        $data->userCount = User::where('type', '=', 0)->count();

        $data->adCount = Ad::count();
        $data->adStatCount = Ad::count();

//        $aa = User::select(DB::raw('count(*) ct'),DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d") tt'))
//            ->groupBy(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'))->get();



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

        return redirect('/');
    }

    public function url(Ad $ad, Request $request)
    {

        //print_r($request->server->get('HTTP_REFERER'));exit();

        $ad->stat()->create([
            'type' => 2,
            'referer' => $request->server->get('HTTP_REFERER') ?: '',
            'ip' => $request->getClientIp(),
            'cons' => $ad->once
        ]);
    }
}