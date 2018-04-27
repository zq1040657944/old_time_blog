<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\admin\edit.html";i:1509346268;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">
<body style="background-color: #fff;">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend style="font-size: 14px;">修改管理员信息</legend>
</fieldset>
    <div class="layui-field-box">
        <form method="post" class="layui-form"  >

            <input readonly="readonly"  hidden="hidden" type="text" name="id"  value="<?php echo $user['id']; ?>">

            <div class="layui-form-item">
                <label class="layui-form-label">用户名 *</label>
                <div class="layui-input-block">
                    <input readonly="readonly" id="username" type="text" name="username" lay-verify="username" value="<?php echo $user['username']; ?>"
                           autocomplete="off" placeholder="请输入用户名" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item" style="margin-bottom: 30px; margin-top: 30px">
                <label class="layui-form-label">管理组 *</label>
                <div class="layui-input-block">
                    <?php if(is_array($groupList) || $groupList instanceof \think\Collection || $groupList instanceof \think\Paginator): $i = 0; $__LIST__ = $groupList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($groupArray == -1): ?>
                    <input type="checkbox" name="groups" lay-skin="primary"  title="<?php echo $v['title']; ?>" value="<?php echo $v['id']; ?>" >
                    <?php else: ?>
                    <input type="checkbox" name="groups"  lay-skin="primary"  title="<?php echo $v['title']; ?>" value="<?php echo $v['id']; ?>"
                    <?php if(  in_array($v['id'],$groupArray) ){echo 'checked=""';}?>  >
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">管理员 *</label>
                <div class="layui-input-block">
                    <?php if($user['is_admin'] == 1): ?>
                    <input type="radio" name="is_admin" value="1" title="是" checked="checked">
                    <input type="radio" name="is_admin" value="0" title="否" >
                    <?php else: ?>
                    <input type="radio" name="is_admin" value="1" title="是" >
                    <input type="radio" name="is_admin" value="0" title="否" checked="checked" >
                    <?php endif; ?>
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">账号状态 *</label>
                <div class="layui-input-block">
                    <?php if($user['status'] == 1): ?>
                    <input type="radio" name="status" value="1" title="正常" checked="checked">
                    <input type="radio" name="status" value="0" title="禁止" >
                    <?php else: ?>
                    <input type="radio" name="status" value="1" title="正常" >
                    <input type="radio" name="status" value="0" title="禁止" checked="checked" >
                    <?php endif; ?>
                </div>
            </div>

            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">说明</label>
                <div class="layui-input-block">
                    <textarea name="remark" placeholder="请输入内容" class="layui-textarea"><?php echo $user['remark']; ?></textarea>
                </div>
            </div>

            <div class="layui-form-item" style="margin-left: 0;">
                <div class="layui-input-block">
                    <button id ='submit' style="margin-left: 25%;"  class="layui-btn" lay-submit="" lay-filter="edit_admin">修改</button>
                </div>
            </div>
        </form>
    </div>

<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>



<script>
    layui.use(['form'], function(){
          var form = layui.form,
              layer = layui.layer ;
        //自定义验证规则
        form.verify({
            username: function(value){
                if(value.length <= 0){
                    return '用户名不能为空';
                }
            }
            //  ,  password: [/(.+){6,12}$/, '密码必须6到12位']
        });
        //监听提交
        form.on('submit(edit_admin)', function(data){
            var checkArr = [];
            $("input[name='groups']").each(function () {
                if ($(this).get(0).checked) {
                    checkArr.push($(this).val());
                }
            });
            data.field['groups'] = checkArr;   //选择的用户管理组
            //调用新增管理员方法
            edit_admin($,data.field,layer);
            return false;
        });
    });


    /**
     * 修改管理员信息
     */
    function  edit_admin($,data,layer) {
        var load = layer.msg('修改管理员信息，请稍候',{icon: 16,time:false,shade:0.8});
        $.post("<?php echo url('Admin/edit'); ?>",data,function (res) {
            if(res.code==1){
                layer.close(load);
                layer.msg(res.msg,{
                    time:1000,
                    icon:1
                },function () {
                    layer.closeAll('iframe');
                    parent.location.reload();
                });
            }else{
                layer.close(load);
                layer.msg(res.msg,{
                    icon:2
                });
            }
        });
    }

</script>


</body>
</html>