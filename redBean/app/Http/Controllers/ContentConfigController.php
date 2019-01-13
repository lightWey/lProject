<?php

namespace App\Http\Controllers;

use App\ContentConfig;
use Illuminate\Http\Request;

class ContentConfigController extends Controller
{
    protected $type=[
        '开发者客服',
        '广告主客服',
        '财务/投诉',
        '客服中心'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = ContentConfig::paginate(15);
        return view('admin.c-config')->with('type', $this->type)->with('configs',$config);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.c-configEdit')->with('type', $this->type)->with('config', new ContentConfig());
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
            $config = ContentConfig::find($data['id']);
        } else {
            $config = new ContentConfig();
        }
        isset($data['name']) && $config->name = $data['name'];
        isset($data['value']) && $config->value = $data['value'];
        isset($data['type']) && $config->type = $data['type'];
        $config->save($data);
        return ['msg'=>'成功'];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContentConfig $c_config)
    {
        return view('admin.c-configEdit')->with('config', $c_config)->with('type', $this->type);
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
    public function destroy(ContentConfig $c_config)
    {
        $c_config->delete();
        return ['msg'=>'删除成功'];
    }
}
