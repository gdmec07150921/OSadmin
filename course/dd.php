<?php

        require ('../include/init.inc.php');
    
        $id= '';
        extract ( $_GET, EXTR_IF_EXISTS );
    
       //echo($id);
    
        $row_count = Course::getCourseHouByID($id);
        $row_count1 = Course::getCourseTaskByID($id);
        echo($row_count);
        ec