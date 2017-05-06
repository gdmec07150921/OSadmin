<?php

        require ('../include/init.inc.php');
    
        $id= '';
        extract ( $_GET, EXTR_IF_EXISTS );
    
       //echo($id);
    
        $row_count = Evaluate::getStudentNameByID($id);
    
        echo($row_count);