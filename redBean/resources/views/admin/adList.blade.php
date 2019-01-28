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
    <div class="column-content-detail" style="min-height: 500px">
        @if (Request::user()->type)
        <form class="layui-form" action="">
            <div class="layui-inline" style="margin-right: 10px">
                <div class="layui-inline tool-btn">
                    <button class="layui-btn layui-btn-small layui-btn-normal addBtn" data-title="添加广告" data-url="{{ route('admin.ad.add') }}"><i class="layui-icon">&#xe654;</i></button>
                </div>
            </div>
            <div class="layui-inline">
                <select name="type">
                    <option value=""></option>
                    @foreach ($type as $k => $v)
                        <option value="{{ $k }}" @if(request()->input('type') == $k) selected @endif>{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <div class="layui-inline">
                <select name="user">
                    <option value=""></option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if(request()->input('user') == $user->id) selected @endif>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="layui-inline">
                <input type="text" autocomplete="off" name="ctime" class="layui-input"  value="{{ request()->input('ctime') }}" id="ctime" placeholder="开始时间">
            </div>
            <div class="layui-inline">
                <input type="text" autocomplete="off" name="etime" id="etime" value="{{ request()->input('etime') }}"  placeholder="结束时间" autocomplete="off" class="layui-input">
            </div>
            <button class="layui-btn layui-btn-normal" lay-submit="search">搜索</button>
        </form>
        @endif
        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-even lay-skin="nob">
                <colgroup>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                </colgroup>
                <thead>
                <tr>
                    <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                    <th>ID</th>
                    <th>名称</th>
                    <th>链接</th>
                    <th>推广链接</th>
                    <th>计费方法</th>
                    <th>单价</th>
                    <th>用户</th>
                    <th>创建时间</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ads as $ad)
                <tr>
                    <td><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                    <td>{{ $ad->id }}</td>
                    <td>{{ $ad->name }}</td>
                    <td>{{ $ad->url }}</td>
                    <td>{{ url('url/'.$ad->id) }}</td>
                    <td>{{ $type[$ad->type] }}</td>
                    <td>{{ $ad->once }}</td>
                    <td>{{ $ad->user->name }}</td>
                    <td>{{ $ad->created_at }}</td>
                    <td>
                        @if ($ad->status)
                            <button class="layui-btn layui-btn-mini layui-btn-normal">正常</button>
                        @else
                            <button class="layui-btn layui-btn-mini layui-btn-danger">禁止</button>
                        @endif
                    </td>
                    <td>
                        <div class="layui-inline">
                            <button class="layui-btn layui-btn-small layui-btn-normal go-btn" data-url="{{ route('admin.ad.detail', ['ad'=>$ad->id]) }}"><i class="layui-icon">&#xe642;</i></button>
                            <button class="layui-btn layui-btn-small layui-btn-danger del-btn" data-id="{{ $ad->id }}" data-url="{{ route('admin.ad.status') }}" data-csrf="{{ csrf_token() }}"><i class="layui-icon">&#xe640;</i></button>
                        </div>
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
<script>
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
                max: laydate.now(),
            });
        })

        $('#etime').click(function () {
            laydate({
                elem: $('#etime')[0],
                format: 'YYYY-MM-DD',
                max: laydate.now(+1),
            });
        })
    })
</script>
</body>

</html>