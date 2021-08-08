<?php
ob_start();
include '../connection.php';
session_start();
if(isset($_SESSION['chek']))     
{
    
}
else    
{
    header("location:../login.php");
}
$cid=$_SESSION["chek"];
$sel_data=mysql_query("select * from staff_data where uid='$cid'");
$r_data=mysql_fetch_row($sel_data);       
$dt=date("Y-m-d");
?>
﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To Administrative Portal</title>
    <!-- Favicon-->
    <link rel="icon" href="../_Template/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../_Template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../_Template/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../_Template/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../_Template/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../_Template/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../_Template/css/themes/all-themes.css" rel="stylesheet" />
    <style>
        .lgo{
            transition: width 2s, height 2s, transform 2s;
        }
        .lgo:hover{
            transform: rotate(360deg);
        }
    </style>
    <script type="text/javascript" src="cam/llqrcode.js"></script>
<script type="text/javascript" src="cam/plusone.js"></script>
<script type="text/javascript" src="cam/webqr.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24451557-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
               <a class="navbar-brand" href="index.php">Intelligent Business Analyser - <?php echo strtoupper($r_data[1]) ?></a>
                
            </div>
            <script>
            function loadlogout()
            {
                $("#lgo").hide();
                $("#lo").show(1000);
            }
            </script>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <img id="lgo" src="../images/KSRTC-Logo.jpg" width="48" height="48" alt="User" style="float:right; border-radius:25px; margin-top: 10px; border: 1px solid white; " class="lgo" onclick="loadlogout()" />
                <div class="pull-right" id="lo" style="display: none; margin-top: 22px;">
                    <b><a href="../logout.php" style="text-decoration: none;">LOGOUT <span class="glyphicon glyphicon-log-out"></span></a></b>
                </div>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <IMG src="../_Template/images/animation-bg.jpg" class="img img-responsive" style="width:100%; height: 110px;" />
                
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                        
                        
                    <li class="active">
                        <a href="verification.php">
                            <i class="material-icons">grade</i>
                            <span>users verifications</span>
                        </a>
                    </li>   
                    <li>
                        <a href="../logout.php">
                            <i class="material-icons">grade</i>
                            <span>log out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 - 2020 <a href="javascript:void(0);">SmartJourney -  KSRTC</a>.
                </div>
               
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CHECKER PORTAL</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                
                
               
               
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>CHECKER ZONE : USER VERIFICATION</h2>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12">
                                    
                                    
                                    <div class="col-lg-4">
                                        <script>
                                        function loadway(x)
                                        {
                                            $("#way").load("loadway.php?rid="+x);
                                        }
                                        function starttrip(x)
                                        {
                                            $("#way").load("starttrip.php?rid="+x);
                                        }
                                        </script>
                                        <div id="way">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <form method="post">
                                         <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                             <tr>
                                                 <td colspan="2"><center>
                                                    <img src="cam/cam.png" onclick="setimg()"/>
                                                    <div id="outdiv" style="width: 350px; height: 250px; border: 1px solid black;">
                                                </div></center>
                                           
                                            <canvas id="qr-canvas" width="100" height="10"></canvas>
                                            <script type="text/javascript">load();</script>
                                            </td>
                                            </tr>
                                             <tr>
                                                 <td>User ID</td>
                                                 <td><input type="text"  name="usrid" required="required" id="result" class="form-control" onfocus="loadchk1()" /></td>
                                             </tr>
                                             <tr>
                                                <td></td><td><input type="submit"  name="submit" value="submit"></td>
                                            </tr>
                                         </table>
                                            <?php
                                    if(isset($_POST['submit']))
    {
   
    $usrid=$_POST['usrid'];
  $sel=mysql_query("select * from user_data where qrcode='$usrid'");
  $res=mysql_fetch_row($sel);?>
                                    
                                            <table class="table" style="width: 100%" >
           <tr>
               <td style="width: 50%">
                   <img src="../Stand/userpic/<?php  echo $res[7];?>" class="img img-responsive" />                   
               </td>
               <td>
                   <h3><?php  echo $res[3];?></h3>
                   <?php  echo $res[4];?><br />
           Call :<?php  echo $res[5];?><br />
           DOB :  <?php  echo date("d-M-Y",strtotime($res[8]));?><br />
            <span class="glyphicon glyphicon-eye-open" onclick="shoadar()" style="cursor: pointer;"></span>
           Aadhar no:<?php echo $res[ 1];?></br>
           
               </td>
               
           </tr>
           <script>
           function shoadar()
           {
               $("#addr").slideToggle(1000);
           }
           </script>
           <tr>
               <td colspan="2">
           <center>
               <div id="addr" style="display: none;">
               <img src="../Stand/aadhar/<?php  echo $res[6];?>" style="width:250px " />
           </div>
           </center>        
               </td>
           </tr>
                                    </table>
                                        </div>
                                      
  <?php     
  
    }
    ?>
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
            

            
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../_Template/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../_Template/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../_Template/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../_Template/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../_Template/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../_Template/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../_Template/plugins/raphael/raphael.min.js"></script>
    <script src="../_Template/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../_Template/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../_Template/plugins/flot-charts/jquery.flot.js"></script>
    <script src="../_Template/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../_Template/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../_Template/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../_Template/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../_Template/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../_Template/js/admin.js"></script>
    <script src="../_Template/js/pages/index.js"></script>2
    

    <!-- Demo Js -->
    <script src="../_Template/js/demo.js"></script>
</body>

</html>
