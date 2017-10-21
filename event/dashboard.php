<?php
require_once ("Class/User.php");
require_once ("admincp/Class/Utility.php");
require_once ("includes/constants.php");

$user  = new User();
$util  = new Utility();
$success =  "";
$error =  "";
define('eventPicture','Uploads/event/');

if($user->checkUser() == false){
    header("location:index");
}
//Get organizer name
$getorganizername = $user->getOrganizername($_SESSION['email']);

if(isset($_POST['save'])){
    $title =$util->clean($util->encodeHtml(ucfirst($_POST['title'])));
    $slug = $util->slug($title);
    $location =$util->clean($util->encodeHtml($_POST['location']));
    $organizer =$util->clean($util->encodeHtml($_POST['orgname']));
    $dept =$util->clean($util->encodeHtml($_POST['department']));
    $faculty =$util->clean($util->encodeHtml($_POST['faculty']));
    $sdate =$util->clean($util->encodeHtml($_POST['sdate']));
    $sedate = explode("/",$sdate);
    $sday = @$sedate[1];
    $smonth = @$sedate[0];
    $syear = @$sedate[2];
    $startdate = ($syear."-".$smonth."-".$sday);
    $stime =$util->clean($_POST['stime']);
    $edate =$util->clean($util->encodeHtml($_POST['edate']));
    $eedate = explode("/",$edate);
    $eday = @$eedate[1];
    $emonth = @$eedate[0];
    $eyear = @$eedate[2];
    $enddate = ($eyear."-".$emonth."-".$eday);
    $etime =$util->clean($_POST['etime']);
    $eimage = $_FILES['eventImg']['name'];
    $eimage_tmp = $_FILES['eventImg']['tmp_name'];
    $type = $util->clean($util->encodeHtml($_POST['type']));
    $topic = $util->clean($util->encodeHtml($_POST['topic']));
    $description = $_POST['description'];

    if($title == "" || $location == ""|| $organizer =="" || $sdate == "" || $stime == ""
        ||$edate == "" || $etime == "" || $eimage == "" || $topic == "" || $type == ""){
        $error .= "All the fields are required";
    }else{



        $eventImagePath = eventPicture.basename($eimage);
        $ext = pathinfo($eventImagePath,PATHINFO_EXTENSION);



//check if username already exist;

        $result = $user->CheckifExists($title);

        if (count($result) == 1 && $result != "") {
            $error .= "Event title already exist";
        } else {
// check if the extension is valid;
            if ($ext != "jpg" && $ext != "JPG" && $ext != "jpeg" && $ext != "png" && $ext != "PNG") {
                $error = "Invalid extension";


            } elseif (file_exists(eventPicture . $eimage)) {
                $error .= $eimage . " already exists. ";

            } else {

                $exts = explode('.', $eimage);
                $exts = strtolower(end($exts));
                $filename = uniqid(time(), true) . '.' . $exts;
                $filedb = imageUrl.$filename;

                $insert = $user->createEvent($title, $location, $startdate, $stime, $enddate, $etime, $filedb, $description, $organizer, $type, $topic,$dept,$faculty,$slug);
                if ($insert == true) {
                    $util->compressImage($eimage_tmp, eventPicture . $filename);
                    $success .= "Event Created";
                } else {
                    $error .= "Error Occurred" . $ex->getMessage();
                }


            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta name="theme-color" content="#f15b22">
    <meta name="msapplication-navbutton-color" content="#f15b22">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f15b22">

    <meta name="description" content="Event manager AAUA ">
    <meta name="canonical" content="Event manager AAUA powered and develop by Google Developers Group AAUA for rendering services to the whole community">
    <!-- Title -->
    <!-- Title -->
    <!-- Title -->
    <title>Event Manager Home | Organizers Dashboard/ Control Panel</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">

    <!-- CSS Stylesheet -->
    <link href="<?php echo baseUrl; ?>css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="<?php echo baseUrl; ?>css/owl.carousel.css" rel="stylesheet"><!-- carousel Slider -->
    <link href="<?php echo baseUrl; ?>css/styles.css" rel="stylesheet" /><!-- font css -->
    <link href="<?php echo baseUrl; ?>css/jquery.selectbox.css" rel="stylesheet" /><!-- select Box css -->
    <link href="<?php echo baseUrl; ?>css/datepicker.css" rel="stylesheet"/><!-- Date picker css -->
    <link href="<?php echo baseUrl; ?>css/docs.css" rel="stylesheet"><!--  template structure css -->
    <link href="<?php echo baseUrl; ?>css/media.css" rel="stylesheet"><!--  template structure css -->
    <link href="<?php echo baseUrl; ?>js/summernote.css" rel="stylesheet"/>

    <!-- Used Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Domine:400,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i%7CRoboto:400,500" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>


<body class="registerPage">
<div class="page">
    <header id="headerRegister">

        <?php require_once ('includes/menu.php'); ?>
    </header>
    <section class="page-header">
        <div class="container">
            <h1>Dashboard</h1>
        </div>
    </section>
    <section class="service-type">
        <div class="container">
            <div class="heading">
                <div class="icon"><em class="icon icon-heading-icon"></em></div>
                <div class="text">
                    <h2>MENU</h2>
                </div>
                <div class="info-text"></div>
            </div>
            <div class="service-catagari">
                <ul>
                    <li>
                        <a href="create">
                            <span class="icon icon-booking"></span>
                            <span class="text">Create Event</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage_event">
                            <span class="icon icon-wedding-card"></span>
                            <span class="text">Manage Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="live">
                            <span class="icon icon-camera"></span>
                            <span class="text">Live Feed Event</span>
                        </a>
                    </li>
                    <li>
                        <a href="verification">
                            <span class="icon icon-user"></span>
                            <span class="text">Verification Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout">
                            <span class="icon icon-arrow-left"></span>
                            <span class="text">Logout</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </section>

    <?php include("includes/footer.php"); ?>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript" src="<?php echo baseUrl; ?>js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/jquery.selectbox-0.2.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/placeholder.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/coustem.js"></script>
</body>

</html>

