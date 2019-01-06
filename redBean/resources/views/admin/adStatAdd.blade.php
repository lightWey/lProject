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
        <div class="layui-form-item">
            <label class="layui-form-label">广告：</label>
            <div class="layui-input-block">
                <select name="user_id" lay-verify="required|number">
                    <option value=""></option>
                    @foreach ($ads as $ad)
                    <option value="{{ $ad->id }}">{{ $ad->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">类型：</label>
            <div class="layui-input-block">
                <select name="type" lay-verify="required">
                    <option value=""></option>
                    <option value="1">展示</option>
                    <option value="2">点击</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">数量：</label>
            <div class="layui-input-block">
                <input type="text" name="name" required lay-verify="name" placeholder="请输入名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">链接：</label>
            <div class="layui-input-block">
                <input type="text" name="url" required lay-verify="url" placeholder="请输入链接" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态：</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="上线" checked>
                <input type="radio" name="status" value="0" title="下线">
            </div>

        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">备注</label>
            <div class="layui-input-block">
                <textarea name="remark" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>

<script src="{{asset('admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script>
    //Demo
    layui.use(['form','jquery'], function() {
        var form = layui.form(),
            $ = layui.jquery;
        //自定义验证规则
        form.verify({
            once: [/^\d+(\.\d+)?$/, '请输入有效单价']
        });
        form.render();
        //监听提交
        form.on('submit(formDemo)', function(data) {
            var json_data=(data.field)
            $.ajax({
                async:false,
                type: "POST",
                url: "{{ route('admin.ad.add') }}",
                data: json_data,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data) {
                    parent.layer.closeAll();
                    parent.layer.msg('添加成功');
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
    });
</script>
</body>

</html>