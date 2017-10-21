<?php
require_once("Class/User.php");
$user = new User();
if ($user->checkUser() == false) {
    header("location:index");
}
$getorganizername = $user->getOrganizername($_SESSION['email']);
$title = "";

if(isset($_GET['event_title']) && !empty($_GET['event_title'])){
    $clean = str_replace("-"," ",$_GET['event_title']);
    $title .= filter_var($clean,FILTER_SANITIZE_STRING);

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename='.$title.'.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Name', 'Matric Number', 'Email', 'Faculty','Department','Pin','Status','Registered on'));
    $getAttendees = $user->getAttendeesForeachEvent($title,$getorganizername['name']);
    if (count($getAttendees) > 0) {
        foreach ($getAttendees as $row) {
            fputcsv($output, $row);
        }
    }
    else{
        header("location: view_event?event_title=".rawurlencode($_GET['event_title'])."&utm_note=null");
    }

}else{
    header("location:404");
    exit();
}




?>