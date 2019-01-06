@extends('front.layouts.front')

@section('style')
    <style>.banner .swiper-container .sc1{
            background-image:url("{{ asset('front/img/mbanner1.png') }}");
        }
        .banner .swiper-container .sc1 .sctxt1{
            margin-left: -46px;
            margin-top: -100px;
            position: absolute;
            left: 50%;
            top: 50%;
        }
        .banner .swiper-container .sc2{
            background-image:url("{{ asset('front/img/mbanner2.png') }}");
        }
        .banner .swiper-container .sc2 .sctxt2 {
            position: absolute;
            left: 50%;
            margin-left: 73px;
            top: 50%;
            margin-top: -38px;
        }
        .banner .swiper-container .sc3{
            background-image:url("{{ asset('front/img/mbanner3-3.png') }}");
        }
        .banner .swiper-container .sc3 .sctxt3 {
            position: absolute;
            right: 50%;
            margin-right: -447px;
            top: 50%;
            margin-top: -196px;
        }
        .banner .swiper-container .sc4{
            background-image:url("{{ asset('front/img/mbanner4.png') }}");
        }
        .banner .swiper-container .sc4 .sctxt4 {
            position: absolute;
            right: 50%;
            margin-right: -173px;
            top: 50%;
            margin-top: -182px;
        }
        .med .success-case-wraper .case-content .al1 dl dt{
            width: 256px;
            position: absolute;
            top: 49px;
            left: 175px;
        }
        .med .success-case-wraper .case-content .swiper-slide h2{
            margin-bottom: 17px;
        }
        .med .success-case-wraper .case-content .swiper-slide dl dd{
            float: left;
            padding-top: 54px;
            margin-left: 621px;
            padding-right: 55px;
        }
        .med .success-case-wraper .case-content .swiper-slide p{
            line-height: 25px;
        }
    </style>
@endsection

@section('content')
    <!-- 首屏轮播图 -->
    <div class="banner">
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide sc1">
                    <div class="sctxt1">
                        <h2 class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">海量福利 高额回报</h2>
                        <h2 class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">媒体综合收益高于行业水平</h2>
                        <p class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">与数万家优质的广告主建立合作，严格把控广告质量，充分实现广告填充</p>
                        <p class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">强大的数据运算能力，保证广告精准投放，媒体综合收益高于行业水平</p>
                    </div>
                </div>
                <div class="swiper-slide sc2">
                    <div class="sctxt2">
                        <h2 class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">流量变现首选平台 </h2>
                        <h2 class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">轻量对接 高效收益</h2>
                        <p class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">独创的互动式广告场景，灵活的广告入口</p>
                        <p class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">轻量级对接方式，为流量主提供更高变现效率及更优用户体验</p>
                    </div>
                </div>
                <div class="swiper-slide sc3">
                    <div class="sctxt3">
                        <h2 class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">丰富的流量渠道 </h2>
                        <p class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">低成本获得更高转化回报</p>
                        <p class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">数万开发者合作，上亿日均浏览量为您展现广告</p>
                    </div>
                </div>
                <div class="swiper-slide sc4">
                    <div class="sctxt4">
                        <h2 class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">丰富的流量渠道 </h2>
                        <p class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">低成本获得更高转化回报</p>
                        <p class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">数万开发者合作，上亿日均浏览量为您展现广告</p>
                    </div>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <!-- 透明 -->
    <div class="mask"></div>
    <!-- 成功案例 -->
    <div class="success-case med">
        <div class="success-case-wraper">
            <h1 class="bt wow fadeInDown" data-wow-duration=".3" data-wow-delay=".1s" data-wow-offset="50">成功案例</h1>
            <p class="smallbt wow fadeInDown" data-wow-duration=".3" data-wow-delay=".3s" data-wow-offset="50">超1000家行业佼佼者优先选择红豆~</p>
            <div class="case-content">
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide al1">
                            <dl>
                                <dt class="wow fadeInLeft ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s"><img src="{{ asset('front/img/al-1.png') }}"></dt>
                                <dd class="wow fadeInRight ani" swiper-animate-effect="fadeInRight" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s">
                                    <h2>全屏广告</h2>
                                    <p>全屏广告（Full Screen Ads），是App广告中尺寸最大的广告样式。全屏覆盖移动设备，具有视觉冲击力，适合品牌海报露出，第一时间触达用户。</p>
                                    <a href="register.php-utype=1.html" class="tf_btn">我也要流量变现</a>
                                </dd>
                            </dl>
                        </div>
                        <div class="swiper-slide al1">
                            <dl>
                                <dt class="ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s"><img src="{{ asset('front/img/al-2.png') }}"></dt>
                                <dd class="ani" swiper-animate-effect="fadeInRight" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s">
                                    <h2>视频广告</h2>
                                    <p>采用原生SDK媒体技术，让用户在移动设备上享受到沉浸式、高聚焦度的视听享受，使广告主的优质创意与APP实现无缝植入。特别适合有视频传播需求的品牌，可投放到指定标签的用户，精准实现品牌传达和渗透。</p>
                                    <a href="register.php-utype=1.html" class="tf_btn">我也要流量变现</a>
                                </dd>
                            </dl>
                        </div>
                        <div class="swiper-slide al3">
                            <dl>
                                <dt class="ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s"><img src="{{ asset('front/img/al-3.png') }}"></dt>
                                <dd class="ani" swiper-animate-effect="fadeInRight" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s">
                                    <h2>横幅广告</h2>
                                    <p>接近原生的广告体验，是移动广告中最常见的展现形式,醒目的图片和附带的文字为用户提供有价值的信息以增强广告互动。</p>
                                    <a href="register.php-utype=1.html" class="tf_btn">我也要流量变现</a>
                                </dd>
                            </dl>
                        </div>
                        <div class="swiper-slide al1">
                            <dl>
                                <dt class="ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s"><img src="{{ asset('front/img/al-4.png') }}"></dt>
                                <dd class="ani" swiper-animate-effect="fadeInRight" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s">
                                    <h2>信息流广告</h2>
                                    <p>时下主流的效果广告形式，以资讯形态展现的原生广告，良好的阅读体验和用户的高注意力能使广告获得有效的营销印象，是一种强曝光的广告形态。</p>
                                    <a href="register.php-utype=1.html" class="tf_btn">我也要流量变现</a>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    @component('front.slot.comment')@endcomponent
@endsection
