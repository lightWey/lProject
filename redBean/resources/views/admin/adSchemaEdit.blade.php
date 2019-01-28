<!DOCTYPE html>
<html>
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
<div class="wrap-container">
    <form class="layui-form" style="width: 90%;padding-top: 20px;">
        <input type="hidden" name="id" value="{{ $config->id }}">
        <div class="layui-form-item">
            <label class="layui-form-label">名称：</label>
            <div class="layui-input-block">
                <input type="text" value="{{ $config->name }}" name="name" lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">类型：</label>
            <div class="layui-input-block">
                <select name="type" lay-verify="required">
                    <option value=""></option>
                    @foreach ($type as $k => $v)
                        <option @if ($config->type == $k) selected @endif value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">广告ID：</label>
            <div class="layui-input-block">
                <input type="text" value="{{ $config->ad_id }}" name="ad_id" lay-verify="required" placeholder="请输入广告id" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开始时间：</label>
            <div class="layui-input-block">
                <input type="text" id="ctime" value="{{ $config->ctime }}" name="ctime" lay-verify="required" placeholder="请选择开始时间" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">方式：</label>
            <div class="layui-input-block">
                <select name="random" lay-verify="required" lay-filter="random">
                    <option value=""></option>
                    @foreach ($random as $k => $v)
                        <option @if ($config->random == $k) selected @endif value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">结束时间：</label>
            <div class="layui-input-block">
                <input type="text" id="etime" value="{{ $config->etime }}" name="etime" lay-verify="required" placeholder="请选择结束时间" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" id="mm" @if ($config->random != 1) style="display: none" @endif>
            <label class="layui-form-label" id="num">每秒次数：</label>
            <div class="layui-input-block">
                <input type="text" value="@if ($config->total) {{ $config->total/(strtotime($config->etime) - strtotime($config->ctime)) }} @endif " name="mm" placeholder="请输入数量" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" id="num">总数量：</label>
            <div class="layui-input-block">
                <input type="text" value="{{ $config->total }}" name="total" required lay-verify="required" placeholder="请输入数量" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            @if ($config->id)
                <div class="layui-input-block">
                    <button disabled class="layui-btn layui-btn-normal layui-disabled">立即提交</button>
                    <button disabled type="reset" class="layui-btn layui-disabled layui-btn-primary">重置</button>
                </div>
            @else
                <div class="layui-input-block">
                    <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            @endif
        </div>
    </form>
</div>

<script src="{{asset('admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script>
    //Demo
    layui.use(['form','jquery','laydate'], function() {
        var form = layui.form(),
            $ = layui.jquery,
            laydate = layui.laydate;

        form.render();

        function ctime()
        {
            var ctime = $('#ctime').val(),etime = $('#etime').val(),mm = $('input[name="mm"]').val();
            if (ctime && etime && mm) {
                var date1 = Date.parse(new Date(ctime));
                var date2 = Date.parse(new Date(etime));
                $('input[name="total"]').val((date2-date1)/1000 * mm);
            }

        }

        $('input[name="mm"]').keyup(function () {
           ctime();
        });

        $('#ctime').click(function () {
            laydate({
                elem: $('#ctime')[0],
                format: 'YYYY-MM-DD hh:mm:ss',
                istime: true,
                min: laydate.now(-1),
                max: laydate.now(15),
                choose: function (datas) {
                    ctime();
                }
            });
        })

        $('#etime').click(function () {
            laydate({
                elem: $('#etime')[0],
                format: 'YYYY-MM-DD hh:mm:ss',
                istime: true,
                min: laydate.now(-1),
                max: laydate.now(15),
                choose: function (datas) {
                    ctime();
                }
            });
        })

        form.on('select(random)', function(data){
            var random = $(data.elem);
            if (random.val() == 1) {
                $('#mm').show();
                $('input[name="total"]').addClass('layui-disabled').attr("disabled",true);
            } else {
                $('#mm').hide();
                $('input[name="total"]').removeClass('layui-disabled').attr("disabled",false);
            }
        });

        @if (empty($config->id))
        //监听提交
        form.on('submit(formDemo)', function(data) {
            var json_data=(data.field);
            $.ajax({
                async:false,
                type: "POST",
                url: "{{ route('admin.schema.store') }}",
                data: json_data,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data) {
                    parent.layer.closeAll();
                    parent.layer.msg(data.msg ? data.msg : '添加成功');
                },
                error: function (res) {
                    if (res.responseJSON) {
                        layer.msg(Object.values(res.responseJSON.errors)[0][0]);
                    } else {
                        parent.layer.closeAll();
                        parent.layer.msg('添加成功');
                    }
                }
            });
            return false;
        });
        @endif
    });
</script>
</body>

</html>