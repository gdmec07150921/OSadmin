<?php /* Smarty version Smarty-3.1.15, created on 2016-12-29 21:58:41
         compiled from "C:\wamp\www\osadmin\include\template\course\feedback_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:811858636a1b829481-08012910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff7105cd0f1516699d7e63806b301d1c77550399' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\include\\template\\course\\feedback_add.tpl',
      1 => 1483002778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '811858636a1b829481-08012910',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58636a1b843b25_39677150',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_POST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58636a1b843b25_39677150')) {function content_58636a1b843b25_39677150($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写反馈资料</a></li>
    </ul>   
    
    <div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="">
                <label>课程编号</label>
                <input type="text" name="course_id" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['course_id'];?>
" class="input-xlarge" required="true" autofocus="true" onblur="check()">                
                <label>课程名称 &nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="course_name" value="" class="input-xlarge" required="true" autofocus="true" >
                <label>反馈人学号</label>
                <input type="text" name="student_id" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['student_id'];?>
" class="input-xlarge" required="true" autofocus="true" onblur="check1()" >
                 <label>反馈人 &nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="student_name" value="" class="input-xlarge" required="true" autofocus="true" >
                <label>反馈内容</label>
                <textarea name="feedback_name" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['feedback_name'];?>
" class="input-xlarge" required="true" autofocus="true"></textarea>
                
                <div class="btn-toolbar">
                    <button type="submit" class="btn btn-primary"><strong>提交</strong></button>
                </div>
              
            </form>
        </div>
    </div>
</div>
<script>
$('#icon_select').click(function(){
$('#myModal').modal({
backdrop:true,
keyboard:true,
show:true
});
});

$('.icon').click(function(){
var obj=$(this);
$('#icon_preview').removeClass().addClass(obj.text());
$('#icon_id').val(obj.text());
$('#myModal').modal('toggle');
});

    function check(){
        var id = $("input[type='text'][name='course_id']").val();
        //$("input[type='text'][name='course_id']").val("没有此课程编号");
        try{
            xmlhttp = new window.XMLHttpRequest();
            xmlhttp.open("GET","aa.php?id="+id,true);
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                    var str = xmlhttp.responseText;
                    //alert(id);
                    if(str == ""){
                        $("input[type='text'][name='course_id']").val("没有此课程编号");
                       
                        return;
                    }else if(str == "e"){
                        return;
                    }
                    var arr = str.split(",");
                    $("input[type='text'][name='course_name']").val(arr[0]);
                   
                    
                }
            }
            xmlhttp.send();
        }catch(e){
            xmlhttp = new ActiveXObject("MICROSOFT.X");
        }

    }
    function check1(){
        var id = $("input[type='text'][name='student_id']").val();
        //$("input[type='text'][name='course_id']").val("没有此课程编号");
        try{
            xmlhttp = new window.XMLHttpRequest();
            xmlhttp.open("GET","cc.php?id="+id,true);
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                    var str = xmlhttp.responseText;
                    //alert(id);
                    if(str == ""){
                        $("input[type='text'][name='student_id']").val("没有此学号");
                       
                        return;
                    }else if(str == "e"){
                        return;
                    }
                    
                    $("input[type='text'][name='student_name']").val(str);
                   
                    
                }
            }
            xmlhttp.send();
        }catch(e){
            xmlhttp = new ActiveXObject("MICROSOFT.X");
        }

    }
</script>    
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
