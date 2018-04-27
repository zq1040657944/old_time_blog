<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\articletype\index.html";i:1509346268;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\header.html";i:1509346268;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<title>文章类别列表</title>
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



<style>
    .layui-field-title {
         margin: 10px 10px;

    }
.article_type_top{ margin: 10px 15px; padding: 10px 15px;}


    body .layui-tree-skin-yellow .layui-tree-branch{color: #EDCA50;}


</style>

<body>

<blockquote class="layui-elem-quote article_type_top">

    <div class="layui-inline">
        <a id="add_article_type" class="layui-btn layui-btn-normal"><i class="layui-icon">&#xe654;</i> 新增根文章分类</a>
    </div>
</blockquote>

<fieldset class="layui-elem-field layui-field-title" >
    <legend style="font-size: 14px;">文章分类列表</legend>
</fieldset>

 <div class="layui-container" style=" width: 100%; height: 780px;">

     <div class="layui-row">
         <div class="layui-col-md3" style="height: 760px; border-right: 2px solid #eee; margin: 5px 0">
             <ul id="demo" style="padding: 5px 10px;"></ul>
         </div>
         <div class="layui-col-md9" style="padding: 0 10px;">
             <table class="layui-table">
                 <thead>
                 <tr>
                     <th>名称</th>
                     <th>排序</th>
                     <th>状态</th>
                     <th>创建时间</th>
                     <th>修改时间</th>
                     <th>操作</th>
                 </tr>
                 </thead>
                 <tbody class="select_rule">
                 </tbody>
             </table>
         </div>
     </div>
 </div>
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>


<script>
    layui.use(['tree','form','layer'], function() {
        var $ = layui.jquery,
            layer = layui.layer,
            form = layui.form;
        var html = "";
        layui.tree({
            elem: '#demo' //指定元素
            ,skin: 'yellow'
            ,target: '_self' //是否新选项卡打开（比如节点返回href才有效）
            ,click: function(item){
                $('.select_rule').html('');
               html= '<tr><td>'+item.title+'</td> ' +
                    '<td>'+item.sort+'</td> '+
                    '<td>'+item.statusName+'</td>' +
                    '<td>'+item.create_time+'</td> ' +
                    '<td>'+item.update_time+'</td> ' +
                    '<td> <a class="layui-btn layui-btn-mini add_child_article_type"  data-id="'+item.id+'"><i class="layui-icon">&#xe654;</i>  添加子菜单</a> ' +
                    '<a class="layui-btn layui-btn-normal layui-btn-mini edit_rule" data-id="'+item.id+'"><i class="layui-icon">&#xe642;</i> 修改</a> ' +
                    '<a class="layui-btn layui-btn-danger layui-btn-mini del_article_type" data-id="'+item.id+'"><i class="layui-icon">&#xe640;</i> 删除</a> ' +
                    '</td> ' +
                    '</tr>';
                $('.select_rule').html(html);
                //点击节点回调
                // layer.alert('当前节名称：'+ item.name + '<br>全部参数：'+ JSON.stringify(item));
                console.log(item);
            },
            nodes:<?php echo $json; ?>

        });

        //添加父级文章分类
        $('#add_article_type').on('click',function () {
            layer.open({
                type: 2,
                content: ["<?php echo url('Articletype/add',['pid'=>'0']); ?>"],
                area: ['50%', '80%']
            });
        });
        //添加子级文章分类
        $("body").on("click",".add_child_article_type",function(){
            var url =   window.location.pathname;
            tmpHPage = url.split( "/" );
            tmpHPage.pop();
            url =  tmpHPage.join("/");
            var _this = $(this);
            var id =  _this.attr("data-id");
            layer.open({
                type: 2,
                content:  url+"/add?pid="+id,
                area: ['50%', '80%']
            });
        })




        //修改菜单
        $("body").on("click",".edit_rule",function(){
            var url =   window.location.pathname;
            tmpHPage = url.split( "/" );
            tmpHPage.pop();
            url =  tmpHPage.join("/");
            var _this = $(this);
            var id =  _this.attr("data-id");
            layer.open({
                type: 2,
                content:  url+"/edit?id="+id,
                area: ['50%', '80%']
            });
        });

        //修改菜单
        $("body").on("click",".del_article_type",function(){
            var _this = $(this);
            var id =  _this.attr("data-id");
            layer.confirm('是否删除该文章分类？', {
                icon:2,
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post("<?php echo url('Articletype/delete'); ?>",{'id':id},function (res) {
                    if(res.code==1){
                        layer.msg(res.msg,{
                            icon:1
                        },function () {
                            window.location.reload();

                        });
                    }else{
                        layer.msg(res.msg,{
                            icon:2
                        });
                    }
                })
            }, function(){
                layer.msg('您取消了',{
                    icon:1,
                    time:1000
                });
            });
        });


    });
</script>

</body>
</html>