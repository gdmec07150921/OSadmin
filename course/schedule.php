<?php
require ('../include/init.inc.php');
$search=$method =$s_id= $s_name = $course_name = $c_id =$ytime=$ytask=$absence=$state=$course_hour= '';
extract ( $_GET, EXTR_IF_EXISTS );

if ($method == 'del' && ! empty ( $s_id ) && ! empty ( $c_id )) {
    //var_dump($method);
    $schedule = Schedule::getScheduleByID($s_id,$c_id);
    $result = Schedule::delSchedule ( $s_id,$c_id );
    //var_dump($result);
    if ($result) {

      SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'schedule' ,$s_id, json_encode( $schedule) );

      Common::exitWithSuccess ('课程删除成功','course/schedule.php');
    }else{
            OSAdmin::alert("error");
        }
}

//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;

if($search){
    //var_dump($s_id);
    $row_count = Schedule::countSearch($s_id); 
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $schedule = Schedule::search($s_id,$menu_name,$start , $page_size);
    
}else{
    //echo('if not seatch');
    $row_count = Schedule::count ();
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $start = ($page_no - 1) * $page_size;
    $schedule = Schedule::getAllSchedule ( $start , $page_size );
    //var_dump(json_encode($evaluate));
}


$page_html=Pagination::showPager("schedule.php?c_id=$c_id&search=$search",$page_no,$page_size,$row_count);

//$evaluate = Evaluate::getCourses();
$radio_types=array(0=>"Male",1=>"Female");

$confirm_html = OSAdmin::renderJsConfirm("icon-remove");
//echo(ADMIN_URL.TEMPLATE_DIR);
Template::assign ( 'page_no', $page_no );//当前页码
Template::assign ( '_GET', $_GET);
Template::assign('schedules', $schedule);//主数据
Template::assign ( 'img', IMG_URL);
Template::assign('radio_types', $radio_types);
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'page_html', $page_html );//分页
Template::display('course/schedule.tpl');