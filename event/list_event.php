<?php
require_once ("Class/paginate.php");
require_once ("Class/User.php");
$user = new User();
$paginate = new paginate();
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
    
    <meta name="description" content="Event manager AAUA powered and develop by Google Developers Group AAUA for rendering services to the whole community">
    <meta name="canonical" content="Event manager AAUA powered and develop by Google Developers Group AAUA for rendering services to the whole community">
    <!-- Title -->
    <title>Event Manager Lists</title>
    
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">
    
    <!-- CSS Stylesheet -->
    <link href="css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="css/owl.carousel.css" rel="stylesheet"><!-- carousel Slider -->
    <link href="css/styles.css" rel="stylesheet" /><!-- font css --> 
    <link href="css/jquery.selectbox.css" rel="stylesheet" /><!-- select Box css -->
    <link href="css/datepicker.css" rel="stylesheet" /><!-- Date picker css --> 
    <link href="css/docs.css" rel="stylesheet"><!--  template structure css -->
    <link href="css/custom.css" rel="stylesheet"><!--  template structure css -->
    <style type="text/css">
        #cat{
            color: #4C4545;
            font-size: 1.5rem;
        }
    </style>
    
    <!-- Used Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Domine:400,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i%7CRoboto:400,500" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=58cb2ca12dfb9400117e2943&product=inline-share-buttons"></script>
</head>
<body class="inner-page">
	<div class="page">
    	<header id="header">
            <div class="quck-link">
                <div class="container">
                    <div class="mail"><a href="MailTo:info@eventplanning.com"><span class="icon icon-envelope"></span>info@eventplanning.com</a></div>
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
        
        <div class="searchFilter-main">

            <section class="content">
                <div class="breadcrumb">
                    <div class="container">
                        <ul>
                            <li><a href="index">Home</a>/</li>
                            <li><a href="#">Events</a>/</li>

                        </ul>
                    </div>
                </div>
                <div class="container">
                    <div class="venues-view">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="left-side">
                                    <div class="search">
                                        <div class="search-icon"><div class="icon icon-search"></div></div>
                                        <input type="text" placeholder="Search by name">
                                    </div>
                                    <div class="left-link">
                                        <a href="javascript:;" style="" id="cat">Event Categories
                                            <span id="icons" class="icon icon-arrow-down" style="padding-left: 3%;"></span></a>
                                        <ul id="eventtype" style="display: none;">
                                            <?php
                                            $getType= $user->getType();
                                            foreach ($getType as $type){
                                                $clean = str_replace(" ","-",$type['event_cat']);
                                            ?>

                                                <li><a href="catlist?type=<?php echo rawurlencode($clean); ?>"><?php echo $type['event_cat']; ?></a></li>


                                            <?php } ?>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-12">
                                <div class="right-side">
                                    <div class="toolbar">
                                        <div class="finde-count"><?php echo $paginate->Totalno("SELECT * FROM event WHERE end >= CURDATE() AND end <= CURDATE() + INTERVAL 30 DAY AND end != CURDATE()"); ?>   event found.  </div>
                                       

                                    </div>
                                    <?php
                                    $paginate = new paginate();
                                    $records_per_page =6;
                                    //.WHERE date >= NOW() AND date <= NOW() + INTERVAL 7 DAY;
                                    $query = "SELECT * FROM event WHERE end >= CURDATE() AND end <= CURDATE() + INTERVAL 30 DAY AND end != CURDATE() ORDER BY `event_id` DESC ";
                                    $newquery = $paginate->paging($query, $records_per_page);
                                    $data = $paginate->dataview($newquery);
                                    ?>

                                    <div class="pagination">
                                        <ul>

                                        <?php $paginate->paginglink($query, $records_per_page); ?>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
   <?php include("includes/footer.php"); ?>
    </div>
	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="js/jquery.form-validator.min.js"></script>
	<script type="text/javascript" src="js/placeholder.js"></script>
    <script type="text/javascript" src="js/coustem.js"></script>
 <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58cb2e9cdff85420"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#cat').click(function () {
            if ($('#icons').hasClass('icon icon-arrow-down')) {
                $('#icons').removeClass('icon icon-arrow-down');
                $('#icons').addClass('icon icon-arrow-up');


            } else {

                $('#icons').removeClass('icon icon-arrow-up');
                $('#icons').addClass('icon icon-arrow-down');

            }
            $("#eventtype").slideToggle('fast');
        });
    });
</script>
</body>
</html>

