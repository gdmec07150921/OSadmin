<?php
require ('../include/init.inc.php');
$search=$method =$feedback_no= $course_id = $feedback_name = $student_id =$course_name=$feedback_answer=$feedback_state=$feedback_time= '';
extract ( $_GET, EXTR_IF_EXISTS );

if ($method == 'del' && ! empty ( $feedback_no )) {
    var_dump($method);
    $feedback = Feedback::getFeedbackByID($feedback_no);
    $result = Feedback::delFeedback ( $feedback_no );
    //var_dump($result);
    if ($result) {

      SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'feedback' ,$id, json_encode( $feedback) );

      Common::exitWithSuccess ('课程删除成功','course/feedback.php');
    }else{
            OSAdmin::alert("error");
        }
}

//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;

if($search){

    $row_count = Feedback::countSearch($course_id); 
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $feedback = Feedback::search($course_id,$menu_name,$start , $page_size);
    
}else{
    //echo('if not seatch');
    $row_count = Feedback::count ();
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $feedback = Feedback::getAllFeedback ( $start , $page_size );
    //var_dump(json_encode($feedback));
}


$page_html=Pagination::showPager("feedback.php?course_id=$course_id&search=$search",$page_no,$page_size,$row_count);

//$feedback = Feedback::getCourses();
$radio_types=array(0=>"Male",1=>"Female");

$confirm_html = OSAdmin::renderJsConfirm("icon-remove");
//echo(ADMIN_URL.TEMPLATE_DIR);
Template::assign ( 'page_no', $page_no );//当前页码
Template::assign ( '_GET', $_GET);
Template::assign('feedbacks', $feedback);//主数据
Template::assign ( 'img', IMG_URL);
Template::assign('radio_types', $radio_types);
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'page_html', $page_html );//分页
Template::display('course/feedback.tpl');