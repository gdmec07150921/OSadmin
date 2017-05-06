<?php
require ('../include/init.inc.php');
$feedback_no= $course_id = $feedback_name = $student_id =$course_name=$feedback_answer=$feedback_state=$feedback_time= '';
extract ( $_POST, EXTR_IF_EXISTS );

if (Common::isPost ()) {
     if($course_id==""){
        
        OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
    }else{
        $input_data = array ('course_id' => $course_id,'student_id' => $student_id,
         'feedback_name' => $feedback_name);
       
        //var_dump($input_data );
        
            $feedback_data = Feedback::addFeedback ( $input_data );
            //var_dump($evaluate_data );
            
            if ($feedback_data>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'ADD', 'feedback' ,$feedback_data, json_encode($input_data) );
                Common::exitWithSuccess ('反馈添加完成','course/feedback.php');
            }
       
    }
}
Template::assign("_POST" ,$_POST);
Template::display('course/feedback_add.tpl' );
