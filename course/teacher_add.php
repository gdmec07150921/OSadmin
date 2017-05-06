<?php
require ('../include/init.inc.php');
$t_id = $t_name = $t_sex =$t_introduce=$t_url= '';
extract ( $_POST, EXTR_IF_EXISTS );

if (Common::isPost ()) {
    $exist = Teacher::getTeacherByID($t_id);
    if($exist){
    
        OSAdmin::alert("error",ErrorMessage::NAME_CONFLICT);
    }else if($t_id==""){
        
        OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
    }else{
        $input_data = array ('t_id' => $t_id,'t_name' => $t_name, 't_sex' => $t_sex, 't_introduce' => $t_introduce,
         't_url' => $t_url);
       
        //var_dump($input_data );

            $teacher_data = Teacher::addTeacher ( $input_data );
           // var_dump($course_data );
            
            if ($teacher_data>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'ADD', 'teacher' ,$teacher_data, json_encode($input_data) );
                Common::exitWithSuccess ('学生信息添加完成','course/teacher.php');
            }
        
    }
}

Template::assign("_POST" ,$_POST);
Template::display('course/teacher_add.tpl' );
