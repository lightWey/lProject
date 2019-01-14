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
        '失败','成功'
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
        if (isset($data['id'])) {
            return ['msg' => '失败'];
        }

        if (strtotime($data['ctime']) <= (time() + 600)) {
            return ['msg' => '开始时间最少应该在10分钟之后'];
        }

        if (empty($data['etime'])) {
            return ['msg' => '结束时间不能为空'];
        }

        if (strtotime($data['etime']) <= strtotime($data['ctime'])) {
            return ['msg' => '结束时间不能小于开始时间'];
        }

        $ad = Ad::find($data['ad_id']);

        if (!$ad) {
            return ['msg' => '失败'];
        }

        $config = new AdSchema($data);
        $config->save();

        $sctime = strtotime($data['ctime']);
        $setime = strtotime($data['etime']);
        $cha = $setime - $sctime;
        $test = 0;

        if ($data['random'] == 1) {
            $int = ceil($data['total'] / $cha);
            while (true) {
                if ($test >= $data['total']) {
                    break;
                }

                $config->stat()->save(factory(AdStat::class, $int)->make([
                    'ad_id'=>$ad->id,
                    'cons' => $ad->cons,
                    'type' => $data['type'],
                    'created_at' => '',
                    'updated_at' => '',
                ]));

                $test+=$int;
            }
        } else {
            while (true) {
                if ($test >= $data['total']) {
                    break;
                }

                $time = date('Y-m-d H:i:s', mt_rand($sctime, $setime));
                $config->stat()->save(factory(AdStat::class, 1)->make([
                    'ad_id'=>$ad->id,
                    'cons' => $ad->cons,
                    'type' => $data['type'],
                    'created_at' => $time,
                    'updated_at' => $time,
                    'real' => 0
                ]));

                $test+=1;
            }
        }
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
