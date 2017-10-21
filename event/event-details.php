<?php
require_once ("Class/User.php");
require_once ("admincp/Class/Utility.php");
require_once ('includes/constants.php');
require_once("Class/PHPMailer/PHPMailerAutoload.php");
require_once ('includes/dompdf/autoload.inc.php');
require_once ('Class/Cleaner.php');

use Dompdf\Dompdf;
$user = new User();
$util  = new Utility();
$cleaner = new Cleaner();

$success =  "";
$error =  "";
$slug = "";
$title = "";
$organizedby = "";
if(isset($_GET['utm_title']) && !empty($_GET['utm_title'])) {
    $slug = $_GET['utm_title'];
    $getTitle = $user->getEventTitleBySlug($slug);
    $title = $getTitle['title'];

}else{
    header("location: index");
}


if(isset($_POST['register'])){
    $eventname = $title;
    $eventUpper = strtoupper($eventname);
    $fname = $util->clean($util->encodeHtml($_POST['fname']));
    $lname = $util->clean($util->encodeHtml($_POST['lname']));
    $name = $fname." ".$lname;
    $nameUpper = strtoupper($name);
    $organizer = $util->clean($util->encodeHtml($_POST['organizer']));
    $matric = $util->clean($util->encodeHtml($_POST['matric']));
    $faculty = $util->clean($util->encodeHtml($_POST['faculty']));
    $department = $util->clean($util->encodeHtml($_POST['department']));
    $email = $util->clean($util->encodeHtml($_POST['email']));
    $pin = $util->gen();

    if(!is_numeric($matric)){
        $error .= "Invalid matriculation number entered,Only number is allowed";
    }else if($eventname == "" || $fname == "" || $lname == "" || $matric == "" || $faculty == ""
        ||$department == ""|| $email == "" || $organizer == ""){
        $error .= "All the fields are required";
    }else{
        $result = $user->CheckifUserReg($email,$matric,$eventname);
        if ($result != 0) {
            $error .= "You cannot registered twice";
        } else {

            $ins = $user->RegisterUser($name,$matric,$email,$organizer,$faculty,$department,$eventname,$pin);
            if($ins == true){

                $getEventdetail = $user->getEventByTitle($slug);
                if(count($getEventdetail) > 0)
                    foreach ($getEventdetail as $desc)
                        $year = date('Y',strtotime($desc['start']));
                        $mont = date('M',strtotime($desc['start']));
                        $day = date('D',strtotime($desc['start']));
                        $dayss = date('d',strtotime($desc['start']));
                        $start_time = date('g:i a',strtotime($desc['start_time']));
                        $yeare = date('Y',strtotime($desc['end']));
                        $monte = date('M',strtotime($desc['end']));
                        $daye = date('D',strtotime($desc['end']));
                        $end_time = date('g:i a',strtotime($desc['end_time']));
                        $dateevent =   strtoupper($day."  ".$mont.", ".$dayss.",  ".$year);
                        $organizedby = $desc['organizer'] ;
                        $location = $desc['location'];
                        $type = $desc['type'];
                        $description = substr($desc['description'], 0, 80).".....";



                $pdf = new Dompdf();



                $mail = new PHPMailer();
                $mail->isHTML(true);

                $mail->From = "no-reply@suppport.com";
                $mail->FromName = "AAUA Event Manager";




                /**
                 *
                 * Ticket Information

                ticket
                Ticket #1 — GDG AAUA (Devfest 17 AAUA)
                Name:
                ijatuyi sunkanmi
                Email:
                ijatuyitemi194@gmail.com
                Dev-Type
                Web
                Group
                GDG AAUA
                Expertise Level
                Intermediate
                 */



                $message = "<html>

<head>

    <style type=\"text/css\">
        body {
            width: 100% !important;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        
        #backgroundTable {
            margin: 0;
            padding: 0;
            width: 100% !important;
            line-height: 100% !important;
        }
        
        table td {
            border-collapse: collapse;
        }
        
        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        
        p .msonormal{
            margin: 0;
            color: #555;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 16px;
            line-height: 160%;
        }
        
        h2 {
            color: #181818;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 22px;
            font-weight: normal;
        }
        
        .bgBody {
            background: #ffffff;
        }
        
        .padd {
            background: #ededed;
            color: #404040;
        }
        
        padd>thbody>tr>td {
            text-align: center;
            padding: 2%;
        }
        
        .padd>tr {
            background: #ededed;
            color: #404040;
        }
        
        .intro {
            background: #f15b22;
            color: #fff !important;
            line-height: 30px;
            font-weight: 700;
            text-transform: uppercase;
        }
        
        .small {
            color: #404040;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: small;
        }
        
        .title {
            color: #404040;
            font-family: 'Benton Sans', -apple-system, BlinkMacSystemFont, Roboto, 'Helvetica neue', Helvetica, Tahoma, Arial, sans-serif;
        }
        
        .title .title-head {
            color: #f15b22;
        }
        
        .padd>tr>td {
            padding: 3%;
        }
        
        .location {
               margin: 0;
    color: #555;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 13px;
    line-height: 159%;
    font-weight: 600;
    width: 380px;
    margin-top: 44px;
    margin-bottom: 26px;
        }
    </style>



</head>

<body>
<table class=\"body-wrap\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;\" bgcolor=\"#f6f6f6\"><tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\"><td style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;\" valign=\"top\"></td>
		<td class=\"container\" width=\"600\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 400px !important; clear: both !important; margin: 0 auto;\" valign=\"top\">
			<div class=\"content\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;\">
				<table class=\"main\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" itemprop=\"action\" itemscope itemtype=\"http://schema.org/ConfirmAction\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;\" bgcolor=\"#fff\"><tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\"><td class=\"content-wrap\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;\" valign=\"top\">
							<meta itemprop=\"name\" content=\"Event Registration Receipt\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\" /><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\"><tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\"><td class=\"content-block\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;\" valign=\"top\">
										 <center><div class=\"contentEditable\" >
                                                <img src = \"../images/logo.png\" alt = 'Logo'  />
                                            </div ></center>
										
									</td>
								</tr>
								<tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\"><td class=\"content-block\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;\" valign=\"top\">
								<p >Dear $firstname,</p>
								
										<h2 style='color: #f15b22;'>Order Summary</h2>

									</td>
								</tr>
								
								<tr style=\"font - family: 'Helvetica Neue',Helvetica,Arial,sans - serif; box - sizing: border - box; font - size: 14px; margin: 0;\"><td class=\"content - block\" style=\"font - family: 'Helvetica Neue',Helvetica,Arial,sans - serif; box - sizing: border - box; font - size: 14px; vertical - align: top; margin: 0; padding: 0 0 20px;\" valign=\"top\">
										
										 <p><b>Name:         $name</b>   </p>
										   <hr/>
										  <p><b>Title:         $title</b>   </p>
										  <hr/>
										  <p><b>Type:         $type</b>   </p>
										    <hr/>
										   <p><b>Event Date:         $dateevent</b>   </p>
										   <hr/>
										   <p><b>Venue:         $location</b>   </p>
										   <hr/>
										   <p><b>Description:         $description</b>   </p>
										   
										   <p align='center'><a class='btn btn-warning' href='http://event.gdgaaua.org.ng/event-details?utm_title=$slug'>Read More</a> </p>
										   
										
									   
									</td>
								</tr>
										<br/>
									

									</td>
								</tr><tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\"><td class=\"content-block\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;\" valign=\"top\">
								
										<p>This email was sent to <a href='mailto:$email'>$email</a><br/>
Event Manager | Google Developers Group | Adekunle Ajasin University, Akungba-Akoko.
</p>
									Copyright &copy; 2017 Event Manager. All rights reserved.
									</td>
								</tr></table></td>
					</tr></table><div class=\"footer\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;\">
					<table width=\"100%\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\"><tr style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;\"><td class=\"aligncenter content-block\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;\" align=\"center\" valign=\"top\"> <a href=\"#\" style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;\"></a></td>
						</tr></table></div></div>
		</td>
		<td style=\"font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; background: #f15b22; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;\" valign=\"top\"></td>
	</tr></table>
</body>

</html>";


                $pdf->loadHtml($message);
                $pdf->set_paper('A3','portrait');
                $pdf->render();
                $output = $pdf->output();

                file_put_contents("files/".$eventname.".pdf", $output);
//Get output of generated pdf in Browser

               $pdf->stream("Event Manager AAUA", array("Attachment"=>0));

                $mail->addAddress($email, $email);

                $mail->Subject = "Order receipt for ".strtoupper($eventname);
                $mail->Body = $message;

                $mail->AddAttachment("files/".$eventname.".pdf", '', $encoding = 'base64', $type = 'application/pdf');
                //return $mail->Send();
                //todo email

                if ($mail->send()) {
                    $success .= "Successfully Registered...Your receipt has been sent to ".$email;

                } else {
                    $error .= "Operation failed.Please check your internet connection";
                }
                $mail->clearAddresses();

            }else{
                $error .= "Error Occurred" . $ex->getMessage();
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
    <meta name="theme-color" content="#f15b22">
    <meta name="msapplication-navbutton-color" content="#f15b22">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f15b22">


    <meta name="description" content=" <?php echo $title; ?>">
    <meta name="canonical" content="Event manager AAUA powered and develop by Google Developers Group AAUA for rendering services to the whole community">
    <!-- Title -->
    <!-- Title -->
    <title> <?php echo $title; ?></title>
    
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">
    
    <!-- CSS Stylesheet -->
    <link href="<?php echo baseUrl; ?>css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="<?php echo baseUrl; ?>css/owl.carousel.css" rel="stylesheet"><!-- carousel Slider -->
    <link href="<?php echo baseUrl; ?>css/styles.css" rel="stylesheet" /><!-- font css -->
    <link href="<?php echo baseUrl; ?>css/lightbox.css" rel="stylesheet"><!-- Light Box css -->
	<link href="<?php echo baseUrl; ?>css/jquery.selectbox.css" rel="stylesheet" /><!-- select Box css -->
    <link href="<?php echo baseUrl; ?>css/docs.css" rel="stylesheet"><!--  template structure css -->
    <link href="<?php echo baseUrl; ?>css/custom.css" rel="stylesheet"><!--  template structure css -->

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
            <div class="quck-link">
                <div class="container">
                    <div class="mail"><a href="MailTo:info@eventmanager.com"><span class="icon icon-envelope"></span>info@eventmanager.com</a></div>
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
                        <form action="login" method="post" enctype="application/x-www-form-urlencoded">
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
                                    <a href="resetpassword">Forgot password ?</a>
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
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="signup">
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
                                    <input type="tel" name="phone" id="phone" maxlength="11" size="11" placeholder="Phone Number">
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
        <div class="simple-banner">
            <?php

                $getEvent = $user->getEventByTitle($slug);
                foreach ($getEvent as $events){
                    ?>

        	<div class="banner-img">
                <img src="<?php echo $events['event_image']; ?>" alt="">
            </div>
            <div class="text">
            	<div class="inner-text">
                	<h2><?php echo $events['title']; ?> </h2>
                    <p><?php echo $events['location']; ?></p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <section class="content">
        	<div class="breadcrumb">
            	<div class="container">
                	<ul>
                    	<li><a href="#">Home</a>/</li>
                        <li><a href="event_list">Event</a>/</li>
                        <li class="active"><a href="#"></a><?php echo $title; ?></li>

                    </ul>
                </div>
            </div>
        	<div class="search-resultPage">
            	<div class="fiexd-nav">
                	<div class="container">
                    	<div class="back-link"><a href="list_event"><span class="icon icon-back-filled"></span>Back</a></div>
                        <ul>
                        	<li>
                            	<a href="javascript:;">
                                	<span class="icon icon-info"></span>
                                    <span class="text">Description</span>
                            	</a>
                            </li>
                            <li>
                            	<a href="javascript:;">
                                	<span class="icon icon-hands"></span>
                                    <span class="text">Social</span>
                            	</a>
                            </li>
                            <li>
                            	<a href="javascript:;">
                                	<span class="icon icon-thumb-image"></span>
                                    <span class="text">Photo Gallery</span>
                            	</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="container">

                    <?php
                    if($error != ""){
                        echo "<div class=\"alert alert-dismissable alert-danger\">
                                 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                <strong>$error</strong> 
                            </div>";
                    }elseif($success!= ""){
                        echo "<div class=\"alert alert-dismissable alert-success\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                <strong>$success</strong> 
                            </div>";
                    }
                    ?>

                	<div class="row">
                    	<div class="col-lg-8 col-sm-8 col-md-8">
                            <input type="text" id="title" value="<?php echo $title; ?>" hidden/>
                        	<div class="hotel-info tab-content">
                            	<h2>About <?php echo $title; ?></h2>
                                <div class="inner-info">
                                    <?php

                                    $getdescription = $user->getEventByTitle($slug);
                                   
                                    if(count($getdescription) > 0){
                                    foreach ($getdescription as $desc){
                                    $year = date('Y',strtotime($desc['start']));
                                    $mont = date('M',strtotime($desc['start']));
                                    $day = date('D',strtotime($desc['start']));
                                    $dayss = date('d',strtotime($desc['start']));
                                    $start_time = date('g:i a',strtotime($desc['start_time']));
                                    $yeare = date('Y',strtotime($desc['end']));
                                    $monte = date('M',strtotime($desc['end']));
                                    $daye = date('D',strtotime($desc['end']));
                                    $end_time = date('g:i a',strtotime($desc['end_time']));
                                    $organizedby = $desc['organizer'] ;
                                    ?>
                                    <p><?php echo $cleaner->purifies($desc['description']); ?></p>
                                    <div class="address-slide">

                                        <label>Organized by <?php echo $organizedby; ?></label>
                                    </div>

                                    <div class="address">


                                        <div class="map-view">
                                            <img src="images/map-img1.png" alt="">
                                            <div class="link"><a href="#">See Location</a></div>
                                        </div>
                                        <div class="address-view">
                                            <h3>Address :</h3>
                                            <div class="address-slide full">
                                                <div class="icon icon-location-2"></div>
                                                <label><?php echo $desc['location']; ?> </label>
                                                <p><?php echo $desc['location']; ?> </p>
                                            </div>

                                            <h3>Time :</h3>
                                            <div class="address-slide">
                                                <div class="icon icon-clock"></div>
                                                <label><?php echo $start_time ?> - <?php echo $end_time?></label>
                                            </div>


                                            <h3>Date :</h3>
                                            <div class="address-slide">
                                                <p><i class="icon icon-calander-check"></i> <strong><?php  echo strtoupper($day."  ".$mont.", ".$dayss.",  ".$year); ?></strong> </p>
                                            </div>

                                            <h3>Category :</h3>
                                            <div class="address-slide">
                                                <p><i class="icon icon-capacity-filled"></i> <?php  echo $desc['type']; ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-list tab-content">
                            	<h2>Share With friends on social network</h2>
                                <div class="amenities-view">
                                    <div class="amenities-box">
                                        <div class="addthis_inline_share_toolbox"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="photo-gallery tab-content">
                            	<h2>Photo Gallery</h2>
                                <div class="gallery-view">
                                	<div class="row">
                                    	<div class="col-sm-4 col-xs-6">
                                        	<div class="img">
                                            	<a href="<?php echo $desc['event_image']; ?>" data-lightbox="example-set" data-title="<?php echo $desc['title']; ?>">
                                            		<img src="<?php echo $desc['event_image']; ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="name"><?php echo $desc['title']; ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                          <?php } ?>
                          
                            
                            
                        </div>
                        <div class="col-log-4 col-sm-4 col-md-4">
                        <div class="booking-formMain">
                        <div class="book-title">Do you want to attend this event? Fill the form below</div>
                            <form class="form-horizontal" action="event-details?utm_title=<?php echo $slug; ?>" method="POST" enctype="application/x-www-form-urlencoded">
                        <div class="book-form">
                            <div class="row">
                                <div class="col-sm-12">
                                 <input type="text" name="organizer" value="<?php echo $organizedby; ?>" hidden/>
                                    <div class="input-box has-error">
                                        <input type="text" name="fname" placeholder="First name" required>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="input-box has-error">
                                        <input type="text" name="lname" placeholder="Last name" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-box">
                                        <input type="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-box">
                                        <input type="text" name="matric" maxlength="9" size="9" required placeholder="Matriculation No">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="input-box">
                                        <select name="faculty" required class="form-control"  tabindex="1">
                                            <option value="">Select Faculty</option>
                                            <?php
                                            $getFac= $user->getFaculty();

                                            foreach ($getFac as $fac){?>
                                                <option value="<?php echo strtoupper($fac['faculty_name']); ?>"><?php echo strtoupper($fac['faculty_name']); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="input-box">
                                        <select name="department" required class="form-control"  tabindex="1">
                                            <option value="">Select Department</option>
                                            <?php
                                            $getDept= $user->getDept();

                                            foreach ($getDept as $dept){?>
                                                <option value="<?php echo strtoupper($dept['dept_name']); ?>"><?php echo strtoupper($dept['dept_name']); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="submit-box">
                                        <input type="submit" name="register" value="Register" class="btn">
                                    </div>
                                </div>
                            </div>
                        </div>
                            </form>
                        </div>
                            </div>
                    </div>
                    <?php }else{echo "<div class='col-md-12 alert alert-danger'><h3>Sorry, the page you are looking for could not be found.</h3></div>";} ?>

                </div>
            </div>
        </section>
        <?php include_once ("includes/footer.php"); ?>
    </div>
	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58cb2e9cdff85420"></script>
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <script type="text/javascript" src="js/scroll.js"></script>
    <script type="text/javascript" src="js/lightbox-plus-jquery.js"></script>
    <script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
    <script type="text/javascript" src="js/jquery.form-validator.min.js"></script>
	<script type="text/javascript" src="js/placeholder.js"></script>
    <script type="text/javascript" src="js/coustem.js"></script>
<script type="text/javascript">
    function downloadUrl(url,callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }
    var title = document.getElementById('title').val();
alert(title);


    downloadUrl("http://event.com:8080/map?title=<?php echo $title; ?>", function(data) {
        var xml = data.responseXML;
        alert(xml);
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function(markerElem) {
            var id = markerElem.getAttribute('id');
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name;
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = address;
            infowincontent.appendChild(text);
        }
            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
            });


</script>
    
</body>
</html>
    

