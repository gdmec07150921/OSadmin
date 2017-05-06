<?php
require ('../include/init.inc.php');
$search=$method =$id= $course_id = $course_name = $student_id =$evaluate_content=$evaluate_time=$evaluate_star= '';
extract ( $_GET, EXTR_IF_EXISTS );

if ($method == 'del' && ! empty ( $id )) {
    //var_dump($method);
    $evaluate = Evaluate::getEvaluateByID($id);
    $result = Evaluate::delEvaluate ( $id );
    //var_dump($result);
    if ($result) {

      SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'evaluate' ,$id, json_encode( $evaluate) );

      Common::exitWithSuccess ('课程删除成功','course/evaluate.php');
    }else{
            OSAdmin::alert("error");
        }
}

//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;

if($search){

    $row_count = Evaluate::countSearch($course_id); 
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $evaluate = Evaluate::search($course_id,$menu_name,$start , $page_size);
    
}else{
    //echo('if not seatch');
    $row_count = Evaluate::count ();
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $evaluate = Evaluate::getAllEvaluate ( $start , $page_size );
    //var_dump(json_encode($evaluate));
}


$page_html=Pagination::showPager("evaluate.php?course_id=$course_id&search=$search",$page_no,$page_size,$row_count);

//$evaluate = Evaluate::getCourses();
$radio_types=array(0=>"Male",1=>"Female");

$confirm_html = OSAdmin::renderJsConfirm("icon-remove");
//echo(ADMIN_URL.TEMPLATE_DIR);
Template::assign ( 'page_no', $page_no );//当前页码
Template::assign ( '_GET', $_GET);
Template::assign('evaluates', $evaluate);//主数据
Template::assign ( 'img', IMG_URL);
Template::assign('radio_types', $radio_types);
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'page_html', $page_html );//分页
Template::display('course/evaluate.tpl');