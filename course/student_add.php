<?php
require ('../include/init.inc.php');
$s_id = $s_name = $introduce =$sex=$majob=$s_url=$classNo=$pwd=$phone=$integral= '';
extract ( $_POST, EXTR_IF_EXISTS );

if (Common::isPost ()) {
    $exist = Student::getStudentByID($s_id);
    if($exist){
    
        OSAdmin::alert("error",ErrorMessage::NAME_CONFLICT);
    }else if($s_id==""){
        
        OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
    }else{
        $input_data = array ('s_id' => $s_id,'s_name' => $s_name, 'introduce' => $introduce, 'sex' => $sex,
         'majob' => $majob, 's_url' => $s_url, 'classNo' => $classNo,'pwd' => $pwd,'phone' => $phone);
       
        //var_dump($input_data );

            $student_data = Student::addStudent ( $input_data );
           // var_dump($course_data );
            
            if ($student_data>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'ADD', 'student' ,$student_data, json_encode($input_data) );
                Common::exitWithSuccess ('学生信息添加完成','course/student.php');
            }
        
    }
}

Template::assign("_POST" ,$_POST);
Template::display('course/student_add.tpl' );
