<?php /* Smarty version Smarty-3.1.15, created on 2016-12-20 16:52:50
         compiled from "D:\wamp\www\osadmin\uploads\include\template\course\course.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100465858dfb90b1708-67751648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26f9b97ca58223ae71473e8ca58d90d7dd340c11' => 
    array (
      0 => 'D:\\wamp\\www\\osadmin\\uploads\\include\\template\\course\\course.tpl',
      1 => 1482223966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100465858dfb90b1708-67751648',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5858dfb90ed960_23207587',
  'variables' => 
  array (
    'courses' => 0,
    'course' => 0,
    'group' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5858dfb90ed960_23207587')) {function content_5858dfb90ed960_23207587($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="btn-toolbar">
	<a href="course_add.php" class="btn btn-primary"><i class="icon-plus"></i>课程</a>
</div>
<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">课程列表</a>
	<div id="page-stats" class="block-body collapse in">
	<table class="table table-striped" >
			<thead>
			<tr>
				<th>课程编号</th>
				<th>课程名称</th>
				<th>课程人数</th>
				<th>已选人数</th>
				<th>剩余人数</th>
				<th>课程状态</th>
				<th>课程地点</th>
				<th>喜爱人数</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
			<?php  $_smarty_tpl->tpl_vars['course'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['course']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['courses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['course']->key => $_smarty_tpl->tpl_vars['course']->value) {
$_smarty_tpl->tpl_vars['course']->_loop = true;
?>
				<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['course']->value['course_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['course']->value['course_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['course']->value['course_num'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['course']->value['course_num1'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['course']->value['course_num2'];?>
</td>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['course']->value['course_state']==1) {?>在选<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['course']->value['course_state']==2) {?>已满<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['course']->value['course_state']==3) {?>未开<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['course']->value['course_state']==4) {?>正常<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['course']->value['course_state']==5) {?>停课<?php }?>
				</td>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['course']->value['course_where']==1) {?>课堂上课<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['course']->value['course_where']==2) {?>在线学习<?php }?>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['course']->value['course_like'];?>
</td>
				<td><a href="" title= "修改" ><i class="icon-pencil"></i></a>
				&nbsp;
				
				<?php if ($_smarty_tpl->tpl_vars['group']->value['group_id']!=1) {?>
				<a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="courses.php?method=del&course_id=<?php echo $_smarty_tpl->tpl_vars['course']->value['course_id'];?>
#myModal" data-toggle="modal" ></i></a>
				<?php }?></td>
				</tr>
			<?php } ?>
		  </tbody>
		</table>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
