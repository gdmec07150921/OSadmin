<?php
require ('../include/init.inc.php');
$course_id = $course_name = $t_id =$course_hour=$course_url=$course_place=$course_time=$people=$course_summary=$course_url=$t_url=$course_open=$course_star ='';
extract ( $_POST, EXTR_IF_EXISTS );

if (Common::isPost ()) {
     if($course_id == "" ||  empty($course_id) ){
        
        OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
    }else{
        $details_data = array ( 't_id' => $t_id,
         'course_url' => $course_url, 'course_place' => $course_place, 'course_time' => $course_time, 
         'people' => $people,'course_summary' => $course_summary,'course_star'=>$course_star,
         'course_open' => $course_open,'course_url' => $course_url,'course_hour' => $course_hour);
       
       // var_dump($details_data );
            $result = Details::updateDetailsInfo ( $course_id,$details_data );
            //$details_data = Details::addDetails ( $details_data );
            //var_dump($result );
            
            if ($result>=0) {
                SysLog::addLog ( UserSession::getUserName(), 'MODIFY', 'details' ,$course_id, json_encode($details_data) );
                Common::exitWithSuccess ('添加详情成功','course/details.php');
            } else {
                OSAdmin::alert("error");
            }
       
    }
}
Template::assign("_POST" ,$_POST);
Template::assign ( 'img', IMG_URL);
Template::display('course/details_add.tpl' );
