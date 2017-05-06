<?php
require ('../include/init.inc.php');
$method = $user_id = $page_no = '';
extract ( $_GET, EXTR_IF_EXISTS );

$mine = Feedback::getMine();
$radio_types=array(0=>"Male",1=>"Female");

Template::assign('mines', $mine);
Template::assign('radio_types', $radio_types);
Template::display('course/mine.tpl');
?>