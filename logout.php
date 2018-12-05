<?php
require_once "smsModel.php";
require_login($active_user);
session_destroy();
redirect("index.php");
?>