<?php /* Smarty version Smarty-3.1.15, created on 2016-12-29 16:58:58
         compiled from "C:\wamp\www\osadmin\include\template\course\schedule_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116425864c202ad4466-21356712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ff9c57a7c6a2c916927ca3a96e7586d7b990bd2' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\include\\template\\course\\schedule_modify.tpl',
      1 => 1483001936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116425864c202ad4466-21356712',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5864c202b18540_18818547',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'schedule' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5864c202b18540_18818547')) {function content_5864c202b18540_18818547($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                <label>课程编号：&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['schedule']->value['c_id'];?>
</label>
            
                <label>课程名称：&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['schedule']->value['course_name'];?>
</label>

                <label>学号：&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['schedule']->value['s_id'];?>
</label>

                <label>姓名：&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['schedule']->value['s_name'];?>
</label>

                <label>总课时：&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['schedule']->value['course_hour'];?>
</label>
                <hr>
                <label>课程进度&nbsp;&nbsp;<span class="label label-important"><?php echo $_smarty_tpl->tpl_vars['schedule']->value['course_hour'];?>
</span></label>
                <input type="text" name="ytime" value="<?php echo $_smarty_tpl->tpl_vars['schedule']->value['ytime'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>作业进度&nbsp;&nbsp;<span class="label label-important"><?php echo $_smarty_tpl->tpl_vars['schedule']->value['course_task'];?>
</span></label>
                <input type="text" name="ytask" value="<?php echo $_smarty_tpl->tpl_vars['schedule']->value['ytask'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>缺勤次数</label>
                <input type="text" name="absence" value="<?php echo $_smarty_tpl->tpl_vars['schedule']->value['absence'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程状态</label>
                <select name="state"> 
                    <option value="待学习"<?php if ($_smarty_tpl->tpl_vars['schedule']->value['state']==("待学习")) {?>selected="selected"<?php }?>>待学习</option>
                    <option value="学习"<?php if ($_smarty_tpl->tpl_vars['schedule']->value['state']==("学习")) {?>selected="selected"<?php }?>>学习</option>
                    <option value="待考核"<?php if ($_smarty_tpl->tpl_vars['schedule']->value['state']==("待考核")) {?>selected="selected"<?php }?>>待考核</option>
                    <option value="待评价"<?php if ($_smarty_tpl->tpl_vars['schedule']->value['state']==("待评价")) {?>selected="selected"<?php }?>>待评价</option>
                    
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

</script>    
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
