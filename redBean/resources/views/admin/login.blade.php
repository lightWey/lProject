<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>后台登录</title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/layui/css/layui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/login.css')}}" />
</head>

<body>
<div class="m-login-bg">
    <div class="m-login">
        <h3>@if (request()->route()->getName() == 'login') 管理员 @else 用户@endif后台系统登录</h3>
        <div class="m-login-warp">
            <form class="layui-form" method="POST" name="login">
                <div class="layui-form-item">
                    <input type="text" name="email" required lay-verify="required" placeholder="邮箱" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <input type="password" name="password" required lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <input type="text" name="captcha" required lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-inline">
                        <img class="verifyImg" onclick="this.src=this.src+'?c='+Math.random();" src="{{captcha_src('default')}}" />
                    </div>
                </div>
                <div class="layui-form-item m-login-btn">
                    <div class="layui-inline">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="login">登录</button>
                    </div>
                    <div class="layui-inline">
                        <button type="reset" class="layui-btn layui-btn-primary">取消</button>
                    </div>
                </div>
            </form>
        </div>
        <p class="copyright">Copyright 2015-2016 by XIAODU</p>
    </div>
</div>
<script src="{{asset('admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script>
    layui.use(['form', 'layedit', 'laydate','jquery'], function() {
        var form = layui.form(),
            layer = layui.layer,
            $ = layui.jquery;

        if(window.top != window.self){
            top.location.href = location.href;
        }

        //自定义验证规则
        form.verify({
            title: function(value) {
                if(value.length < 5) {
                    return '标题至少得5个字符啊';
                }
            },
            password: [/(.+){6,12}$/, '密码必须6到12位'],
            verity: [/(.+){6}$/, '验证码必须是6位'],

        });

        //监听提交
        form.on('submit(login)', function(data) {
            var json_data=(data.field);
            $.ajax({
                async:false,
                type: "POST",
                url: "{{ route('login') }}",
                data: json_data,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                },
                error: function (res) {
                    if (res.responseJSON) {
                        layer.msg(Object.values(res.responseJSON.errors)[0][0]);
                    } else {
                        $(location).attr('href', "{{ route('home') }}");
                    }
                }
            });
            return false;
        });

    });
</script>
</body>
</html>