<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/layui/css/layui.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/admin.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/alert.css') }}"/>
</head>
<body>
<div class="layui-tab page-content-wrap">
    <ul class="layui-tab-title">
        <li @if (empty(session('type'))) class="layui-this" @endif>修改资料</li>
        <li @if (session('type') === 'pwd') class="layui-this" @endif>修改密码</li>
    </ul>
    <div class="layui-tab-content">
        @if ($errors->isNotEmpty())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="layui-tab-item @if (empty(session('type'))) layui-show @endif">
            <form class="layui-form" method="post"  style="width: 90%;padding-top: 20px;" action="{{ route('admin.info.edit') }}">
                    @csrf
                <div class="layui-form-item">
                    <label class="layui-form-label">ID：</label>
                    <div class="layui-input-block">
                        <input type="text" name="id" disabled autocomplete="off" class="layui-input layui-disabled" value="1">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">余额：</label>
                    <div class="layui-input-block">
                        <input type="text" name="coin" disabled autocomplete="off" class="layui-input layui-disabled" value="{{ $user->info->coin }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名：</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" autocomplete="off" class="layui-input" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">姓名：</label>
                    <div class="layui-input-block">
                        <input type="text" name="info[name]" required  lay-verify="required" autocomplete="off" class="layui-input" value="{{ $user->info->name }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">手机号：</label>
                    <div class="layui-input-block">
                        <input type="text" name="phone" autocomplete="off" class="layui-input" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱：</label>
                    <div class="layui-input-block">
                        <input type="text" name="email" required  lay-verify="required" autocomplete="off" class="layui-input" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">QQ：</label>
                    <div class="layui-input-block">
                        <input type="text" name="info[qq]" autocomplete="off" class="layui-input" value="{{ $user->info->qq }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">微信：</label>
                    <div class="layui-input-block">
                        <input type="text" name="info[wechat]" autocomplete="off" class="layui-input" value="{{ $user->info->wechat }}">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">备注：</label>
                    <div class="layui-input-block">
                        <textarea name="info[remark]" placeholder="请输入内容" class="layui-textarea">{{ $user->info->remark }}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="adminInfo">立即提交</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="layui-tab-item @if (session('type') === 'pwd') layui-show @endif">
            <form class="layui-form" style="width: 90%;padding-top: 20px;" action="{{ route('admin.password.reset') }}" method="POST">
                @csrf
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名：</label>
                    <div class="layui-input-block">
                        <input type="text" name="username" disabled autocomplete="off" class="layui-input layui-disabled" value="admin">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">旧密码：</label>
                    <div class="layui-input-block">
                        <input type="password" name="pw1" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">新密码：</label>
                    <div class="layui-input-block">
                        <input type="password" name="pw2" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">重复密码：</label>
                    <div class="layui-input-block">
                        <input type="password" name="pw2_confirmation" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="adminPassword">立即提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('admin/layui/layui.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
    //Demo
    layui.use(['form','element'], function(){
        var form = layui.form()
            element = layui.element();
        form.render();
        //监听信息提交
        form.on('submit(adminInfo)', function(data){
            return true;
        });
        //监听密码提交
        form.on('submit(adminPassword)', function(data){
            return true;
        });
    });
</script>
</body>
</html>