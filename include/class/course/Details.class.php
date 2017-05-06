<?php
if (!defined('ACCESS')) {exit('Access denied.');}

class Details extends CourseBase
{
//class Sample extends Base {
    private static $table_name = 'course,teacher';

    private static $columns = 'course_name,course_id,
    course.t_id,teacher.t_id,t_name,course_hour,people,
    course_where,course_time,course_open,course_state,
    course_summary,course_star,course_url,t_url,course_place';

    public static function getTableName()
    {
        return self::$table_name;
    }

    public static function getDetails() {

        // 以下两种方式均可以访问 sample 的 DB
        $db = self::__instance();
        // $db = self::__instance(SAMPLE_DB_ID);

        $sql = "select ".self::$columns." from ".self::getTableName();
        $list = $db->query($sql)->fetchAll();
        if ($list) {
            //var_dump($list);
            return $list;
        }

        return array();     
    }
// 删除课程
    public static function delDetails($course_id) {
        if (! $course_id || ! is_numeric ( $course_id )) {
            return false;
        }
        
        $db=self::__instance();
        
        $condition = array("course_id"=>$course_id);
        
        $result = $db->delete ( "course", $condition );
        return $result;
    }
    
    //自定义函数，实现添加一门新课程
    public static function addDetails($details_data)
    {
        //var_dump($details_data);
        
        if(!$details_data || !is_array($details_data))
        {
           
            return false;
        }
    
        
        $db=self::__instance();
   
        
        //var_dump(self::getTableName());
        
        $id=$db->insert(self::getTableName(),$details_data);
        //var_dump($id);
        return $id;
    }
    
    
    public static function getCourseNameByID($courseID)
    {
        
        if (! $courseID ) {
            return false;
        }
        
        $db=self::__instance();
        $condition['course_id'] = $courseID;
       
        $list = $db->select ( "course", 'course_name,course_id', $condition );
        //var_dump($list);
        if ($list) {
           // var_dump($list [0]['course_name']);
            return $list [0]['course_name'];
        }
        
    }
    public static function getTeacherNameByID($teacherID)
    {
        
        if (! $teacherID ) {
            return false;
        }
        
        $db=self::__instance();
        $condition['t_id'] = $teacherID;
        
        $list = $db->select ( "teacher", 't_name,t_id', $condition );
        //var_dump($list);
        if ($list) {
            // var_dump($list [0]['course_name']);
            return $list [0]['t_name'];
        }
        
    }
    //根据课程名称查询课程是否存在
    public static function getDetailsByName($course_name) {
        if (! $details_course_name ) {
            return false;
        }
        $db=self::__instance();
        $condition['course_name'] = $course_name;
        $list = $db->select ( self::getTableName(), self::$columns, $condition );
        if ($list) {
            return $list [0];
        }
        return array ();
    }
    
    //根据课程编号称查询课程是否存在
    public static function getDetailsByID($course_id) {
        if (! $course_id ) {
            return false;
        }
        $db=self::__instance();
        $condition['course_id'] = $course_id;
        
        $sql = "select ".self::$columns." from teacher inner join course on teacher.t_id  = course.t_id where course.course_id = ".$course_id;
        //var_dump($sql);
        $list = $db->query($sql)->fetchAll();
        //var_dump($list);
        if ($list) {
            //var_dump($list);
            return $list;
        }
        //$list = $db->select(self::getTableName(), self::$columns, $condition);
        return array();
    }
    
    //计算查询结果的总条数
    public static function countSearch($course_name)
    {
        $db = self::__instance();
        $condition = array();
        if ($course_name != "") {
            //$condition['course_name'] = $course_name;
            $condition['LIKE'] = array("course_name" => $course_name);
           // var_dump($condition);
        } else {
            //if ($module_id > 0) $condition['module_id'] = $module_id;
            //if ($menu_name != "") $condition['LIKE'] = array("menu_name" => $menu_name);
            // $condition['>'] = array("courseID" => 0);
        }
    
        
        $num = $db->count("course", $condition);
            
        //var_dump($num );
        return $num;
    }

    //统计当前所有记录总数
    public static function count($condition = '')
    {
        $db = self::__instance();
        $num = $db->count("course", $condition);
         //var_dump($num );
        return $num;
    }
    
    //分页返回课程信息
    public static function search($course_name, $start, $page_size)
    {
        $db = self::__instance();
        $limit = "";
        $where = "";
        if ($page_size) $limit = " limit $start,$page_size ";
        if ( $course_name != "") {
            $where = " where  course_name like '%$course_name%'";
        } else {
            $where = " where 1=1";
        }

        $sql = "select ".self::$columns." from teacher inner join course on teacher.t_id  = course.t_id ".$where ;
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            return $list;
        }
        return array();
    }
    
    public static function getAllDetails($start , $page_size )
    {
        $db = self::__instance();
        $condition = array();
        if ($page_size) {
            $condition['LIMIT'] = array($start, $page_size);
        }

        $sql = "select ".self::$columns." from teacher inner join course on teacher.t_id  = course.t_id ";
        //var_dump($sql);
        $list = $db->query($sql)->fetchAll();
        //var_dump($list);
        if ($list) {
            //var_dump($list);
            return $list;
        }
        //$list = $db->select(self::getTableName(), self::$columns, $condition);
        return array();
    }
    
    public static function updateDetailsInfo($course_id, $details_data)
    {
    
       if (!$details_data || !is_array($details_data)) return false;
                
        $db = self::__instance();
        
        $condition = array("course_id" => $course_id);
        //var_dump($details_data);
        

        $id = $db->update('course', $details_data, $condition);
        //var_dump($id);
        return $id;
    }
    
}
