<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no, email=no" />
    <meta name="keywords" content="{{ config('site.seo_keyword') }}">
    <meta name="description" content="{{ config('site.seo_description') }}">
    <title>{{ config('site.name') }}</title>
    <link rel="stylesheet" href="{{ asset('front/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/index.css') }}">
    @section('style')@show
</head>
<body>
<header class="header">
    <div class="header-wraper">
        <div class="header-logo"><img src="{{ Storage::disk('public')->url(config('site.avatar')) }}"></div>
        <nav class="header-nav">
            <a href="/" @if ($flag == 'home') class="color" @endif>广告投放</a>
            <a href="/media" @if ($flag == 'media') class="color" @endif>媒体变现</a>
            <a href="javascript:alert('请联系管理员索取')">文档中心</a>
            <a href="/about" @if ($flag == 'about') class="color" @endif>关于我们</a>
            @if (request()->user())
                <a href="/admin/home">{{ request()->user()->name }}</a>
            @else
                <a href="/user-login">登陆</a>
                <a href="/register">注册</a>
            @endif
        </nav>
    </div>
</header>
@yield('content')
<footer class="footer">
    <div class="footer-top">
        <div class="top-list">
            <h1>开发者客服</h1>
            <div class="roll_wrap">
                <ul>
                    @foreach ($customers as $customer)
                        @if ($customer->type == 0)
                            <li><a href="tencent://message/?uin={{ $customer->value }}">{{ $customer->name }}：{{ $customer->value }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="top-list">
            <h1>广告主客服</h1>
            <div class="roll_wrap">
                <ul>
                    @foreach ($customers as $customer)
                        @if ($customer->type == 1)
                            <li><a href="tencent://message/?uin={{ $customer->value }}">{{ $customer->name }}：{{ $customer->value }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="top-list">
            <h1>财务/投诉</h1>
            <ul>
                @foreach ($customers as $customer)
                    @if ($customer->type == 2)
                        <li><a href="tencent://message/?uin={{ $customer->value }}">{{ $customer->name }}：{{ $customer->value }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="top-list">
            <h1>客服中心</h1>
            <ul>
                @foreach ($customers as $customer)
                    @if ($customer->type == 3)
                        <li><a href="javascript:;">{{ $customer->value }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="bottom-left">
            <a href="/about">关于红豆科技</a>
            {{--<a href="/privacy">隐私权保护</a>--}}
            {{--<a href="/terms">服务条款</a>--}}
        </div>
        <p class="bottom-right"> Copyright  2008-2018 红豆科技 All rights reserved. </p>
    </div>
</footer>
<script type="text/javascript" src="{{ asset('front/js/common/jquery-2.1.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/common/wow.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/common/swiper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/common/swiper.animate1.0.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/common/common.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/app/index.js') }}"></script>
<script type="text/javascript">

    // 判断是否PC端
    function IsPC() {
        var userAgentInfo = navigator.userAgent;
        var Agents = ["Android", "iPhone",
            "SymbianOS", "Windows Phone",
            "iPad", "iPod"];
        var flag = true;
        for (var v = 0; v < Agents.length; v++) {
            if (userAgentInfo.indexOf(Agents[v]) > 0) {
                flag = false;
                break;
            }
        }
        return flag;
    }
    // // 非PC端跳转到移动端主页
    // if(!IsPC()){
    //     window.location.href = "mobile.php";
    // }

</script>
</body>
</html>