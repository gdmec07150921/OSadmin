<?php /* Smarty version Smarty-3.1.15, created on 2016-12-29 19:15:01
         compiled from "C:\wamp\www\osadmin\include\template\course\teacher_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190865864e82c843c49-62638895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '059533ed2f739e9f7f85771d2853468d2555013d' => 
    array (
      0 => 'C:\\wamp\\www\\osadmin\\include\\template\\course\\teacher_add.tpl',
      1 => 1483010099,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190865864e82c843c49-62638895',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5864e82c874411_26009471',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_POST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5864e82c874411_26009471')) {function content_5864e82c874411_26009471($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填学生程资料</a></li>
    </ul>   
    
    <div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="" onsubmit="return check()" name="from1">
                <label>工号&nbsp;&nbsp;<span class="label label-important" id="div1"></span></label>
                <input type="text" name="t_id" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['t_id'];?>
" class="input-xlarge" required="true" autofocus="true" onblur="check1()" >
                <label>姓名</label>
                <input type="text" name="t_name" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['t_name'];?>
" class="input-xlarge" required="true" autofocus="true" >
                <label>头像</label>
                <input type="text" name="t_url" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['t_url'];?>
" class="input-xlarge" required="true" autofocus="true"  placeholder="images/TeacherImages/">
                <label>性别</label>
                <select name="t_sex"> 
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select>
                <label>简介</label>
                <textarea name="t_introduce" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['t_introduce'];?>
" class="input-xlarge" required="true" autofocus="true"></textarea>
                
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
function check(){
        if(check1()){
            return true;
        }else{
            return false;
        }
    }
    function check1(){

            var reg=/^\d{4}$/;
            var div1= document.getElementById("div1");
           
            var id = $("input[type='text'][name='t_id']").val();
            if (!reg.test(id)) {
                return false;
                div1.innerHTML="工号必须是4个数字";
            }else{
                div1.innerHTML="";
                return true;
            }
        }
       
</script>    
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
