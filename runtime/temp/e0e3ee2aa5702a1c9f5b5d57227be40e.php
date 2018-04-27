<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\index\about.html";i:1523268698;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\header.html";i:1523713704;s:74:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\nav.html";i:1524035185;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\footer.html";i:1523713644;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>关于页面</title>
<meta name="keywords" content="<?php echo $seo['keywords']; ?>" />
<meta name="description" content="<?php echo $seo['description']; ?>" />
<link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">
<link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.mobile.css"  media="all">
<link rel="stylesheet" href="__PUBLIC__/static/blog/css/style.css?=<?php echo $config['qf_blog_version']; ?>"  media="all">
<link href="__PUBLIC__/static/common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<?php echo $footer['sys_footer']; ?>
    <link rel="stylesheet" href="__PUBLIC__/static/blog/css/about.css">
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
<div class="layui-container qf_blog_about_content">
    <div class="layui-row">
            <!-- 这个一般才是真正的主体内容 -->
            <div class="blog-container">
                <blockquote class="layui-elem-quote" style="background-color: white">
            <span class="layui-breadcrumb">
            <a><cite>首页</cite></a>
          <a><cite>关于</cite></a>
           </span>
                </blockquote>
                <div class="blog-main">
                    <div class="layui-tab layui-tab-brief shadow" lay-filter="tabAbout">
                        <ul class="layui-tab-title">
                            <li lay-id="1" class="layui-this">关于博客</li>
                            <li lay-id="2">关于作者</li>
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item layui-show">
                                <div class="aboutinfo">
                                    <div class="aboutinfo-figure">
                                        <img src="__PUBLIC__/static/blog/images/logo.png" alt="zuoqy博客" width="120px" height="120px"/>
                                    </div>
                                    <p class="aboutinfo-introduce">一个PHP程序员的个人博客，记录博主学习和成长之路，分享生活点点滴滴</p>
                                    <p class="aboutinfo-location"><i class="fa fa-link"></i>&nbsp;&nbsp;<a target="_blank" href="https://www.zqfirst.top">www.zqfirst.top</a></p>
                                    <hr />
                                    <div class="aboutinfo-contact">
                                        <a title="网站首页" href="index.html"><i class="fa fa-home fa-2x" style="font-size:2.5em;position:relative;top:3px"></i></a>
                                        <a title="留言" href="message.html"><i class="fa fa-commenting fa-2x"></i></a>
                                        <a title="古今" href="said.html"><i class="fa fa-hourglass-half fa-2x"></i></a>
                                        <!--<a title="点点滴滴" href="timeline.html"><i class="fa fa-hourglass-half fa-2x"></i></a>-->
                                    </div>

                                    <fieldset class="layui-elem-field layui-field-title">
                                        <legend>简介</legend>
                                        <div class="layui-field-box aboutinfo-abstract">
                                            <p style="text-align:center;">时光博客是一个由PHP开发的个人博客网站，诞生于2017年9月16日，迄今为止经历了两次大改，暂且称为时光博客3.0。</p>
                                            <h1>第一个版本</h1>
                                            <p>诞生的版本，采用PHP mvc作为后台框架，前端几乎自己手写，用了纯DIV布局！起初并没有注意美工，只打算完成基本的功能，故视觉体验是比较差的。</p>
                                            <h1>第二个版本</h1>
                                            <p>发现了Layui前端框架！Layui简洁的风格让我很喜欢,于是决定给我的网站改版!此次改版从里到外几乎全部更新。后台所有的设计,全部重新推翻重新,才有了第二这个版本。样式显然比之前高出很多</p>
                                            <h1>当前版本</h1>
                                            <p>发布了这个版本，首先得感谢Layui作者贤心,AND晴枫博客的创始人ANDzuoqy博客的创始人,这个版本是在晴枫博客的基础之上进行改版，融合了第二个版本和zuoqy博客的样式。才出现的第三个版本。</p>
                                            <h1 style="text-align:center;">The End</h1>
                                        </div>
                                    </fieldset>
                                </div>
                            </div><!--关于网站End-->
                            <div class="layui-tab-item">
                                <div class="aboutinfo">
                                    <div class="aboutinfo-figure">
                                        <img src="__PUBLIC__/static/blog/images/face.jpg" alt="Absolutely" width="100px" height="100px"/>
                                    </div>
                                    <p class="aboutinfo-nickname">张琪</p>
                                    <p class="aboutinfo-introduce">一枚90后程序员，PHP开发工程师，主攻后端，略懂Web前端</p>
                                    <p class="aboutinfo-location"><i class="fa fa-location-arrow"></i>&nbsp;北京</p>
                                    <hr />
                                    <div class="aboutinfo-contact">
                                        <a target="_blank" title="QQ交流" href="http://sighttp.qq.com/msgrd?v=1&uin=1040657944"><i class="fa fa-qq fa-2x"></i></a>
                                        <a target="_blank" title="给我写信" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=Lh8eGh4YGxkXGhpuX18ATUFD"><i class="fa fa-envelope fa-2x"></i></a>
                                        <a target="_blank" title="新浪微博" href="https://weibo.com/u/5831076839/h"><i class="fa fa-weibo fa-2x"></i></a>
                                        <a target="_blank" title="码云" href="https://github.com/zq1040657944"><i class="fa fa-soundcloud fa-2x"></i></a>
                                    </div>
                                    <fieldset class="layui-elem-field layui-field-title">
                                        <legend>简介</legend>
                                        <div class="layui-field-box aboutinfo-abstract abstract-bloger">
                                            <p style="text-align:center;">张琪，时光博客创始人,河南驻马店人,目前是一个开发者，从事PHP开发。</p>
                                            <h1>个人信息</h1>
                                            <p>暂无</p>
                                            <h1>个人介绍</h1>
                                            <p>暂无</p>
                                            <h1>未来</h1>
                                            <p>还没想好</p>
                                            <h1 style="text-align:center;">The End</h1>
                                        </div>
                                    </fieldset>
                                </div>
                            </div><!--关于作者End-->
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

    </div>
</div>

<!--引入底部文件-->
<footer class="blog-footer">
    <ul>
        <li class="text-center">
            <b style="color: #ff69b4";><?php echo $footer['footer_text']; ?></b>
        </li>
        <li class="text-center"><?php echo $footer['sys_copy']; ?> & 版权所有 ICP证：<?php echo $footer['sys_icp']; ?> 联系邮箱：<a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=Lh8eGh4YGxkXGhpuX18ATUFD" style="text-decoration:none;">1040657944@qq.com</a>
            <a href="admin/login.html" target="_blank">管理登录</a>
        </li>
    </ul>
</footer>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>
<script src="__PUBLIC__/static/blog/js/base.js?=<?php echo $config['qf_blog_version']; ?>" charset="utf-8"></script>




<div class="qf_blog_mask  layui-hide">
</div>






</body>
</html>