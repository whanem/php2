<?php

function sql_connect($user = 'root', $pass = '', $db = 'photogallery'){
    mysql_connect('localhost', "$user", $pass);
    mysql_select_db("$db");
}

function get_sql_query($query)
{

    $res = mysql_query($query);
    if ($res){
        while (false !== $photo = mysql_fetch_assoc($res)) {
            $photos[] = $photo;
        }
		
    return $photos;
    }
    else
        return false;
}

function written_sql_query($query)
{

    $res = mysql_query($query);
    return $res ? true : false;
	
}
