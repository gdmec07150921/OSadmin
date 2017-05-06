<?php /* Smarty version Smarty-3.1.15, created on 2016-12-29 20:28:24
         compiled from "C:\wamp\www\osadmin\include\template\course\question_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20430586501683e8e00-48707282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2f8efcc666eafcd86fac447d31918594e8c6f56' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\include\\template\\course\\question_modify.tpl',
      1 => 1483014011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20430586501683e8e00-48707282',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'question' => 0,
    '_POST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5865016841ed81_39540691',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5865016841ed81_39540691')) {function content_5865016841ed81_39540691($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                <input type="hidden" name="question_no" value="<?php echo $_smarty_tpl->tpl_vars['question']->value['question_no'];?>
">
                <label>课程编号：&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['question']->value['course_id'];?>
</label>
                               
                <label>课程名称： &nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['question']->value['course_name'];?>
</label>
                
                <label>提问人学号：&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['question']->value['student_id'];?>
</label>

                <label>提问内容</label>
                <p><?php echo $_smarty_tpl->tpl_vars['question']->value['question_name'];?>
</p>
                <hr>
                <label>回复内容</label>
                <textarea name="question_answer" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['feedback_answer'];?>
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
