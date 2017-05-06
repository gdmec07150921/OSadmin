<?php /* Smarty version Smarty-3.1.15, created on 2016-12-23 09:22:26
         compiled from "C:\wamp\www\osadmin\uploads\include\template\course\details_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30158585c7c52bd8ea9-20770052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47dd455be74bcb6a637e57e80e03c9a3f486e43d' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\uploads\\include\\template\\course\\details_modify.tpl',
      1 => 1482456013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30158585c7c52bd8ea9-20770052',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'details' => 0,
    'img' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_585c7c52c1e1a8_00446699',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585c7c52c1e1a8_00446699')) {function content_585c7c52c1e1a8_00446699($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                <label>课程编号</label>
                <label><?php echo $_smarty_tpl->tpl_vars['details']->value['details_course_id'];?>
</label>
                <label>课程名称</label>
                <label><?php echo $_smarty_tpl->tpl_vars['details']->value['details_course_name'];?>
</label>
                <label>课程图片</label>
                <input type="text" name="course_url" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['course_url'];?>
" class="input-xlarge" required="true" autofocus="true" >&nbsp;&nbsp;&nbsp;原图：<img src="<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
<?php echo $_smarty_tpl->tpl_vars['details']->value['course_url'];?>
" alt=""width='50xp';>
                <label>课程老师</label>
                <input type="text" name="details_teacher" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['details_teacher'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>老师头像</label>
                <input type="text" name="teacher_url" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['teacher_url'];?>
" class="input-xlarge" required="true" autofocus="true" >&nbsp;&nbsp;&nbsp;原图：<img src="<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
<?php echo $_smarty_tpl->tpl_vars['details']->value['teacher_url'];?>
" alt=""width='50xp';>
                <label>课时</label>
                <input type="text" name="details_hour" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['details_hour'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>上课地点</label>
                <input type="text" name="details_where" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['details_where'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>上课时间</label>
                <input type="text" name="details_time" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['details_time'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程概述</label>
                <input type="text" name="details_summary" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['details_summary'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程评价</label>
                <input type="text" name="details_evaluate" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['details_evaluate'];?>
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
</script>    
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
