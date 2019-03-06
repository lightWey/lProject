@extends('front.layouts.front')

@section('style')
    <link rel="stylesheet" href="{{ asset('front/css/aboutus.css') }}">
@endsection

@section('content')
    <div class="about-banner"><img src="{{ asset('front/img/aboutMe1.jpg') }}"></div>
    <div class="content">
        <div class="aboutMe">
            <div class="aboutMe-left" style="height:420px;">
                <h1 class="bt">公司介绍</h1>
                <p class="aboutMe-txt">红豆科技是一家移动端广告投放平台，致力于为广告主和媒介主（开发者、自媒体）提供最优质的移动营销服务，使双方营销资源价值最大化。</p>
                <p class="aboutMe-txt">红豆科技，整合了智能移动端领域大量优质媒体及广告资源，构建起一个公平、诚信、高效的广告营销服务平台，为广告主提供精准，高效的产品、品牌推广服务，同时为媒介主创造丰厚的广告收益。</p>
                <!-- <p class="aboutMe-txt">红豆科技，整合了智能手机领域大量优质媒体及广告资源，构建起一个公平、诚信、高效的广告营销服务平台，为广告主提供精准，高效的产品、品牌推广服务，同时为媒介主创造丰厚的广告收益。</p> -->
                <p class="aboutMe-txt">红豆科技，以专业化的营销队伍，依靠先进的技术，科学规范的管理，强大的硬件设施和雄厚资金，我们有信心和实力为广大媒介主和广告主提供优质服务。</p>
                <p class="aboutMe-txt">热诚欢迎广大媒介主和广告主的加盟，共创美好未来!</p>
            </div>
            <div class="aboutMe-right"></div>
        </div>
        <div class="callMe">
            <h1 class="bt">联系我们</h1>
            <div class="callMe-left">
                <div class="main">
                    <p class="callMe-txt" style="border-bottom: 1px solid #70bed5;padding-bottom: 15px;">感谢您来到红豆科技，若您有合作意向，请您使用以下方式联系我们,我们将尽快给您回复，并为您提供最真诚的服务，谢谢。</p>
                    <p class="callMe-txt">总部地址：北京红豆科技有限公司</p>
                    @if($coder)
                    <p class="callMe-txt">开发者客服：QQ {{ $coder->value }}</p>
                    @endif
                    @if($ader)
                    <p class="callMe-txt">广告主客服：QQ {{ $ader->value }}</p>
                    @endif
                    <p class="callMe-txt">E-mail：rp19920307@163.com</p>
                </div>

            </div>
            <div class="callMe-right"></div>
        </div>
    </div>
@endsection
