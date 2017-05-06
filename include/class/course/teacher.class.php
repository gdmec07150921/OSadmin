<?php
if (!defined('ACCESS')) {exit('Access denied.');}

class Teacher extends CourseBase
{
//class Sample extends Base {
    private static $table_name = 'teacher';

    private static $columns = 't_id,t_name,t_sex,t_introduce,t_url';

    public static function getTableName()
    {
        return self::$table_name;
    }

    public static function getTeacher() {

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
    public static function delTeacher($t_id) {
        if (! $t_id || ! is_numeric ( $t_id )) {
            return false;
        }
        
        $db=self::__instance();
        
        $condition = array("t_id"=>$t_id);
        
        $result = $db->delete ( self::getTableName(), $condition );
        return $result;
    }
    
    //自定义函数，实现添加一门新课程
    public static function addTeacher($teacher_data)
    {
        //var_dump($student_data);
        
        if(!$teacher_data || !is_array($teacher_data))
        {
           
            return false;
        }
    
        
        $db=self::__instance();
   
        
        //var_dump(self::getTableName());
        
        $id=$db->insert(self::getTableName(),$teacher_data);
        
        return $id;
    }
    
    //根据课程名称查询课程是否存在
    public static function getTeacherByName($t_name) {
        if (! $t_name ) {
            return false;
        }
        $db=self::__instance();
        $condition['t_name'] = $t_name;
        $list = $db->select ( self::getTableName(), self::$columns, $condition );
        if ($list) {
            return $list [0];
        }
        return array ();
    }
    
    //根据课程编号称查询课程是否存在
    public static function getTeacherByID($t_id) {
        if (! $t_id ) {
            return false;
        }
        $db=self::__instance();
        $condition['t_id'] = $t_id;
        //$list = $db->select(self::getTableName(), self::$columns, array("AND" => $sub_condition));//多条件查询
        $list = $db->select ( self::getTableName(), self::$columns, $condition );
        if ($list) {
            return $list [0];
        }
        return array ();
    }
    
    //计算查询结果的总条数
    public static function countSearch($t_name)
    {
        $db = self::__instance();
        $condition = array();
        if ($t_name != "") {
            //$condition['s_name'] = $s_name;
            $condition['LIKE'] = array("t_name" => $t_name);
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
    public static function search($t_name, $start, $page_size)
    {
        $db = self::__instance();
        $limit = "";
        $where = "";
        if ($page_size) $limit = " limit $start,$page_size ";
        if ( $s_name != "") {
            $where = " where  t_name like '%$t_name%'";
        } else {
            $where = " where 1=1";
        }

        $sql = "select *  from " . self::getTableName() . " ".$where ." order by t_id desc".$limit;
        
        //var_dump($sql);
        
        $list = $db->query($sql)->fetchAll();
        
        if ($list) {
            return $list;
        }
        return array();
    }
    
    public static function getAllTeacher($start = '', $page_size = '')
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
    
    public static function updateTeacherInfo($t_id, $teacher_data)
    {
    
        if (!$teacher_data || !is_array($teacher_data)) return false;
                
        $db = self::__instance();
        
        $condition = array("t_id" => $t_id);
        
        $id = $db->update(self::getTableName(), $teacher_data, $condition);
        
        return $id;
    }
    
}
