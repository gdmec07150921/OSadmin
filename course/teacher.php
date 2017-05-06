<?php
require ('../include/init.inc.php');
$search=$method = $t_id = $t_name = $t_sex =$t_introduce=$t_url= '';
extract ( $_GET, EXTR_IF_EXISTS );

if ($method == 'del' && ! empty ( $t_id )) {
    //var_dump($method);
    $teacher = Teacher::getTeacherByID($t_id);
    $result = Teacher::delTeacher ( $t_id );
    //var_dump($result);
    if ($result) {

      SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'teacher' ,$t_id, json_encode( $teacher) );

      Common::exitWithSuccess ('课程删除成功','course/teacher.php');
    }else{
            OSAdmin::alert("error");
        }
}

//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;

if($search){

    $row_count = Teacher::countSearch($t_name); 
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $teacher = Teacher::search($t_name,$menu_name,$start , $page_size);
    
}else{
    //echo('if not seatch');
    $row_count = Teacher::count ();
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $teacher = Teacher::getAllTeacher ( $start , $page_size );
    //var_dump($teacher);
}


$page_html=Pagination::showPager("teacher.php?t_id=$t_id&t_name=$t_name&search=$search",$page_no,$page_size,$row_count);

//$student = Course::getCourses();
$radio_types=array(0=>"Male",1=>"Female");

$confirm_html = OSAdmin::renderJsConfirm("icon-remove");
//echo(ADMIN_URL.TEMPLATE_DIR);
Template::assign ( 'page_no', $page_no );//当前页码
Template::assign ( '_GET', $_GET);
Template::assign('teachers', $teacher);//主数据
Template::assign ( 'img', IMG_URL);
Template::assign('radio_types', $radio_types);
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'page_html', $page_html );//分页
Template::display('course/teacher.tpl');