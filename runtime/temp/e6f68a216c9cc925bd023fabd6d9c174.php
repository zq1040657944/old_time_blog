<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\article\index.html";i:1524205243;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\header.html";i:1509346268;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<title>文章列表</title>
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
<blockquote class="layui-elem-quote article_index_nav">
    <div class="layui-inline">
        <div class="layui-input-inline">
            <input type="text" value="" placeholder="请输入文章查询" class="layui-input search_input">
        </div>
        <a class="layui-btn search_article_btn"><i class="layui-icon">&#xe615;</i> 查询</a>
    </div>
    <div class="layui-inline">
        <a class="layui-btn layui-btn-normal add_article_btn"><i class="layui-icon">&#xe654;</i> 新增</a>
    </div>
</blockquote>
<div class="layui-container article_index_content">
<div class="">
    <table class="layui-hide" id="table_article" lay-filter="article" ></table>
</div>
</div>
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>


<!--操作模板-->
<script type="text/html" id="article_tool_bar">
    <a class="layui-btn layui-btn-mini" lay-event="edit"><i class="layui-icon">&#xe642;</i> 编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del"><i class="layui-icon">&#xe640;</i> 删除</a>
</script>

<script type="text/html" id="statusTpl">
    {{#  if(d.status === 0){ }}
    <span style="color: #F581B1;">{{ d.statusName }}</span>
    {{#  } else { }}
    {{ d.statusName }}
    {{#  } }}
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
            elem: '#table_article'
            ,url: "<?php echo url('Article/index'); ?>"
            ,height:398
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id', title: 'ID', width:117, sort: true}
                ,{field:'title', title: '标题', width:230}
                ,{field:'statusName', title: '状态', width:150,templet: '#statusTpl'}
                ,{field:'create_time', title: '创建时间', width:200, sort: true}
                ,{field:'update_time', title: '修改时间', width:200,sort: true}
                ,{title:'状态', width:200, align:'center', toolbar: '#article_tool_bar'}
            ]]
            ,page: true
            ,limits: [5,10,15,20,25,30]
            ,limit: 5 //默认采用10            ,height: 500
            ,id: 'table_article'
        });

        //监听工具条
        table.on('tool(article)', function(obj){
            var data = obj.data;
          if(obj.event === 'del'){
              layer.confirm('确定删除此文章？',{icon:3, title:'提示信息'},function(index){
                  var id = data.id;
                  $.post("<?php echo url('Article/delete'); ?>",{id:id},function(res){
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
                  title : "修改文章信息",
                  type : 2,
                  content : url+"/edit?id="+data.id,
                  success : function(){
                      setTimeout(function(){
                         layer.tips('点击此处返回文章列表', '.layui-layer-setwin .layui-layer-close',{time:1500}, {
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
        $(".search_article_btn").click(function(){
             var key = $(".search_input").val();
              var index = layer.msg('查询中，请稍候', {icon: 16, time: false, shade: 0.8});
              //  var url =  window.location.pathname;
                // window.location.href  =url+'?key='+key;
            table.reload('table_article', {
                where: {
                        key:key
                }
            });
            layer.close(index);
        });

        //新增文章
        $(".add_article_btn").click(function(){
            var index = layer.open({
                title : "添加文章",
                type : 2,
                content : "<?php echo url('Article/add'); ?>",
                success : function(layero, index){
                    setTimeout(function(){
                        layer.tips('点击此处返回文章列表', '.layui-layer-setwin .layui-layer-close',{time:1500}, {
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