<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台</title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/layui/css/layui.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/admin.css')}}"/>
</head>
<body>
<div class="main-layout" id='main-layout'>
    <!--侧边栏-->
    <div class="main-layout-side">
        <div class="m-logo">
        </div>
        <ul class="layui-nav layui-nav-tree" lay-filter="leftNav">
            @foreach ($list as $v)
                <li class="layui-nav-item">
                    <a href="javascript:;"
                       @if (isset($v['url'])) data-url="{{ $v['url'] }}" @endif
                       @if (isset($v['id'])) data-id='{{ $v['id'] }}' @endif
                       data-text="{{ $v['name'] }}">
                        <i class="iconfont">@if (isset($v['icon'])) {{ $v['icon'] }} @endif</i>{{ $v['name'] }}
                    </a>
                    @if (isset($v['list']))
                        <dl class="layui-nav-child">
                        @foreach ($v['list'] as $vv)
                        <dd><a href="javascript:;" data-url="{{ $vv['url'] }}" data-id='{{ $vv['id'] }}' data-text="{{ $vv['name'] }}"><span class="l-line"></span>{{ $vv['name'] }}</a></dd>
                        @endforeach
                        </dl>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    <!--右侧内容-->
    <div class="main-layout-container">
        <!--头部-->
        <div class="main-layout-header">
            <div class="menu-btn" id="hideBtn">
                <a href="javascript:;">
                    <span class="iconfont">&#xe60e;</span>
                </a>
            </div>
            <ul class="layui-nav" lay-filter="rightNav">
                <li class="layui-nav-item"><a href="javascript:void(0);" data-id='4' data-text="邮件系统"><i class="iconfont">&#xe603;</i></a></li>
                <li class="layui-nav-item">
                    <a href="javascript:;" data-url="{{ route('admin.info.modify') }}" data-id='5' data-text="个人信息">{{ Auth::user()->name }}</a>
                </li>
                <li class="layui-nav-item"><a href="{{ route('admin.exit') }}">退出</a></li>
            </ul>
        </div>
        <!--主体内容-->
        <div class="main-layout-body">
            <!--tab 切换-->
            <div class="layui-tab layui-tab-brief main-layout-tab" lay-filter="tab" lay-allowClose="true">
                <ul class="layui-tab-title">
                    <li class="layui-this welcome">后台主页</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show" style="background: #f5f5f5;">
                        <!--1-->
                        <iframe src="{{ route('admin.welcome') }}" width="100%" height="100%" name="iframe" scrolling="auto" class="iframe" framborder="0"></iframe>
                        <!--1end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--遮罩-->
    <div class="main-mask">

    </div>
</div>
<script type="text/javascript">
    var scope={
        link:"{{ route('admin.welcome') }}"
    }
</script>
<script src="{{asset('admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('admin/js/main.js')}}" type="text/javascript" charset="utf-8"></script>

</body>
</html>
