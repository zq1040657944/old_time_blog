<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\system\index.html";i:1523627922;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\header.html";i:1509346268;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<title>网站系统管理</title>
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


</head>

<style>
    .layui-tab-item{position: relative;top: 0;}
</style>
<body>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend style="font-size: 16px;">网站设置</legend>
</fieldset>


<div class="layui-tab" style="margin: 0 5px;">
    <ul class="layui-tab-title">
        <li class="layui-this">网站设置</li>
        <li>基本设置</li>
        <li>SEO优化</li>
    </ul>

    <div class="layui-tab-content">
        <!-- 网站信息设置 -->
        <div class="layui-tab-item layui-show" style="margin-top: 10px">
            <form class="layui-form layui-form-pane" action="" method="post">
                <input type="" name="id" hidden="" value="<?php echo $site_Info['id']; ?>">
              <div class="layui-form-item">
                <label class="layui-form-label">博客名称</label>
                <div class="layui-input-block">
                  <input type="text" name="sys_name"  required  lay-verify="required" placeholder="请输入网站标题" autocomplete="off" class="layui-input" value="<?php echo $site_Info['sys_name']; ?>">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">备案号</label>
                <div class="layui-input-block">
                  <input type="text" name="sys_icp"  required  lay-verify="required" placeholder="京ICP备00000000号-2" autocomplete="off" class="layui-input" value="<?php echo $site_Info['sys_icp']; ?>">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">底部版权</label>
                <div class="layui-input-block">
                  <input type="text" name="sys_copy"  required  lay-verify="required" placeholder="© 2016 - 2018 旧时光" autocomplete="off" class="layui-input" value="<?php echo $site_Info['sys_copy']; ?>">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">统计代码</label>
                <div class="layui-input-block">
                 <textarea name="sys_footer" required lay-verify="required" placeholder="统计代码" class="layui-textarea"><?php echo $site_Info['sys_footer']; ?></textarea>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">励志文字</label>
                <div class="layui-input-block">
                  <input type="text"  name="footer_text"  required  lay-verify="required" placeholder="请输入励志文字" autocomplete="off" class="layui-input" value="<?php echo $site_Info['footer_text']; ?>">
                </div>
              </div>
              <div class="layui-form-item">
                <div class="layui-input-block">
                    <?php if(!empty($site_Info['id'])){?>
                    <button class="layui-btn submit" lay-submit="" date-url="<?php echo url('System/edit_system'); ?>" lay-filter="system_base_add">立即提交</button>
                    <?php }else{?>
                    <button class="layui-btn submit" lay-submit="" date-url="<?php echo url('System/add_system'); ?>" lay-filter="system_base_add">立即提交</button>
                    <?php }?>
                </div>
              </div>
            </form>

        </div>
        <!-- 网站基本设置 -->
        <div class="layui-tab-item">
           <form class="layui-form" action="" style="margin-top: 20px;">
            <div class="layui-inline">
                <label class="layui-form-label">建站日期</label>
                <div class="layui-input-inline">
                    <input type="text" name="create_date" id="create_date" <?php if(!empty($base_system)): ?> value="<?php echo $base_system['create_date']; ?>" <?php endif; ?>  lay-verify="date" placeholder="yyyy-MM-dd"  autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item" style="margin-top: 15px;">
                <label class="layui-form-label">文章总数</label>
                <div class="layui-input-block">
                    <input type="text" name="article_count" <?php if(!empty($base_system)): ?> value="<?php echo $base_system['article_count']; ?>" <?php endif; ?>  lay-verify="article_count"  autocomplete="off" placeholder="请输入文章总数" class="layui-input" readonly="readonly">
                </div>
            </div>
            <div class="layui-form-item" style="margin-top: 15px;">
                <label class="layui-form-label">标签总数</label>
                <div class="layui-input-block">
                    <input type="text" name="tag_count"  <?php if(!empty($base_system)): ?> value="<?php echo $base_system['tag_count']; ?>" <?php endif; ?>  lay-verify="tag_count" autocomplete="off" placeholder="请输入标签总数" class="layui-input" readonly="readonly">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">最后更新</label>
                <div class="layui-input-inline">
                    <input type="text" name="last_update" <?php if(!empty($base_system)): ?> value="<?php echo $base_system['last_update']; ?>" <?php endif; ?> id="last_update" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item" style="margin-top: 20px;">
                <div class="layui-input-block">
                    <button class="layui-btn submit" lay-submit="" date-url="<?php echo url('System/add_base'); ?>" lay-filter="system_base_add">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form> 
        </div>
        <!-- SEO网站优化 -->
        <div class="layui-tab-item">
            <form class="layui-form" action="" style="margin-top: 20px;">
                <input type="" name="id" hidden="" value="<?php echo $seo['id']; ?>">
             <div class="layui-form-item">
                <label class="layui-form-label">网站标题</label>
                <div class="layui-input-block">
                  <input type="text" name="title"  required  lay-verify="required" placeholder="请输入网站标题,一般不超过80个字符" autocomplete="off" class="layui-input" value="<?php echo $seo['title']; ?>">
                </div>
              </div>
            <div class="layui-form-item">
                <label class="layui-form-label">网站关键字</label>
                <div class="layui-input-block">
                  <input type="text" name="keywords"  required  lay-verify="required" placeholder="多个关键字请用逗号隔开,一般不超过100个字符" autocomplete="off" class="layui-input" value="<?php echo $seo['keywords']; ?>">
                </div>
              </div>
            <div class="layui-form-item">
                <label class="layui-form-label">网站介绍</label>
                <div class="layui-input-block">
                 <textarea name="description" required lay-verify="required" placeholder="网站介绍一般不超过200个字符" class="layui-textarea"><?php echo $seo['description']; ?></textarea>
                </div>
              </div>
            <div class="layui-form-item" style="margin-top: 20px;">
                <div class="layui-input-block">
                    <?php if(!empty($seo['id'])){?>
                    <button class="layui-btn submit" lay-submit="" date-url="<?php echo url('System/edit_system'); ?>" lay-filter="system_base_add">立即提交</button>
                    <?php }else{?>
                    <button class="layui-btn submit" lay-submit="" date-url="<?php echo url('System/add_seo'); ?>" lay-filter="system_base_add">立即提交</button>
                    <?php }?>
                </div>
            </div>
        </form> 
        </div>
    </div>
</div>
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>



</body>

<script>
    layui.use(['form', 'layedit', 'laydate','element'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,element = layui.element
            ,laydate = layui.laydate;
        //日期
        laydate.render({
            elem: '#create_date'
        });
        laydate.render({
            elem: '#last_update'
        });
        //自定义验证规则
        form.verify({
            article_count: function(value){
                if(value.length <= 0){
                    return '文章总数不能为空';
                }
            },
            tag_count: function(value){
                if(value.length <= 0){
                    return '标签总数不能为空';
                }
            },
        });
        //监听提交
        form.on('submit(system_base_add)', function(data){
            $url = $(this).attr('date-url');
            var index = layer.msg('新增网站配置，请稍候',{icon: 16,time:false,shade:0.8});
            $.post($url,data.field,function (res) {
                if(res.code==1){
                    layer.close(index);
                    layer.msg(res.msg,{
                        time:1000,
                        icon:1
                    },function () {
                       window.location.reload();
                    });
                }else{
                    layer.close(index);
                    layer.msg(res.msg,{
                        icon:2
                    });
                }
            });

            return false;
        });

    });
</script>
</html>
