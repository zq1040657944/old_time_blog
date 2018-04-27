<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\banner\index.html";i:1524209169;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\header.html";i:1509346268;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<title>轮播图列表</title>
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
<body class="childrenBody">
<blockquote class="layui-elem-quote admin_index_nav">
    <div class="layui-inline">
        <div class="layui-input-inline">
            <input type="text" value="" placeholder="请输入标题" class="layui-input search_input">
        </div>
        <a class="layui-btn search_admin_btn"><i class="layui-icon">&#xe615;</i> 查询</a>
    </div>
    <div class="layui-inline">
        <a class="layui-btn layui-btn-normal add_banner_btn"><i class="layui-icon">&#xe654;</i> 新增</a>
    </div>
</blockquote>
<div class="layui-container admin_index_content">
<div class="">
    <table class="layui-hide" id="table_admin" lay-filter="admin" ></table>
</div>
</div>
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>


<!--操作模板-->
<script type="text/html" id="admin_tool_bar">
    <a class="layui-btn layui-btn-mini" lay-event="edit"><i class="layui-icon">&#xe642;</i> 编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del"><i class="layui-icon">&#xe640;</i> 删除</a>
</script>

<script type="text/html" id="statusTpl">
    {{#  if(d.ban_view === 1){ }}
    <span style="color: #F581B1;">{{ d.statusName }}</span>
    {{#  } else { }}
    {{ d.statusName }}
    {{#  } }}
</script>
<script type="text/html" id="imgTpl">
    <img src="{{ d.ban_img }}">
</script>
<script type="text/javascript" >
    layui.use(['layer','jquery','laypage','table','form'],function(){
          var  layer = layui.layer,
               laypage = layui.laypage,
               form = layui.form,
               table = layui.table,
               $ = layui.jquery;
        //方法级渲染
        table.render({
            elem: '#table_admin'
            ,url: "<?php echo url('Banner/index'); ?>"
            ,height:390
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id', title: 'ID', width:100, sort: true}
                ,{field:'ban_title', title: '标题', width:100}
                ,{field:'statusName', title: '状态', width:100,templet: '#statusTpl'}
                ,{field:'ban_img', title: '缩略图', width:200,templet: '#imgTpl'}
                ,{field:'ban_createtime', title: '创建时间', width:200, sort: true}
                ,{field:'ban_edittime', title: '修改时间', width:200,sort: true}
                ,{ width:196, align:'center', toolbar: '#admin_tool_bar'}
            ]]
            ,page: true
            ,limits: [5,10,15,20,25,30]
            ,limit: 15 //默认采用10            ,height: 500
            ,id: 'table_admin'
        });
        //监听管理员状态
        form.on('switch(switchStatus)', function(){
             var id = $(this).parent('div').parent('div').parent('td').siblings('td').eq(1).children('div').html();
            var index = layer.msg('修改中，请稍候',{icon: 16,time:false,shade:0.8});
            setTimeout(function(){
                layer.close(index);
                layer.msg('id是 '+ id);
            },1000);
        });
        //监听工具条
        table.on('tool(admin)', function(obj){
            var data = obj.data;
          if(obj.event === 'del'){
              layer.confirm('确定删除这张轮播图?',{icon:3, title:'提示信息'},function(index){
                  var id = data.id;
                  $.post("<?php echo url('Banner/delete'); ?>",{id:id},function(res){
                      if(res.code==1){
                          layer.msg(res.msg,{
                              time:1500,
                              icon:1
                          },function(){
                              obj.del();
                             // table.reload('table_admin');
                          });
                      }else{
                          layer.msg(res.msg,{
                              time:1500,
                              icon:2
                          });
                      }
                  });
                  layer.close(index);
              });
            } else if(obj.event === 'edit'){
              var url =   window.location.pathname;
              tmpHPage = url.split( "/" );
              tmpHPage.pop();
              url =  tmpHPage.join("/");
              var index = layer.open({
                  title : "修改管理员信息",
                  type : 2,
                  content : url+"/edit?id="+data.id,
                  success : function(){
                      setTimeout(function(){
                         layer.tips('点击此处返回管理员列表', '.layui-layer-setwin .layui-layer-close',{time:1500}, {
                              tips: 3
                          });
                      },500)
                  }
              });
              //改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
              $(window).resize(function(){
                 layer.full(index);
              });
              layer.full(index);
            }
        });
        //通过条件查询
        $(".search_admin_btn").click(function(){
             var key = $(".search_input").val();
              var index = layer.msg('查询中，请稍候', {icon: 16, time: false, shade: 0.8});
              //  var url =  window.location.pathname;
                // window.location.href  =url+'?key='+key;
            table.reload('table_admin', {
                where: {
                        key:key
                }
            });
            layer.close(index);
        });

        //新增轮播图管理
        $(".add_banner_btn").click(function(){
            var index = layer.open({
                title : "添加轮播图",
                type : 2,
                content : "<?php echo url('Banner/add'); ?>",
                success : function(layero, index){
                    setTimeout(function(){
                        layer.tips('点击此处返回管理员列表', '.layui-layer-setwin .layui-layer-close',{time:1500}, {
                            tips: 3
                        });
                    },500)
                }
            });
            //改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
            $(window).resize(function(){
                layui.layer.full(index);
            });
            layui.layer.full(index);
        });


    });


</script>




</body>
</html>