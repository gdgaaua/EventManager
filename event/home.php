<?php
require_once("Class/User.php");
$user = new User();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- Mobile Specific Metas -->
    <!-- Title -->
    <title>Event Manager AAUA</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">

    <!-- CSS Stylesheet -->
    <link href="css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="css/owl.carousel.css" rel="stylesheet"><!-- carousel Slider -->
    <link href="css/styles.css" rel="stylesheet"/><!-- font css -->
    <link href="css/datepicker.css" rel="stylesheet"/><!-- Date picker css -->
    <link href="css/docs.css" rel="stylesheet"><!--  template structure css -->
    <link href="css/custom.css" rel="stylesheet"><!--  template structure css -->
    <link rel="stylesheet" type="text/css" href="js/sweet-alert/sweet-alert.min.css"/>

    <!-- Used Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Domine:400,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i%7CRoboto:400,500"
        rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
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
                    <div class="input-box">
                        <div class="icon icon-grid-view"></div>
                        <input type="text" placeholder="Event Type">
                    </div>
                    <div class="input-box location">
                        <div class="icon icon-location-1"></div>
                        <input type="text" placeholder="Event Location">
                    </div>
                    <div class="input-box date">
                        <div class="icon icon-calander-month"></div>
                        <input type="text" placeholder="Select Date" id="datepicker2">
                    </div>
                    <div class="submit-slide">
                        <input type="submit" value="Search Now" class="btn">
                    </div>
                    <p>Create the Perfect Event</p>
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

                        foreach ($getEvents as $event) {
                            $title = $event['title'];
                            $year = date('Y', strtotime($event['start']));
                            $month = date('M', strtotime($event['start']));
                            $day = date('D', strtotime($event['start']));
                            $loc = $event['location'];
                            ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="news-box style2">
                                    <div class="text" style="padding: 0px;">
                                        <div class="news-title">
                                            <h3><a href="event-details.php?title=<?php echo $title; ?>"><img src="Uploads/event/<?php echo $event['event_image']; ?>"/> </a></h3>
                                            <h4 style="padding-left: 10%; margin-bottom: 7px; margin-top: 16px;"><?php echo $title; ?></h4>
                                            <span
                                                style="padding-left: 10%;"> <?php echo strtoupper($day) . ", " . strtoupper($month) . " " . $year . "  " . date('g:i a', strtotime($event['start_time'])); ?></span>
                                        </div>
                                        <p style="padding-left: 10%;"><?php echo ucfirst($loc); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!--                            <div class="col-md-4 col-sm-6">-->
                        <!--                                <div class="news-box style2">-->
                        <!--                                    <div class="text">-->
                        <!--                                        <div class="news-title">-->
                        <!--                                            <h3>Post with Image Here</h3>-->
                        <!--                                            <span>Rashed kabir on 24 Feb, 2014</span>-->
                        <!--                                        </div>-->
                        <!--                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
                        <!--                                        <a href="#" class="btn">Read More</a>-->
                        <!--                                    </div>-->
                        <!--                                </div>    	-->
                        <!--                            </div>-->
                        <!---->
                        <!--                              <div class="col-md-4 col-sm-6">-->
                        <!--                                <div class="news-box style2">-->
                        <!--                                    <div class="text">-->
                        <!--                                        <div class="news-title">-->
                        <!--                                            <h3>Post with Image Here</h3>-->
                        <!--                                            <span>Rashed kabir on 24 Feb, 2014</span>-->
                        <!--                                        </div>-->
                        <!--                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
                        <!--                                        <a href="#" class="btn">Read More</a>-->
                        <!--                                    </div>-->
                        <!--                                </div>      -->
                        <!--                            </div>-->
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="service-type">
        <div class="container">
            <div class="heading">
                <div class="icon"><em class="icon icon-heading-icon"></em></div>
                <div class="text">
                    <h2>Browse by Categories</h2>
                </div>
                <div class="info-text">
                </div>
            </div>
            <div class="service-catagari">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon icon-caterers"></span>
                            <span class="text">Caterers</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon icon-flower-pot"></span>
                            <span class="text">Decor & Florists</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon icon-calander"></span>
                            <span class="text">Event Planner</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon icon-beauty"></span>
                            <span class="text">Make-up and Hair</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon icon-wedding-card"></span>
                            <span class="text">Wedding Cards</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon icon-mehandi"></span>
                            <span class="text">Mehandi</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon icon-cake"></span>
                            <span class="text">Cakes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon icon-music"></span>
                            <span class="text">DJ</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon icon-camera"></span>
                            <span class="text">Photographers &amp; Videographers</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon icon-glass"></span>
                            <span class="text">Entertainment</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </section>

    <section class="event-sponsor">
        <div class="container">
            <div class="heading">
                <div class="icon"><em class="icon icon-heading-icon"></em></div>
                <div class="text">
                    <h2>Clients </h2>
                </div>
                <div class="info-text">It has survived not only five centuries, but also leapt into electronic
                    typesetting,
                </div>
            </div>
            <div class="sponsor-slider">
                <div class="item"><a href="#"><img src="images/sponsor-logo/sponsor-logo1.png" alt=""></a></div>
                <div class="item"><a href="#"><img src="images/sponsor-logo/sponsor-logo2.png" alt=""></a></div>
                <div class="item"><a href="#"><img src="images/sponsor-logo/sponsor-logo3.png" alt=""></a></div>
                <div class="item"><a href="#"><img src="images/sponsor-logo/sponsor-logo4.png" alt=""></a></div>
                <div class="item"><a href="#"><img src="images/sponsor-logo/sponsor-logo1.png" alt=""></a></div>
                <div class="item"><a href="#"><img src="images/sponsor-logo/sponsor-logo2.png" alt=""></a></div>
                <div class="item"><a href="#"><img src="images/sponsor-logo/sponsor-logo3.png" alt=""></a></div>
                <div class="item"><a href="#"><img src="images/sponsor-logo/sponsor-logo4.png" alt=""></a></div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <h5>Latest Updates</h5>
                        <div class="update-slide">
                            <div class="img"><img src="images/event-img/update-img1.png" alt=""></div>
                            <div class="text">
                                <p>Lorem ipsum is a dummy text full service industrial design.</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                        <div class="update-slide">
                            <div class="img"><img src="images/event-img/update-img2.png" alt=""></div>
                            <div class="text">
                                <p>Integrated Design Systems is a full-service industrial design.</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                        <div class="update-slide">
                            <div class="img"><img src="images/event-img/update-img3.png" alt=""></div>
                            <div class="text">
                                <p>when an unknown printer took a galley of type and specimen book.</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3 text-center">
                        <div class="footer-link">
                            <h5>Company</h5>
                            <ul>
                                <li><a href="aboutUs.html">About Us</a></li>
                                <li><a href="privacy_policy.html">Privacy Policy</a></li>
                                <li><a href="career.html">Careers</a></li>
                                <li><a href="blog.html">Blogs</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <div class="footer-contact">
                            <h5>Contact us</h5>
                            <div class="contact-slide">
                                <div class="icon icon-location-1"></div>
                                <p>74 West Main Street, Oyster Bay, Berlin, 10963 - Germany </p>
                            </div>
                            <div class="contact-slide">
                                <div class="icon icon-phone"></div>
                                <p>516-482-2181 ext 101</p>
                            </div>

                            <div class="contact-slide">
                                <div class="icon icon-message"></div>
                                <a href="MailTo:info@eventplanning.com">info@eventplanning.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <div class="contact-form">
                            <h5>Connect with us</h5>
                            <p>We'll keep you informed and updated Sign up for our email newsletters </p>
                            <div class="input-row">
                                <div class="input-box">
                                    <input type="text" placeholder="First Name">
                                </div>
                                <div class="input-box">
                                    <input type="text" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="input-row email">
                                <div class="input-box">
                                    <input type="text" placeholder="Email Address">
                                </div>
                                <div class="submit-box">
                                    <input type="submit" value="Submit">
                                </div>
                            </div>
                            <div class="sosal-midiya">
                                <ul>
                                    <li><a href="#"><span class="icon icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon icon-skype"></span></a></li>
                                    <li><a href="#"><span class="icon icon-google-plus"></span></a></li>
                                    <li><a href="#"><span class="icon icon-play"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>Copyright &copy; <span></span> - EventManager | All Rights Reserved</p>
            </div>
        </div>
    </footer>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>
<script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
<script type="text/javascript" src="js/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/placeholder.js"></script>
<script type="text/javascript" src="js/sweet-alert/sweet-alert.min.js"></script>

<script type="text/javascript" src="js/coustem.js"></script>

<script type="text/javascript">
    $(document).ready(function (e) {
        var error = $("#error").val();
        var success = $("#success").val();
        var loginerror = $('#errors').val();


        if (error != "") {
            swal({
                title: "Error",
                text: error,
                type: "error",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Try again",
                closeOnConfirm: false,
            }, function (isConfirm) {
                if (isConfirm) {
                    swal(error, "Oops!!!", "error");
                    window.location.href = "index.php";
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });


        } else if (success != "") {
            swal({
                title: "Success",
                text: success,
                type: "success",
                confirmButtonColor: "#12C7C7",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
            }, function (isConfirm) {
                if (isConfirm) {
                    swal(success, "", "success");
                    window.location.href = "index.php";
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        }else if(loginerror != ""){
            swal({
                title: "Error",
                text: loginerror,
                type: "error",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Try again",
                closeOnConfirm: false,
            }, function (isConfirm) {
                if (isConfirm) {
                    swal(loginerror, "Oops!!!", "error");
                    window.location.href = "index.php";
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        }

        var password = $('#password').val();

        $('#email').keyup(function () {

            if ($('#email').val() == "") {

                $('#UserError').html("Email is required").fadeIn('slow');
                $('#submit').attr('disabled',true);

            } else {

                $('#UserError').css({display: 'none'});
                $('#submit').attr('disabled',false);

            }
        });
        $('#password').keyup(function () {
            if ($('#password').val() == "") {
                $('#PassError').html("Password is required").fadeIn('slow');
                $('#submit').attr('disabled',true);
            } else {
                $('#PassError').css({display: 'none'});
                $('#submit').attr('disabled',false);
            }
        });

        if(($('#email').val() == "") && ($('#password').val() == "")){

            $('#submit').attr('disabled',true);
        }else{

            $('#submit').attr('disabled',false);
        }

    });
</script>
</body>

</html>

