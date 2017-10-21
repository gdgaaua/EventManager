<?php
require_once("Class/User.php");
require_once ("includes/constants.php");
$user = new User();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- Mobile Specific Metas -->
    <meta name="theme-color" content="#f15b22">
    <meta name="msapplication-navbutton-color" content="#f15b22">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f15b22">
    <!-- Title -->
    <title>Event Manager AAUA</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">

    <!-- CSS Stylesheet -->
    <link href="<?php echo baseUrl; ?>css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="<?php echo baseUrl; ?>css/owl.carousel.css" rel="stylesheet"><!-- carousel Slider -->
    <link href="<?php echo baseUrl; ?>css/styles.css" rel="stylesheet"/><!-- font css -->
    <link href="<?php echo baseUrl; ?>css/datepicker.css" rel="stylesheet"/><!-- Date picker css -->
    <link href="<?php echo baseUrl; ?>css/docs.css" rel="stylesheet"><!--  template structure css -->
    <link href="<?php echo baseUrl; ?>css/custom.css" rel="stylesheet"><!--  template structure css -->
    <link rel="stylesheet" type="text/css" href="<?php echo baseUrl; ?>js/sweet-alert/sweet-alert.min.css"/>
    <link rel="manifest"  href="./mainfest.json"/>

    <!-- Used Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Domine:400,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i%7CRoboto:400,500"
        rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.<?php echo baseUrl; ?>js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">

    </style>
</head>

<body>
<div class="page">
    <header id="header">
        <div class="quck-link">
            <div class="container">
                <div class="mail"><a href="MailTo:info@eventmanager.com"><span class="icon icon-envelope"></span>info@eventmanager.com</a>
                </div>
                <?php require_once("includes/top-nav.php"); ?>
            </div>
        </div>
        <?php require_once('includes/homemenu.php'); ?>
    </header>
    <div class="modal modal-vcenter fade" id="loginModal" tabindex="-1" role="dialog">
        <div class="modal-dialog login-popup" role="document">
            <div class="modal-content">
                <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="images/close-icon.png" alt="">
                </div>

                <div class="right-info">
                    <h1>Login</h1>
                    <form action="login.php" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="input-form">
                            <div class="input-box">
                                <div class="icon icon-message"></div>
                                <input type="email" name="email" id="email" placeholder="Email">
                                <span id="UserError" style="color:#ff0000; font-style: italic;"></span>
                            </div>
                            <div class="input-box">
                                <div class="icon icon-lock"></div>
                                <input type="password" name="password" id="password" placeholder="Password">
                                <span id="PassError" style="color: #ff0000; font-style: italic;"></span>
                            </div>
                            <div class="check-slide">
                                <a href="resetpassword.php">Forgot password ?</a>
                            </div>
                            <div class="submit-slide">
                                <input type="submit" name="login"  id="submit" value="Sign in" class="btn">
                            </div>
                        </div>
                    </form>
                    <div class="signUp-link">Haven’t signed up yet? <a href="javascript:void(0);"> Sign Up</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-vcenter fade" id="registrationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog registration-popup" role="document">
            <div class="modal-content">
                <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="images/close-icon.png" alt="">
                </div>
                <h1>Sign Up</h1>
                <div class="registration-form">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="signup.php">
                        <div class="form-filde">
                            <div class="input-box">
                                <input type="text" name="fname" id="name" placeholder="Fullname">
                            </div>
                            <div class="input-box">
                                <input type="email" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="input-box">
                                <input type="password" id="password" name="password" placeholder="Password">
                            </div>


                            <div class="input-box">
                                <input type="tel" name="phone" id="phone" placeholder="Phone Number">
                            </div>
                            <div class="input-box">
                                <input type="file" id="pic" name="pic">
                            </div>
                            <div class="input-box">
                                <input type="text" id="fb" name="facebook" placeholder="facebook ID">
                            </div>
                            <div class="input-box">
                                <input type="text" id="twitter" name="twitter" placeholder="twitter">
                            </div>
                            <div class="captcha-box">
                                <textarea class="form-control" id="about" name="about" cols="2" rows="5"
                                          placeholder="About You"></textarea>

                            </div>

                            <div class="submit-slide">
                                <input type="submit" name="signup" id="signup" value="Register" class="btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="banner">
        <input type="text" value="<?php if (isset($_GET['success'])) {
            echo $_GET['success'];
        } else {
        } ?>" id="success" hidden/>
        <input type="text" value="<?php if (isset($_GET['error'])) {
            echo $_GET['error'];
        } else {
        } ?>" id="error" hidden/>

        <input type="text" value="<?php if (isset($_GET['loginerror'])) {
            echo $_GET['loginerror'];
        } else {
        } ?>" id="errors" hidden/>

        <div class="carousel" id="mainBnner">
            <div class="item"><img src="images/banner-img/slider-img.jpg" alt=""></div>
            <div class="item"><img src="images/banner-img/slider-img2.jpg" alt=""></div>
            <div class="item"><img src="images/banner-img/slider-img3.jpg" alt=""></div>
        </div>
        <div class="banner-nav">
            <div class="prev"><span class="icon icon-arrow-left"></span></div>
            <div class="next"><span class="icon icon-arrow-right"></span></div>
        </div>
        <div class="banner-text">
            <div class="container">
                <div class="search-title">
                    <h1> Every Event Should be <span>Perfect</span></h1>
                </div>
                <div class="banner-search">
                    <form class="form-horizontal" method="post" action="search.php" enctype="application/x-www-form-urlencoded">


                    <div class="input-box">

                        <select name="type" required  class="form-control input-lg" tabindex="1">
                            <option value="">Select Event type</option>
                            <?php
                            $getType= $user->getType();

                            foreach ($getType as $type){?>
                                <option value="<?php echo $type['event_cat']; ?>"><?php echo $type['event_cat']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-box location">
                        <div class="icon icon-location-1"></div>
                        <input type="text" name="location" placeholder="Event Location">
                    </div>
                    <div class="input-box date">
                        <div class="icon icon-calander-month"></div>
                        <input type="text" name="eventdate" placeholder="Select Date" id="datepicker2">
                    </div>
                    <div class="submit-slide">
                        <input type="submit" name="searchbtn" value="Search Now" class="btn">
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section class="news-view">
        <div class="container">
            <div class="heading">
                <div class="icon"><em class="icon icon-heading-icon"></em></div>
                <div class="text">
                    <h2>Latest Event</h2>
                </div>
                <div class="info-text">.
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="row">
                        <?php
                        $getEvents = $user->getEventSix();
                        if(count($getEvents) > 0){
                        foreach ($getEvents as $event) {
                            $title = $event['title'];
                            $slug = $event['slug'];
                            $year = date('Y', strtotime($event['start']));
                            $month = date('M', strtotime($event['start']));
                            $day = date('D', strtotime($event['start']));
                            $daynum = date('d', strtotime($event['start']));
                            $loc = $event['location'];
                            ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="news-box style2">
                                    <div class="text" style="padding: 0px;">
                                        <div class="news-title">
                                            <div class=""><a href="event-details?utm_title=<?php echo $slug; ?>"><img class="img-responsive" style=" height: 178px;
    width: 370px;" src="<?php echo $event['event_image']; ?>"/> </a></div>
                                            <h4 style="padding-left: 10%; margin-bottom: 7px; margin-top: 16px;"><?php echo $title; ?></h4>
                                            <span
                                                style="padding-left: 10%;"> <?php echo $daynum." ". strtoupper($day) . ", " . strtoupper($month) . " " . $year . "  " . date('g:i a', strtotime($event['start_time'])); ?></span>
                                        </div>
                                        <p style="padding-left: 10%; line-break: auto;"><?php echo ucfirst($loc); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php }  ?>
                        <?php } else{echo "<div class='col-md-12 alert alert-info'>No events yet</div>";}?>

                    </div>

                </div>

            </div>
        </div>
    </section>

<?php include_once ("includes/footer.php"); ?>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript" src="<?php echo baseUrl; ?>js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/app.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/jquery.selectbox-0.2.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/placeholder.js"></script>
<script type="text/javascript" src="<?php echo baseUrl; ?>js/sweet-alert/sweet-alert.min.js"></script>


<script type="text/javascript" src="<?php echo baseUrl; ?>js/coustem.js"></script>
</body>

</html>

