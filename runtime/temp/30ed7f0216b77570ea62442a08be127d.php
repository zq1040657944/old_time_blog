<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\banner\add.html";i:1524204380;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>添加轮播图</title>
    <link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">
</head>

<body style="background-color: #fff;">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend style="font-size: 14px;">新增轮播图</legend>
</fieldset>

<style>
    img{
        height: auto;
    }
</style>

<div class="layui-field-box">
        <form method="post" class="layui-form" action="#"  enctype="multipart/form-data">
            <!--表单令牌-->
            <?php echo token(); ?>
            <div class="layui-form-item">
                <label class="layui-form-label">轮播图标题 *</label>
                <div class="layui-input-block">
                   <input  type="text" name="ban_title" lay-verify="ban_title"  autocomplete="off" placeholder="请输入轮播图标题" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">轮播图图片 *</label>
                <div class="layui-upload">
                  <button type="button" class="layui-btn" id="test1">上传图片</button>
                    <img  class="layui-upload-img" id="demo1" style="border-style: solid; width: 300px; height: 80px; margin-left: 50px">
                    <span id="demoText"></span>
                </div>   
            </div>
            <div class="layui-form-item" >
                <label class="layui-form-label">开启/关闭 *</label>
                <div class="layui-input-block" >
                    <input type="radio" name="ban_view" lay-filter="ban_view" value="1" title="显示" checked="">
                    <input type="radio" name="ban_view" lay-filter="ban_view" value="2" title="不显示">
                </div>
            </div>
            <div class="layui-form-item" style="text-align: center;">
                <div class="layui-input-block">
                    <button id ='submit' class="layui-btn" lay-submit="" lay-filter="add_banner" style="margin-top: 30px;">提交</button>
                </div>
            </div>
        </form>
    </div>

<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>



<script>

    layui.use(['form', 'layedit','upload','code'], function(){
        var form = layui.form
                ,$= layui.jquery
                ,layedit = layui.layedit
                ,layupload = layui.upload
                ,layer = layui.layer;
        layui.code();
        //自定义验证规则
        form.verify({
            ban_title: function(value){
                if(value.length <2){
                    return '轮播图标题不能少于2个字';
                }
            },
        });
        //普通图片上传
          var layupload = layupload.render({
            elem: '#test1'
            ,url: "upload"
            ,before: function(obj){
              //预读本地文件示例，不支持ie8
              obj.preview(function(index, file, result){
                $('#demo1').attr('src', result); //图片链接（base64）
              });
            }
            ,done: function(res){
              //如果上传失败
              if(res.code > 0){
                return layer.msg('上传失败');
              }else{
                return layer.msg('上传成功');
              }
              //上传成功
            }
          });
        //原创/转载  是否显示转载地址
        form.on('radio(is_reprint)', function(data){
            if(data.value==2){
                $('.reprint_url').css('display','block');
            }else{
                $('.reprint_url').css('display','none');
            }
        });

        //监听提交
        form.on('submit(add_banner)', function(data){
            add_banner($,data.field);
             return false;
        });
    });


    //提交
    function  add_banner($,data) {
        var index = layer.msg('新增文章，请稍候',{icon: 16,time:false,shade:0.8});
        $.post("<?php echo url('Banner/add'); ?>",data,function (res) {
            if(res.code==1){
                layer.close(index);
                layer.msg(res.msg,{
                    icon:1,
                    time:2000
                },function () {
                    layer.closeAll('iframe');
                    window.parent.location.reload();
                });
            }else{
                layer.close(index);
                layer.msg(res.msg,{
                    icon:2
                });
            }
        })
    }
</script>
</body>
</html>