<?php /* Smarty version Smarty-3.1.15, created on 2016-12-29 20:26:00
         compiled from "C:\wamp\www\osadmin\include\template\course\question.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9424586500d8cc0e89-52072022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18fd6852a59af0d15ce63cf2a92c8cdd354ac7d9' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\include\\template\\course\\question.tpl',
      1 => 1483013912,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9424586500d8cc0e89-52072022',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_GET' => 0,
    'questions' => 0,
    'question' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_586500d8d057b4_39049315',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586500d8d057b4_39049315')) {function content_586500d8d057b4_39049315($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="btn-toolbar">
    <a href="question_add.php" class="btn btn-primary"><i class="icon-plus"></i>提问</a>
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
<input type="text" name="course_id" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['course_id'];?>
" placeholder="输入课程编号" >
<input type="hidden" name="search" value="1" >
</div>
<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
<button type="submit" class="btn btn-primary">检索</button>
</div>
<div style="clear:both;"></div>
</form>
</div>
<div class="block">
    <a href="#page-stats" class="block-heading" data-toggle="collapse">课程提问</a>
    <div id="page-stats" class="block-body collapse in">
    <table class="table table-striped" >
     
            <thead>
            <tr>
                <th>#</th>
                <th>课程编号</th>
                <th>课程名称</th>
                <th>提问人学号</th>
                <th>提问内容</th>
                <th>回复</th>
                <th>提问时间</th>

                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['questions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
?>
                <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['question']->value['question_no'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['question']->value['course_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['question']->value['course_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['question']->value['student_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['question']->value['question_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['question']->value['question_answer'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['question']->value['question_time'];?>
</td>
                
                <td><a href="question_modify.php?question_no=<?php echo $_smarty_tpl->tpl_vars['question']->value['question_no'];?>
" title= "回复" ><i class="icon-pencil"></i></a>
                &nbsp;
                <a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="question.php?method=del&question_no=<?php echo $_smarty_tpl->tpl_vars['question']->value['question_no'];?>
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
