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
                <div class="layui-inline tool-btn">
                    <button class="layui-btn layui-btn-small layui-btn-normal addBtn" data-title="添加记录" data-url="{{ route('admin.ad.stat.add') }}"><i class="layui-icon">&#xe654;</i></button>
                </div>
            </div>
        </form>
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
                    <th>计数</th>
                    <th class="hidden-xs">记录ID</th>
                    <th class="hidden-xs">广告ID</th>
                    <th>广告名称</th>
                    <th>类型</th>
                    <th>数量</th>
                    <th>消耗金额</th>
                    <th class="hidden-xs">产生时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stats as $stat)
                <tr>
                    <td><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $stat->id }}</td>
                    <td class="hidden-xs">{{ $stat->ad->id }}</td>
                    <td class="hidden-xs">{{ $stat->ad->name }}</td>
                    <td class="hidden-xs">{{ $stat->type }}</td>
                    <td class="hidden-xs">{{ $stat->num }}</td>
                    <td class="hidden-xs">{{ $stat->cons }}</td>
                    <td class="hidden-xs">{{ $stat->created_at }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="page-wrap">
                {{ $stats->links() }}
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
</body>

</html>