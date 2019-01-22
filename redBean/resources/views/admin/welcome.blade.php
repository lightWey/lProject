<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>欢迎统计页面</title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/layui/css/layui.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/admin.css')}}"/>
</head>
<body>
<div class="wrap-container welcome-container">
    <div class="row">
        <div class="welcome-left-container col-lg-9">
            <div class="data-show">
                <ul class="clearfix">
                    <li class="col-sm-12 col-md-4 col-xs-12">
                        <a href="javascript:;" class="clearfix">
                            <div class="icon-bg bg-org f-l">
                                <span class="iconfont">&#xe606;</span>
                            </div>
                            <div class="right-text-con">
                                <p class="name">会员数</p>
                                <p>
                                    <span class="color-org">{{ $data->user[$data->index] }}</span>数据
                                    @if ($data->user[$data->index] > $data->user[$data->preIndex])
                                        <span class="iconfont">&#xe60f;</span>
                                    @else
                                        <span class="iconfont">&#xe60f;</span>
                                    @endif
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="col-sm-12 col-md-4 col-xs-12">
                        <a href="javascript:;" class="clearfix">
                            <div class="icon-bg bg-blue f-l">
                                <span class="iconfont">&#xe602;</span>
                            </div>
                            <div class="right-text-con">
                                <p class="name">广告数</p>
                                <p>
                                    <span class="color-blue">{{ $data->ad[$data->index] }}</span>数据
                                    @if ($data->ad[$data->index] > $data->ad[$data->preIndex])
                                        <span class="iconfont">&#xe628;</span>
                                    @else
                                        <span class="iconfont">&#xe60f;</span>
                                    @endif
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="col-sm-12 col-md-4 col-xs-12">
                        <a href="javascript:;" class="clearfix">
                            <div class="icon-bg bg-green f-l">
                                <span class="iconfont">&#xe605;</span>
                            </div>
                            <div class="right-text-con">
                                <p class="name">充值数</p>
                                <p>
                                    <span class="color-green">{{ $data->recharge[$data->index] }}</span>数据
                                    @if ($data->recharge[$data->index] > $data->recharge[$data->preIndex])
                                        <span class="iconfont">&#xe628;</span>
                                    @else
                                        <span class="iconfont">&#xe60f;</span>
                                    @endif
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!--图表-->
            <div class="chart-panel panel panel-default">
                <div class="panel-body" id="chart" style="height: 376px;">
                </div>
            </div>
            <!--服务器信息-->
            <div class="server-panel panel panel-default">
                <div class="panel-header">服务器信息</div>
                <div class="panel-body clearfix">
                    <div class="col-md-2">
                        <p class="title">服务器环境</p>
                        <span class="info">Apache/2.4.4 (Win32) PHP/5.4.16</span>
                    </div>
                    <div class="col-md-2">
                        <p class="title">服务器IP地址</p>
                        <span class="info">127.0.0.1   </span>
                    </div>
                    <div class="col-md-2">
                        <p class="title">服务器域名</p>
                        <span class="info">localhost </span>
                    </div>
                    <div class="col-md-2">
                        <p class="title"> PHP版本</p>
                        <span class="info">5.4.16</span>
                    </div>
                    <div class="col-md-2">
                        <p class="title">数据库信息</p>
                        <span class="info">5.6.12-log </span>
                    </div>
                    <div class="col-md-2">
                        <p class="title">服务器当前时间</p>
                        <span class="info">2016-06-22 11:37:35</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="welcome-edge col-lg-3">
            <!--最新留言-->
            <div class="panel panel-default comment-panel">
                <div class="panel-header">最新公告</div>
                <div class="panel-body">
                    <div class="commentbox">
                        <ul class="commentList">
                            <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://static.h-ui.net/h-ui/images/ucnter/avatar-default.jpg"></i></a>
                                <div class="comment-main">
                                    <header class="comment-header">
                                        <div class="comment-meta"><a class="comment-author" href="#">管理员</a> 发表于
                                            <time title="2014年8月31日 下午3:20" datetime="2014-08-31T03:54:20">2018-12-30 15:20</time>
                                        </div>
                                    </header>
                                    <div class="comment-body">
                                        <p>房间公告</p>
                                    </div>
                                </div>
                            </li>
                            <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://static.h-ui.net/h-ui/images/ucnter/avatar-default.jpg"></i></a>
                                <div class="comment-main">
                                    <header class="comment-header">
                                        <div class="comment-meta"><a class="comment-author" href="#">管理员</a> 发表于于
                                            <time title="2014年8月31日 下午3:20" datetime="2014-08-31T03:54:20">2019-01-01 15:20</time>
                                        </div>
                                    </header>
                                    <div class="comment-body">
                                        <p>元旦快乐，普天同庆</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="pagesbox" style="text-align: center;padding-top: 5px;">

                    </div>
                </div>
            </div>
            <!--联系-->
            <div class="panel panel-default contact-panel">
                <div class="panel-header">联系我们</div>
                <div class="panel-body">
                    <p>QQ：243065761</p>
                    <p>E-mail:4565564@qq.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('admin/lib/echarts/echarts.js')}}"></script>
<script type="text/javascript">
    layui.use(['layer','jquery'], function(){
        var layer 	= layui.layer;
        var $=layui.jquery;
        //图表
        var myChart;
        require.config({
            paths: {
                echarts: '/admin/lib/echarts'
            }
        });
        require(
            [
                'echarts',
                'echarts/chart/bar',
                'echarts/chart/line',
                'echarts/chart/map'
            ],
            function (ec) {
                //--- 折柱 ---
                myChart = ec.init(document.getElementById('chart'));
                myChart.setOption(
                    {
                        title: {
                            text: "数据统计",
                            textStyle: {
                                color: "rgb(85, 85, 85)",
                                fontSize: 18,
                                fontStyle: "normal",
                                fontWeight: "normal"
                            }
                        },
                        tooltip: {
                            trigger: "axis"
                        },
                        legend: {
                            data: ["会员", "广告", "充值"],
                            selectedMode: false,
                        },
                        toolbox: {
                            show: true,
                            feature: {
                                dataView: {
                                    show: false,
                                    readOnly: true
                                },
                                magicType: {
                                    show: false,
                                    type: ["line", "bar", "stack", "tiled"]
                                },
                                restore: {
                                    show: true
                                },
                                saveAsImage: {
                                    show: true
                                },
                                mark: {
                                    show: false
                                }
                            }
                        },
                        calculable: false,
                        xAxis: [
                            {
                                type: "category",
                                boundaryGap: false,
                                data: ["周一", "周二", "周三", "周四", "周五", "周六", "周日"]
                            }
                        ],
                        yAxis: [
                            {
                                type: "value"
                            }
                        ],
                        grid: {
                            x2: 30,
                            x: 50
                        },
                        series: [
                            {
                                name: "会员",
                                type: "line",
                                smooth: true,
                                itemStyle: {
                                    normal: {
                                        areaStyle: {
                                            type: "default"
                                        }
                                    }
                                },
                                data: [{{ implode($data->user, ',') }}]
                            },
                            {
                                name: "广告",
                                type: "line",
                                smooth: true,
                                itemStyle: {
                                    normal: {
                                        areaStyle: {
                                            type: "default"
                                        }
                                    }
                                },
                                data: [{{ implode($data->ad, ',') }}]
                            },
                            {
                                name: "评论",
                                type: "line",
                                smooth: true,
                                itemStyle: {
                                    normal: {
                                        areaStyle: {
                                            type: "default"
                                        },
                                        color: "rgb(110, 211, 199)"
                                    }
                                },
                                data: [{{ implode($data->recharge, ',') }}]
                            }
                        ]
                    }
                );
            }
        );
        $(window).resize(function(){
            myChart.resize();
        })
    });
</script>
</body>
</html>
