<?php /* Smarty version Smarty-3.1.15, created on 2016-12-20 15:00:42
         compiled from "D:\wamp\www\osadmin\uploads\include\template\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40405858d71aa96e90-91805061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23f3b0e7ac2672322a9e204924bc0c802aab0ad6' => 
    array (
      0 => 'D:\\wamp\\www\\osadmin\\uploads\\include\\template\\header.tpl',
      1 => 1458323676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40405858d71aa96e90-91805061',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5858d71aad83e5_54441111',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5858d71aad83e5_54441111')) {function content_5858d71aad83e5_54441111($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
 - <?php echo @constant('ADMIN_TITLE');?>
 - Powered by OSAdmin!</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="<?php echo @constant('ADMIN_URL');?>
/assets/lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" href="<?php echo @constant('ADMIN_URL');?>
/assets/stylesheets_<?php echo $_smarty_tpl->tpl_vars['user_info']->value['template'];?>
/theme.css">
    <link rel="stylesheet" href="<?php echo @constant('ADMIN_URL');?>
/assets/lib/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo @constant('ADMIN_URL');?>
/assets/css/other.css">
	<link rel="stylesheet" href="<?php echo @constant('ADMIN_URL');?>
/assets/css/jquery-ui.css" />
	
    <script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/jquery-1.8.1.min.js" ></script>
	<script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/jquery.cookie.js" ></script>
	<script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/bootstrap/js/bootbox.min.js"></script>
	<script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/bootstrap/js/bootstrap-modal.js"></script>
	<script src="<?php echo @constant('ADMIN_URL');?>
/assets/js/other.js"></script>
	<script src="<?php echo @constant('ADMIN_URL');?>
/assets/js/jquery-ui.js"></script>
    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

  </head>
<?php }} ?>
