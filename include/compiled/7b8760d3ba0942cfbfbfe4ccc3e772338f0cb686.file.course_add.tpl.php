<?php /* Smarty version Smarty-3.1.15, created on 2016-12-26 16:23:28
         compiled from "C:\wamp\www\osadmin\uploads\include\template\course\course_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8483585a1d8ea0e9d5-86386040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b8760d3ba0942cfbfbfe4ccc3e772338f0cb686' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\uploads\\include\\template\\course\\course_add.tpl',
      1 => 1482737511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8483585a1d8ea0e9d5-86386040',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_585a1d8ea51f36_75909157',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_POST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585a1d8ea51f36_75909157')) {function content_585a1d8ea51f36_75909157($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                <input type="text" name="course_id" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['course_id'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程名称</label>
                <input type="text" name="course_name" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['course_name'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程人数</label>
                <input type="text" name="course_num" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['course_num'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>已选人数</label>
                <input type="text" name="course_num1" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['course_num1'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>剩余人数</label>
                <input type="text" name="course_num2" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['course_num2'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>课程状态</label>
                <select name="course_state"> 
                    <option value="在选">在选</option>
                    <option value="已满">已满</option>
                    <option value="未开">未开</option>
                    <option value="正常">正常</option>
                    <option value="停课">停课</option>
                </select>
                <label>课程地点</label>
                <select name="course_where"> 
                    <option value="教室">教室</option>
                    <option value="在线">在线</option>
                </select>
                <label>喜爱人数</label>
                <input type="text" name="course_like" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['course_like'];?>
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
