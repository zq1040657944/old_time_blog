<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\notice\edit.html";i:1524234016;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>修改网站通告</title>
    <link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">
</head>

<body style="background-color: #fff;">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend style="font-size: 14px;">修改网站通告</legend>
</fieldset>

<div class="layui-field-box">
    <form method="post" class="layui-form" action="#" >

        <input hidden="hidden" type="text" value="<?php echo $tip['id']; ?>" name="id">

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">编辑网站通告</label>
            <div class="layui-input-block">
                <textarea class="layui-textarea layui-hide" name="content" lay-verify="content"  id="tip_edit"><?php echo $tip['content']; ?></textarea>
            </div>
            <div class="layui-form-item" >
                <label class="layui-form-label">状态</label>
                <div class="layui-input-block" >
                    <?php if($tip['tip_status'] == 1): ?>
                    <input type="radio" name="tip_status" value="1" title="发出" checked="">
                    <input type="radio" name="tip_status" value="0" title="草稿">
                    <?php else: ?>
                    <input type="radio" name="tip_status" value="1" title="发出" >
                    <input type="radio" name="tip_status" value="0" checked="" title="草稿">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="layui-form-item" >
            <div class="layui-input-block">
                <button id ='submit' class="layui-btn" lay-submit="" lay-filter="editTip">提交</button>
            </div>
        </div>
    </form>
</div>
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>


<script>
    layui.use(['form', 'layedit','upload'], function(){
        var form = layui.form
            ,$= layui.jquery
            ,layedit = layui.layedit
            ,layer = layui.layer;
        //创建一个编辑器
        var editIndex = layedit.build('tip_edit');
        //监听提交
        form.on('submit(editTip)', function(data){
            var content = layedit.getContent(editIndex);
            if(content.length<=0){
                layer.msg('内容不能为空');
                return false;
            }
            data.field.content =   content;
            editTip($,data.field,layer);
            return false;
        });
    });

    //提交
    function  editTip ($,data,layer) {
        var index = layer.msg('修改网站通告中...，请稍候',{icon: 16,time:false,shade:0.8});
        $.post("<?php echo url('Notice/edit'); ?>",data,function (res) {
            if(res.code==1){
                layer.close(index);
                layer.msg(res.msg,{
                    icon:1,
                    time:2000
                },function () {
                    layer.closeAll('iframe');
                    parent.location.reload();
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