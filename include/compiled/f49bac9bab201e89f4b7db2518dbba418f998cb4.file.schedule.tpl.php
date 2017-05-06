<?php /* Smarty version Smarty-3.1.15, created on 2016-12-29 16:51:16
         compiled from "C:\wamp\www\osadmin\include\template\course\schedule.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14590586486f63d9804-06658064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f49bac9bab201e89f4b7db2518dbba418f998cb4' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\include\\template\\course\\schedule.tpl',
      1 => 1483001470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14590586486f63d9804-06658064',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_586486f64358f8_32623441',
  'variables' => 
  array (
    '_GET' => 0,
    'schedules' => 0,
    'schedule' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586486f64358f8_32623441')) {function content_586486f64358f8_32623441($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="btn-toolbar">
    <a href="schedule_add.php" class="btn btn-primary"><i class="icon-plus"></i>选课信息</a>
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
<input type="text" name="s_id" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['s_id'];?>
" placeholder="输入学号" >
<input type="hidden" name="search" value="1" >
</div>
<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
<button type="submit" class="btn btn-primary">检索</button>
</div>
<div style="clear:both;"></div>
</form>
</div>

<div class="block">
    <a href="#page-stats" class="block-heading" data-toggle="collapse">学生选课</a>
    <div id="page-stats" class="block-body collapse in">
    <table class="table table-striped" >
            <thead>
            <tr>
                <th>课程编号</th>
                <th>课程名称</th>
                <th>学号</th>
                <th>姓名</th>
                <th>课程进度</th>
                <th>作业进度</th>
                <th>缺勤次数</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['schedule'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['schedule']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['schedules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['schedule']->key => $_smarty_tpl->tpl_vars['schedule']->value) {
$_smarty_tpl->tpl_vars['schedule']->_loop = true;
?>
                <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['schedule']->value['c_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['schedule']->value['course_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['schedule']->value['s_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['schedule']->value['s_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['schedule']->value['ytime'];?>
/<?php echo $_smarty_tpl->tpl_vars['schedule']->value['course_hour'];?>
</td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['schedule']->value['ytask'];?>
/<?php echo $_smarty_tpl->tpl_vars['schedule']->value['course_task'];?>

                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['schedule']->value['absence'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['schedule']->value['state'];?>
</td>
                <td>
                    <a href="schedule_modify.php?c_id=<?php echo $_smarty_tpl->tpl_vars['schedule']->value['c_id'];?>
&s_id=<?php echo $_smarty_tpl->tpl_vars['schedule']->value['s_id'];?>
" title= "修改" ><i class="icon-pencil"></i></a>
                    &nbsp;
                    <a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="schedule.php?method=del&c_id=<?php echo $_smarty_tpl->tpl_vars['schedule']->value['c_id'];?>
&s_id=<?php echo $_smarty_tpl->tpl_vars['schedule']->value['s_id'];?>
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
