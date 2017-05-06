<?php /* Smarty version Smarty-3.1.15, created on 2016-12-29 17:17:01
         compiled from "C:\wamp\www\osadmin\include\template\course\schedule_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133335864a260bdae55-69887919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '084ad0c8b0850066d2a890ee0cb9e4a00fc286db' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\include\\template\\course\\schedule_add.tpl',
      1 => 1483003013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133335864a260bdae55-69887919',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5864a260c09f84_20521942',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_POST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5864a260c09f84_20521942')) {function content_5864a260c09f84_20521942($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写选课资料</a></li>
    </ul>   
    
    <div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="">
                <label>课程编号</label>
                <input type="text" name="c_id" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['c_id'];?>
" class="input-xlarge" required="true" autofocus="true" onblur="check()" >
                <label>课程名称&nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="course_name" value="" class="input-xlarge" required="true" autofocus="true" >
                <label>学号</label>
                <input type="text" name="s_id" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['s_id'];?>
" class="input-xlarge" required="true" autofocus="true" onblur="check1()" >
                <label>姓名&nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="s_name" value="" class="input-xlarge" required="true" autofocus="true" >
                <label>总课时&nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="course_hour" value="" class="input-xlarge" required="true" autofocus="true" >
                <label>已完成课时</label>
                <input type="text" name="ytime" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['ytime'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>总作业次数&nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="course_task" value="" class="input-xlarge" required="true" autofocus="true" >
                <label>已完成作业次数</label>
                <input type="text" name="ytask" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['ytask'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>缺勤次数</label>
                <input type="text" name="absence" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['absence'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程状态</label>
                <select name="state"> 
                    <option value="待学习">待学习</option>
                    <option value="学习">学习</option>
                    <option value="待考核">待考核</option>
                    <option value="待评价">待评价</option>
                    
                </select>
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
        var id = $("input[type='text'][name='c_id']").val();
        //$("input[type='text'][name='course_id']").val("没有此课程编号");
        try{
            xmlhttp = new window.XMLHttpRequest();
            xmlhttp.open("GET","aa.php?id="+id,true);

            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                    var str = xmlhttp.responseText;
                    //alert(id);
                    if(str == ""){
                        $("input[type='text'][name='c_id']").val("没有此课程编号");
                       
                        return;
                    }else if(str == "e"){
                        return;
                    }
                    var arr = str.split(",");
                    $("input[type='text'][name='course_name']").val(arr[0]);
                    $("input[type='text'][name='course_hour']").val(arr[1]);
                    $("input[type='text'][name='course_task']").val(arr[2]);
                }
            }
            xmlhttp.send();
        }catch(e){
            xmlhttp = new ActiveXObject("MICROSOFT.X");
        }

    }
    function check1(){
        var id = $("input[type='text'][name='s_id']").val();
        //$("input[type='text'][name='course_id']").val("没有此课程编号");
        try{
            xmlhttp = new window.XMLHttpRequest();
            xmlhttp.open("GET","cc.php?id="+id,true);

            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                    var str = xmlhttp.responseText;
                    //alert(id);
                    if(str == ""){
                        $("input[type='text'][name='s_id']").val("没有此学号");
                       
                        return;
                    }else if(str == "e"){
                        return;
                    }
                    
                    $("input[type='text'][name='s_name']").val(str);
                    
                }
            }
            xmlhttp.send();
        }catch(e){
            xmlhttp = new ActiveXObject("MICROSOFT.X");
        }

    }
function check2(){
        var id = $("input[type='text'][name='c_id']").val();
        //$("input[type='text'][name='c_id']").val("没有此课程编号");
        try{
            xmlhttp = new window.XMLHttpRequest();
            xmlhttp.open("GET","dd.php?id="+id,true);

            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                    var str = xmlhttp.responseText;
                    //alert(id);
                    if(str == ""){
                        $("input[type='text'][name='c_id']").val("没有此课程编号");
                       
                        return;
                    }else if(str == "e"){
                        return;
                    }
                    
                    $("input[type='text'][name='course_hour']").val(str);
                   
                    
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
