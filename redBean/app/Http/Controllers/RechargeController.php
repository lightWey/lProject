<?php

namespace App\Http\Controllers;

use App\Recharge;
use App\User;
use Illuminate\Http\Request;

class RechargeController extends Controller
{
    private $type = [
        1 => '充值',
        2 => '消耗'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recharges = Recharge::with(['user','adminUser']);
        $recharges->where('type', 1);
        if (empty($request->user()->type)) {
            $recharges->where('user_id',$request->user()->id);
        }

        $recharges = $recharges->paginate(15);

        return view('admin.recharge')->with('recharges', $recharges)->with('type', $this->type);
    }

    public function indexOther(Request $request)
    {
        $recharges = Recharge::with(['user','adminUser']);
        $recharges->where('type', 2);
        if (empty($request->user()->type)) {
            $recharges->where('user_id',$request->user()->id);
        }

        $recharges = $recharges->paginate(15);

        return view('admin.rechargeOther')->with('recharges', $recharges)->with('type', $this->type);
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userId = $request->input('id');
        $user = null;

        if ($userId) {
            $data = User::find($userId);
            if (empty($data->type)) {
                $user = $data;
            }
        }

        return view('admin.rechargeCreate')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = $request->user();
        if (empty($admin->type)) {
            return back()->with('success', '访问错误');
        }
        $validatedData = $request->validate([
            'user_id' => 'required',
            'amount' => 'required',
            'remark' => 'nullable|between:1,255',
        ]);
        $uid = $validatedData['user_id'];
        $user = User::find($uid);

        if ($user->type) {
            return back()->with('success', '只能给广告主充值');
        }

        if (empty($user)) {
            return back()->with('success', '用户不存在');
        }

        $recharge = new Recharge();
        $recharge->type = 1;
        $recharge->amount = $validatedData['amount'];
        isset($validatedData['remark']) && $recharge->remark=$validatedData['remark'];
        $recharge->admin = $admin->id;
        $user->recharge()->save($recharge);
        $user->info->coin += $validatedData['amount'];
        $user->info->save();
        return back()->with('success', '充值成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
