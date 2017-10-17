<?php

function get_user_data($con, $user_id)
{
	$result = mysqli_query($con, "SELECT * from users where user_id='$user_id'");
    if(mysqli_num_rows($result)==1){
        return mysqli_fetch_assoc($result);
    }else{
    	return FALSE;
    }
}

function output($Return=array()){
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    exit(json_encode($Return));
}

?>
