<?php
require_once "smsModel.php";
require_guest($active_user);
$tuser= new User();

if (!empty($_POST) && isset($_POST['login'])) {
    $user_name = $_POST['userName'];
    $password = MD5($_POST['Password']);
    $user = new User();
  
   if (!User::validate_login($user_name, $password)) {
        $err = "Wrong User Name/Password combination";
    
    } else {
        $user->fetch_by_field("user_name", $user_name);
        $id = $tuser->get_attribute_value_table("id",$user_name,"users_management","user_name");
        $_SESSION['id']= $id;
        $user->login();
        echo $user-> get_user_category($user_name);
        if($user-> get_user_category($user_name)== "admin"){
          redirect("home_admin.php");
        }
        else {
              redirect("home_client.php");
        }
        }
} 
?>


<!DOCTYPE html>
<html>
<head>
</head>
<style>

body {
  background: #9ECCEE;
}

.login {
  margin: 20px auto;
  width: 300px;
  padding: 30px 25px;
  background: white;
  border: 1px solid #c4c4c4;
}

h1.login-title {
  margin: -28px -25px 25px;
  padding: 15px 25px;
  line-height: 30px;
  font-size: 25px;
  font-weight: 300;
  color: #ADADAD;
  text-align:center;
  background: #f7f7f7;
 
}

.login-input {
  width: 285px;
  height: 50px;
  margin-bottom: 25px;
  padding-left:10px;
  font-size: 15px;
  background: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
  }
.login-button {
  width: 100%;
  height: 50px;
  padding: 0;
  font-size: 20px;
  color: #fff;
  text-align: center;
  background: #f0776c;
  border: 0;
  border-radius: 5px;
  cursor: pointer; 
  outline:0;
}

.login-lost
{
  text-align:center;
  margin-bottom:0px;
}

.login-lost a
{
  color:#666;
  text-decoration:none;
  font-size:13px;
}
</style>
<body>
<form class="login" method="POST">
    <h1 class="login-title">Service SMS Login</h1>
    <input type="text" class="login-input" placeholder="user Name" required name="userName">
    <input type="password" class="login-input" name="Password" placeholder="Password" required>
    <input type="submit" name="login" class="login-button">
  </form>
</body>
</html>
