<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\article\edit.html";i:1509346268;s:77:"C:\Users\hp\Desktop\ceshi\public/../application/admin\view\public\footer.html";i:1509346268;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>修改文章页面</title>
    <link rel="stylesheet" href="__PUBLIC__/static/common/layui/css/layui.css"  media="all">
</head>
<body style="background-color: #fff;">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend style="font-size: 14px;">修改文章</legend>
</fieldset>

<style>
.w-e-text img {
    display: block;
    cursor: pointer;
    margin: auto;
}
.w-e-text img.w-e-selected {
    border: 1px solid #eee;
}
</style>

<div class="layui-field-box">
        <form method="post" class="layui-form" action="#"  enctype="multipart/form-data">
            <!--表单令牌-->
            <?php echo token(); ?>

            <input readonly="readonly"  hidden="hidden" type="text" name="id"  value="<?php echo $article['id']; ?>">

            <div class="layui-form-item">
                <label class="layui-form-label">文章类型 *</label>
                <div class="layui-input-block">
                    <select name="typeid"  lay-filter="" lay-verify="typeid" >
                        <option value="0">请选择</option>
                        <?php if(is_array($article_type) || $article_type instanceof \think\Collection || $article_type instanceof \think\Paginator): $i = 0; $__LIST__ = $article_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <option  value="<?php echo $v['id']; ?>"  <?php if($article['typeid'] == $v['id']): ?>selected<?php endif; ?> ><?php echo $v['title']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">文章标题 *</label>
                <div class="layui-input-block">
                    <input  type="text" name="title" lay-verify="title" value="<?php echo $article['title']; ?>"  autocomplete="off" placeholder="请输入文章标题" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">文章说明 *</label>
                <div class="layui-input-block">
                    <textarea name="remark" placeholder="文章说明" lay-verify="remark" class="layui-textarea"><?php echo $article['remark']; ?></textarea>
                </div>
            </div>

            <div class="layui-form-item" pane="">
                <label class="layui-form-label">文章标签 *</label>
                <div class="layui-input-block">
                    <?php if(is_array($article_tag) || $article_tag instanceof \think\Collection || $article_tag instanceof \think\Paginator): $i = 0; $__LIST__ = $article_tag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <input type="checkbox"  name="tags" title="<?php echo $v['name']; ?>"   lay-skin="primary" value="<?php echo $v['id']; ?>"
                    <?php if(in_array($v['id'],$article_tag_array) ){echo 'checked=""';}?> >
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>


            <div class="layui-form-item" >
                <label class="layui-form-label">原文/转载 *</label>
                <div class="layui-input-block" >
                    <?php if($article['is_reprint'] == 1): ?>
                    <input type="radio" name="is_reprint" lay-filter="is_reprint" value="1" title="原文" checked="">
                    <input type="radio" name="is_reprint" lay-filter="is_reprint" value="2" title="转载">
                    <?php else: ?>
                    <input type="radio" name="is_reprint" lay-filter="is_reprint" value="1" title="原文" >
                    <input type="radio" name="is_reprint" lay-filter="is_reprint" value="2" title="转载" checked="">
                    <?php endif; ?>
                </div>
            </div>

            <?php if($article['is_reprint'] == 1): ?>
            <div class="layui-form-item reprint_url" style="display: none;">
                <?php else: ?>
                <div class="layui-form-item reprint_url" >
                <?php endif; ?>
                <label class="layui-form-label">转载地址</label>
                <div class="layui-input-block">
                    <input  type="text" name="reprint_url" value="<?php echo $article['reprint_url']; ?>"   autocomplete="off"  placeholder="请输入转载地址" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">文章作者 *</label>
                <div class="layui-input-block">
                    <input  type="text" name="author" value="<?php echo $article['author']; ?>" lay-verify="author"  autocomplete="off" placeholder="请输入文章作者" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item" >
                <label class="layui-form-label">文章状态 *</label>
                <div class="layui-input-block" >
                    <input type="radio" name="status" value="1" title="发出"  <?php if($article['status'] == 1): ?> checked=""<?php endif; ?>>
                    <input type="radio" name="status" value="0" title="草稿" <?php if($article['status'] == 0): ?> checked=""<?php endif; ?> >
                </div>
            </div>

            <div class="layui-form-item layui-form-text">
         <label class="layui-form-label">文章内容 *</label>
              <div class="layui-input-block">
                  <div id="article_editor">
                      <?php echo $article['content']; ?>
                  </div>
                   <!-- <textarea   class="layui-textarea" name="content" lay-verify="content" id="LAY_article_editor"></textarea>-->
                </div>
          </div>

            <div class="layui-form-item" style="text-align: center;">
                <div class="layui-input-block">
                    <button id ='submit' class="layui-btn" lay-submit="" lay-filter="edit_article" style="margin-top: 30px;">提交</button>
                </div>
            </div>

        </form>
    </div>

<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/layui/layui.js"></script>



<script type="text/javascript" src="__PUBLIC__/static/common/edit/wang/wangEditor.js"></script>


<script>

    layui.use(['form', 'layedit','upload','code'], function(){
        var form = layui.form
                ,$= layui.jquery
                ,layedit = layui.layedit
                ,layupload = layui.upload
                ,layer = layui.layer;
        layui.code();
        //自定义验证规则
     /*   form.verify({
            typeid: function(value){
                if(value.length <= 0 || value==0){
                    return '请选择文章类型';
                }
            },
            title: function(value){
                if(value.length <4){
                    return '文章标题最少4个字吧';
                }
            },
            remark: function(value){
                if(value.length <= 0){
                    return '文章说明不为空';
                }
            },
            author: function(value){
                if(value.length <= 0){
                    return '文章作者不为空';
                }
            },
            content: function(value){
                if(value.length <10){
                    return '文章内容最少10个字吧';
                }
            }
        });
*/



     //富文本编辑器  (WangEdit)
        var E = window.wangEditor;
        var editor = new E('#article_editor');

        //上传图片地址
        editor.customConfig.uploadImgServer = "<?php echo url('Upload/uploadOneImage'); ?>"; // 上传图片到服务器
         //上传文件名称
        editor.customConfig.uploadFileName = 'article_image';
        //上传图片
        editor.customConfig.uploadImgHooks = {

            success: function (xhr, editor, result) {
                // console.log(result);
                // 图片上传并返回结果，图片插入成功之后触发
                // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，result 是服务器端返回的结果
            },
            fail: function (xhr, editor, result) {
                console.log('fail');
                // 图片上传并返回结果，但图片插入错误时触发
                // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，result 是服务器端返回的结果
            },
            error: function (xhr, editor) {
                console.log(xhr);
                // 图片上传出错时触发
                // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
            },
            timeout: function (xhr, editor) {
                // 图片上传超时时触发
                // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
            },
            // 如果服务器端返回的不是 {errno:0, data: [...]} 这种格式，可使用该配置
            // （但是，服务器端返回的必须是一个 JSON 格式字符串！！！否则会报错）
            customInsert: function (insertImg, result, editor) {
                // 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
                // insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果
                // 举例：假如上传图片成功后，服务器端返回的是 <?php echo url("","",true,false);?> 这种格式，即可这样插入图片：
                var url =  result.url;
                insertImg(url);
                // console.log(result);
                // result 必须是一个 JSON 格式字符串！！！否则报错
            }
        };
        editor.create();    // 或者 var editor = new E( document.getElementById('#editor') )
        //定义预览菜单
       var full =  '<div class="w-e-menu yulan" style="z-index:10001;" title="预览"><i class="layui-icon" style="font-weight: bold;">&#xe609;</i></div>';
       $('.w-e-toolbar').append(full);

       //显示预览
       $('.yulan').on('click',function () {
           layer.open({
               type: 1
               ,title: '预览'
               ,area: ['800px', '90%']
               ,scrollbar: true
               ,content: '<div class="detail-body w-e-text" style="border: 1px solid #eee; overflow-y: hidden; ">'+  editor.txt.html() +'</div>'
           });
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
        form.on('submit(edit_article)', function(data){
            //获取编辑器的内容
            data.field.content =   editor.txt.html();
            var checkArr = [];
            $("input[name='tags']").each(function () {
                if ($(this).get(0).checked) {
                    checkArr.push($(this).val());
                }
            });
           if(checkArr.length == 0){
             layer.msg('请至少选择一个文章标签！',{
             icon:2
             });
             return false;
             }
            data.field['tags'] = checkArr;   //选择的用户管理组
            edit_article($,data.field);
             return false;
        });
    });


    //提交
    function  edit_article ($,data) {
        var index = layer.msg('修改文章，请稍候',{icon: 16,time:false,shade:0.8});
        $.post("<?php echo url('Article/edit'); ?>",data,function (res) {
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