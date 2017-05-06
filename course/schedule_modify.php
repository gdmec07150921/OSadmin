<?php
require ('../include/init.inc.php');
$s_id= $s_name = $course_name = $c_id =$ytime=$ytask=$absence=$state=$course_hour= ' ';
extract ( $_REQUEST, EXTR_IF_EXISTS );

Common::checkParam($s_id);

//首次进来，加载原来的课程信息
$schedule = Schedule::getScheduleByID ($c_id,$s_id);
//var_dump($c_id,$s_id);
if(empty($schedule)){
    Common::exitWithError(ErrorMessage::MENU_NOT_EXIST,"course/schedule.php");
}

//提交修改请求时执行
if (Common::isPost ()) {
    
    if($s_id == "" ||  empty($s_id) ){
        
            OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
        
    }else{
    
            $update_data = array ('s_id' => $s_id,'c_id' => $c_id, 'ytime' => $ytime, 'ytask' => $ytask,
         'absence' => $absence, 'state' => $state);
       
    
            
            //var_dump($update_data);
            
            $result = Schedule::updateScheduleInfo ( $c_id,$s_id,$update_data );
            
            //echo(json_encode($update_data));
            
            if ($result>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'MODIFY', 'schedule' ,$s_id, json_encode($update_data) );
                Common::exitWithSuccess ('更新完成','course/schedule.php');
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
Template::assign ( 'schedule', $schedule );
//Template::assign ( 'module_options_list', $module_options_list );
//Template::assign ( 'father_menu_options_list', $father_menu_options_list );
//Template::assign ( 'show_options_list', $show_options_list );
//Template::assign ( 'online_options_list', $online_options_list );
//Template::assign ( 'shortcut_allowed_options_list', $shortcut_allowed_options_list );
Template::display ( 'course/schedule_modify.tpl' );