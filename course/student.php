<?php
require ('../include/init.inc.php');
$search=$method = $s_id = $s_name = $introduce =$sex=$majob=$s_url=$classNo=$pwd=$phone=$integral= '';
extract ( $_GET, EXTR_IF_EXISTS );

if ($method == 'del' && ! empty ( $s_id )) {
    //var_dump($method);
    $student = Student::getStudentByID($s_id);
    $result = Student::delStudent ( $s_id );
    var_dump($result);
    if ($result) {

      SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'student' ,$s_id, json_encode( $course) );

      Common::exitWithSuccess ('课程删除成功','course/student.php');
    }else{
            OSAdmin::alert("error");
        }
}

//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;

if($search){

    $row_count = Student::countSearch($course_name); 
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $student = Student::search($s_name,$menu_name,$start , $page_size);
    
}else{
    //echo('if not seatch');
    $row_count = Student::count ();
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $student = Student::getAllStudent ( $start , $page_size );
    //var_dump(json_encode($student));
}


$page_html=Pagination::showPager("student.php?s_id=$s_id&s_name=$s_name&search=$search",$page_no,$page_size,$row_count);

//$student = Course::getCourses();
$radio_types=array(0=>"Male",1=>"Female");

$confirm_html = OSAdmin::renderJsConfirm("icon-remove");
//echo(ADMIN_URL.TEMPLATE_DIR);
Template::assign ( 'page_no', $page_no );//当前页码
Template::assign ( '_GET', $_GET);
Template::assign('students', $student);//主数据
Template::assign ( 'img', IMG_URL);
Template::assign('radio_types', $radio_types);
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'page_html', $page_html );//分页
Template::display('course/student.tpl');