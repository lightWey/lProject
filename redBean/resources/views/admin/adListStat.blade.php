<!DOCTYPE html>
<html class="iframe-h">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/layui/css/layui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/admin.css')}}" />
</head>

<body>
<div class="wrap-container clearfix">
    <div class="column-content-detail">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <input type="text" autocomplete="off" name="ctime" class="layui-input"  value="{{ request()->input('ctime') }}" id="ctime" placeholder="开始时间">
                </div>
                <div class="layui-inline">
                    <input type="text" autocomplete="off" name="etime" id="etime" value="{{ request()->input('etime') }}"  placeholder="结束时间" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn layui-btn-normal" lay-submit="search">搜索</button>
            </div>
        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-even lay-skin="nob">
                <colgroup>
                    <col width="50">
                    <col class="hidden-xs" width="50">
                    <col class="hidden-xs" width="100">
                    <col>
                    <col>
                    <col>
                    <col width="80">
                    <col width="150">
                    <col>
                    <col>
                    <col>
                </colgroup>
                <thead>
                <tr>
                    <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                    <th class="hidden-xs">序号</th>
                    <th>广告ID</th>
                    <th>广告名</th>
                    <th>广告主</th>
                    <th>类型</th>
                    <th>曝光数</th>
                    <th>点击数</th>
                    <th>状态</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ads as $ad)
                <tr>
                    <td><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ad->id }}</td>
                    <td class="hidden-xs">{{ $ad->name }}</td>
                    <td class="hidden-xs">{{ $ad->user->name }}</td>
                    <td class="hidden-xs">{{ $type[$ad->type] }}</td>
                    <td class="hidden-xs"><a href="{{ route('admin.ad.stat', ['id'=>$ad->id, 'type'=>1]) }}">{{ $ad->show }}</a></td>
                    <td class="hidden-xs"><a href="{{ route('admin.ad.stat', ['id'=>$ad->id, 'type'=>2]) }}">{{ $ad->click }}</a></td>
                    <td>
                        @if ($ad->status)
                            <button class="layui-btn layui-btn-mini layui-btn-normal">正常</button>
                        @else
                            <button class="layui-btn layui-btn-mini layui-btn-danger">禁止</button>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="page-wrap">
                {{ $ads->links() }}
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    layui.use(['form','jquery', 'laydate', 'layer'], function() {
        var form = layui.form(),
            layer = layui.layer,
            $ = layui.jquery,
            laydate = layui.laydate;

        form.render();

        $('#ctime').click(function () {
            laydate({
                elem: $('#ctime')[0],
                format: 'YYYY-MM-DD',
                max: laydate.now(-1)
            });
        })

        $('#etime').click(function () {
            laydate({
                elem: $('#etime')[0],
                format: 'YYYY-MM-DD',
                max: laydate.now()
            });
        })
    })
</script>
</body>

</html>