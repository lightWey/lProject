<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>注册系统</title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/layui/css/layui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/login.css')}}" />
</head>

<body>
<div class="m-login-bg">
    <div class="m-login">
        <h3>广告主注册</h3>
        <div class="m-login-warp">
            <form class="layui-form" method="POST">
                <div class="layui-form-item">
                    <input type="text" name="name" required lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <input type="text" name="email" required lay-verify="required" placeholder="邮箱" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <input type="password" name="password" required lay-verify="password" placeholder="密码" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <input type="password" name="password_confirmation" required lay-verify="password" placeholder="确认密码" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <input type="text" name="captcha" required lay-verify="verity" placeholder="验证码" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-inline">
                        <img class="verifyImg" onclick="this.src=this.src+'?c='+Math.random();" src="{{captcha_src('default')}}" />
                    </div>
                </div>
                <div class="layui-form-item m-login-btn">
                    <div class="layui-inline">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="register">注册</button>
                    </div>
                    <div class="layui-inline">
                        <button type="reset" class="layui-btn layui-btn-primary">取消</button>
                    </div>
                </div>
            </form>
        </div>
        <p class="copyright">{{ config('site.copyright') }}</p>
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
            password: [/(.+){6,12}$/, '密码必须6到12位'],
            verity: [/(.+){5}$/, '验证码必须是6位'],

        });

        //监听提交
        form.on('submit(register)', function(data) {
            var json_data=(data.field);
            $.ajax({
                async:false,
                type: "POST",
                url: "{{ route('register') }}",
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