<?php /* Smarty version Smarty-3.1.15, created on 2016-12-26 08:46:27
         compiled from "C:\wamp\www\osadmin\uploads\include\template\course\evaluate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21580585a3b40ecb832-97075244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68205b42be32354cc68cf72655d2fdad5af67bdc' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\uploads\\include\\template\\course\\evaluate.tpl',
      1 => 1482461714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21580585a3b40ecb832-97075244',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_585a3b40ef83e2_66930889',
  'variables' => 
  array (
    '_GET' => 0,
    'evaluates' => 0,
    'evaluate' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585a3b40ef83e2_66930889')) {function content_585a3b40ef83e2_66930889($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="btn-toolbar">
    <a href="evaluate_add.php" class="btn btn-primary"><i class="icon-plus"></i>评价</a>
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
<input type="text" name="evaluate_course_name" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['evaluate_course_name'];?>
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
    <a href="#page-stats" class="block-heading" data-toggle="collapse">课程评价</a>
    <div id="page-stats" class="block-body collapse in">
    <table class="table table-striped" >
     
            <thead>
            <tr>

                <th>课程编号</th>
                <th>课程名称</th>
                <th>评价人</th>
                <th>评价内容</th>
                <th>评价时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['evaluate'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['evaluate']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['evaluates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['evaluate']->key => $_smarty_tpl->tpl_vars['evaluate']->value) {
$_smarty_tpl->tpl_vars['evaluate']->_loop = true;
?>
                <tr>

                <td><?php echo $_smarty_tpl->tpl_vars['evaluate']->value['evaluate_course_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['evaluate']->value['evaluate_course_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['evaluate']->value['evaluate_user_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['evaluate']->value['evaluate_content'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['evaluate']->value['evaluate_time'];?>
</td>
                
                <td>
                <a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="evaluate.php?method=del&evaluate_course_id=<?php echo $_smarty_tpl->tpl_vars['evaluate']->value['evaluate_course_id'];?>
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
