<?php
if (!defined('ACCESS')) {exit('Access denied.');}

class Student extends CourseBase
{
//class Sample extends Base {
    private static $table_name = 'student';

    private static $columns = 's_id,s_name,introduce,sex,majob,s_url,classNo,pwd,phone,integral';

    public static function getTableName()
    {
        return self::$table_name;
    }

    public static function getStudent() {

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
    public static function delStudent($s_id) {
        if (! $s_id || ! is_numeric ( $s_id )) {
            return false;
        }
        
        $db=self::__instance();
        
        $condition = array("s_id"=>$s_id);
        
        $result = $db->delete ( self::getTableName(), $condition );
        return $result;
    }
    
    //自定义函数，实现添加一门新课程
    public static function addStudent($student_data)
    {
        //var_dump($student_data);
        
        if(!$student_data || !is_array($student_data))
        {
           
            return false;
        }
    
        
        $db=self::__instance();
   
        
        //var_dump(self::getTableName());
        
        $id=$db->insert(self::getTableName(),$student_data);
        
        return $id;
    }
    
    //根据课程名称查询课程是否存在
    public static function getStudentByName($s_name) {
        if (! $s_name ) {
            return false;
        }
        $db=self::__instance();
        $condition['s_name'] = $s_name;
        $list = $db->select ( self::getTableName(), self::$columns, $condition );
        if ($list) {
            return $list [0];
        }
        return array ();
    }
    
    //根据课程编号称查询课程是否存在
    public static function getStudentByID($s_id) {
        if (! $s_id ) {
            return false;
        }
        $db=self::__instance();
        $condition['s_id'] = $s_id;
        //$list = $db->select(self::getTableName(), self::$columns, array("AND" => $sub_condition));//多条件查询
        $list = $db->select ( self::getTableName(), self::$columns, $condition );
        if ($list) {
            return $list [0];
        }
        return array ();
    }
    
    //计算查询结果的总条数
    public static function countSearch($s_name)
    {
        $db = self::__instance();
        $condition = array();
        if ($s_name != "") {
            //$condition['s_name'] = $s_name;
            $condition['LIKE'] = array("s_name" => $s_name);
        } else {
            //if ($module_id > 0) $condition['module_id'] = $module_id;
            //if ($menu_name != "") $condition['LIKE'] = array("menu_name" => $menu_name);
            // $condition['>'] = array("courseID" => 0);
        }
    
        
        $num = $db->count(self::getTableName(), $condition);
            
        //var_dump($num );
        return $num;
    }

    //统计当前所有记录总数
    public static function count($condition = '')
    {
        $db = self::__instance();
        $num = $db->count(self::getTableName(), $condition);
        return $num;
    }
    
    //分页返回课程信息
    public static function search($s_name, $start, $page_size)
    {
        $db = self::__instance();
        $limit = "";
        $where = "";
        if ($page_size) $limit = " limit $start,$page_size ";
        if ( $s_name != "") {
            $where = " where  s_name like '%$s_name%'";
        } else {
            $where = " where 1=1";
        }

        $sql = "select *  from " . self::getTableName() . " ".$where ." order by s_id desc".$limit;
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            return $list;
        }
        return array();
    }
    
    public static function getAllStudent($start = '', $page_size = '')
    {
        $db = self::__instance();
        $condition = array();
        if ($page_size) {
            $condition['LIMIT'] = array($start, $page_size);
        }
        $list = $db->select(self::getTableName(), self::$columns, $condition);
        
        if ($list) return $list;
        return array();
    }
    
    public static function updateStudentInfo($s_id, $student_data)
    {
    
        if (!$student_data || !is_array($student_data)) return false;
                
        $db = self::__instance();
        
        $condition = array("s_id" => $s_id);
        
        $id = $db->update(self::getTableName(), $student_data, $condition);
        
        return $id;
    }
    
}
