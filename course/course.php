<?php
require ('../include/init.inc.php');
$search=$method = $course_id = $course_name = $course_num =$course_num1=$course_num2=$course_where=$course_like=$course_state= '';
extract ( $_GET, EXTR_IF_EXISTS );

if ($method == 'del' && ! empty ( $course_id )) {
    //var_dump($method);
    $course = Course::getCourseByID($course_id);
    $result = Course::delCourse ( $course_id );
    var_dump($result);
    if ($result) {

      SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'course' ,$course_id, json_encode( $course) );

      Common::exitWithSuccess ('课程删除成功','course/course.php');
    }else{
            OSAdmin::alert("error");
        }
}

//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;

if($search){

    $row_count = Course::countSearch($course_name); 
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $courses = Course::search($course_name,$menu_name,$start , $page_size);
    
}else{
    //echo('if not seatch');
    $row_count = Course::count ();
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $courses = Course::getAllCourses ( $start , $page_size );
    //var_dump(json_encode($courses));
}


$page_html=Pagination::showPager("course.php?course_id=$course_id&course_name=$course_name&search=$search",$page_no,$page_size,$row_count);

//$courses = Course::getCourses();
$radio_types=array(0=>"Male",1=>"Female");

$confirm_html = OSAdmin::renderJsConfirm("icon-remove");
//echo(ADMIN_URL.TEMPLATE_DIR);
Template::assign ( 'page_no', $page_no );//当前页码
Template::assign ( '_GET', $_GET);
Template::assign('courses', $courses);//主数据
Template::assign('radio_types', $radio_types);
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'page_html', $page_html );//分页
Template::display('course/course.tpl');