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
                <div class="layui-inline">
                    <input type="text" autocomplete="off" name="id" class="layui-input" value="{{ request()->input('id') }}" placeholder="广告ID">
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
                    <input type="text" autocomplete="off" name="ctime" class="layui-input"  value="{{ request()->input('ctime') }}" id="ctime" placeholder="开始时间">
                </div>
                <div class="layui-inline">
                    <input type="text" autocomplete="off" name="etime" id="etime" value="{{ request()->input('etime') }}"  placeholder="结束时间" autocomplete="off" class="layui-input">
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
                format: 'YYYY-MM-DD',
                max: laydate.now(),
                choose: function (datas) {
                    endSearch.min = datas;
                    endSearch.start = datas
                }
            });
        })

        $('#etime').click(function () {
            laydate({
                elem: $('#etime')[0],
                format: 'YYYY-MM-DD',
                max: laydate.now(+1),
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