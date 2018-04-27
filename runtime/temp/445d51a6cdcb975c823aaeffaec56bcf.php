<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:75:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\index\index.html";i:1524235159;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\header.html";i:1523713704;s:74:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\nav.html";i:1524035185;s:76:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\right.html";i:1524235390;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\footer.html";i:1524228399;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $seo['title']?></title>
<meta name="keywords" content="<?php echo $seo['keywords']; ?>" />
<meta name="description" content="<?php echo $seo['description']; ?>" />
<link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">
<link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.mobile.css"  media="all">
<link rel="stylesheet" href="__PUBLIC__/static/blog/css/style.css?=<?php echo $config['qf_blog_version']; ?>"  media="all">
<link href="__PUBLIC__/static/common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<?php echo $footer['sys_footer']; ?>
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
<!--首页轮播-->
<div class="layui-container qf_blog_index_carousel">
    <div class="layui-row">
        <div class="layui-col-md8  qf_blog_index_carousel_left" >
           <div class="layui-carousel" id="qf_blog_index_carousel" lay-filter="qf_blog_index_carousel" >
                <div carousel-item="" style="border-radius:10px;margin-top: 10px;">
                    <?php foreach($banner as $k=>$v){?>
                    <div  class="carousel"><img src="<?php echo $v['ban_img']; ?>"></div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <!-- 网站公告提示 -->
    <div class="home-tips shadow">
                <i style="float:left;line-height:17px;" class="fa fa-volume-up"></i>
                <div class="home-tips-container">
                    <?php if(is_array($tip) || $tip instanceof \think\Collection || $tip instanceof \think\Paginator): $i = 0; $__LIST__ = $tip;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <span style="color: #009688"><?php echo $vo['content']; ?></span>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <span style="color: red">如果你觉得网站做得还不错，来Fly社区点个赞吧！<a href="http://fly.layui.com/case/2018/" target="_blank" style="color:#01AAED">点我前往</a></span>
                </div>
    </div>
</div>
<div class="layui-container qf_blog_index_content">
    <div class="layui-row">
        <div class="layui-col-md8 qf_blog_index_content_left" >
            <blockquote class="layui-elem-quote" style="background-color: white">
              <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>文章列表</cite></a>
                  <?php if((!empty($article_search))): ?>
                    <a><cite>输入搜索</cite></a>
                  <?php endif; if((!empty($article_tag))): ?>
                    <a><cite>标签搜索</cite></a>
                  <?php endif; if((!empty($article_type_id))): ?>
                    <a><cite>类型搜索</cite></a>
                  <?php endif; if((!empty($article_date))): ?>
                    <a><cite>归档搜索</cite></a>
                  <?php endif; ?>
              </span>
            </blockquote>
            <!--内容-->
            <ul class="blog_list">
                <?php if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li class="blog_pic" style="border-radius:10px">
                    <button class="layui-btn layui-btn-mini layui-btn-warm reprint"><?php echo $v['reprint_name']; ?></button>
                    <h2 class="title"><a href="<?php echo url('index/Index/detail',['id'=>$v['id']]); ?>"><?php echo $v['title']; ?></a></h2>
                        <div class="desc" >
                       <?php echo $v['remark']; ?>
                    </div>
                    <div class="data">
                        <span><i class="layui-icon">&#xe637;</i> <?php echo $v['tran_time']; ?></span>
                        <span><i class="layui-icon">&#xe612;</i> <?php echo $v['author']; ?></span>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <!--分页-->
            <div class="qf_blog_index_page" id="qf_blog_index_page"></div>
        </div>

        <!--引入右边公用文件-->
        <div class="layui-col-md4 qf_blog_content_right">
        <div class="layui-col-md12 qf_blog_index_carousel_right_my">
            <h2>我的名片</h2>
            <ul>
                <li>网名 : 旧时光 / 琪哥</li>
                <li>职业 : 软件工程师</li>
                <li>邮箱 : 1040657944@qq.com</li>
                <li>爱好 : 爬山、摄影、看书</li>
                <li>座右铭 : 虽然过去不能改变，未来可以。</li>
            </ul>
        </div>
    <div class="layui-col-md12 qf_blog_content_right_tag" >
        <h2>文章标签</h2>
        <?php if(is_array($article_tag_list) || $article_tag_list instanceof \think\Collection || $article_tag_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <a href="<?php echo url('Index/index/index',['tag'=>$v['id']]); ?>" ><span  class="layui-badge  <?php echo $v['css']; ?>"><?php echo $v['name']; ?></span></a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="layui-col-md12 qf_blog_content_right_file" >
        <h2>文章归档</h2>
        <ol>
            <?php if(is_array($article_date_list) || $article_date_list instanceof \think\Collection || $article_date_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_date_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <li><a href="<?php echo url('Index/index/index',['date'=>$v['date']]); ?>" title="<?php echo $v['date_show']; ?>"><?php echo $v['date_show']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ol>
    </div>
    <div class="layui-col-md12 qf_blog_content_right_hot_article" >
        <h2>热门文章</h2>
        <ol>
            <?php if(is_array($article_hot_list) || $article_hot_list instanceof \think\Collection || $article_hot_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_hot_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <li><a href="<?php echo url('Index/index/detail',['id'=>$v['id']]); ?>"><?php echo $v['title']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ol>
    </div>
    <div class="layui-col-md12 qf_blog_content_right_link" >
        <h2>友情链接</h2>
        <ol>
            <li><a href="http://www.layui.com" target="_blank">Layui</a></li>
            <li><a href="http://www.thinkphp.cn" target="_blank">Thinkphp</a></li>
            <li><a href="http://shutianshu.com/" target="_blank">数天数博客</a></li>
        </ol>
    </div>
    <div class="layui-col-md12 qf_blog_content_right_count" >
        <h2>网站统计</h2>
        <ul>
            <li>建站日期 : <?php echo $system['create_date']; ?></li>
            <li>文章总数 : <?php echo $system['article_count']; ?> 条</li>
            <li>运行天数 : <?php echo $system['diff_date']; ?> 天</li>
            <li>标签总数 : <?php echo $system['tag_count']; ?> 个</li>
            <li>最后更新 : <?php echo $system['last_update']; ?></li>
            <li></li>
        </ul>
    </div>

</div>

    </div>

</div>







<!--遮罩层-->
<div class="qf_blog_mask  layui-hide">
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





<script>
    layui.use('laypage', function () {
        var laypage = layui.laypage
            , $ = layui.jquery;
        laypage.render({
            elem: 'qf_blog_index_page' //注意，这里的 test1 是 ID，不用加 # 号
             ,limit:<?php echo $page['pageSize']; ?>
            ,count: <?php echo $page['pageCount']; ?>    //数据总数，从服务端得到
            ,curr: <?php echo $page['pageIndex']; ?>
            ,jump: function(obj, first){
            //首次不执行
            if(!first){
                var url =   window.location.pathname;
                var article_search = document.getElementById("article_search").value;
                if(url.indexOf("search")>-1){
                        window.location.href = "/search/"+article_search+"/page/"+obj.curr;
                }else if (url.indexOf("tag")>-1){
                    var position = url.indexOf("tag");
                    var  str = url.substring(position);
                    var str_arr = str.split("/"); //字符分割
                        window.location.href = "/index.php/tag/"+str_arr[1]+"/page/"+obj.curr;
                }else if (url.indexOf("typeid")>-1){
                    var position = url.indexOf("typeid");
                    var  str = url.substring(position);
                    var str_arr = str.split("/"); //字符分割
                    window.location.href = "/index.php/typeid/"+str_arr[1]+"/page/"+obj.curr;
                }else if (url.indexOf("date")>-1){
                    var position = url.indexOf("date");
                    var  str = url.substring(position);
                    var str_arr = str.split("/"); //字符分割
                    window.location.href = "/date/"+str_arr[1]+"/page/"+obj.curr;
                }else{
                    window.location.href = "/page/"+obj.curr;
                }
            }
        }
        });
        
    });
</script>


</body>
</html>