<?php
require_once("Class/User.php");
$user = new User();
if ($user->checkUser() == false) {
    header("location:index");
}
$getorganizername = $user->getOrganizername($_SESSION['email']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- Mobile Specific Metas -->

    <!-- Title -->
    <title>Event Manager AAUA - Manage Event</title>

    <link rel="shortcut icon" href="images/Favicon.ico">

    <!-- CSS Stylesheet -->
    <link href="css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="css/owl.carousel.css" rel="stylesheet"><!-- carousel Slider -->
    <link href="css/styles.css" rel="stylesheet" /><!-- font css -->
    <link href="css/docs.css" rel="stylesheet"><!--  template structure css -->

    <!-- Used Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Domine:400,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i%7CRoboto:400,500" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="page">
    <header id="header">
        <?php require_once('includes/menu.php'); ?>
    </header>

    <div class="carrer-banner">
        <img src="images/banner-img/careerBanner.jpg" alt="">
        <div class="text">
            <h1>We are here to help you manage <span>all the events you have created </span></h1>
        </div>
    </div>
    <section class="current-openning">
        <div class="container">
            <div class="heading">
                <div class="icon"><em class="icon icon-heading-icon"></em></div>
                <div class="text">
                    <h2>Event Live Feeds</h2>
                </div>
                <div class="info-text"></div>
            </div>
            <div class="openings-info">
                <div class="row">

                    <div class="col-sm-9 col-sm-offset-2">
                        <div class="openings-title"> Events In Session</div>
                        <div class="job-view">
                            <div class="job-viewBox">
                                <?php
                                $getEventByOrganizer = $user->getEventByOrganizerCurrent($getorganizername['name']);

                                foreach ($getEventByOrganizer as $getEvent) {
                                    $orgname = $getorganizername['name'];
                                    $urlname = str_replace(" ","-",$orgname);
                                    $title = strtoupper($getEvent['title']);
                                    $slug = str_replace(" ","-",$title);
                                    $year = date('Y',strtotime($getEvent['start']));
                                    $mont = date('M',strtotime($getEvent['start']));
                                    $day = date('D',strtotime($getEvent['start']));
                                    $dayss = date('d',strtotime($getEvent['start']));
                                    $start_time = date('g:i a',strtotime($getEvent['start_time']));
                                    $yeare = date('Y',strtotime($getEvent['end']));
                                    $monte = date('M',strtotime($getEvent['end']));
                                    $daye = date('D',strtotime($getEvent['end']));
                                    $end_time = date('g:i a',strtotime($getEvent['end_time']));
                                    $category = $getEvent['type'];
                                    ?>

                                    <div class="openings-slide">
                                        <p><h4><?php echo $title; ?></h4> </p>

                                        <p><i title="No of Attendees" class="icon icon-user"></i> <strong>(<?php echo $user->CountEventByOrganizer($getEvent['title'],$orgname ); ?>)        </strong></p>

                                        <p><i  title="Event Date" class="icon icon-calander-check"></i> <strong><?php  echo ucfirst($day."  ".$mont.", ".$dayss.",  ".$year); ?></strong> &nbsp;&nbsp;&nbsp;  ||&nbsp;&nbsp;&nbsp;  <i title="Location of the event" class="icon icon-location-2"></i><?php echo ucfirst($getEvent['location']); ?> </p>
                                        <ul class="skill">
                                            <li title="Category"><h6 style="color: #898989;"><?php echo $category; ?></h6></li>

                                        </ul>

                                        <a class="btn" href="sharelive?event_title=<?php echo rawurlencode($slug); ?>">Share Event Live</a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once("includes/footer.php"); ?>

</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>
<script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
<script type="text/javascript" src="js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="js/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="js/placeholder.js"></script>
<script type="text/javascript" src="js/coustem.js"></script>

</body>

</html>