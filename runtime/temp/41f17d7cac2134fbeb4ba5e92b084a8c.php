<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\index\index.html";i:1523372196;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\header.html";i:1509346268;s:74:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\top.html";i:1524035240;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>旧时光博客管理系统</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<!--<link rel="icon" href="favicon.ico">-->
<link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css" media="all" />
<link rel="stylesheet" href="__PUBLIC__/static/admin/css/main.css?qf_blog_admin_v=<?php echo $config['qf_blog_version']; ?>" media="all" />
<link rel="stylesheet" href="__PUBLIC__/static/admin/css/style.css?qf_blog_admin_v=<?php echo $config['qf_blog_version']; ?>" media="all" />


<link rel="stylesheet" href="//at.alicdn.com/t/font_tnyc012u2rlwstt9.css" media="all" />
<body class="main_body">
<!--存储当前登录用户的ID-->
 <input style="display: none;" value="<?php echo \think\Session::get('qf_admin.id'); ?>" id="qf_admin_id" />
	<div class="layui-layout layui-layout-admin">
		<!--加载中间部分网页内容-->
		<!-- 顶部 -->
<div class="layui-header header">
    <div class="layui-main">
        <a href="#" class="logo">旧时光</a>
        <!-- 显示/隐藏菜单 -->
        <a href="javascript:;" class="iconfont hideMenu icon-menu1"></a>
        <!-- 顶部右侧菜单 -->
        <ul class="layui-nav top_menu">
            <li class="layui-nav-item" mobile>
                <a href="javascript:;" data-url="page/user/changePwd.html">
                    <i class="iconfont icon-shezhi1" data-icon="icon-shzhi1"></i><cite>设置</cite></a>
            </li>
            <li class="layui-nav-item" mobile>
                <a href="<?php echo url('admin/Login/loginOut'); ?>"><i class="iconfont icon-loginout"></i> 退出</a>
            </li>
            <li class="layui-nav-item" pc>
                <a href="javascript:;">
                    <img src="__PUBLIC__/static/admin/images/userface4.jpg" class="layui-circle" width="35" height="35">
                    <cite>管理员</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" data-url="<?php echo url('Admin/updatePassword'); ?>"><i class="iconfont icon-shezhi1" data-icon="icon-shezhi1"></i><cite>修改密码</cite></a></dd>
                    <dd><a href="javascript:;" class="changeSkin"><i class="iconfont icon-huanfu"></i><cite>更换皮肤</cite></a></dd>
                    <dd id="admin_loginOut"><a href="javascript:;" ><i class="iconfont icon-loginout"></i><cite>退出</cite></a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>

<!-- 左侧导航 -->
<div class="layui-side layui-bg-black">
    <div class="user-photo">
        <a class="img" title="我的头像" ><img src="__PUBLIC__/static/admin/images/userface4.jpg"></a>
        <p>用户名 : <span class="userName" style="font-size: 14px;"><?php echo \think\Session::get('qf_blog_admin.username'); ?></span></p>
    </div>
    <div class="navBar layui-side-scroll"></div>
</div>

<!-- 右侧内容 -->
<div class="layui-body layui-form">
    <div class="layui-tab marg0" lay-filter="bodyTab" id="top_tabs_box">
        <ul class="layui-tab-title top_tab" id="top_tabs">
            <li class="layui-this" lay-id=""><i class="iconfont icon-computer"></i> <cite>后台首页</cite></li>
        </ul>
        <ul class="layui-nav closeBox">
            <li class="layui-nav-item">
                <a href="javascript:;"><i class="iconfont icon-caozuo"></i> 页面操作</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" class="closePageOther"><i class="iconfont icon-prohibit"></i> 关闭其他</a></dd>
                    <dd><a href="javascript:;" class="closePageAll"><i class="iconfont icon-guanbi"></i> 关闭全部</a></dd>
                </dl>
            </li>
        </ul>
        <div class="layui-tab-content clildFrame">
            <div class="layui-tab-item layui-show">
                <iframe src="<?php echo url('Index/main'); ?>"></iframe>
            </div>
        </div>
    </div>
</div>


<!-- 底部 -->
<div class="layui-footer footer">
    <p>copyright @2017 时光博客后台管理　　</p>
</div>

<!-- 移动导航 -->
<div class="site-tree-mobile layui-hide"><i class="layui-icon">&#xe602;</i></div>
<div class="site-mobile-shade"></div>


<script type="text/javascript">


</script>
	</div>
	<!--加载底部-->
	<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>


 <script type="text/javascript">
     layui.config({
         base: '__STATIC__/admin/js/'
     }).use(['base'],function(){
        var base =  layui.base,
			$ =layui.jquery;
        base.init();



	 });
 </script>

</body>
</html>


