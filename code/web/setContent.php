<?php 

	mysql_connect('127.0.0.1','developer','developer')or die(mysql_error());
    mysql_select_db('drizzle')  or die(mysql_error());


    if(isset($_POST["content"]) && $_POST["id"]){
        $query = "update images set content='".mysql_real_escape_string($_POST["content"])."' ,hascontent=1, islive=1, contenttitle='".(isset($_POST["contenttitle"])?$_POST["contenttitle"]:'Post')."' where id=".$_POST["id"];

        $res = mysql_query($query);
        
        if($res==1){
            echo json_encode(array("status"=>"success"));
        }else{
            header('HTTP/1.1 400 Bad Request', true, 400);
            echo json_encode(array("status"=>"failed"));
        }
        mysql_close();
    }else{
        header('HTTP/1.1 400 Bad Request', true, 400);
        echo json_encode(array("status"=>"failed"));
    }

    
?>