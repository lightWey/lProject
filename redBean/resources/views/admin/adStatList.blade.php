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
                <div class="layui-inline">
                    <input type="text" class="layui-input" id="ctime" placeholder="yyyy-MM-dd" lay-key="1">
                </div>
                <div class="layui-inline">
                    <input type="text" name="etime" id="etime"  lay-verify="date" placeholder="结束时间" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn layui-btn-normal" lay-submit="search">搜索</button>
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
                </colgroup>
                <thead>
                <tr>
                    <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                    <th class="hidden-xs">记录ID</th>
                    <th class="hidden-xs">广告ID</th>
                    <th>广告名称</th>
                    <th>类型</th>
                    <th>IP</th>
                    <th>来源</th>
                    <th class="hidden-xs">产生时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stats as $stat)
                <tr>
                    <td><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                    <td>{{ $stat->id }}</td>
                    <td class="hidden-xs">{{ $stat->ad->id }}</td>
                    <td class="hidden-xs">{{ $stat->ad->name }}</td>
                    <td class="hidden-xs">{{ $type[$stat->type] }}</td>
                    <td class="hidden-xs">{{ $stat->ip }}</td>
                    <td class="hidden-xs">{{ $stat->referer }}</td>
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
                format: 'YYYY-MM-DD hh:mm:ss',
                max: '2099-06-16 23:59:59',
                choose: function (datas) {
                    endSearch.min = datas;
                    endSearch.start = datas
                }
            });
        })
    })
</script>
</body>

</html>