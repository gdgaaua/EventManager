<?php
require_once ("Class/User.php");
$user  = new User();
if($user->checkUser() == false){
    header("location:index.php");
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
    <meta name="theme-color" content="#f15b22">
    <meta name="msapplication-navbutton-color" content="#f15b22">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f15b22">

    <meta name="description" content="Event manager AAUA">
    <meta name="canonical" content="Event manager AAUA powered and develop by Google Developers Group AAUA for rendering services to the whole community">
    <!-- Title -->
    <!-- Title -->
    <!-- Title -->
    <title>Event Manager AAUA</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">

    <!-- CSS Stylesheet -->
    <link href="css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="css/owl.carousel.css" rel="stylesheet"><!-- carousel Slider -->
    <link href="css/styles.css" rel="stylesheet" /><!-- font css -->
    <link href="css/jquery.selectbox.css" rel="stylesheet" /><!-- select Box css -->
    <link href="css/media.css" rel="stylesheet"><!--  template structure css -->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet"><!--  template structure css -->

    <!-- Used Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Domine:400,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i%7CRoboto:400,500" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body class="inner-page">
<div class="page">
    <header id="header">
        <?php require_once ('includes/menu.php'); ?>
    </header>
    <section class="page-header">
        <div class="container">
            <h1>Verification Portal</h1>
        </div>
    </section>
    <div class="step-nav">
        <div class="container">
            <div class="inner-nav">
                <ul>
                    <li class="first fill"><a href="create"><span class="number"><i class="icon icon-google-plus"></i></span><span class="text">Create Event</span></a></li>
                    <li class="active"><a href="#"><span class="number"><i class="icon icon-cancellation-policy"></i> </span><span class="text">Verification</span></a></li>
                    <li class="last"><a href="#"><span class="number"><i class="icon icon-user"></i></span><span class="text">Profile</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="#">Home</a>/</li>
                <li><a href="#">Event Organizers</a>/</li>
                <li class="active"><a href="#">Verification Portal</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="bookin-info">
                <div class="payment-detail">
                    <div class="totalPayment">
                        <div class="oderId">Organizer ID: <span><?php echo ucfirst($getorganizername['name']); ?></span></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="payment-opction">
                                <ul>
                                    <li class="active"><a href="javascript:;" id="debitCard">Verify User<span class="icon icon-arrow-right"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="payment-detail debitCard-info">
                                <div class="debitCard">

                                    <form class="form-horizontal" method="post" action="verification" enctype="application/x-www-form-urlencoded">
                                        <span id="spanerror"></span>
                                        <span id="feedback"></span>
<input type="text" name="organizer" id="organizer" value="<?php echo ucfirst($getorganizername['name']); ?>" hidden/>
                                        <div class="input-box">
                                            <label>Enter User Email</label>
                                            <input type="text" name="email" id="email" placeholder="User Email">
                                            <span id="inputerr" class="text-danger"></span>
                                        </div>

                                        <div class="input-box">
                                        <label>Enter Verification Pin</label>
                                        <input type="text" name="pin" id="pin" placeholder="Verification Pin">
                                            <span id="inputerr2" class="text-danger"></span>
                                    </div>
                                    <div class="submit-slide">
                                        <button id="verifybtn" name="verify" class="btn"><span><i class="fa fa-credit-card"></i> </span>Verify</button>
                                        <input type="reset" value="Reset" class="btn"/>
                                    </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php include_once("Includes/footer.php"); ?>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>
<script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
<script type="text/javascript" src="js/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="js/placeholder.js"></script>
<script type="text/javascript" src="js/coustem.js"></script>
<script type="text/javascript" src="js/verify.js"></script>

</body>

</html>