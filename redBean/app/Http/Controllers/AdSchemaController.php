<?php

namespace App\Http\Controllers;

use App\Ad;
use App\AdSchema;
use App\AdStat;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;

class AdSchemaController extends Controller
{
    protected $status = [
        '失败','进行中','成功'
    ];
    protected $type=[
        1 => '浏览',
        2 => '点击'
    ];

    protected $random = [
        1 => '平均',
        2 => '随机'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = AdSchema::paginate(15);
        return view('admin.adSchema')
            ->with('status', $this->status)
            ->with('type', $this->type)
            ->with('configs',$config);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adSchemaEdit')
            ->with('type', $this->type)
            ->with('random', $this->random)
            ->with('config', new AdSchema());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['mm']) {
          unset($data['mm']);
        }
        if (isset($data['id'])) {
            return ['msg' => '失败'];
        }

        if (strtotime($data['ctime']) <= (time() + 300)) {
            return ['msg' => '开始时间最少应该在5分钟之后'];
        }

        if (empty($data['etime'])) {
            return ['msg' => '结束时间不能为空'];
        }

        if (strtotime($data['etime']) <= strtotime($data['ctime'])) {
            return ['msg' => '结束时间不能小于开始时间'];
        }

        if ($data['total'] >= 20000) {
            return ['msg' => '单次任务最大数量请不要超过2w'];
        }

        $ad = Ad::find($data['ad_id']);

        if (!$ad) {
            return ['msg' => '失败'];
        }

        if ($data['random'] == 1) {
            $data['total'] = (strtotime($data['etime']) - strtotime($data['ctime'])) * $data['total'];
        }

        $config = new AdSchema(array_filter($data));
        $config->save();
        return ['msg'=>'成功'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AdSchema $schema)
    {
        return view('admin.adSchemaEdit')
            ->with('config', $schema)
            ->with('random', $this->random)
            ->with('status', $this->status)
            ->with('type', $this->type);
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
