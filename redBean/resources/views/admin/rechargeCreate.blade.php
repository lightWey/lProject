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
<div class="wrap-container">
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
    <form class="layui-form" method="post"  style="width: 90%;padding-top: 20px;" action="{{ route('admin.recharge.store') }}">
        @csrf
        <div class="layui-form-item">
            <label class="layui-form-label">用户Id：</label>
            <div class="layui-input-block">
                <input type="text" name="user_id" autocomplete="off" @if (isset($user)) disabled value="{{ $user->id }}"  @endif class="layui-input @if (isset($user)) layui-disabled @endif">
            </div>
        </div>
        @if (isset($user))
        <div class="layui-form-item">
            <label class="layui-form-label">用户名：</label>
            <div class="layui-input-block">
                <input type="text" disabled autocomplete="off" class="layui-input layui-disabled" value="{{ $user->name }}">
            </div>
        </div>
        @endif
        <div class="layui-form-item">
            <label class="layui-form-label">充值金额：</label>
            <div class="layui-input-block">
                <input type="text" name="amount" autocomplete="off" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">备注：</label>
            <div class="layui-input-block">
                <textarea name="remark" placeholder="请输入内容" class="layui-textarea"></textarea>
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