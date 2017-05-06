<?php
if (!defined('ACCESS')) {exit('Access denied.');}

class Feedback extends CourseBase
{
//class Sample extends Base {
    private static $table_name = 'feedback,student,course';

    private static $columns = 'feedback_no,feedback_name,course.course_id,feedback.course_id,student_id,course_name,s_id,feedback_answer,feedback_state,feedback_time';

    public static function getTableName()
    {
        return self::$table_name;
    }

    public static function getFeedback() {

        // 以下两种方式均可以访问 sample 的 DB
        $db = self::__instance();
        // $db = self::__instance(SAMPLE_DB_ID);

        $sql = "select ".self::$columns." from ".self::getTableName();
        $list = $db->query($sql)->fetchAll();
        if ($list) {
            return $list;
        }
        return array();     
    }

    // 删除课程
    public static function delFeedback($feedback_no) {
        if (! $feedback_no || ! is_numeric ( $feedback_no )) {
            return false;
        }
        
        $db=self::__instance();
        
        $condition = array("feedback_no"=>$feedback_no);
        
        $result = $db->delete ( "feedback", $condition );
        return $result;
    }
    
    //自定义函数，实现添加一门新课程
    public static function addFeedback($feedback_data)
    {
        //var_dump($feedback_data);
        
        if(!$feedback_data || !is_array($feedback_data))
        {
           
            return false;
        }
    
        
        $db=self::__instance();
   
        
        //var_dump($feedback_data);
        
        $id=$db->insert("feedback",$feedback_data);
        
        return $id;
    }
    
    //根据课程名称查询课程是否存在
    public static function getFeedbackByName($course_id) {
        if (! $course_id ) {
            return false;
        }
        $db=self::__instance();
        $condition['course_id'] = $course_id;
        $list = $db->select ( self::getTableName(), self::$columns, $condition );
        if ($list) {
            return $list [0];
        }
        return array ();
    }
    
    //根据课程编号称查询课程是否存在
    public static function getFeedbackByID($feedback_no) {
        if (! $feedback_no ) {
            return false;
        }
        $db=self::__instance();
        $condition['feedback_no'] = $feedback_no;
        //$list = $db->select(self::getTableName(), self::$columns, array("AND" => $sub_condition));//多条件查询
        $list = $db->select ( self::getTableName(), self::$columns, $condition );
        if ($list) {
            return $list [0];
        }
        return array ();
    }
    
    //计算查询结果的总条数
    public static function countSearch($feedback_no)
    {
        $db = self::__instance();
        $condition = array();
        if ($feedback_no != "") {
            //$condition['courseName'] = $feedback_no;
            $condition['LIKE'] = array("feedback_no" => $feedback_no);
        } else {
            //if ($module_id > 0) $condition['module_id'] = $module_id;
            //if ($menu_name != "") $condition['LIKE'] = array("menu_name" => $menu_name);
            // $condition['>'] = array("courseID" => 0);
        }
    
        
        $num = $db->count("feedback", $condition);
            
        //var_dump($num );
        return $num;
    }

    //统计当前所有记录总数
    public static function count($condition = '')
    {
        $db = self::__instance();
        $num = $db->count("feedback", $condition);
        return $num;
    }
    
    //分页返回课程信息
    public static function search($course_id, $start, $page_size)
    {
        $db = self::__instance();
        $limit = "";
        $where = "";
        if ($page_size) $limit = " limit $start,$page_size ";
        if ( $course_id != "") {
            $where = " where  feedback.course_id = '$course_id'";
        } else {
            $where = " where 1=1";
        }

       $sql = "select ".self::$columns." from feedback inner join course on feedback.course_id  = course.course_id inner join student on student.s_id  = feedback.student_id".$where ;
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            return $list;
        }
        return array();
    }
    
    public static function getAllFeedback($start = '', $page_size = '')
    {
        $db = self::__instance();
        $condition = array();
        if ($page_size) {
            $condition['LIMIT'] = array($start, $page_size);
        }
        $sql = "select ".self::$columns." from feedback inner join course on feedback.course_id  = course.course_id inner join student on student.s_id  = feedback.student_id";
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            return $list;
        }
        return array();
    }
    
    public static function updateFeedbackInfo($feedback_no, $feedback_data)
    {
    
        if (!$feedback_data || !is_array($feedback_data)) return false;
                
        $db = self::__instance();
        
        $condition = array("feedback_no" => $feedback_no);
        
        $id = $db->update("feedback", $feedback_data, $condition);
        
        return $id;
    }
    
}
