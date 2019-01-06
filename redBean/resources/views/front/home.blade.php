@extends('front.layouts.front')

@section('content')
    <!-- 首屏轮播图 -->
    <div class="banner">
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide sc1">
                    <div class="sctxt1">
                        <h2 class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">短视频互动广告</h2>
                        <p class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">全新的移动广告模式，通过富有创意的视频，引导用户主动参与</p>
                        <p class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.1s">汇聚国内主流移动媒体，为广告主找到优质的用户，高效地完成广告转化</p>
                    </div>
                </div>
                <div class="swiper-slide sc2">
                    <div class="sctxt2">
                        <h2 class="ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">汇聚流量 深度运营</h2>
                        <p class="ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">汇聚顶级媒体，日均曝光4亿</p>
                        <p class="ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">运营场景下最优质活跃的用户群</p>
                    </div>
                </div>
                <div class="swiper-slide sc3">
                    <div class="sctxt3">
                        <h2 class="ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">广告精准投放 定向人群</h2>
                        <p class="ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">借助强大的数据计算能力，投放精准寻找最优人群定向</p>
                        <p class="ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">为广告找到最匹配的用户，大幅提升ROI</p>
                    </div>
                </div>
                <div class="swiper-slide sc4">
                    <div class="sctxt4">
                        <h2 class="ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">防作弊系统</h2>
                        <p class="ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">自有产权广告防作弊技术、防误点技术，为广告主带来纯净的DSP环境</p>
                        <p class="ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">多家第三方数据监测平台确保数据真实有效</p>
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
    <div class="success-case">
        <div class="success-case-wraper">
            <h1 class="bt wow fadeInDown" data-wow-duration=".3" data-wow-delay=".1s" data-wow-offset="50">成功案例</h1>
            <p class="smallbt wow fadeInDown" data-wow-duration=".3" data-wow-delay=".3s" data-wow-offset="50">超1000家行业佼佼者优先选择红豆~</p>
            <div class="case-content">
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <dl>
                                <dt class="wow fadeInLeft ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s"><img src="{{ asset('front/img/Advertisement1.png') }}"></dt>
                                <dd class="wow fadeInRight ani" swiper-animate-effect="fadeInRight" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s">
                                    <h2>游戏行业</h2>
                                    <h3>综合运用媒体流量为XXX导入优质用户</h3>
                                    <p>短视频互动广告，精准挖掘用户</p>
                                    <p>多媒体信息流投放，综合性推广</p>
                                    <p>阶段式效果优化，实现ROI长期投放</p>
                                    <h4>月激活用户<span>20万+</span>日均导入量<span>3000+</span></h4>
                                    <h4>素材创意制作<span>40+</span></h4>
                                    <a href="register.php-utype=0.html" class="tf_btn">我也要投放广告</a>
                                </dd>
                            </dl>
                        </div>
                        <div class="swiper-slide">
                            <dl>
                                <dt class="ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s"><img src="{{ asset('front/img/Advertisement2.png') }}"></dt>
                                <dd class="ani" swiper-animate-effect="fadeInRight" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s">
                                    <h2>电商平台</h2>
                                    <h3>多素材组合投放高效成交燃爆“电商剁手节”</h3>
                                    <p>多人群媒体组合，精准定向目标</p>
                                    <p>海量高质量素材，充分抓住用户</p>
                                    <p>高频监测，快速优化</p>
                                    <h4>曝光量<span>1.2亿</span>新增激活用户数环比上涨<span>365.44%</span></h4>
                                    <h4>项目KPI完成率<span>100%</span></h4>
                                    <a href="register.php-utype=0.html" class="tf_btn">我也要投放广告</a>
                                </dd>
                            </dl>
                        </div>
                        <div class="swiper-slide">
                            <dl>
                                <dt class="ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s"><img src="{{ asset('front/img/Advertisement4.jpg') }}"></dt>
                                <dd class="ani" swiper-animate-effect="fadeInRight" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s">
                                    <h2>金融行业</h2>
                                    <h3>定向投放北京、上海、广州等一线城市</h3>
                                    <p>投放精准寻找最优人群定向</p>
                                    <p>高频监测，快速优化</p>
                                    <p>多媒体信息流投放，综合性推广</p>
                                    <h4>曝光量<span>100万+</span>覆盖人群数<span>678万人次</span></h4>
                                    <h4>ROI对比提高<span>3倍</span></h4>
                                    <a href="register.php-utype=0.html" class="tf_btn">我也要投放广告</a>
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
