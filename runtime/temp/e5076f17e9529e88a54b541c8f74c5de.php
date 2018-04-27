<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:76:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\index\detail.html";i:1523265358;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\header.html";i:1523713704;s:74:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\nav.html";i:1524035185;s:76:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\right.html";i:1523264482;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/index\view\public\footer.html";i:1524228399;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>文章详情</title>
<meta name="keywords" content="<?php echo $seo['keywords']; ?>" />
<meta name="description" content="<?php echo $seo['description']; ?>" />
<link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">
<link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.mobile.css"  media="all">
<link rel="stylesheet" href="__PUBLIC__/static/blog/css/style.css?=<?php echo $config['qf_blog_version']; ?>"  media="all">
<link href="__PUBLIC__/static/common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<?php echo $footer['sys_footer']; ?>
    <link rel="stylesheet" href="__PUBLIC__/static/common/edit/highlight/default.css"  media="all">
    <script type="text/javascript" src="__PUBLIC__/static/common/edit/highlight/highlight.pack.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/static/common/edit/wang/wangEditor.css"  media="all">
</head>
<body>

<style>
    /*辅助*/
    .message_parent_right pre{padding: 5px 10px; margin:  5px 0; font-size: 12px; border-left: 3px solid #009688;
        background-color: #F8F8F8; font-family: Courier New; overflow: auto;}
    /* 简易编辑器 */
    .fly-edit{position:relative; display: block; top: 1px; left:0; padding:0 10px; border: 1px solid #e6e6e6;
        border-radius: 2px 2px 0 0; background-color: #FBFBFB;}
    .fly-edit span{cursor:pointer; padding:0 10px; line-height: 38px; color:#009E94;}
    .fly-edit span i{padding-right:6px; font-size: 18px;}
    .fly-edit span:hover{color:#5DB276;}
    body .layui-edit-face{ border:none; background:none;}
    body .layui-edit-face  .layui-layer-content{padding:0; background-color:#fff; color:#666; box-shadow:none}
    .layui-edit-face .layui-layer-TipsG{display:none;}
    .layui-edit-face ul{position:relative; width:372px; padding:10px; border:1px solid #D9D9D9; background-color:#fff; box-shadow: 0 0 20px rgba(0,0,0,.2);}
    .layui-edit-face ul li{cursor: pointer; float: left; border: 1px solid #e8e8e8; height: 22px; width: 26px; overflow: hidden; margin: -1px 0 0 -1px; padding: 4px 2px; text-align: center;}
    .layui-edit-face ul li:hover{position: relative; z-index: 2; border: 1px solid #eb7350; background: #fff9ec;}
</style>


<!--导航-->
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

<div class="layui-container qf_blog_detail_content">
    <div class="layui-row">
        <div class="layui-col-md8 qf_blog_detail_content_left" >
            <blockquote class="layui-elem-quote" >
            <span class="layui-breadcrumb">
            <a><cite>首页</cite></a>
          <a><cite>文章详情</cite></a>
           </span>
            </blockquote>
            <h2><?php echo $article['title']; ?></h2>
            <h2 id="article_detail_id" style="display: none;"><?php echo $article['id']; ?></h2>
            <div class="tag">
                <span>时间 : <?php echo $article['create_time']; ?></span>
                <span>分类 : <?php echo $article['typeName']; ?></span>
                <span>作者 : <?php echo $article['author']; ?></span>
                <span>阅读 : <?php echo $article['view']; ?></span>
                <span>评论 : <?php echo $article['common_count']; ?></span>
                <span>喜欢 : <?php echo $article['like']; ?></span>
            </div>
            <div class="content w-e-text">
                <?php echo $article['content']; ?>
            </div>

            <div class="other">
                <div class="layui-row">
                    <div class="layui-col-xs12 layui-col-md6 prev">
                        <div class="grid-demo grid-demo-bg1">
                            <?php if(empty($prev)): ?>
                            上一篇 : <a>没有了</a>
                            <?php else: ?>
                            上一篇 : <a href="<?php echo $prev['id']; ?>.html"><?php echo $prev['title']; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="layui-col-xs12 layui-col-md6 next">
                        <?php if(empty($next)): ?>
                        下一篇 : <a>没有了</a>
                        <?php else: ?>
                        下一篇 : <a href="<?php echo $next['id']; ?>.html"><?php echo $next['title']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="explain">
                旧时光博客, 版权所有丨如未注明 , 均为原创丨 转载请注明友情链接的定义、交换的标准与注意事项。！
            </div>
             <div class="zan_reward">
             </div>

            <div class="article_common">
                <textarea id="L_content" name="content"
                          class="layui-textarea  article_common_editor " style=" height: 150px; "></textarea>
                    <button class="layui-btn article_common_submit">提交评论</button>

                 <!--共用留言板样式-->
                <div class="message_list">
                    <h2 class="mess_new">文章评论</h2>

                    <div class="hidden_article_common_param" style="display: none"></div>
                    <div class="hidden_article_common_text" style="display: none"></div>

                    <div id="message_content">
                    </div>
                </div>

            </div>


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
    //加载hljs库
    hljs.initHighlightingOnLoad();


    layui.use(['flow','code','form'], function () {
        var flow = layui.flow
            ,form = layui.form
            ,$ = layui.jquery;
        layui.code();

        var article_id = $('#article_detail_id').text();

        //流加载数据
        flow.load({
            elem: '#message_content' //流加载容器
            , scrollElem: '#message_content' //滚动条所在元素，一般不用填，此处只是演示需要。
            , isAuto: false
            , isLazyimg: true
            , done: function (page, next) { //加载下一页
                var lis = [];
                $.post("<?php echo url('index/Message/index'); ?>", {page: page,article_id:article_id}, function (res) {
                    var data = res.data;

                    for (var i = 0; i < data.length; i++) {
                        var   html = '';
                        var style ='';
                        if(data[i].children.length!=0){
                            var children = data[i].children;
                            style = 'border-bottom: 1px solid #1AA195;';
                            for (var p = 0; p < children.length; p++) {
                                html += '<div class="layui-row message_children"> ' +
                                    '<div class="layui-col-xs2 layui-col-md1 message_children_left"> ' +
                                    '<img  class="" src="'+children[p].headurl+'" /></div> ' +
                                    '<div class="layui-col-xs10 layui-col-md11 message_children_right"> ' +
                                    '<div class="top"><span class="name">'+children[p].nickname+'</span> ' +
                                    '回复 <span class="name">'+children[p].reply_nickname+'</span> ' +
                                    '<span class="time">'+children[p].tran_time+'</span>' +
                                    '来自 <span data-id="'+data[i].id+'" class="os">'+children[p].os+'</span> 客户端</div> ' +
                                    '<div class="content">'+children[p].content+'</div> ' +
                                    '<div class="bottom"><span data-id="'+children[p].id+'" class="zan">赞  (<cite>'+children[p].zan_count+'</cite>)</span> ' +
                                    '<span data-user="'+children[p].id+'"   data-id="'+data[i].id+'"   class="replay">回复</span> <!--<span class="del">删除</span>--></div> </div> </div>';
                            }
                        }else{
                            html ='';
                            style='';
                        }
                        var innerHtml = '  <div class="messages" style="'+style+'">' +
                            '<div class="layui-row message_parent"> ' +
                            '<div class="layui-col-xs2 layui-col-md1 message_parent_left"> ' +
                            '<img  class="" src="'+data[i].headurl+'" /> </div> ' +
                            '<div class="layui-col-xs10 layui-col-md11 message_parent_right"> ' +
                            '<div class="top"><span class="name">'+data[i].nickname+' </span><span class="time">'+data[i].tran_time+'</span>' +
                            '来自 <span data-id="'+data[i].id+'" class="os">'+data[i].os+'</span> 客户端</div> ' +
                            '<div class="content">'+data[i].content+'</div>' +
                            '<div class="bottom"><span data-id="'+data[i].id+'" class="zan">赞  (<cite>'+data[i].zan_count+'</cite>)</span>' +
                            '<span  data-user="'+data[i].id+'"  data-id="'+data[i].id+'" class="replay">回复</span> ' +
                            '<!--<span class="del">删除</span>--></div> </div> </div> '+html+' </div>';
                        lis.push(innerHtml);
                    }
                    next(lis.join(''), page < res.pageCount);
                });
            }
        });


        //赞
        $("body").on("click",".zan",function(){
            var _this = $(this);
            var message_id = _this.attr('data-id');
            var user_id =  $('.user_id').html();
            if("undefined" === typeof(user_id) ){
                layer.msg('请先登录',{
                    icon:2,
                    time:2000
                });
                return false;
            }
            //点赞评论跟留言
            $.post("<?php echo url('index/Message/addZan'); ?>",{message_id:message_id},function (res) {
                if(res.code==1){
                    layer.msg(res.msg,{
                        time:1000,
                        icon:1
                    },function () {
                        //处理业务
                        var  zan =   parseInt(_this.children('cite').text());
                        _this.children('cite').text(zan+1);
                    });
                }else {
                    layer.msg(res.msg,{
                        icon:2
                    });
                }

            });

        });

        //回复
        $("body").on("click",".replay",function(){
            var _this = $(this);
            var nickname =  $(this).parent('div.bottom').siblings().eq(0).children('span.name').eq(0).text();
            text = '@'+ nickname.replace(/\s/g, '')+' ';
            //@的人到输入框中
            $('.article_common_editor').val(text);
            $('.article_common_editor').focus();
            //输入框值改变
            $('.article_common_editor').change(function () {
                if($(this).val().length==0){
                    $('.hidden_article_common_param').text('');
                    $('.hidden_article_common_text').text('');
                }
            });
            //绑定需要的参数到隐藏div中
            var id =  _this.attr('data-id');
            var reply_id =  _this.attr('data-user');
            $('.hidden_article_common_param').text(id+','+ reply_id +','+ nickname);
            $('.hidden_article_common_text').text(text);
        });
    });
</script>
</body>
</html>