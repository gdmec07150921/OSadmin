<?php
require ('../include/init.inc.php');
$id= $course_id = $course_name = $student_id =$evaluate_content=$evaluate_time=$evaluate_star= '';
extract ( $_POST, EXTR_IF_EXISTS );

if (Common::isPost ()) {
     if($course_id==""){
        
        OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
    }else{
        $input_data = array ('course_id' => $course_id,'evaluate_star' => $evaluate_star,'student_id' => $student_id,
         'evaluate_content' => $evaluate_content);
       
        //var_dump($input_data );
        
            $evaluate_data = Evaluate::addEvaluate ( $input_data );
            //var_dump($evaluate_data );
           
            if ($evaluate_data>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'ADD', 'evaluate' ,$evaluate_data, json_encode($input_data) );
                Common::exitWithSuccess ('评价添加完成','course/evaluate.php');
            }
       
    }
}
Template::assign("_POST" ,$_POST);
Template::display('course/evaluate_add.tpl' );
