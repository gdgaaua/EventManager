<?php
require_once ("Class/paginatesearch.php");
require_once ("Class/User.php");
require_once ("admincp/Class/Utility.php");
require_once ("includes/constants.php");
$user = new User();
$util = new Utility();
$paginate = new paginatesearch();
if(isset($_POST['searchbtn'])){
    $location = $util->clean($util->encodeHtml($_POST['location']));
    $type = $util->clean($util->encodeHtml($_POST['type']));
    $edate = explode("/",$_POST['eventdate']);
    $day = @$edate[1];
    $month = @$edate[0];
    $year = @$edate[2];
   $eventdate = ($year."-".$month."-".$day);
   $getsearchs = $user->Search($location,$type,$eventdate);
  
}else{
 header("location:404.php");
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
    <meta name="description" content="Event manager AAUA powered and develop by Google Developers Group AAUA for rendering services to the whole community">
    <meta name="canonical" content="Event manager AAUA powered and develop by Google Developers Group AAUA for rendering services to the whole community">
    <!-- Title -->
    <title>Event Manager Lists</title>
    
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">
    
    <!-- CSS Stylesheet -->
    <link href="<?php echo baseUrl; ?>css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="<?php echo baseUrl; ?>css/owl.carousel.css" rel="stylesheet"><!-- carousel Slider -->
    <link href="<?php echo baseUrl; ?>css/styles.css" rel="stylesheet" /><!-- font css -->
    <link href="<?php echo baseUrl; ?>css/jquery.selectbox.css" rel="stylesheet" /><!-- select Box css -->
    <link href="<?php echo baseUrl; ?>css/datepicker.css" rel="stylesheet" /><!-- Date picker css -->
    <link href="<?php echo baseUrl; ?>css/docs.css" rel="stylesheet"><!--  template structure css -->
    <link href="<?php echo baseUrl; ?>css/custom.css" rel="stylesheet"><!--  template structure css -->
    
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
                    <div class="mail"><a href="mailto:info@eventmanager.com"><span class="icon icon-envelope"></span>info@eventplanning.com</a></div>
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
                            <li><a href="index.php">Home</a>/</li>
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
                                    <div class="filter-view">
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Event Categories</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-20"><input type="checkbox" name="sample-checkbox-01" id="checkbox-20" value="1">Non Vegetarian</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-21"><input type="checkbox" name="sample-checkbox-01" id="checkbox-21" value="1">Vegetarian</label>
                                            </div>
                                        </div>
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Number of Guests</h2>
                                                <div class="reste-filter">
                                                    <a href="#"><span class="icon icon-reset"></span>Reset</a>
                                                </div>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-22"><input type="checkbox" name="sample-checkbox-01" id="checkbox-22" value="1">&lt; 10</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-23"><input type="checkbox" name="sample-checkbox-01" id="checkbox-23" value="1">10 - 100</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-24"><input type="checkbox" name="sample-checkbox-01" id="checkbox-24" value="1">100 - 200</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-25"><input type="checkbox" name="sample-checkbox-01" id="checkbox-25" value="1" checked="">200 - 500</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-26"><input type="checkbox" name="sample-checkbox-01" id="checkbox-26" value="1" >&gt; 500</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="left-productBox hidden-sm">
                                        <h2>Featured Venues</h2>
                                        <div class="product-img"><img src="images/property-img/venues-img8.jpg" alt=""></div>
                                        <h3>Hilton Berlin </h3>
                                        <p>Mohrenstrasse 30 Berlin, 10117 - Germany</p>
                                        <div class="reviews">3.5 <div class="star"><div style="width:70%;" class="fill"></div></div>reviews</div>
                                        <a href="#">Vewi all Details <span class="icon icon-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-12">
                                <div class="right-side">
                                    <div class="toolbar">
                                        <?php
                                        // if(isset($_GET['location']) && isset($_GET['eventdate']) && isset($_GET['type'])){
                                        //     $location = $_GET['location'];
                                        //     $type = $_GET['type'];
                                        //     $edate = $_GET['eventdate'];
                                        //     $eventdate = str_replace('/','-',$edate);

                                        // }else{
                                        //     echo "<h1>Result not found</h1>";
                                        // }

                                        ?>
                                        <div class="finde-count"><?php echo $paginate->Totalno("SELECT * FROM event  WHERE location = :loc AND type = :type AND start LIKE :start OR end LIKE :end ORDER BY `event_id` DESC ",$location,$type,$eventdate); ?>   event found.  </div>
                                        <div class="right-tool">
                                            <div class="select-box">
                                                <select name="location" id="setUp_select" tabindex="1" >
                                                    <option>Near by</option>
                                                    <?php
                                                    $getLocation = $user->getEventLocation();
                                                    foreach ($getLocation as $local){ ?>
                                                        <option value="<?php echo $local['location']; ?>"><?php echo $local['location']; ?></option>

                                                   <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                    $paginate = new paginatesearch();
                                    $records_per_page =10;
                                    //.WHERE date >= NOW() AND date <= NOW() + INTERVAL 7 DAY;
                                
                                    $query = "SELECT * FROM event WHERE location LIKE :loc AND type LIKE :type AND start LIKE :start ORDER BY `event_id` DESC ";
                                    $newquery = $paginate->paging($query, $records_per_page);
                                    $data = $paginate->dataview($newquery,$location,$type,$eventdate);
                                    ?>

                                    <div class="pagination">
                                        <ul>

                                        <?php $paginate->paginglink($query, $records_per_page,$location,$type,$eventdate); ?>
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
    
    <script type="text/javascript" src="<?php echo baseUrl; ?>js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo baseUrl; ?>js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo baseUrl; ?>js/owl.carousel.js"></script>
    <script type="text/javascript" src="<?php echo baseUrl; ?>js/jquery.selectbox-0.2.js"></script>
    <script type="text/javascript" src="<?php echo baseUrl; ?>js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo baseUrl; ?>js/jquery.form-validator.min.js"></script>
	<script type="text/javascript" src="<?php echo baseUrl; ?>js/placeholder.js"></script>
    <script type="text/javascript" src="<?php echo baseUrl; ?>js/coustem.js"></script>
 <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58cb2e9cdff85420"></script>

</body>
</html>

