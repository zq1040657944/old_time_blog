<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\group\index.html";i:1524035015;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\header.html";i:1509346268;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<title>用户组列表</title>
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
<blockquote class="layui-elem-quote group_index_nav">
    <div class="layui-inline">
        <div class="layui-input-inline">
            <input type="text" value="" placeholder="请输入用户组查询" class="layui-input search_input">
        </div>
        <a class="layui-btn search_btn"><i class="layui-icon">&#xe615;</i> 查询</a>
    </div>
    <div class="layui-inline">
        <a class="layui-btn layui-btn-normal add_group_btn"><i class="layui-icon">&#xe654;</i> 新增</a>
    </div>
</blockquote>
<div class="layui-container group_index_content">
<div>
    <table class="layui-hide" id="table_group" lay-filter="group" ></table>
</div>
</div>


<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>




<script type="text/html" id="group_tool_bar">
    <a class="layui-btn layui-btn-mini" lay-event="rule_group"><i class="layui-icon">&#xe627;</i> 分配权限</a>
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
    layui.use(['layer','jquery','laypage','table'],function(){
          var  layer = layui.layer,
            laypage = layui.laypage,
              table = layui.table,
            $ = layui.jquery;

        var url =   window.location.pathname;
        tmpHPage = url.split( "/" );
        tmpHPage.pop();
        url =  tmpHPage.join("/");

        //方法级渲染
        table.render({
            elem: '#table_group'
            ,url: "<?php echo url('Group/index'); ?>"
            ,height:398
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id', title: 'ID', width:100, sort: true}
                ,{field:'title', title: '用户组名', width:100}
                ,{field:'status', title: '状态', width:100,templet: '#statusTpl'}
                ,{field:'create_time', title: '创建时间', width:200, sort: true}
                ,{field:'update_time', title: '修改时间', width:200,sort: true}
                ,{ width:398, align:'center', toolbar: '#group_tool_bar'}
            ]]
            ,page: true
            ,limits: [10,15,20,25,30]
            ,limit: 15 //默认采用10            ,height: 500
            ,id: 'table_group'
        });

        //监听工具条
        table.on('tool(group)', function(obj){
            var data = obj.data;
            if(obj.event === 'detail'){
                layer.msg('ID：'+ data.id + ' 的查看操作');
            } else if(obj.event === 'del'){
                layer.confirm('确定删除此用户组吗？',{icon:3, title:'提示信息'},function(index){
                    var id = data.id;
                    $.post("<?php echo url('Group/delete'); ?>",{id:id},function(res){
                        if(res.code==1){
                            layer.msg(res.msg,{
                                time:1500,
                                icon:1
                            },function(){
                                obj.del();
                               // table.reload('table_group');
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
                 layer.open({
                    title : "修改用户组",
                    type : 2,
                     area: ['400px', '300px'], //宽高
                    content : url+"/edit?id="+data.id
                });
            } else  if(obj.event === 'rule_group'){
                var id = data.id;

                layer.open({
                    title : "分配权限",
                    type : 2,
                    area: ['30%','60%'], //宽高
                    content : url+"/tree?id="+data.id
                });

                // window.location.href = url+"/rule_group?id="+data.id;
            }
        });

        //查询
        $(".search_btn").click(function(){
             var key = $(".search_input").val();
              var index = layer.msg('查询中，请稍候', {icon: 16, time: false, shade: 0.8});
              //  var url =  window.location.pathname;
                // window.location.href  =url+'?key='+key;
            table.reload('table_group', {
                where: {
                        key:key
                }
            });
            layer.close(index);
        });

        //添加用户组
        $(".add_group_btn").click(function(){
         layer.open({
                title : "添加用户组",
                type : 2,
               area: ['400px', '300px'], //宽高
                content : "<?php echo url('Group/add'); ?>"
            });
        });

    });

</script>




</body>
</html>