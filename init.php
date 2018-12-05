<?php

session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once "helper.php";
if (array_key_exists('user_name', $_SESSION)) {
    $active_user = new User($_SESSION['user_name']);
}
?>