<?php
require ('../include/init.inc.php');
$s_id= $s_name = $course_name = $c_id =$ytime=$ytask=$absence=$state=$course_hour=$course_task= ' ';
extract ( $_POST, EXTR_IF_EXISTS );

if (Common::isPost ()) {
    $exist = Schedule::getScheduleByID($s_id,$c_id);
    if($exist){
    
        OSAdmin::alert("error",ErrorMessage::NAME_CONFLICT);
    }else if($s_id==""){
        
        OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
    }else{
        $input_data = array ('s_id' => $s_id,'c_id' => $c_id, 'ytime' => $ytime, 'ytask' => $ytask,
         'absence' => $absence, 'state' => $state);
       
        //var_dump($input_data );
    if($course_hour>$ytime&&$course_task>$ytask){
            $schedule_data = Schedule::addSchedule ( $input_data );
           //var_dump($schedule_data );
           
            if ($schedule_data>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'ADD', 'schedule' ,$schedule_data, json_encode($input_data) );
                 Common::exitWithSuccess ('选课信息添加完成','course/schedule.php');
            }
        }else{
           OSAdmin::alert("error","请正确输入进度！"); 
        }
    }
}

Template::assign("_POST" ,$_POST);
Template::display('course/schedule_add.tpl' );
