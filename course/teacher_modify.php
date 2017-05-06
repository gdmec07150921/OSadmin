<?php
require ('../include/init.inc.php');
$t_id = $t_name = $t_sex =$t_introduce=$t_url= '';
extract ( $_REQUEST, EXTR_IF_EXISTS );

Common::checkParam($t_id);

//首次进来，加载原来的课程信息
$teacher = Teacher::getTeacherByID ( $t_id );
//var_dump($teacher);
if(empty($teacher)){
   // Common::exitWithError(ErrorMessage::MENU_NOT_EXIST,"course/teacher.php");
}

//提交修改请求时执行
if (Common::isPost ()) {
    
    if($t_id == "" ||  empty($t_id) ){
        
            OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
        
    }else{
    
            $update_data = array ('t_id' => $t_id,'t_name' => $t_name, 't_sex' => $t_sex, 't_introduce' => $t_introduce,
         't_url' => $t_url);
       
    
            
            //echo(json_encode($update_data));
            //var_dump($update_data);
            $result = Teacher::updateTeacherInfo ( $t_id,$update_data );
            
            //echo(json_encode($update_data));
            
            if ($result>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'MODIFY', 'teacher' ,$t_id, json_encode($update_data) );
                Common::exitWithSuccess ('更新完成','course/teacher.php');
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
Template::assign ( 'teacher', $teacher );
Template::assign ( 'img', IMG_URL);
//Template::assign ( 'module_options_list', $module_options_list );
//Template::assign ( 'father_menu_options_list', $father_menu_options_list );
//Template::assign ( 'show_options_list', $show_options_list );
//Template::assign ( 'online_options_list', $online_options_list );
//Template::assign ( 'shortcut_allowed_options_list', $shortcut_allowed_options_list );
Template::display ( 'course/teacher_modify.tpl' );