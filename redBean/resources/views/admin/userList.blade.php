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
<div class="wrap-container">
    <div class="column-content-detail">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-inline tool-btn">
                    <button class="layui-btn layui-btn-small layui-btn-normal addBtn" data-title="添加广告主" data-url="{{ route('admin.user.add') }}"><i class="layui-icon">&#xe654;</i></button>
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
                    <th>ID</th>
                    <th>用户名</th>
                    <th>电邮</th>
                    <th>电话</th>
                    <th>微信</th>
                    <th>QQ</th>
                    <th>余额</th>
                    <th>创建时间</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td class="hidden-xs">{{ $user->email }}</td>
                    <td class="hidden-xs">{{ $user->phone }}</td>
                    <td class="hidden-xs">{{ $user->info->wechat }}</td>
                    <td class="hidden-xs">{{ $user->info->qq }}</td>
                    <td class="hidden-xs">{{ $user->info->coin }}元</td>
                    <td class="hidden-xs">{{ $user->created_at }}</td>
                    <td>
                        @if ($user->status)
                            <button class="layui-btn layui-btn-mini layui-btn-normal">正常</button>
                        @else
                            <button class="layui-btn layui-btn-mini layui-btn-danger">禁止</button>
                        @endif
                    </td>
                    <td>
                        <div class="layui-inline">
                            <a href="{{ route('admin.info.modify', ['user'=>$user->id]) }}" class="layui-btn layui-btn-small layui-btn-normal" data-id="1"><i class="layui-icon">&#xe642;</i></a>
                            <button class="layui-btn layui-btn-small layui-btn-danger del-btn" data-id="{{ $user->id }}" data-url="{{ route('admin.user.status') }}" data-csrf="{{ csrf_token() }}"><i class="layui-icon">&#xe640;</i></button>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="page-wrap">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
</body>

</html>