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
            <a href="/login">登陆</a>
            <a href="javascript:alert('请联系管理员注册')">注册</a>
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
                    <li><a href="tencent://message/?uin=419979797">红豆-佩佩：419979797</a></li>
                    <li><a href="tencent://message/?uin=151419523">红豆-晓燕：151419523</a></li>
                    <li><a href="tencent://message/?uin=174253880">红豆-高山：174253880</a></li>
                    <li><a href="tencent://message/?uin=596694571">红豆-张超：596694571</a></li>
                    <li><a href="tencent://message/?uin=1150379547">红豆-心儿：1150379547</a></li>
                    <li><a href="tencent://message/?uin=979059919">红豆Hanson：979059919</a></li>
                    <li><a href="tencent://message/?uin=1909956358">鑫鑫：1909956358</a></li>
                    <li><a href="tencent://message/?uin=934819259">红豆-晨曦：934819259</a></li>
                    <li><a href="tencent://message/?uin=1063240677">红豆-杨洋：1063240677</a></li>
                    <li><a href="tencent://message/?uin=1656923446">红豆-漠漠：1656923446</a></li>
                    <li><a href="tencent://message/?uin=1045208528">玲玲：1045208528</a></li>
                    <li><a href="tencent://message/?uin=247717170">彬：247717170</a></li>
                    <li><a href="tencent://message/?uin=568867877">悦悦：568867877</a></li>
                    <li><a href="tencent://message/?uin=429269616">晓栋：429269616</a></li>
                </ul>
            </div>
        </div>
        <div class="top-list">
            <h1>广告主客服</h1>
            <div class="roll_wrap">
                <ul>
                    <li><a href="tencent://message/?uin=271156503">红豆-张小宏：271156503</a></li>
                    <li><a href="tencent://message/?uin=867230029">红豆-世先：867230029</a></li>
                    <li><a href="tencent://message/?uin=176957877">红豆-子涵：176957877</a></li>
                    <li><a href="tencent://message/?uin=1303549184">红豆-小宝：1303549184</a></li>
                    <li><a href="tencent://message/?uin=2766227117">红豆-小东：2766227117</a></li>
                    <li><a href="tencent://message/?uin=1257108770">红豆-小美：1257108770</a></li>
                    <li><a href="tencent://message/?uin=188208042">红豆-面筋哥：188208042</a></li>
                    <li><a href="tencent://message/?uin=702022229">红豆-海龙：702022229</a></li>
                    <li><a href="tencent://message/?uin=920458726">红豆-梦夏：920458726</a></li>
                    <li><a href="tencent://message/?uin=2138557009">红豆-志菲：2138557009</a></li>
                    <li><a href="tencent://message/?uin=845165687">红豆-超人：845165687</a></li>
                    <li><a href="tencent://message/?uin=504987932">红豆-米粒：504987932</a></li>
                    <li><a href="tencent://message/?uin=656489359">红豆-小娜：656489359</a></li>
                    <li><a href="tencent://message/?uin=415800304">红豆-杨跃华：415800304</a></li>
                    <li><a href="tencent://message/?uin=765166429">红豆-李斌：765166429</a></li>
                    <li><a href="tencent://message/?uin=2228306327">红豆-小雪：2228306327</a></li>
                    <li><a href="tencent://message/?uin=414083659">红豆-文睿：414083659</a></li>
                    <li><a href="tencent://message/?uin=2339640288">红豆-小杰：2339640288</a></li>
                    <li><a href="tencent://message/?uin=791501316">红豆-辰鑫：791501316</a></li>
                    <li><a href="tencent://message/?uin=1179470764">红豆-小晓：1179470764</a></li>
                </ul>
            </div>
        </div>
        <div class="top-list">
            <h1>财务/投诉</h1>
            <ul>
                <li><a href="tencent://message/?uin=979059919">财务QQ:979059919</a></li>
                <li><a href="tencent://message/?uin=979059919">投诉QQ:979059919</a></li>
            </ul>
        </div>
        <div class="top-list">
            <h1>客服中心</h1>
            <ul>
                <li><a href="javascript:;">周一至周五 9：00 - 18：00</a></li>
                <li><a href="javascript:;">979059919@qq.com</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="bottom-left">
            <a href="aboutus.php.html">关于红豆科技</a>
            <a href="privacy.php.html">隐私权保护</a>
            <a href="service.php.html">服务条款</a>
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