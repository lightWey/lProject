<!DOCTYPE html>
<html class="iframe-h">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>红豆后台</title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/layui/css/layui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/admin.css')}}" />
</head>

<body>
<div class="wrap-container clearfix">
    <div class="column-content-detail">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-inline tool-btn">
                    <button class="layui-btn layui-btn-small layui-btn-normal addBtn" data-title="添加调度" data-url="{{ route('admin.schema.create') }}"><i class="layui-icon">&#xe654;</i></button>
                </div>
            </div>
        </form>
        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-even lay-skin="nob">
                <colgroup>
                    <col width="50">
                    <col class="hidden-xs" width="50">
                    <col class="hidden-xs" width="100">
                    <col>
                    <col>
                </colgroup>
                <thead>
                <tr>
                    <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                    <th class="hidden-xs">ID</th>
                    <th>名称</th>
                    <th>状态</th>
                    <th>类型</th>
                    <th>次数</th>
                    <th>开始时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($configs as $config)
                <tr>
                    <td><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                    <td>{{ $config->id }}</td>
                    <td>{{ $config->name }}</td>
                    <td>{{ $status[$config->status] }}</td>
                    <td>{{ $type[$config->type] }}</td>
                    <td>{{ $config->total }}</td>
                    <td>{{ $config->ctime }}</td>
                    <td>
                        <div class="layui-inline">
                            <button class="layui-btn layui-btn-small layui-btn-normal go-btn" data-url="{{ route('admin.schema.show', ['id'=>$config->id]) }}"><i class="layui-icon">&#xe642;</i></button>
                            {{--<button class="layui-btn layui-btn-small layui-btn-danger real-del-btn" data-id="{{ $config->id }}" data-url="{{ route('admin.schema.destroy', 1) }}" data-csrf="{{ csrf_token() }}"><i class="layui-icon">&#xe640;</i></button>--}}
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="page-wrap">
                {{ $configs->links() }}
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
</body>

</html>