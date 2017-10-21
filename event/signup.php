<?php
error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: IJATUYI OLASUNKANMI
 * Date: 16/03/2017
 * Time: 03:32 AM
 */
require_once ("Class/User.php");
require_once ("admincp/Class/Utility.php");
$user = new User();
$util = new Utility();
define('organizerPic','Uploads/organizer/');
$error = "";
$success = "";

if(isset($_POST['signup'])){
    $email =$util->clean($util->encodeHtml($_POST['email']));
    $name =$util->clean($util->encodeHtml(ucfirst($_POST['fname'])));
    $phone =$util->clean($util->encodeHtml($_POST['phone']));
    $pic = $_FILES['pic']['name'];
    $pic_tmp = $_FILES['pic']['tmp_name'];
    $facebook =$util->clean($util->encodeHtml($_POST['facebook']));
    $twitter =$util->clean($util->encodeHtml($_POST['twitter']));
    $about =$util->clean($util->encodeHtml($_POST['about']));
    $type = "Organizer";
    $password =  password_hash($util->clean($util->encodeHtml($_POST['password'])),PASSWORD_BCRYPT);

    if($email == "" || $name == ""|| $phone == "" ||$pic == "" || $facebook == "" ||
        $twitter == "" || $about == "" || $type == "" || $password == ""){
        $error .= "All the fields are required";
            header('Cache-Control: no-cache, must-revalidate');
            header('Pragma: no-cache');
            header('location: index?error='.$error);
    }else if(!is_numeric($phone)) {
        $error .= "Please enter a valid phone number";
            header('Cache-Control: no-cache, must-revalidate');
            header('Pragma: no-cache');
            header('location: index?error='.$error);
    }else{

        $organizerPath = organizerPic . basename($pic);
        $ext = pathinfo($organizerPath, PATHINFO_EXTENSION);

        //Checkif User already Exist

        $result = $user->CheckifExist($email);

        if (count($result) >= 1 && $result != "") {
            $error .= "User already exist";
            header('Cache-Control: no-cache, must-revalidate');
            header('Pragma: no-cache');
            header('location: index?error='.$error);

        } else {
// check if the extension is valid;
            if ($ext != "jpg" && $ext != "JPG" && $ext != "jpeg" && $ext != "png" && $ext != "PNG") {
                $error .= "Invalid extension";
                header('Cache-Control: no-cache, must-revalidate');
                header('Pragma: no-cache');
                header('location: index?error='.$error);


            } elseif (file_exists(organizerPic . $pic)) {
                $error .= $pic . " already exists. ";
                header('Cache-Control: no-cache, must-revalidate');
                header('Pragma: no-cache');
                header('location: index?error='.$error);

            } else {

                $exts = explode('.', $pic);
                $exts = strtolower(end($exts));
                $filename = uniqid(time(), true) . '.' . $exts;

                $insert = $user->addOrganizer($name, $email, $about, $facebook, $twitter, $phone, $filename);
                $login = $user->addLogin($email, $password, $type);
                if ($insert == true && $login == true) {
                    $util->compressImage($pic_tmp, organizerPic . $filename);
                    $success .= "Account created successfully";
                    header("location:index?success=$success");
                } else {
                    $error .= "Error Occurred" . $ex->getMessage();
                    header('Cache-Control: no-cache, must-revalidate');
                    header('Pragma: no-cache');
                    header('location: index?error='.$error);
                }


            }

        }
    }
}