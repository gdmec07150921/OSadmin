<?php /* Smarty version Smarty-3.1.15, created on 2016-12-29 20:35:11
         compiled from "C:\wamp\www\osadmin\include\template\course\feedback_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1214258645e5de4f4f1-87825621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a38be80065a3bf1c0a2446f8cf52cc4918084aa4' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\include\\template\\course\\feedback_modify.tpl',
      1 => 1482973126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1214258645e5de4f4f1-87825621',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58645e5de7cd63_04368912',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'feedback' => 0,
    '_POST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58645e5de7cd63_04368912')) {function content_58645e5de7cd63_04368912($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                <input type="hidden" name="feedback_no" value="<?php echo $_smarty_tpl->tpl_vars['feedback']->value['feedback_no'];?>
">
                <label>课程编号：&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['feedback']->value['course_id'];?>
</label>
                               
                <label>课程名称： &nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['feedback']->value['course_name'];?>
</label>
                
                <label>反馈人学号：&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['feedback']->value['student_id'];?>
</label>

                <label>反馈内容</label>
                <p><?php echo $_smarty_tpl->tpl_vars['feedback']->value['feedback_name'];?>
</p>
                <hr>
                <label>回复内容</label>
                <textarea name="feedback_answer" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['feedback_answer'];?>
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

</script>    
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
