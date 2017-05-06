<?php
require ('../include/init.inc.php');
$feedback_no= $course_id = $feedback_name = $student_id =$course_name=$feedback_answer=$feedback_state=$feedback_time= '';
extract ( $_REQUEST, EXTR_IF_EXISTS );

Common::checkParam($feedback_no);

//首次进来，加载原来的课程信息
$feedback = Feedback::getFeedbackByID ( $feedback_no );
//var_dump($feedback);
if(empty($feedback)){
    Common::exitWithError(ErrorMessage::MENU_NOT_EXIST,"course/feedback.php");
}

//提交修改请求时执行
if (Common::isPost ()) {
    
    if($feedback_no == "" ||  empty($feedback_no) ){
        
            OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
        
    }else{
    
            $update_data = array ( 
         'feedback_answer' => $feedback_answer,'feedback_state'=>'已回复');
       
    
            
            //echo(json_encode($update_data));
            
            $result = Feedback::updateFeedbackInfo ( $feedback_no,$update_data );
            
            //echo(json_encode($update_data));
            
            if ($result>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'MODIFY', 'feedback' ,$feedback_no, json_encode($update_data) );
                Common::exitWithSuccess ('更新完成','course/feedback.php');
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
Template::assign ( 'feedback', $feedback );
Template::assign ( 'img', IMG_URL);
//Template::assign ( 'module_options_list', $module_options_list );
//Template::assign ( 'father_menu_options_list', $father_menu_options_list );
//Template::assign ( 'show_options_list', $show_options_list );
//Template::assign ( 'online_options_list', $online_options_list );
//Template::assign ( 'shortcut_allowed_options_list', $shortcut_allowed_options_list );
Template::display ( 'course/feedback_modify.tpl' );