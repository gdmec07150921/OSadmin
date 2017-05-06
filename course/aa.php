<?php

        require ('../include/init.inc.php');
    
        $id= '';
        extract ( $_GET, EXTR_IF_EXISTS );
    
       //echo($id);
    
        $Name = Details::getCourseNameByID($id);
        $Hour = Course::getCourseHourByID($id);
        $Task = Course::getCourseTaskByID($id);
    
        echo($Name);
        echo ",";
        echo($Hour);
         echo ",";
        echo($Task);





/*
    header("content-type:text/html;charset=utf-8;");
    mysql_connect("localhost","root","root") or die("服务器连接失败");
    mysql_select_db("course1") or die("数据库不存在");
    mysql_query("set names utf8");
    if(isset($_GET['id'])&&!empty($_GET['id'])){
        $id = $_GET['id'];
        
        $sql = "select course_name from course where course_id=".$id;
       
        $result=mysql_query($sql);
        if($row = mysql_fetch_assoc($result) != false ){
            $result=mysql_query($sql);
            while($row = mysql_fetch_assoc($result)){
                $data1 = $row['course_name'];
                
            }
            echo $data1;
        }else{
            echo "";
        }
    }else{
        echo "e";
    }
 */
    


    