<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no, email=no" />
    <meta name="keywords" content="洛米、洛米科技、洛米手机广告、洛米移动广告、手机广告平台、移动营销、移动广告平台、智能手机广告、移动互联网广告、无线营销、移动互联网广告平台、智能手机广告平台">
    <meta name="description" content="洛米科技是中国领先智能手机广告平台 ,基于强大的技术支持、优质的合作伙伴,为广告主提供精准的无线营销和品牌推广服务,为应用开发者提供海量优质广告展现并创造广告收入。">
    <title>洛米科技—中国领先智能手机广告平台/移动广告平台/移动营销</title>
    <link rel="stylesheet" href="{{ asset('front/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/index.css') }}">
</head>
<body>
<header class="header">
    <div class="header-wraper">
        <div class="header-logo"><img src="{{ Storage::disk('public')->url($config->avatar) }}"></div>
        <nav class="header-nav">
            <a href="index.php.html" class="color">广告投放</a>
            <a href="media.php.html">媒体变现</a>
            <a href="document.php.html">文档中心</a>
            <a href="aboutus.php.html">关于我们</a>
            <a href="login.php.html">登陆</a>
            <a href="register.php.html">注册</a>
        </nav>
    </div>
</header>
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
        <p class="smallbt wow fadeInDown" data-wow-duration=".3" data-wow-delay=".3s" data-wow-offset="50">超1000家行业佼佼者优先选择洛米~</p>
        <div class="case-content">
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <dl>
                            <dt class="wow fadeInLeft ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s"><img src="template/gw/img/Advertisement1.png"></dt>
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
                            <dt class="ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s"><img src="template/gw/img/Advertisement2.png"></dt>
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
                            <dt class="ani" swiper-animate-effect="fadeInLeft" swiper-animate-duration="0.3s" swiper-animate-delay="0.1s"><img src="template/gw/img/Advertisement4.jpg"></dt>
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
<!-- 预约咨询 -->
<div class="advisory">
    <div class="advisory-wraper">
        <h1 class="bt wow fadeInDown" data-wow-duration=".3" data-wow-delay=".1s">预约咨询</h1>
        <h2 class="smallbt wow fadeInDown" data-wow-duration=".3" data-wow-delay=".5s">提交您的联系方式，我们的平台顾问会及时回电，解答您的困惑哟~</h2>
        <div class="bd">
            <div class="bd-list">
                <label for="" style="padding-left:2em">姓名</label>
                <input type="text" placeholder="请输入您的姓名" name="nickname" maxlength="20">
                <span class="error-txt">不能为空~</span>
                <span class="error-icon"></span>
            </div>
            <div class="bd-list">
                <label for="">企业名称</label>
                <input type="text"  placeholder="请输入您的公司名称" name="company" maxlength="50">
                <span class="error-txt">不能为空~</span>
                <span class="error-icon"></span>
            </div>
            <div class="bd-list">
                <label for="">联系电话</label>
                <input type="text" placeholder="请输入您的联系电话" name="phone">
                <span class="error-txt">不能为空~</span>
                <span class="error-icon"></span>
            </div>
            <a href="javascript:;" class="advisory-btn" onclick="yuyue(1)">立即预约</a>

        </div>
        <div class="yy-sucessBox">
            <div class="sucessBox-bg"></div>
            <div class="sucessBox-txt">预约成功，稍后会有工作人员跟您联系~</div>
        </div>

    </div>
</div>
<div class="cooperation">
    <div class="cooperation-wraper">
        <h1 class="bt wow fadeInDown" data-wow-duration=".3" data-wow-delay=".1s" data-wow-offset="50">战略合作品牌</h1>
    </div>
</div>
<footer class="footer">
    <div class="footer-top">
        <div class="top-list">
            <h1>开发者客服</h1>
            <div class="roll_wrap">
                <ul>
                    <li><a href="tencent://message/?uin=419979797">洛米-佩佩：419979797</a></li>
                    <li><a href="tencent://message/?uin=151419523">洛米-晓燕：151419523</a></li>
                    <li><a href="tencent://message/?uin=174253880">洛米-高山：174253880</a></li>
                    <li><a href="tencent://message/?uin=596694571">洛米-张超：596694571</a></li>
                    <li><a href="tencent://message/?uin=1150379547">洛米-心儿：1150379547</a></li>
                    <li><a href="tencent://message/?uin=979059919">洛米Hanson：979059919</a></li>
                    <li><a href="tencent://message/?uin=1909956358">鑫鑫：1909956358</a></li>
                    <li><a href="tencent://message/?uin=934819259">洛米-晨曦：934819259</a></li>
                    <li><a href="tencent://message/?uin=1063240677">洛米-杨洋：1063240677</a></li>
                    <li><a href="tencent://message/?uin=1656923446">洛米-漠漠：1656923446</a></li>
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
                    <li><a href="tencent://message/?uin=271156503">洛米-张小宏：271156503</a></li>
                    <li><a href="tencent://message/?uin=867230029">洛米-世先：867230029</a></li>
                    <li><a href="tencent://message/?uin=176957877">洛米-子涵：176957877</a></li>
                    <li><a href="tencent://message/?uin=1303549184">洛米-小宝：1303549184</a></li>
                    <li><a href="tencent://message/?uin=2766227117">洛米-小东：2766227117</a></li>
                    <li><a href="tencent://message/?uin=1257108770">洛米-小美：1257108770</a></li>
                    <li><a href="tencent://message/?uin=188208042">洛米-面筋哥：188208042</a></li>
                    <li><a href="tencent://message/?uin=702022229">洛米-海龙：702022229</a></li>
                    <li><a href="tencent://message/?uin=920458726">洛米-梦夏：920458726</a></li>
                    <li><a href="tencent://message/?uin=2138557009">洛米-志菲：2138557009</a></li>
                    <li><a href="tencent://message/?uin=845165687">洛米-超人：845165687</a></li>
                    <li><a href="tencent://message/?uin=504987932">洛米-米粒：504987932</a></li>
                    <li><a href="tencent://message/?uin=656489359">洛米-小娜：656489359</a></li>
                    <li><a href="tencent://message/?uin=415800304">洛米-杨跃华：415800304</a></li>
                    <li><a href="tencent://message/?uin=765166429">洛米-李斌：765166429</a></li>
                    <li><a href="tencent://message/?uin=2228306327">洛米-小雪：2228306327</a></li>
                    <li><a href="tencent://message/?uin=414083659">洛米-文睿：414083659</a></li>
                    <li><a href="tencent://message/?uin=2339640288">洛米-小杰：2339640288</a></li>
                    <li><a href="tencent://message/?uin=791501316">洛米-辰鑫：791501316</a></li>
                    <li><a href="tencent://message/?uin=1179470764">洛米-小晓：1179470764</a></li>
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
            <a href="aboutus.php.html">关于洛米科技</a>
            <a href="privacy.php.html">隐私权保护</a>
            <a href="service.php.html">服务条款</a>
        </div>
        <p class="bottom-right"> Copyright  2008-2018 洛米科技 All rights reserved. </p>
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
    // 非PC端跳转到移动端主页
    if(!IsPC()){
        window.location.href = "mobile.php";
    }

</script>
</body>
</html>