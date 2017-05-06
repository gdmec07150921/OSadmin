<?php /* Smarty version Smarty-3.1.15, created on 2016-12-26 15:32:19
         compiled from "C:\wamp\www\osadmin\uploads\include\template\course\details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7231585a9b28418209-00631454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b55a304e75bdc316b1dc30c261258e35de33f99d' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\uploads\\include\\template\\course\\details.tpl',
      1 => 1482737537,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7231585a9b28418209-00631454',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_585a9b28468495_23835444',
  'variables' => 
  array (
    '_GET' => 0,
    'details' => 0,
    'det' => 0,
    'img' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585a9b28468495_23835444')) {function content_585a9b28468495_23835444($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="btn-toolbar">
    <a href="details_add.php" class="btn btn-primary"><i class="icon-plus"></i>课程详情</a>
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
    <a href="#page-stats" class="block-heading" data-toggle="collapse">课程详情</a>
    <div id="page-stats" class="block-body collapse in">
    <table class="table table-striped" >
            <thead>
            <tr>
                <th>课程编号</th>
                <th>课程名称</th>
                <th>课程图片</th>
                <th>课程老师</th>
                <th>老师头像</th>
                <th>课时</th>
                <th>适合人群</th>
                <th>开课时间</th>
                <th>课程概述</th>
                <th>课程星数</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['det'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['det']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['det']->key => $_smarty_tpl->tpl_vars['det']->value) {
$_smarty_tpl->tpl_vars['det']->_loop = true;
?>
                <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['det']->value['course_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['det']->value['course_name'];?>
</td>
                <td><img src="<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
<?php echo $_smarty_tpl->tpl_vars['det']->value['course_url'];?>
" alt="" width='80xp';></td>
                <td><?php echo $_smarty_tpl->tpl_vars['det']->value['t_name'];?>
</td>
                <td><img src="<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
<?php echo $_smarty_tpl->tpl_vars['det']->value['t_url'];?>
" alt=""width='50xp';></td>
                <td><?php echo $_smarty_tpl->tpl_vars['det']->value['course_hour'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['det']->value['people'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['det']->value['course_open'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['det']->value['course_summary'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['det']->value['course_star'];?>
</td>
                <td><a href="details_modify.php?course_id=<?php echo $_smarty_tpl->tpl_vars['det']->value['course_id'];?>
" title= "修改" ><i class="icon-pencil"></i></a>
                &nbsp;
                
                
                <a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="details.php?method=del&course_id=<?php echo $_smarty_tpl->tpl_vars['det']->value['course_id'];?>
#myModal" data-toggle="modal" ></i></a>
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
