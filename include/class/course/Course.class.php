<?php
if (!defined('ACCESS')) {exit('Access denied.');}

class Course extends CourseBase
{
//class Sample extends Base {
	private static $table_name = 'course';

	private static $columns = 'course_id, course_name,course_num,course_num1,course_num2,course_state,course_where,course_like';

	public static function getTableName()
	{
		return self::$table_name;
	}

	public static function getCourse() {

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
    public static function delCourse($course_id) {
        if (! $course_id || ! is_numeric ( $course_id )) {
            return false;
        }
        
        $db=self::__instance();
        
        $condition = array("course_id"=>$course_id);
        
        $result = $db->delete ( self::getTableName(), $condition );
        return $result;
    }
    
    //自定义函数，实现添加一门新课程
    public static function addCourse($course_data)
    {
        //var_dump($course_data);
        
        if(!$course_data || !is_array($course_data))
        {
           
            return false;
        }
    
        
        $db=self::__instance();
   
        
        //var_dump(self::getTableName());
        
        $id=$db->insert(self::getTableName(),$course_data);
        
        return $id;
    }
    
    //根据课程名称查询课程是否存在
    public static function getCourseByName($course_name) {
        if (! $course_name ) {
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
    public static function getCourseByID($course_ID) {
        if (! $course_ID ) {
            return false;
        }
        $db=self::__instance();
        $condition['course_id'] = $course_ID;
		//$list = $db->select(self::getTableName(), self::$columns, array("AND" => $sub_condition));//多条件查询
        $list = $db->select ( self::getTableName(), self::$columns, $condition );
        if ($list) {
            return $list [0];
        }
        return array ();
    }
    
    //计算查询结果的总条数
    public static function countSearch($course_name)
    {
        $db = self::__instance();
        $condition = array();
        if ($course_name != "") {
            //$condition['courseName'] = $course_name;
            $condition['LIKE'] = array("course_name" => $course_name);
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

		$sql = "select *  from " . self::getTableName() . " ".$where ." order by course_id desc".$limit;
		
		//var_dump($sql);
		
		$list = $db->query($sql)->fetchAll();
		
		if ($list) {
			return $list;
		}
		return array();
	}
	
	public static function getAllCourses($start = '', $page_size = '')
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
	
	public static function updateCourseInfo($course_id, $course_data)
	{
	
		if (!$course_data || !is_array($course_data)) return false;
				
		$db = self::__instance();
		
		$condition = array("course_id" => $course_id);
		
		$id = $db->update(self::getTableName(), $course_data, $condition);
		
		return $id;
	}
    public static function getCourseHourByID($courseID){
        if (! $courseID ) {
            return false;
        }
        
        $db=self::__instance();
        $condition['course_id'] = $courseID;
       
        $list = $db->select ( "course", 'course_hour', $condition );
        //var_dump($list);
        if ($list) {
            //var_dump($list [0]['course_hour']);
            return $list [0]['course_hour'];
        }
    }
    public static function getCourseTaskByID($courseID){
        if (! $courseID ) {
            return false;
        }
        
        $db=self::__instance();
        $condition['course_id'] = $courseID;
       
        $list = $db->select ( "course", 'course_task', $condition );
        //var_dump($list);
        if ($list) {
            //var_dump($list [0]['course_hour']);
            return $list [0]['course_task'];
        }
    }
    public static function check($name, $state,$id)
    {
        $db = self::__instance();
        $sql1 = "select ".$name." from " . self::getTableName()."where course_id=".$id;
        $list1 = $db->query($sql1)->fetchAll();
        $sql2 = "select ".$state." from " . self::getTableName()."where course_id=".$id;
        $list2 = $db->query($sql2)->fetchAll();
        if ($list1&&$list2) {
            $list=$list1.",".$list2;
            return $list;
        }else{
            return false;
        }
    }
}
