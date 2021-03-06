<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\rule\add.html";i:1523604736;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>添加菜单页面</title>
    <link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">
</head>
<style>
</style>
<body style="background-color: #fff;">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px; ">
    <legend style="font-size: 14px;">添加菜单</legend>
</fieldset>

    <div class="layui-field-box">
        <form method="post" class="layui-form">
            <div class="layui-form-item">
                <label class="layui-form-label">菜单名称</label>
                <div class="layui-input-block">
                    <input  type="text" name="title" lay-verify="title"  autocomplete="off" placeholder="请输入菜单名称" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">菜单图标</label>
                <div class="layui-input-block">
                    <input type="text" name="css"  autocomplete="off" class="layui-input" placeholder="请输入菜单图标">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">菜单权限</label>
                <div class="layui-input-block">
                    <input type="text" name="name" lay-verify="name" placeholder="例如 index/Index/index "  autocomplete="off" class="layui-input">
                </div>
            </div>

            <?php if(!(empty($rule) || (($rule instanceof \think\Collection || $rule instanceof \think\Paginator ) && $rule->isEmpty()))): ?>
                <div class="layui-form-item">
                    <label class="layui-form-label">父类菜单</label>
                    <div class="layui-input-block">
                        <input type="text"  value="<?php echo $rule['id']; ?>" name="pid"   autocomplete="off" class="layui-input"  style="display: none" >
                        <input type="text"  value="<?php echo $rule['title']; ?>"  autocomplete="off" class="layui-input"  readonly="readonly">
                    </div>
                    </div>
            <?php endif; ?>


            <div class="layui-form-item">
                <label class="layui-form-label">菜单排序</label>
                <div class="layui-input-block">
                    <input type="text" name="sort" value=""  placeholder="菜单排序"  autocomplete="off" class="layui-input">
                </div>
            </div>


            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">菜单说明</label>
                <div class="layui-input-block">
                    <textarea name="remark" placeholder="请输入内容" class="layui-textarea"></textarea>
                </div>
            </div>

            <div class="layui-form-item" >
                <div class="layui-input-block">
                    <button id ='submit' style=" margin-left: 30%;" class="layui-btn" lay-submit="" lay-filter="add_rule">新增</button>
                </div>
            </div>
        </form>
    </div>


<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>




<script>
    layui.use(['form', 'layer'], function(){
              var form = layui.form
                   ,$ = layui.jquery
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
        form.on('submit(add_rule)', function(data){
            //调用新增菜单的方法
             add_rule($,data.field,layer);
             return false;
        });
    });


    /**
     * 新增菜单
     * @param $
     * @param data
     * @param layer
     */
     function  add_rule($,data,layer) {
        var index = layer.msg('新增菜单，请稍候',{icon: 16,time:false,shade:0.8});
          $.post("<?php echo url('Rule/add'); ?>",data,function (res) {
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
                      time:2000,
                      icon:2
                  });
              }
          });
     }
</script>


</body>
</html>