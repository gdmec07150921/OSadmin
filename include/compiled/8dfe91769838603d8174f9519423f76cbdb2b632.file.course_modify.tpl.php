<?php /* Smarty version Smarty-3.1.15, created on 2016-12-27 16:31:49
         compiled from "/Applications/MAMP/htdocs/include/template/course/course_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99277762586226f51b0f63-35891881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dfe91769838603d8174f9519423f76cbdb2b632' => 
    array (
      0 => '/Applications/MAMP/htdocs/include/template/course/course_modify.tpl',
      1 => 1482718220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99277762586226f51b0f63-35891881',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'course' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_586226f51e8e14_41539997',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586226f51e8e14_41539997')) {function content_586226f51e8e14_41539997($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                <input type="text" name="course_id" value="<?php echo $_smarty_tpl->tpl_vars['course']->value['course_id'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程名称</label>
                <input type="text" name="course_name" value="<?php echo $_smarty_tpl->tpl_vars['course']->value['course_name'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程人数</label>
                <input type="text" name="course_num" value="<?php echo $_smarty_tpl->tpl_vars['course']->value['course_num'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>已选人数</label>
                <input type="text" name="course_num1" value="<?php echo $_smarty_tpl->tpl_vars['course']->value['course_num1'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>剩余人数</label>
                <input type="text" name="course_num2" value="<?php echo $_smarty_tpl->tpl_vars['course']->value['course_num2'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程状态</label>
                <select name="course_state"> 
                    <option value="在选" <?php if ($_smarty_tpl->tpl_vars['course']->value['course_state']==("在选")) {?>selected="selected"<?php }?> >在选</option>
                    <option value="已满" <?php if ($_smarty_tpl->tpl_vars['course']->value['course_state']==("已满")) {?>selected="selected"<?php }?> >已满</option>
                    <option value="未开" <?php if ($_smarty_tpl->tpl_vars['course']->value['course_state']==("未开")) {?>selected="selected"<?php }?> >未开</option>
                    <option value="正常" <?php if ($_smarty_tpl->tpl_vars['course']->value['course_state']==("正常")) {?>selected="selected"<?php }?> >正常</option>
                    <option value="停课" <?php if ($_smarty_tpl->tpl_vars['course']->value['course_state']==("停课")) {?>selected="selected"<?php }?> >停课</option>
                </select>
                <label>课程地点</label>
                <select name="course_where"> 
                    <option value="教室" <?php if ($_smarty_tpl->tpl_vars['course']->value['course_where']==("教室")) {?>selected="selected"<?php }?>>教室</option>
                    <option value="在线" <?php if ($_smarty_tpl->tpl_vars['course']->value['course_where']==("在线")) {?>selected="selected"<?php }?>>在线</option>
                </select>
                <label>喜爱人数</label>
                <input type="text" name="course_like" value="<?php echo $_smarty_tpl->tpl_vars['course']->value['course_like'];?>
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
