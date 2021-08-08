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
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                        
                        
                    <li>
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
                                    <h2>CHECKER ZONE : MY BUS</h2>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post">
                                        <table>
                                            <tr><td>Bus no</td>
                                                <td> <input type="text" name="busid"></td>
                                            </tr>
                                            <br>
                                            <tr>
                                                <td></td><td><input type="submit" name="sub" value="submit"></td>
                                            </tr>
                                       
                                        </table>
                                        
                                    </form>
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
                                    </div>
                                        <div id="way">
                                            <?php
                                            if(isset($_POST['sub']))
                                            {
                                                
                                            $b=$_POST['busid'];
                                            $d=date('Y-m-d');
                                            $sel_bus=mysql_query("select * from bus_data where bus_no='$b'");
                                            $r_bus=mysql_fetch_row($sel_bus);
?>
<div class="col-lg-12">
    <div class="col-lg-7">
        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
            <tr>
                <td>
                    <img src="../Admin/bus_pic/<?php echo $r_bus[4] ?>" class="img img-responsive" />
                    <br />
            <CENTER>
                    <h4><?php echo $r_bus[1] ?></h4>
                    <h4><?php echo $r_bus[2] ?></h4>
                    <h4><?php echo $r_bus[3] ?></h4>
            </center>   
                </td> 
              
            </tr>
        </table>
        <h4>CURRENT PASSENGER LIST</h4>
        <?php
        
        $sel_trip=mysql_query("select * from daily_trip where bus_id='$r_bus[0]' order by id desc");
        if(mysql_num_rows($sel_trip)>0)
        {
            $r_trip=mysql_fetch_row($sel_trip);
            $tripid=$r_trip[0];
            $sel_stop=mysql_query("select * from dailt_trip_stop where daily_tripid='$tripid' order by id desc");
            $r_stp=mysql_fetch_row($sel_stop);
            $currentstop=  $r_stp[4];
            $sel_p=mysql_query("select * from ticket_issue where daily_tripid='$tripid' and did>$currentstop");
            if(mysql_num_rows($sel_p)>0)
            {
                ?>
        <table class="table">
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Source</td>
                <td>Destination</td>
                <td>Adhar no</td>
            </tr>
            <?php
            $i=0;
            while($r_p=mysql_fetch_row($sel_p))
            {
                $i++;
                ?>
            <tr>
                <td><?php echo $i ?></td>
                <td>
                    <?php
                    $sel_u=mysql_query("select * from user_data where qrcode='$r_p[3]'");
                    $r_u=  mysql_fetch_row($sel_u);
                    echo $r_u[3]."<br />".$r_u[1]; 
                    ?>
                </td>
                <td><?php echo $r_p[4] ?></td>
                <td><?php echo $r_p[6] ?></td>
                <td><?php echo $r_p[3] ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <?php
            }
        }
        ?>
    </div>
    <div class="col-lg-5">
        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
            <tr>
                <td colspan="3"><center><b>COLLECTION DETAILS : <?php echo date("Y M j",  strtotime($d)); ?></b></center></td>
            </tr>
            <tr>
                <td>#</td>
                <td>Trip</td>
                <td>Collection</td>
            </tr>
            <?php
            $i=0;
            $sel_trip=mysql_query("select * from trip_data where bus_id='$r_bus[0]'");
            $total_trip=mysql_num_rows($sel_trip);
            while($r_trip=mysql_fetch_row($sel_trip))
            {
                $i++;
                ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $r_trip[3] ?><span class="pull-right">(<?php echo $r_trip[4] ?>)</span></td>
                <td>Rs. 
                    <?php
                    $sel_col=mysql_query("select amt from daily_trip where trip_id='$r_trip[0]' and date='$d'");
                    $r_col=mysql_fetch_row($sel_col);
                    echo $r_col[0];
                    ?>/-
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
            <tr>
                <td colspan="3"><center><b>CURRENT POSITION</b></center></td>
            </tr>
            <?php
            $sel_ftrip=mysql_query("select * from daily_trip where bus_id='$r_bus[0]' and st=1 and date='$d'");
            $completed=mysql_num_rows($sel_ftrip);
            $bal=$total_trip-$completed;
            if($bal==0)
            {
                ?>
            <tr>
                <td colspan="3">Completed All Trip</td>
            </tr>
            <?php
            }
            else
            {
                ?>
            <tr>
                <td colspan="3">Need to Complete <?php echo $bal ?> Trip(s)</td>
            </tr>
            <?php
            $sel_findtrip=mysql_query("select * from daily_trip where bus_id='$r_bus[0]' and st=0 and date='$d'");
            if(mysql_num_rows($sel_findtrip)>0)
            {
            $r_find=mysql_fetch_row($sel_findtrip);
            $path=$r_find[5];
            $sel_station=mysql_query("select * from dailt_trip_stop where daily_tripid='$r_find[0]' and dt='$d' order by id desc");
            $r_station=mysql_fetch_row($sel_station);
            $jnid=$r_station[4];
            ?>
            <tr>
                <td colspan="3">
                    Current Position : <b><?php echo $r_station[3] ?></b> <br />
                    <?php
                    $sel_nxt=mysql_query("select * from path_info where p_id='$path' and id>$jnid");
                    echo mysql_error();
                    while($r_nxt=mysql_fetch_row($sel_nxt))
                    {
                        echo $r_nxt[2]."<br />";
                    }
                    ?>
                </td>
            </tr>
            <?php
            }
            }            
            ?>
        </table>
    </div>
        
   
</div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
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
    <script src="../_Template/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../_Template/js/demo.js"></script>
</body>

</html>
