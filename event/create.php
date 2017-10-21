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
    <title>Create Event </title>
    
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
                <h1>Create Event</h1>
            </div>
        </section>
        <div class="register-banner">
            <div class="inner-banner">
                <div class="register-form">
                    <?php
                  if($error != ""){
                        echo "<div class=\"alert alert-danger fade in\">
                                <button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\">
                                    <i class=\"fa fa-times\"></i>
                                </button>
                                <strong>$error</strong> 
                            </div>";
                    }elseif($success!= ""){
                      echo "<div class=\"alert alert-success fade in\">
                                <button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\">
                                    <i class=\"fa fa-times\"></i>
                                </button>
                                <strong>$success</strong> 
                            </div>";
                  }
                    ?>
                    <div class="inner-form">
                        <h1>Create Event</h1>
                        <div class="form-filde">

                            <form class="form-horizontal" action="create" method="post" enctype="multipart/form-data">
                            <div class="input-slide">
                                <p>EVENT TITLE</p>
                                <input type="text" name="title" placeholder="Give it a short and distinct name">
                            </div>
                            <div class="input-slide">
                                <p>LOCATION</p>
                                <input type="text" name="location" placeholder="Specify where it's held ">
                            </div>

                                <div class="select-row">
                                    <p>FACULTY</p>
                                    <select name="faculty" required class="form-control"  tabindex="1">
                                        <option value="">Select Faculty</option>
                                        <?php
                                        $getFac= $user->getFaculty();

                                        foreach ($getFac as $fac){?>
                                            <option value="<?php echo strtoupper($fac['faculty_name']); ?>"><?php echo strtoupper($fac['faculty_name']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <div class="select-row">
                                    <p>DEPARTMENT</p>
                                    <select name="department" required class="form-control"  tabindex="1">
                                        <option value="">Select Department</option>
                                        <?php
                                        $getDept= $user->getDept();

                                        foreach ($getDept as $dept){?>
                                            <option value="<?php echo strtoupper($dept['dept_name']); ?>"><?php echo strtoupper($dept['dept_name']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <div class="input-slide">
                                    <p>ORGANIZER NAME</p>
     <input type="text" name="orgname" readonly="readonly" placeholder="Organizer Name" value="<?php echo ucfirst($getorganizername['name']); ?>"/>
                                </div>
                            <div class="input-slide">
                                <div class="row">
                                    <div class="col-md-6">
                                           <p>STARTS</p>
                                        <div class="col-md-7">
                                            <div class="input-box date">
                                                <input type="text" name="sdate" placeholder="Start Date" id="datepicker1">
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                            <input type="Time" name="stime" placeholder="Start Time">
                                        </div>
                                    </div>

                                     <div class="col-md-6">
                                         <p>ENDS</p>
                                         <div class="col-md-7">
                                             <div class="input-box date">
                                                 <input type="text" name="edate" placeholder="End Date" id="datepicker2">
                                             </div>
                                         </div>
                                         <div class="col-md-5">
                                             <input type="Time" name="etime" placeholder="End Time">
                                         </div>
                                     </div>

                                </div>

                            </div>
                                <div class="input-slide">
                                    <p>EVENT IMAGE   <small>(We recommend using at least a 800px x 400px  image that's no larger than 5MB</small>)</p>
                                    <input type="file" name="eventImg"/>
                                </div>

                                <div class="select-row">
                                    <p>EVENT TYPE</p>
                                    <select name="type" required class="form-control"  tabindex="1">
                                        <option value="">Select Event type</option>
                                        <?php
                                        $getType= $user->getType();

                                        foreach ($getType as $type){?>
                                            <option value="<?php echo $type['event_cat']; ?>"><?php echo $type['event_cat']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <div class="select-row">
                                <p>EVENT TOPIC</p>
                                <select name="topic" required class="form-control" tabindex="1">
                                    <option value="">Select a topic</option>
                                    <?php
                                    $getTopics = $user->getTopics();

                                    foreach ($getTopics as $topic){?>
                                    <option value="<?php echo $topic['topic']; ?>"><?php echo $topic['topic']; ?></option>
                               <?php } ?>
                                </select>
                            </div>


                            <div class="input-slide">
                                <p>EVENT DESCRIPTION</p>
                               <textarea class="ckeditor form-control" name="description" cols="8" rows="9"></textarea>
                            </div>
                        
                            <div class="submit-slide">
                                <input type="submit" name="save" value="Save" class="btn">
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="normal-link">
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        </div>
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

    <script>

        jQuery(document).ready(function(){
            //$('.wysihtml5').wysihtml5();

            $('.summernote').summernote({
                height: 200,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true                 // set focus to editable area after initializing summernote
            });

        });
    </script>
    
</body>

</html>