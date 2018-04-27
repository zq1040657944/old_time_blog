<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\login\index.html";i:1523371785;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>旧时光cms管后台</title>
    <link rel="stylesheet" href="__PUBLIC__/static/admin/css/login.css">
    <link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">
</head>


<style>
    .blog-login-bg {
        background-image: url("/static/admin/images/login.jpg");
    }
    .blog-login-box {
        width: 450px;
        height: 320px;
        margin: 10% auto;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        color: aliceblue;
    }

    .blog-login-box header {
        height: 39px;
        padding: 10px;
        border-bottom: 1px solid aliceblue;
    }

    .blog-login-box header h1 {
        text-align: center;
        font-size: 25px;
        line-height: 40px;
    }

    .blog-login-box .blog-login-main {
        height: 185px;
        padding: 30px 90px 0;
    }

    .blog-login-main .layui-form-item {
        position: relative;
    }

    .blog-login-main .layui-form-item .blog-login-icon {
        position: absolute;
        color: #cccccc;
        top: 10px;
        left: 10px;
    }

    .blog-login-main .layui-form-item input {
        padding-left: 34px;
    }

    .blog-login-box footer {
        height: 35px;
        padding: 10px 10px 0 10px;
    }

    .blog-login-box footer p {
        line-height: 35px;
        text-align: center;
    }

    .blog-pull-left {
        float: left !important;
    }

    .blog-pull-right {
      /*  float: right !important;*/
        text-align: center;
        margin-top: 20px;

    }

    .blog-clear {
        clear: both;
    }

    .blog-login-remember {
        line-height: 38px;
    }

    .blog-login-remember .layui-form-switch {
        margin-top: 0px;
    }

    .blog-login-code-box {
        position: relative;
        padding:10px;
    }
    .blog-login-code-box input{
        position: absolute;
        width: 100px;
    }
    .blog-login-code-box img{
        cursor: pointer;
        position: absolute;
        left: 115px;
        height: 38px;
    }
</style>

<body class="blog-login-bg">
<div class="blog-login-box">
    <header>
        <h1><a href="">旧时光博客</a></h1>
    </header>
    <div class="blog-login-main">
        <form action="http://beginner.zhengjinfan.cn/manage/login" class="layui-form" method="post">
            <!--表单令牌-->
            <?php echo token(); ?>
            <div class="layui-form-item">
            <label class="blog-login-icon">
                <i class="layui-icon"></i>
            </label>
            <input type="text" name="username" lay-verify="username" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
        </div>
            <div class="layui-form-item">
                <label class="blog-login-icon">
                    <i class="layui-icon"></i>
                </label>
                <input type="password" name="password" lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
            </div>
            <div class="layui-form-item">
           <input style="width: 50%;" type="text" name="code"  lay-verify="code" autocomplete="off" placeholder="验证码" class="layui-input">
                <img src="<?php echo url('checkVerify'); ?>" onclick="javascript:this.src='<?php echo url('Login/checkVerify'); ?>?tm='+Math.random();"
                     style="float:right; margin-top:-38px;cursor: pointer;width: 120px;"/>
            </div>
            <div class="layui-form-item">
                <div class="blog-pull-right">
                    <button class="layui-btn layui-btn-primary" lay-submit="" lay-filter="login">
                        <i class="layui-icon"></i> 登录
                    </button>
                </div>
                <div class="blog-clear"></div>
            </div>
        </form>
    </div>
</div>
<script type="text/html" id="code-temp">
    <div class="blog-login-code-box">
        <input type="text" class="layui-input" id="code" />
        <img id="valiCode" src="/manage/validatecode?v=636149007407713309" alt="验证码" />
    </div>
</script>
<script src="__STATIC__/common/layui/layui.js" charset="utf-8"></script>
<script>
    var $,layer;
    layui.use(['layer', 'form'], function () {
            layer = layui.layer,
             $ = layui.jquery,
             form = layui.form;
        form.verify({
            username: function (value) {
                if (value === '')
                    return '请先输入用户名。<img src="__PUBLIC__/static/common/layui/images/face/4.gif" alt="[可怜]">';
            },
            password: function (value) {
                if (value === '')
                    return '请输入用户名密码。<img src="__PUBLIC__/static/common/layui/images/face/4.gif" alt="[可怜]">';
            },
            code: function (value) {
                if (value === '')
                    return '请先输入验证码。<img src="__PUBLIC__/static/common/layui/images/face/4.gif" alt="[可怜]">';
            }
        });
        var errorCount = 0;
        form.on('submit(login)', function (data) {
            if (errorCount > 5) {
            }else{
                submit($,data.field);
            }
            return false;
        });
    });



    /**
     * 提交方法
     * @param $
     * @param params
     */
    function submit($,params)
    {
        $.post("<?php echo url('Login/login'); ?>",params,function (res) {
                if (res.code ==1)
                {
                    layer.msg(res.msg,{icon:1,time:1000},function (index) {
                        layer.close(index);
                        window.location.href = res.url;
                    });
                }
            else
            {
                layer.msg(res.msg,{icon:2,time:2000});
            }
        });
    }
</script>

</body>

</html>




