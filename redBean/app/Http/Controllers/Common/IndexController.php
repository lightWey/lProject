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
use App\Recharge;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
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
                'icon' => ''
            ],
            [
                'name' => '调度管理',
                'url' => route('admin.schema.index'),
                'id' => 3,
                'icon' => ''
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
                'url' => route('admin.info.modify', ['user'=>Auth::user()->id]),
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
                'icon' => '',
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

        $adminOnly = [
            [
                'name' => '充值管理',
                'icon' => '',
                'list' => [
                    [
                        'name' => '充值',
                        'url' => route('admin.recharge.create'),
                        'id' => 15,
                    ],
                    [
                        'name' => '充值记录',
                        'url' => route('admin.recharge.index'),
                        'id' => 13,
                    ],
                    [
                        'name' => '消耗记录',
                        'url' => route('admin.recharge.used'),
                        'id' => 14,
                    ],
                ]
            ],
            [
                'name' => '预约咨询',
                'url' => route('admin.advisory'),
                'id' => 16,
                'icon' => '',
            ],

        ];

        $userOnly = [
            [
                'icon' => '',
                'name' => '资金记录',
                'list' => [
                    [
                        'name' => '充值记录',
                        'url' => route('admin.recharge.index'),
                        'id' => 13,
                    ],
                    [
                        'name' => '消耗记录',
                        'url' => route('admin.recharge.used'),
                        'id' => 14,
                    ]
                ]
            ]
        ];

        if (Auth::user()->type == 0) {
            $list = $user;
            $list = array_merge($list, $userOnly);
        } else {
            $list = array_merge($user, $admin);
            $list = array_merge($list, $adminOnly);
        }

        return view('admin.home')->with('list', $list);
    }

    public function welcome()
    {
        $data = new \stdClass();
        $today = strtotime('today');
        $times = [$today];
        $numbers = range(1,6);
        foreach ($numbers as $v) {
            $times[] = strtotime((0-$v).' day', $today);
        }

        $dates = [];

        foreach ($times as $time) {
            $dates[date('w', $time)] = $time;
        }

        ksort($dates);
        $tem = array_shift($dates);
        array_push($dates, $tem);

        foreach ($dates as $k => $date) {
            $date1 = date('Y-m-d', $date);
            $date2 = date('Y-m-d', $date+86400);
            $data->user[$date] = User::where('type', '=', 0)->whereBetween('created_at', [$date1, $date2])->count();
            $data->ad[$date] = Ad::whereBetween('created_at', [$date1, $date2])->count();
            $data->recharge[$date] = Recharge::where('type', 1)->whereBetween('created_at', [$date1, $date2])->count();
        }
        $data->index = $today;
        $data->preIndex = strtotime('-1 day', $today);
        return view('admin.welcome')->with('data', $data);
    }

    public function resetPassword(User $user, Request $request)
    {
        if ($request->user()->type == 0 && $request->user()->id != $user->id) {
            return back()->with('success', '更新失败！');
        }
        Session::flash('type','pwd');
        $vData = $request->validate([
            'pw1' => 'required|between:1,50',
            'pw2' => 'required|confirmed|between:1,50'
        ]);

        if (!Hash::check($vData['pw1'],$user->password)) {
            return back()->withErrors(['pw2'=>'密码错误']);
        }

        $user->password = bcrypt($vData['pw2']);
        $user->push();
        if ($request->user()->id == $user->id) {
            return $this->exit($request);
        } else {
            return back()->with('success', '更新成功！');
        }
    }

    public function exit(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function url(Ad $ad, Request $request)
    {
        $ad->stat()->create([
            'type' => 2,
            'referer' => $request->server->get('HTTP_REFERER') ?: '',
            'ip' => $request->getClientIp(),
            'cons' => $ad->once
        ]);
        return redirect($ad->url, 302);
    }

    public function test()
    {
//        var_dump(Redis::lpush('test2', 3));
//        var_dump(Redis::lrange('test2',0,100));
//        var_dump(Redis::del('test2'));
        var_dump(Redis::exists('test2'));
    }
}