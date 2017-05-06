<?php
require ('../include/init.inc.php');
$course_id=$course_name = $course_num =$course_num1 =$course_num2 =$course_state =$course_where =$course_like ='';
extract ( $_POST, EXTR_IF_EXISTS );

if (Common::isPost ()) {
    $exist = Course::getCourseByID($course_id);
    if($exist){
    
        OSAdmin::alert("error",ErrorMessage::NAME_CONFLICT);
    }else if($course_id==""){
        
        OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
    }else{
        $input_data = array ('course_id' => $course_id,'course_name' => $course_name, 'course_num' => $course_num, 'course_num1' => $course_num1, 'course_num2' => $course_num2, 'course_state' => $course_state, 'course_where' => $course_where,'course_like' => $course_like);
       
        //var_dump($input_data );
        if($course_num==($course_num1+$course_num2)){
            $course_data = Course::addCourse ( $input_data );
            //var_dump($course_data );
            
            if ($course_data>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'ADD', 'course' ,$course_data, json_encode($input_data) );
                Common::exitWithSuccess ('课程添加完成','course/course.php');
            }
        }else{
           OSAdmin::alert("error","请正确输入人数！"); 
        }
    }
}

Template::assign("_POST" ,$_POST);
Template::display('course/course_add.tpl' );
