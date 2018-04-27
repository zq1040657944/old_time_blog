<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\rule\edit.html";i:1509346268;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>修改权限页面</title>
    <link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">
</head>

<style>

</style>
<body style="background-color: #fff;">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px; ">
    <legend style="font-size: 14px;">修改菜单</legend>
</fieldset>
    <div class="layui-field-box">
        <form method="post" class="layui-form" action="#" >
            <div class="layui-form-item">
                <label class="layui-form-label">菜单名称</label>
                <div class="layui-input-block">
                    <input style="display: none;"  type="text" name="id" value="<?php echo $rule['id']; ?>"  autocomplete="off"" class="layui-input">
                    <input  type="text" name="title" value="<?php echo $rule['title']; ?>" lay-verify="title"  autocomplete="off" placeholder="请输入菜单名称" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">菜单图标</label>
                <div class="layui-input-block">
                    <input type="text" name="css" value="<?php echo $rule['css']; ?>" autocomplete="off" class="layui-input" placeholder="请输入菜单图标">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">菜单权限</label>
                <div class="layui-input-block">
                    <input type="text" name="name" value="<?php echo $rule['name']; ?>" lay-verify="name" placeholder="例如 index/Index/index "  autocomplete="off" class="layui-input">
                </div>
            </div>
            <?php if($rule['pid']  != 0): ?>
               <div class="layui-form-item">
                    <label class="layui-form-label">父类菜单</label>
                    <div class="layui-input-block">
                        <input type="text"  value="<?php echo $pid_rule['title']; ?>"  autocomplete="off" class="layui-input"  readonly="readonly">
                    </div>
                    </div>
            <?php endif; ?>

            <div class="layui-form-item">
                <label class="layui-form-label">菜单状态</label>
                <div class="layui-input-block">
                    <?php if($rule['status'] == 1): ?>
                    <input type="radio" name="status" value="1" title="正常" checked="checked">
                    <input type="radio" name="status" value="0" title="禁止" >
                    <?php else: ?>
                    <input type="radio" name="status" value="1" title="正常" >
                    <input type="radio" name="status" value="0" title="禁止" checked="checked" >
                    <?php endif; ?>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">菜单排序</label>
                <div class="layui-input-block">
                    <input type="text" name="sort" value="<?php echo $rule['sort']; ?>"  placeholder="菜单排序"  autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">菜单说明</label>
                <div class="layui-input-block">
                    <textarea name="remark" placeholder="请输入内容" class="layui-textarea"><?php echo $rule['remark']; ?></textarea>
                </div>
            </div>


            <div class="layui-form-item" >
                <div class="layui-input-block">
                    <button id ='submit' style=" margin-left: 30%;" class="layui-btn" lay-submit="" lay-filter="edit_rule">修改</button>
                </div>
            </div>
        </form>
    </div>


<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>


<script>
    layui.use(['form','layer'], function(){
              var form = layui.form
                ,layer = layui.layer;
        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length <= 0){
                    return '菜单名称不能为空';
                }
            }
            ,name:function(value){
                if(value.length <= 0){
                    return '菜单权限不能为空';
                }
            }
        });
        //监听提交
        form.on('submit(edit_rule)', function(data){
            var index = layer.msg('修改菜单，请稍候',{icon: 16,time:false,shade:0.8});
            $.post("<?php echo url('Rule/edit'); ?>",data.field,function (res) {
                if(res.code==1){
                    layer.close(index);
                    layer.msg(res.msg,{
                        time:2000,
                        icon:1
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

             return false;
        });
    });

</script>

</body>
</html>