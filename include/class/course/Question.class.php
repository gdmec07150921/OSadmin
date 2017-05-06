<?php
if (!defined('ACCESS')) {exit('Access denied.');}

class Question extends CourseBase
{
//class Sample extends Base {
    private static $table_name = 'question,student,course';

    private static $columns = 'question_no,question_name,course.course_id,question.course_id,student_id,course_name,s_id,question_answer,question_state,question_time';

    public static function getTableName()
    {
        return self::$table_name;
    }

    public static function getQuestion() {

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
    public static function delQuestion($question_no) {
        if (! $question_no || ! is_numeric ( $question_no )) {
            return false;
        }
        
        $db=self::__instance();
        
        $condition = array("question_no"=>$question_no);
        
        $result = $db->delete ( "question", $condition );
        return $result;
    }
    
    //自定义函数，实现添加一门新课程
    public static function addQuestion($question_data)
    {
        //var_dump($question_data);
        
        if(!$question_data || !is_array($question_data))
        {
           
            return false;
        }
    
        
        $db=self::__instance();
   
        
        //var_dump($question_data);
        
        $id=$db->insert("question",$question_data);
        
        return $id;
    }
    
    //根据课程名称查询课程是否存在
    public static function getQuestionByName($course_id) {
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
    public static function getQuestionByID($question_no) {
        if (! $question_no ) {
            return false;
        }
        $db=self::__instance();
        $condition['question_no'] = $question_no;
        //$list = $db->select(self::getTableName(), self::$columns, array("AND" => $sub_condition));//多条件查询
        $list = $db->select ( self::getTableName(), self::$columns, $condition );
         //var_dump($condition);
        if ($list) {
            //var_dump($list[0]);
            return $list[0];
        }
        return array ();
    }
    
    //计算查询结果的总条数
    public static function countSearch($question_no)
    {
        $db = self::__instance();
        $condition = array();
        if ($question_no != "") {
            //$condition['courseName'] = $question_no;
            $condition['LIKE'] = array("question_no" => $question_no);
        } else {
            //if ($module_id > 0) $condition['module_id'] = $module_id;
            //if ($menu_name != "") $condition['LIKE'] = array("menu_name" => $menu_name);
            // $condition['>'] = array("courseID" => 0);
        }
    
        
        $num = $db->count("question", $condition);
            
        //var_dump($num );
        return $num;
    }

    //统计当前所有记录总数
    public static function count($condition = '')
    {
        $db = self::__instance();
        $num = $db->count("question", $condition);
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
            $where = " where  question.course_id = '$course_id'";
        } else {
            $where = " where 1=1";
        }

       $sql = "select ".self::$columns." from question inner join course on question.course_id  = course.course_id inner join student on student.s_id  = question.student_id".$where ;
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            return $list;
        }
        return array();
    }
    
    public static function getAllQuestion($start = '', $page_size = '')
    {
        $db = self::__instance();
        $condition = array();
        if ($page_size) {
            $condition['LIMIT'] = array($start, $page_size);
        }
        $sql = "select ".self::$columns." from question inner join course on question.course_id  = course.course_id inner join student on student.s_id  = question.student_id";
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            return $list;
        }
        return array();
    }
    
    public static function updateQuestionInfo($question_no, $question_data)
    {
    
        if (!$question_data || !is_array($question_data)) return false;
                
        $db = self::__instance();
        
        $condition = array("question_no" => $question_no);
        
        $id = $db->update("question", $question_data, $condition);
        
        return $id;
    }
    
}
