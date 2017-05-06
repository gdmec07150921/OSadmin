<?php
    
    require ('../include/init.inc.php');
    
    $id= '';
    extract ( $_GET, EXTR_IF_EXISTS );
    
    //echo($id);
    
    $row_count = Details::getTeacherNameByID($id);
    
    echo($row_count);

    /*header("content-type:text/html;charset=utf-8;");
    mysql_connect("localhost","root","root") or die("服务器连接失败");
    mysql_select_db("course1") or die("数据库不存在");
    mysql_query("set names utf8");
    if(isset($_GET['id'])&&!empty($_GET['id'])){
        $id = $_GET['id'];
        
        $sql = "select t_name from teacher where t_id=".$id;
       
        $result=mysql_query($sql);
        if($row = mysql_fetch_assoc($result) != false ){
            $result=mysql_query($sql);
            while($row = mysql_fetch_assoc($result)){
                $data1 = $row['t_name'];
                
            }
            echo $data1;
        }else{
            echo "";
        }
    }else{
        echo "e";
    }*/
    


    