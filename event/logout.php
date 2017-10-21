<?php
require_once("Class/User.php");
$user = new User();
if($user->checkUser() == false){
    header("location:index");
}
$logout = $user::logout();
if($logout == true){
    header("location:index");
}

?>