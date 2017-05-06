<?php
require ('../include/init.inc.php');
$course_id = $course_name = $course_num =$course_num1=$course_num2=$course_where=$course_like=$course_state= '';
extract ( $_REQUEST, EXTR_IF_EXISTS );

Common::checkParam($course_id);

//首次进来，加载原来的课程信息
$course = Course::getCourseByID ( $course_id );
//var_dump($course);
if(empty($course)){
    Common::exitWithError(ErrorMessage::MENU_NOT_EXIST,"course/course.php");
}

//提交修改请求时执行
if (Common::isPost ()) {
    
    if($course_name == "" ||  empty($course_id) ){
        
            OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
        
    }else{
    
            $update_data = array ('course_id' => $course_id,'course_name' => $course_name, 'course_num' => $course_num, 'course_num1' => $course_num1,
             'course_num2' => $course_num2, 'course_state' => $course_state, 'course_where' => $course_where,'course_like' => $course_like);
       
    
            
            //echo(json_encode($update_data));
            
            $result = Course::updateCourseInfo ( $course_id,$update_data );
            
            //echo(json_encode($update_data));
            
            if ($result>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'MODIFY', 'course' ,$course_id, json_encode($update_data) );
                Common::exitWithSuccess ('更新完成','course/course.php');
            } else {
                OSAdmin::alert("error");
            }
        
    }
}

//$module_options_list = Module::getModuleForOptions ();
//$father_menu_options_list = MenuUrl::getFatherMenuForOptions ();

//$show_options_list=array("1"=>"显示","0"=>"不显示");
//$online_options_list=array("1"=>"在线","0"=>"下线");
//$shortcut_allowed_options_list = array("1"=>"允许","0"=>"不允许");
Template::assign ( 'course', $course );
//Template::assign ( 'module_options_list', $module_options_list );
//Template::assign ( 'father_menu_options_list', $father_menu_options_list );
//Template::assign ( 'show_options_list', $show_options_list );
//Template::assign ( 'online_options_list', $online_options_list );
//Template::assign ( 'shortcut_allowed_options_list', $shortcut_allowed_options_list );
Template::display ( 'course/course_modify.tpl' );