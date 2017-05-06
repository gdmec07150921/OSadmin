<?php
if (!defined('ACCESS')) {exit('Access denied.');}

class Schedule extends CourseBase
{
//class Sample extends Base {
    private static $table_name = 'schedule';

    private static $columns = 'course_task,student.s_id, s_name,course_id,schedule.c_id,course_name,ytime,ytask,absence,state,course_hour';

    public static function getTableName()
    {
        return self::$table_name;
    }

    public static function getSchedule() {

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
    public static function delSchedule($s_id,$c_id) {
        if (! $s_id || ! is_numeric ( $s_id )) {
            return false;
        }
        
        $db=self::__instance();
        
        $sql="DELETE FROM `schedule` WHERE s_id=".$s_id." and c_id=".$c_id;
        //var_dump($sql);
        $result = $db->query($sql)->fetchAll();
        
        //var_dump($result);
        return $result;
    }
    
    //自定义函数，实现添加一门新课程
    public static function addSchedule($schedule_data)
    {
        //var_dump($course_data);
        
        if(!$schedule_data || !is_array($schedule_data))
        {
           
            return false;
        }
    
        
        $db=self::__instance();
   
        
        //var_dump($schedule_data);
        //var_dump("1111");
        $id=$db->insert(self::getTableName(),$schedule_data);
        
        return $id;
    }
    
    //根据课程名称查询课程是否存在
    public static function getScheduleByName($s_id) {
        if (! $s_id ) {
            return false;
        }
        $db=self::__instance();
        $condition['s_id'] = $s_id;
        $list = $db->select ( self::getTableName(), self::$columns, $condition );
        if ($list) {
            return $list [0];
        }
        return array ();
    }
    
    //根据课程编号称查询课程是否存在
    public static function getScheduleByID($c_id,$s_id) {
        if (! $s_id ) {
            return false;
        }
        //var_dump($c_id,$s_id);
        $db=self::__instance();
        $where=" where schedule.c_id = ".$c_id." and schedule.s_id = ".$s_id;
        $sql = "select ".self::$columns." from schedule inner join course on schedule.c_id  = course.course_id inner join student on student.s_id  = schedule.s_id".$where ;
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            //var_dump($list);
            return $list[0];
        }
        return array();
    }
    
    //计算查询结果的总条数
    public static function countSearch($s_id)
    {
        $db = self::__instance();
        $condition = array();
        if ($s_id != "") {
            //$condition['courseName'] = $course_name;
            $condition['LIKE'] = array("s_id" => $s_id);
        } else {
            //if ($module_id > 0) $condition['module_id'] = $module_id;
            //if ($menu_name != "") $condition['LIKE'] = array("menu_name" => $menu_name);
            // $condition['>'] = array("courseID" => 0);
        }
    
        
        $num = $db->count("schedule", $condition);
            
        //var_dump($num );
        return $num;
    }

    //统计当前所有记录总数
    public static function count($condition = '')
    {
        $db = self::__instance();
        $num = $db->count("schedule", $condition);
        return $num;
    }
    
    //分页返回课程信息
    public static function search($s_id, $start, $page_size)
    {
        $db = self::__instance();
        $limit = "";
        $where = "";
        if ($page_size) $limit = " limit $start,$page_size ";
        if ( $s_id != "") {
            $where = " where  schedule.s_id = ".$s_id;
        } else {
            $where = " where 1=1";
        }

        $sql = "select ".self::$columns." from schedule inner join course on schedule.c_id  = course.course_id inner join student on student.s_id  = schedule.s_id".$where ;
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            return $list;
        }
        return array();
    }
    
    public static function getAllSchedule($start = '', $page_size = '')
    {
        $db = self::__instance();
        $condition = array();
        if ($page_size) {
            $condition['LIMIT'] = array($start, $page_size);
        }
       $sql = "select ".self::$columns." from schedule inner join course on schedule.c_id  = course.course_id inner join student on student.s_id  = schedule.s_id";
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            return $list;
        }
        return array();
    }
    
    public static function updateScheduleInfo($c_id,$s_id, $schedule_data)
    {
    
        if (!$schedule_data || !is_array($schedule_data)) return false;
                
        $db = self::__instance();
        
        $condition = "where c_id=".$c_id." and s_id=".$s_id;
        //var_dump($condition);
        $id = $db->update("schedule", $schedule_data, $condition);
        
        return $id;
    }
    
}
