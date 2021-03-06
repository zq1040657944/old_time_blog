<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\admin\updatepassword.html";i:1509346268;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">

<style>

</style>

<body style="background-color: #fff;">
<fieldset class="layui-elem-field">
    <legend>修改密码</legend>
    <div class="layui-field-box">
        <form method="post" class="layui-form"  >
            <input readonly="readonly"  hidden="hidden" type="text" name="id"  value="<?php echo $admin['id']; ?>">
            <div class="layui-form-item">
                <label class="layui-form-label">用户名 *</label>
                <div class="layui-input-block">
                    <input readonly="readonly" id="username" type="text" name="username" lay-verify="username" value="<?php echo $admin['username']; ?>"
                           autocomplete="off" placeholder="请输入用户名" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">新密码 *</label>
                <div class="layui-input-block">
                    <input  id="password" type="password" name="password" lay-verify="password" value=""
                           autocomplete="off" placeholder="请输入新密码" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">确认细密码 *</label>
                <div class="layui-input-block">
                    <input  id="confirm_password" type="password" name="confirm_password" lay-verify="confirm_password" value=""
                           autocomplete="off" placeholder="请确认新密码" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item" style="margin-left: 0;">
                <div class="layui-input-block">
                    <button id ='submit' style="margin-left: 25%;"  class="layui-btn" lay-submit="" lay-filter="up_pass">修改</button>
                </div>
            </div>
        </form>
    </div>
</fieldset>

<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>



<script>
    layui.use(['form'], function(){
              var form = layui.form
                ,layer = layui.layer;
        //自定义验证规则
        form.verify({
              password: [/(.+){6,12}$/, '密码必须6到12位'],
             confirm_password: [/(.+){6,12}$/, '确认密码必须6到12位']
        });
        //监听提交
        form.on('submit(up_pass)', function(data){
            var p1 =$('#password').val();
            var p2 = $('#confirm_password').val();
             if(p1 != p2){
                 layer.alert('输入两次密码必须一样！');
                 return false;
             }
            //调用修改管理员密码方法
            up_pass($,data.field,layer);
            return false;
        });
    });


    /**
     * 修改管理员密码
     */
    function  up_pass($,data,layer) {
        $.post("<?php echo url('Admin/updatePassword'); ?>",data,function (res) {
            if(res.code==1){
                layer.msg(res.msg,{
                    time:1000,
                    icon:1
                },function () {
                    window.location.reload();
                });
            }else{
                layer.msg(res.msg,{
                    icon:2
                });
            }
        });
    }
</script>



</body>
</html>