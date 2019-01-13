<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/layui/css/layui.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/admin.css')}}"/>
</head>

<body>
<div class="layui-tab page-content-wrap">
    <ul class="layui-tab-title">
        <li class="layui-this">站点配置</li>
        <li>SEO配置</li>
        <li>邮箱配置</li>
        <li>评论设置</li>
        <li>合作伙伴设置</li>
        <li>客服设置</li>
    </ul>
    <div class="layui-tab-content">
        <!--站点配置-->
        <div class="layui-tab-item layui-show">
            <form class="layui-form" style="width: 90%;padding-top: 20px;">
                <div class="layui-form-item">
                    <label class="layui-form-label">网站名称：</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" autocomplete="off" class="layui-input" value="{{ $config['name'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站网址：</label>
                    <div class="layui-input-block">
                        <input type="text" name="url" autocomplete="off" class="layui-input" value="{{ $config['url'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站图标：</label>
                    <div class="layui-input-block">
                        <input type="file" name="file" class="layui-upload-file">
                    </div>
                </div>
                <div class="layui-form-item" style="@if (empty($config['avatar'])) display: block; @endif" >
                    <label class="layui-form-label"></label>
                    <img src="{{ Storage::disk('public')->url($config['avatar']) }}" alt="" style="max-height: 100px;">
                    <input type="hidden" name="avatar" value="{{ $config['avatar'] }}">
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">备案信息：</label>
                    <div class="layui-input-block">
                        <input type="text" name="filing" required lay-verify="required" placeholder="请输入备案信息" autocomplete="off" class="layui-input" value="{{ $config['filing'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">版权信息：</label>
                    <div class="layui-input-block">
                        <input type="text" name="copyright" required lay-verify="required" placeholder="请输入版权信息" autocomplete="off" class="layui-input" value="{{ $config['copyright'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="siteInfo">立即提交</button>
                    </div>
                </div>
            </form>
        </div>
        <!--SEO配置-->ß
        <div class="layui-tab-item">
            <form class="layui-form" style="width: 90%;padding-top: 20px;">
                <div class="layui-form-item">
                    <label class="layui-form-label">SEO标题：</label>
                    <div class="layui-input-block">
                        <input type="text" name="seo_title" placeholder="请输入seo标题" autocomplete="off" class="layui-input" value="{{ $config->seo_title }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">关键字：</label>
                    <div class="layui-input-block">
                        <input type="text" name="seo_keyword" placeholder="请输入seo关键字" autocomplete="off" class="layui-input" value="{{ $config->seo_keyword }}">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">描述：</label>
                    <div class="layui-input-block">
                        <textarea name="seo_description" placeholder="请输入seo描述" class="layui-textarea">{{ $config->seo_description }}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="seoInfo">立即提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script>
    //Demo
    layui.use(['form', 'element', 'upload', 'jquery'], function() {
        var form = layui.form(),
            element = layui.element(),
            $ = layui.jquery;
        form.render();
        //监听信息提交
        form.on('submit(siteInfo)', function(data) {
            var json_data=(data.field);
            $.ajax({
                async:false,
                type: "POST",
                url: "{{ route('admin.config.store') }}",
                data: json_data,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data) {
                    layer.alert(data.msg);
                },
                error: function (res) {
                    if (res.responseJSON) {
                        layer.msg(Object.values(res.responseJSON.errors)[0][0]);
                    } else {
                        $(location).attr('href', "{{ route('home') }}");
                    }
                }
            });
            return false;
        });
        //监听seo提交
        form.on('submit(seoInfo)', function(data) {
            var json_data=(data.field);
            $.ajax({
                async:false,
                type: "POST",
                url: "{{ route('admin.config.store') }}",
                data: json_data,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data) {
                    layer.alert(data.msg);
                },
                error: function (res) {
                    if (res.responseJSON) {
                        layer.msg(Object.values(res.responseJSON.errors)[0][0]);
                    } else {
                        $(location).attr('href', "{{ route('home') }}");
                    }
                }
            });
            return false;
            return false;
        });
        //监听seo提交
        form.on('submit(emailInfo)', function(data) {
            layer.msg(JSON.stringify(data.field));
            return false;
        });
        //监听评论提交
        form.on('submit(commentInfo)', function(data) {
            layer.msg(JSON.stringify(data.field));
            return false;
        });
        layui.upload({
            url: '{{ route('admin.config.upload') }}',
            success: function(res) {
                var obj = $('input[name="avatar"]');
                obj.val(res.file);
                obj.siblings("img").attr('src',res.url);
                obj.parent().show();
            }
        });
    });
</script>
</body>

</html>