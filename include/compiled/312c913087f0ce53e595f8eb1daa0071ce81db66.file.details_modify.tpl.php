<?php /* Smarty version Smarty-3.1.15, created on 2016-12-29 15:29:57
         compiled from "C:\wamp\www\osadmin\include\template\course\details_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17575863145910fcb6-24857495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '312c913087f0ce53e595f8eb1daa0071ce81db66' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\include\\template\\course\\details_modify.tpl',
      1 => 1482972950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17575863145910fcb6-24857495',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_586314591515c3_69177030',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'details' => 0,
    'img' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586314591515c3_69177030')) {function content_586314591515c3_69177030($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写课程资料</a></li>
    </ul>   
    
    <div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="">
                <label>课程编号:&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['details']->value['course_id'];?>
</label>
                <label>课程名称:&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['details']->value['course_name'];?>
</label>
                <hr>  
                <label>老师编号</label>
                <input type="text" name="t_id" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['t_id'];?>
" class="input-xlarge" required="true" autofocus="true" onblur="check1()">
                <label>任课老师  &nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="teacher" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['t_name'];?>
" class="input-xlarge" required="true" autofocus="true" >

                <label>课程图片</label>
                <input type="text" name="course_url" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['course_url'];?>
" class="input-xlarge" required="true" autofocus="true" placeholder="images/CourseImages/">&nbsp;&nbsp;&nbsp;原图：<img src="<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
<?php echo $_smarty_tpl->tpl_vars['details']->value['course_url'];?>
" alt=""width='50xp';>
                <label>课时</label>
                <input type="text" name="course_hour" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['course_hour'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>适合人群</label>
                <input type="text" name="people" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['people'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>上课地点</label>
                <input type="text" name="course_place" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['course_place'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程安排</label>
                <input type="text" name="course_time" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['course_time'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>开课时间</label>
                <input type="date" name="course_open" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['course_open'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程概述</label>
                <input type="text" name="course_summary" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['course_summary'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程星数</label>
                <input type="text" name="course_star" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['course_star'];?>
" class="input-xlarge" required="true" autofocus="true" >
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
function check1(){
        var id = $("input[type='text'][name='t_id']").val();
        try{
            xmlhttp = new window.XMLHttpRequest();
            xmlhttp.open("GET","bb.php?id="+id,true);
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                    var str = xmlhttp.responseText;
                    if(str == ""){
                        alert("请正确输入老师编号");
                        return;
                    }else if(str == "e"){
                        return;
                    }
                    //var arr = str.split(",");
                    //alert(str);
                   $("input[type='text'][name='teacher']").val(str);
                    //$("select[name='course_state'] option[value='"+arr[1]+"']").attr("selected",true);
                    
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
