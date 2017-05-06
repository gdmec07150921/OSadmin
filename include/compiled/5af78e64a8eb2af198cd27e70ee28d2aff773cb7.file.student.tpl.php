<?php /* Smarty version Smarty-3.1.15, created on 2016-12-29 15:18:39
         compiled from "C:\wamp\www\osadmin\include\template\course\student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48385864677142c118-53148631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5af78e64a8eb2af198cd27e70ee28d2aff773cb7' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\include\\template\\course\\student.tpl',
      1 => 1482980580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48385864677142c118-53148631',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_586467714870a7_07034494',
  'variables' => 
  array (
    '_GET' => 0,
    'students' => 0,
    'student' => 0,
    'img' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586467714870a7_07034494')) {function content_586467714870a7_07034494($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="btn-toolbar">
    <a href="student_add.php" class="btn btn-primary"><i class="icon-plus"></i>学生信息</a>
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
<input type="text" name="s_name" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['s_name'];?>
" placeholder="输入学生姓名" >
<input type="hidden" name="search" value="1" >
</div>
<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
<button type="submit" class="btn btn-primary">检索</button>
</div>
<div style="clear:both;"></div>
</form>
</div>

<div class="block">
    <a href="#page-stats" class="block-heading" data-toggle="collapse">学生信息</a>
    <div id="page-stats" class="block-body collapse in">
    <table class="table table-striped" >
            <thead>
            <tr>
                <th>学号</th>
                <th>姓名</th>
                <th>头像</th>
                <th>性别</th>
                <th>班级</th>
                <th>专业</th>
                <th>简介</th>
                <th>手机</th>
                <th>积分</th>
                <th>密码</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['student'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['student']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['students']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['student']->key => $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->_loop = true;
?>
                <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['student']->value['s_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['student']->value['s_name'];?>
</td>
                <td><img src="<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
<?php echo $_smarty_tpl->tpl_vars['student']->value['s_url'];?>
" alt=""width='50xp';></td>
                <td><?php echo $_smarty_tpl->tpl_vars['student']->value['sex'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['student']->value['classNo'];?>
</td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['student']->value['majob'];?>
    
                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['student']->value['introduce'];?>

                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['student']->value['phone'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['student']->value['integral'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['student']->value['pwd'];?>
</td>
                <td>
                    <a href="student_modify.php?s_id=<?php echo $_smarty_tpl->tpl_vars['student']->value['s_id'];?>
" title= "修改" ><i class="icon-pencil"></i></a>
                    &nbsp;
                    <a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="student.php?method=del&s_id=<?php echo $_smarty_tpl->tpl_vars['student']->value['s_id'];?>
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
