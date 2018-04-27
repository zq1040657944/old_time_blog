<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\user\reg.html";i:1523364569;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\header.html";i:1523325883;s:74:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\nav.html";i:1523268584;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\footer.html";i:1523325870;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>注册页面</title>
<link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">
<link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.mobile.css"  media="all">
<link rel="stylesheet" href="__PUBLIC__/static/blog/css/style.css?=<?php echo $config['qf_blog_version']; ?>"  media="all">
<link href="__PUBLIC__/static/common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?ebde62a3c8d8ba0c9aa5007b88c9b6d0";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>


<!--引入nav文件-->
<!--导航-->
<div class="qf_blog_header">
    <div class="layui-container">
        <div class="layui-row">
            <div class="layui-col-md2 qf_blog_nav_logo">
                <a href="<?php echo url('index/Index/index'); ?>"><img  src="__PUBLIC__/static/blog/images/logo.png"></a>
            </div>
            <i class="layui-icon qf_blog_nav_more" style="display: none;">&#xe671;</i>
            <div class="layui-col-md7 qf_blog_nav">
                <ul class="layui-nav">
                    <li class="layui-nav-item"><a href="<?php echo url('index/Index/index'); ?>">首页</a></li>
                    <?php if(is_array($article_type_list) || $article_type_list instanceof \think\Collection || $article_type_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li class="layui-nav-item">
                        <a href="javascript:;"><?php echo $v['title']; ?></a>
                        <?php if($v['children'] != null): ?>
                        <dl class="layui-nav-child">
                            <?php if(is_array($v['children']) || $v['children'] instanceof \think\Collection || $v['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
                            <dd><a href="<?php echo url('index/Index/index',['typeid'=>$c['id']]); ?>" style="text-align: center;"><?php echo $c['title']; ?></a></dd>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </dl>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <li class="layui-nav-item"><a href="<?php echo url('index/Said/index'); ?>">古今</a></li>
                    <li class="layui-nav-item"><a href="<?php echo url('index/Message/index'); ?>">留言</a></li>
                    <li class="layui-nav-item"><a href="<?php echo url('index/Index/about'); ?>">关于</a></li>
                </ul>
            </div>
            <div class="layui-col-md2 qf_blog_nav_right">
                <?php if(empty($user) || (($user instanceof \think\Collection || $user instanceof \think\Paginator ) && $user->isEmpty())): ?>
                <a onclick="layer.msg('正在登陆', {icon:16, shade: 0.1, time:0})"  href="<?php echo url('index/User/login'); ?>"  class="login">登陆</a>
                <?php else: ?>
                <div class="user_id" style="display: none;"><?php echo $user['id']; ?></div>
              <img class=""  src="<?php echo $user['headurl']; ?>">
              <!--<a   href="javascript:void(0);" class="loginout"><?php echo $user['nickname']; ?></a>-->
                <ul class="layui-nav qf_blog_my_info" >
                <li class="layui-nav-item">
                    <a   href="javascript:void(0);" class="nickname" title="<?php echo $user['nickname']; ?>" > <?php if(empty($user['nickname']) || (($user['nickname'] instanceof \think\Collection || $user['nickname'] instanceof \think\Paginator ) && $user['nickname']->isEmpty())): ?> NULL <?php else: ?> <?php echo $user['nickname']; endif; ?></a>
                    <dl class="layui-nav-child">
                       <!-- <dd><a href="javascript:void(0);" class="loginout" style="text-align: center;">主页</a></dd>-->
                        <?php if(empty($user['email'])): ?>
                      <dd><a href="javascript:void(0);" class="bind_email" style="text-align: center;">绑定邮箱</a></dd>
                        <?php elseif(empty($user['qq_openid'])): ?>
                        <dd><a href="javascript:void(0);" class="bind_qq" style="text-align: center;">绑定QQ</a></dd>
                        <?php endif; ?>
                        <dd><a href="javascript:void(0);" class="loginout" style="text-align: center;">退出</a></dd>
                    </dl>
                </li>
                </ul>
                <?php endif; ?>
            </div>
            <!--<div class="layui-col-md1 qf_blog_nav_search">-->
                <!--搜索-->
            <!--</div>-->
            <!--<div class="qf_blog_nav_search_show layui-hide" >-->
                <!--<form class="layui-form">-->
                    <!--<input id="article_search" style="width: 240px; height: 36px;" type="text" name="search"  <?php if((!empty($article_search))): ?>  value="<?php echo $article_search; ?>" <?php endif; ?>   placeholder="请输入关键字" class="layui-input">-->
                <!--</form>-->
            <!--</div>-->
        </div>
    </div>
</div>



  <div style="display: none;" id="bind_email_view">
          <div class="layui-field-box">
              <form method="post" class="layui-form" action="" >
                  <div class="layui-form-item">
                      <label style="width:40px; text-align: left;" class="layui-form-label">邮箱 *</label>
                      <div class="layui-input-block"  style="margin-left: 80px;" >
                          <input type="email" name="email" lay-verify="email"  autocomplete="off" placeholder="请输入绑定的邮箱" class="layui-input">
                      </div>
                  </div>
                  <div class="layui-form-item" style="">
                      <label style="width:40px;text-align: right;" class="layui-form-label">密码 *</label>
                      <div class="layui-input-block"  style="margin-left: 80px; ">
                          <input  type="password" name="bind_user_password" lay-verify="bind_user_password"   autocomplete="off" placeholder="用于登录的密码" class="layui-input">
                      </div>
                  </div>
                  <div class="layui-form-item" >
                      <div class="layui-input-block">
                          <button style=" margin-left: 20%; " class="layui-btn" lay-submit="" lay-filter="bind_email">提交</button>
                      </div>
                  </div>
              </form>
          </div>

  </div>


<div class="layui-container qf_blog_reg">
  <div class="fly-panel fly-panel-user" >
    <div class="layui-tab layui-tab-brief">
      <ul class="layui-tab-title" style="text-align: center;">
        <li><a href="login.html">登陆</a></li>
        <li class="layui-this">注册</li>
      </ul>
      <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0; text-align: center;">
        <div class="layui-tab-item layui-show">
          <div class="layui-form layui-form-pane">
            <form method="post">
              <!--表单令牌-->
              <?php echo token(); ?>
              <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">邮箱</label>
                <div class="layui-input-inline">
                  <input type="text" id="L_email" name="email"  lay-verify="email" autocomplete="off" class="layui-input" placeholder="请填写邮箱账号">
                </div>
               <div class="layui-form-mid layui-word-aux">将会成为您唯一的登陆名</div>
              </div>
              <div class="layui-form-item">
                <label for="L_nickname" class="layui-form-label">昵称</label>
                <div class="layui-input-inline">
                  <input type="text" id="L_nickname" name="nickname"  lay-verify="user_nikcname" autocomplete="off" class="layui-input" placeholder="请填写昵称">
                </div>
              </div>
              <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">密码</label>
                <div class="layui-input-inline">
                  <input type="password" id="L_pass" name="password"  lay-verify="user_password" autocomplete="off" class="layui-input" placeholder="请填写密码">
                </div>
             <!--   <div class="layui-form-mid layui-word-aux">6到16个字符</div>-->
              </div>
              <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">确认密码</label>
                <div class="layui-input-inline">
                  <input type="password" id="L_repass" name="repass"  lay-verify="user_repassword" autocomplete="off" class="layui-input"placeholder="请重复填写密码">
                </div>
              </div>
              <div class="layui-form-item">
                <label for="L_vercode" class="layui-form-label">验证码</label>
                <div class="layui-input-inline">
                  <input type="text" id="L_vercode" name="code"  lay-verify="user_code" placeholder="请输入验证码" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid">
                     <img src="<?php echo url('checkVerify'); ?>" onclick="javascript:this.src='<?php echo url('User/checkVerify'); ?>?tm='+Math.random();"
                          style="cursor: pointer;width: 120px; height: 35px; margin-top: -5px;"/>
                </div>
              </div>
              <div class="layui-form-item qf_blog_reg_submit">
                <button class="layui-btn" lay-filter="reg_user" lay-submit="">立即注册</button>
              </div>
              <div class="layui-form-item qf_blog_reg_app">
                <span>使用快捷账号登入</span>
                <a href="<?php echo url('index/User/login_qq'); ?>"  onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.5, time:500})" class="iconfont icon-qq" title="QQ登入"></a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--引入底部文件-->
<footer class="blog-footer">
    <ul>
        <li class="text-center">
            <b style="color: #ff69b4";>三更灯火五更鸡，正是男儿读书时，黑发不知勤学早，白发方悔读书迟。</b>
        </li>
        <li class="text-center">© 2016 - 2018 旧时光 & 版权所有 ICP证：京ICP备17046230号-2 联系邮箱：<a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=Lh8eGh4YGxkXGhpuX18ATUFD" style="text-decoration:none;">1040657944@qq.com</a>
            <a href="admin/login.html" target="_blank">管理登录</a>
        </li>
    </ul>
</footer>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>
<script src="__PUBLIC__/static/blog/js/base.js?=<?php echo $config['qf_blog_version']; ?>" charset="utf-8"></script>






</body>
</html>