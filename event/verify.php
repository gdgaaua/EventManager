<?php
sleep(2);
require_once ("Class/User.php");
$user  = new User();
$error = "";
$success = "";
if(isset($_GET['verify'])){
    $email = $_POST['email'];
    $pin = $_POST['pin'];
    $organizer = $_POST['organizer'];
    $status = "VERIFIED";
    if($email != "" && $pin != "" && $organizer != ""){

        $result = $user->VerifyUser($email,$pin,$organizer);
        if (count($result) >= 2 && $result != "") {
            $verify = $user->VerifyStatus($email,$pin,$organizer,$status);
            if($verify == true){
                echo $success .= "successful";
            }else{
                echo $error .= "Verification Failed, try again";
            }

        }else{
            $error .= "Not Found";
        }
    }else{
        $error .= "All the Fields are required";
    }
    echo $error;

}
?>