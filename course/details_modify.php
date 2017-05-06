<?php
require ('../include/init.inc.php');
$course_id = $course_name = $t_id =$course_hour=$course_url=$course_place=$course_time=$people=$course_summary=$course_url=$t_url=$course_open=$course_star ='';
extract ( $_REQUEST, EXTR_IF_EXISTS );

Common::checkParam($course_id);

//首次进来，加载原来的课程信息
$details = Details::getDetailsByID ( $course_id );
//var_dump($details);
if(empty($details)){
    Common::exitWithError(ErrorMessage::MENU_NOT_EXIST,"course/details.php");
}

//提交修改请求时执行
if (Common::isPost ()) {
    
    if($course_id == "" ||  empty($course_id) ){
        
            OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
        
    }else{
    
            $update_data = array ( 'course.t_id' => $t_id,
         'course_url' => $course_url, 'course_place' => $course_place, 'course_time' => $course_time, 
         'people' => $people,'course_summary' => $course_summary,'course_star'=>$course_star,
         'course_open' => $course_open,'course_url' => $course_url,'course_hour' => $course_hour,);
       
    
            
            //echo(json_encode($update_data));
            
            $result = Details::updateDetailsInfo ( $course_id,$update_data );
            
            //echo(json_encode($update_data));
            
            if ($result>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'MODIFY', 'details' ,$course_id, json_encode($update_data) );
                Common::exitWithSuccess ('更新完成','course/details.php');
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
Template::assign ( 'details', $details[0] );
Template::assign ( 'img', IMG_URL);
//Template::assign ( 'module_options_list', $module_options_list );
//Template::assign ( 'father_menu_options_list', $father_menu_options_list );
//Template::assign ( 'show_options_list', $show_options_list );
//Template::assign ( 'online_options_list', $online_options_list );
//Template::assign ( 'shortcut_allowed_options_list', $shortcut_allowed_options_list );
Template::display ( 'course/details_modify.tpl' );