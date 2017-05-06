<?php /* Smarty version Smarty-3.1.15, created on 2016-12-26 14:58:29
         compiled from "C:\wamp\www\osadmin\uploads\include\template\course\course.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4219585a199d7cbd05-38465905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2d82a64dcd02174e7774137a0566f96e74b8dff' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\uploads\\include\\template\\course\\course.tpl',
      1 => 1482716414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4219585a199d7cbd05-38465905',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_585a199d835df3_68787096',
  'variables' => 
  array (
    '_GET' => 0,
    'courses' => 0,
    'course' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585a199d835df3_68787096')) {function content_585a199d835df3_68787096($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="btn-toolbar">
	<a href="course_add.php" class="btn btn-primary"><i class="icon-plus"></i>课程</a>
<a data-toggle="collapse" data-target="#search"  href="#" title= "检索"><button class="btn btn-primary" style="margin-left:5px"><i class="icon-search"></i></button></a>
</div>

<!-- 下面是可折叠搜索栏 -->
<?php if ($_smarty_tpl->tpl_vars['_GET']->value['search']) {?>
<div id="search" class="collapse in">
<?php } else { ?>
<div id="search" class="collapse out" >
<?php }?>
<form class="form_search"  action="" method="GET" style="margin-bottom:0px">
<div style="float:left;margin-right:5px">
<label>查询所有请留空</label>
<input type="text" name="course_name" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['course_name'];?>
" placeholder="输入课程名称" >
<input type="hidden" name="search" value="1" >
</div>
<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
<button type="submit" class="btn btn-primary">检索</button>
</div>
<div style="clear:both;"></div>
</form>
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
					<?php echo $_smarty_tpl->tpl_vars['course']->value['course_state'];?>
	
				</td>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['course']->value['course_where'];?>

				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['course']->value['course_like'];?>
</td>
				<td>
					<a href="course_modify.php?course_id=<?php echo $_smarty_tpl->tpl_vars['course']->value['course_id'];?>
" title= "修改" ><i class="icon-pencil"></i></a>
					&nbsp;
					<a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="course.php?method=del&course_id=<?php echo $_smarty_tpl->tpl_vars['course']->value['course_id'];?>
"></i></a>
				</td>
				</tr>
			<?php } ?>
		  </tbody>
		</table>
		<!--- START 分页模板 --->
               <?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>

        <!--- END 分页--->	
	</div>
</div>

<!---操作的确认层，相当于javascript:confirm函数--->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_confirm']->value;?>

	
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
