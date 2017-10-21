<?php

require_once ("Class/User.php");
require_once ("admincp/Class/Utility.php");
$user = new User();
$util = new Utility();
$error = "";

if(isset($_POST['login'])) {
    $email = $util->clean($_POST['email']);
    $password = $util->clean($_POST['password']);

    if (empty($email) && empty($password)) {
        $error .= "All the fields are required";
    } else {
        $check = $user->loginUser($email,$password);
        foreach ($check as $get);
        if ($check == true && password_verify($password, $get['password']) && $get['type'] == "Organizer") {
            $_SESSION['email'] = $get['email'];
             header("location: dashboard");
        } else {
            $error .= "Invalid Login details";
            header('Cache-Control: no-cache, must-revalidate');
            header('Pragma: no-cache');
            header('location: index?loginerror='.$error);
        }

    }
}
?>
