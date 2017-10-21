<?php
require_once("Class/User.php");
$user = new User();
if ($user->checkUser() == false) {
    header("location:index.php");
}
$getorganizername = $user->getOrganizername($_SESSION['email']);
$title = "";
$disabled = "";
$staus = "";
$urlname = str_replace(" ","-",$getorganizername['name']);
if(isset($_GET['event_title']) && !empty($_GET['event_title']) || isset($_GET['utm_note'])){

    $clean = str_replace("-"," ",$_GET['event_title']);
    $title .= filter_var($clean,FILTER_SANITIZE_STRING);
    $slug = str_replace(" ","-",$title);
    $null = @$_GET['utm_note'];


}else{
    header("location:404.php");
    exit();
}
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
    <link href="admincp/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="admincp/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="admincp/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="js/data-tables/DT_bootstrap.css" />

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
            <h1> <span>all the events you have created </span></h1>
        </div>
    </div>
    <section class="current-openning">
        <div class="container">
            <div class="heading">
                <div class="icon"><em class="icon icon-heading-icon"></em></div>
                <div class="text">
                    <h2>Event Openings</h2>
                </div>
                <div class="info-text">All the information you will need is listed below, just click on the page you want to view and that's it.</div>
            </div>
            <div class="openings-info">
                <div class="row">


                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                                <span><i class="fa fa-bookmark"></i>   <b>Event Title:</b>  <?php echo strtoupper($title); ?></span>
                                <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                            </header>
                            <div class="panel-body">
                                <div class="adv-table table-responsive">


                                        <button id="editable-sample_new" style="margin:2%;" href="#myModal-1" onclick="Export()" <?php echo $disabled = "" ? 'disabled' : ''; ?>   class="btn btn-default btn-sm pull-right btnExport">
                                            Export to CSV <i class="fa fa-download"></i>
                                        </button>

                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                        <thead>
                                        <tr>

                                            <td>
                                                Name
                                            </td>
                                            <td>
                                                Matric No.
                                            </td>
                                            <td>
                                                Email
                                            </td>
                                            <td>
                                                Faculty
                                            </td>
                                            <td>
                                                Dept
                                            </td>
                                            <td>
                                                Pin
                                            </td>
                                            <td>
                                                Status
                                            </td>
                                            <td>
                                                Registered on
                                            </td>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $getAttendees = $user->getAttendeesForeachEvent($title,$getorganizername['name']);


                                        if(count($getAttendees) > 0){
                                         $disabled = " ";

                                        foreach ($getAttendees as $getAttends) {
                                            $yeare = date('Y',strtotime($getAttends['date_created']));
                                            $monte = date('M',strtotime($getAttends['date_created']));
                                            $daye = date('D',strtotime($getAttends['date_created']));
                                            $daynum = date('d', strtotime($getAttends['date_created']));
                                            $time = date('g:i a',strtotime($getAttends['date_created']));
                                            ?>
                                            <tr>
                                                <td><?php echo strtoupper($getAttends['name']); ?></td>
                                                <td><?php echo strtoupper($getAttends['matric_no']); ?></td>
                                                <td><?php echo strtoupper($getAttends['email']); ?></td>
                                                <td><?php echo strtoupper($getAttends['faculty']); ?></td>
                                                <td><?php echo strtoupper($getAttends['department']); ?></td>
                                                <td><?php echo strtoupper($getAttends['pin']); ?></td>
                                                <td><?php echo strtoupper($getAttends['verstatus']); ?></td>
                                                <td><?php echo $daye." ,".$daynum." ".$monte.",". $yeare." at ". $time; ?></td>


                                            </tr>


                                        <?php } } else{ ?>
                                        </tbody>

                                        <div class="col-sm-5 alert alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <strong style="color: #ff3111;">No subscriber has registered for this event</strong>
                                            <input type="text" id="counter" value="0" hidden/>
                                        </div>

                                        <?php } ?>

                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include_once("Includes/footer.php"); ?>

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
<script type="text/javascript" language="javascript" src="admincp/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="admincp/js/data-tables/DT_bootstrap.js"></script>
<!--dynamic table initialization -->
<script src="admincp/js/dynamic_table_init.js"></script>
<script type="text/javascript">
    function Export(){
        var conf = confirm("Export Data to CSV");
        if(conf== true){
            window.open('export.php?event_title=<?php echo $slug; ?>','_self');
        }
    }
    var count = $('#counter').val();
if(count == 0){
   $('.btnExport').attr('disabled',true);
}else{
    $('.btnExport').attr('disabled',false);
}
</script>

</body>

</html>