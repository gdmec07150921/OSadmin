<?php
require ('../include/init.inc.php');
$question_no= $course_id = $question_name = $student_id =$course_name=$question_answer=$question_state=$question_time= '';
extract ( $_POST, EXTR_IF_EXISTS );

if (Common::isPost ()) {
     if($course_id==""){
        
        OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
    }else{
        $input_data = array ('course_id' => $course_id,'student_id' => $student_id,
         'question_name' => $question_name);
       
        //var_dump($input_data );
        
            $question_data = Question::addQuestion ( $input_data );
            //var_dump($evaluate_data );
            
            if ($question_data>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'ADD', 'question' ,$question_data, json_encode($input_data) );
                Common::exitWithSuccess ('提问添加完成','course/question.php');
            }
       
    }
}
Template::assign("_POST" ,$_POST);
Template::display('course/question_add.tpl' );
