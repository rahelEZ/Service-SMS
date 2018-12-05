<?php

function redirect($target)
{
    header("Location: $target");
}

function require_login($user)
{
    if ($user == null) {
        redirect("index.php");
    }
}

function require_guest($user)
{
    if ($user != null) {
		if($user-> get_user_category($user_name)== "admin"){
			//echo "admin";
			redirect("home_admin.php");
		}
		else{
			redirect("home_client.php");
		}
    }
}
?>

