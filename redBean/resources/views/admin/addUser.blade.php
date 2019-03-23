<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>红豆后台</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/layui/css/layui.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/admin.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/alert.css') }}"/>
</head>
<body>
<div class="wrap-container">
    <form class="layui-form" method="post"  style="width: 90%;padding-top: 20px;">
        <div class="layui-form-item">
            <label class="layui-form-label">用户名：</label>
            <div class="layui-input-block">
                <input type="text" name="name" autocomplete="off" placeholder="请输入用户名" lay-verify="required" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">姓名：</label>
            <div class="layui-input-block">
                <input type="text" name="info[name]" required placeholder="请输入姓名"  lay-verify="required" autocomplete="off" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码：</label>
            <div class="layui-input-block">
                <input type="text" name="password" required  lay-verify="required" autocomplete="off" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机号：</label>
            <div class="layui-input-block">
                <input type="text" name="phone" autocomplete="off" placeholder="请输入手机号" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱：</label>
            <div class="layui-input-block">
                <input type="text" name="email" required  lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">QQ：</label>
            <div class="layui-input-block">
                <input type="text" name="info[qq]" autocomplete="off" placeholder="请输入QQ号" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">微信：</label>
            <div class="layui-input-block">
                <input type="text" name="info[wechat]"placeholder="请输入微信号" autocomplete="off" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">备注：</label>
            <div class="layui-input-block">
                <textarea name="info[remark]" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-normal" lay-submit lay-filter="adminInfo">立即提交</button>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('admin/layui/layui.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
    //Demo
    layui.use(['form','element','jquery'], function(){
        var form = layui.form(),
            $ = layui.jquery,
            element = layui.element();
        form.render();
        //监听提交
        form.on('submit(adminInfo)', function(data) {
            var json_data=(data.field);
            $.ajax({
                async:false,
                type: "POST",
                url: "{{ route('admin.user.storage') }}",
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
    });
</script>
</body>
</html>