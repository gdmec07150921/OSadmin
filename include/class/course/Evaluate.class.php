<?php
if (!defined('ACCESS')) {exit('Access denied.');}

class Evaluate extends CourseBase
{
//class Sample extends Base {
    private static $table_name = 'evaluate,course,student';

    private static $columns = 'id,course.course_id,course_name,student_id,s_id,evaluate_content,evaluate_time,evaluate_star';

    public static function getTableName()
    {
        return self::$table_name;
    }

    public static function getEvaluate() {

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
    public static function delEvaluate($id) {
        if (! $id || ! is_numeric ( $id )) {
            return false;
        }
        
        $db=self::__instance();
        
        $condition = array("id"=>$id);
        
        $result = $db->delete ( "evaluate", $condition );
        return $result;
    }
    
    //自定义函数，实现添加一门新课程
    public static function addEvaluate($evaluate_data)
    {
        //var_dump($evaluate_data);
        
        if(!$evaluate_data || !is_array($evaluate_data))
        {
           
            return false;
        }
    
        
        $db=self::__instance();
   
        
        //var_dump(self::getTableName());
        
        $id=$db->insert("evaluate",$evaluate_data);
        //var_dump($id);
        return $id;
    }
    
    //根据课程名称查询课程是否存在
    public static function getEvaluateByName($course_id) {
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
    public static function getEvaluateByID($course_id) {
        if (! $course_id ) {
            return false;
        }
        $db=self::__instance();
        $condition['course_id'] = $course_id;
        //$list = $db->select(self::getTableName(), self::$columns, array("AND" => $sub_condition));//多条件查询
        $list = $db->select ( "evaluate", self::$columns, $condition );
        if ($list) {
            return $list [0];
        }
        return array ();
    }
    
    //计算查询结果的总条数
    public static function countSearch($id)
    {
        $db = self::__instance();
        $condition = array();
        if ($id != "") {
            //$condition['courseName'] = $course_id;
            $condition['LIKE'] = array("id" => $id);
        } else {
            //if ($module_id > 0) $condition['module_id'] = $module_id;
            //if ($menu_name != "") $condition['LIKE'] = array("menu_name" => $menu_name);
            // $condition['>'] = array("courseID" => 0);
        }
    
        
        $num = $db->count("evaluate", $condition);
            
        //var_dump($num );
        return $num;
    }

    //统计当前所有记录总数
    public static function count($condition = '')
    {
        $db = self::__instance();
        $num = $db->count("evaluate", $condition);
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
            $where = " where  evaluate.course_id = '$course_id'";
        } else {
            $where = " where 1=1";
        }

       $sql = "select ".self::$columns." from evaluate inner join course on evaluate.course_id  = course.course_id inner join student on student.s_id  = evaluate.student_id".$where ;
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            return $list;
        }
        return array();
    }
    
    public static function getStudentNameByID($studentID)
    {
        
        if (! $studentID ) {
            return false;
        }
        
        $db=self::__instance();
        $condition['s_id'] = $studentID;
        
        $list = $db->select ( "student", 's_name,s_id', $condition );
        //var_dump($list);
        if ($list) {
            // var_dump($list [0]['course_name']);
            return $list [0]['s_name'];
        }
        
    }
    public static function getAllEvaluate($start = '', $page_size = '')
    {
        $db = self::__instance();
        $condition = array();
        if ($page_size) {
            $condition['LIMIT'] = array($start, $page_size);
        }
         $sql = "select ".self::$columns." from evaluate inner join course on evaluate.course_id  = course.course_id inner join student on student.s_id  = evaluate.student_id";
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            return $list;
        }
        return array();
    }
    
    public static function updateEvaluateInfo($course_id, $evaluate_data)
    {
    
        if (!$evaluate_data || !is_array($evaluate_data)) return false;
                
        $db = self::__instance();
        
        $condition = array("course_id" => $course_id);
        
        $id = $db->update(self::getTableName(), $evaluate_data, $condition);
        
        return $id;
    }
    
}

