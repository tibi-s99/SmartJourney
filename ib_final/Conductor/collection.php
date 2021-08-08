<?php
ob_start();
include '../connection.php';
session_start();
if(isset($_SESSION['con']))     
{
    
}
else    
{
    header("location:../login.php");
}
$cid=$_SESSION["con"];
$sel_data=mysql_query("select * from staff_data,station_data where station_data.id=staff_data.stat_id and staff_data.uid='$cid'");
$r_data=mysql_fetch_row($sel_data);
$sel_bs=mysql_query("select * from staff_assign,bus_data where bus_data.bus_id=staff_assign.bus_id and staff_assign.stf_id='$cid'");
if(mysql_num_rows($sel_bs)>0)
{
    $r_bs=mysql_fetch_row($sel_bs);                                            
}                 
$dt=date("Y-m-d");
$busid=$r_bs[1];
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
    <link href="../_Template/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="index.php">Intelligent Business Analyser - <?php echo strtoupper($r_data[13]) ?> BUS STAND (<?php echo $r_data[1] ?>)</a>
                
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
                <IMG src="../Admin/station_pic/<?php echo $r_data[21] ?>" class="img img-responsive" style="width:100%; height: 110px;" />
                
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
                    <li>
                        <a href="trip.php">
                            <i class="material-icons">assessment</i>
                            <span>My Trip</span>
                        </a>
                    </li>     
                     
                    <li class="active">
                        <a href="collection.php">
                            <i class="material-icons">grade</i>
                            <span>Report</span>
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
                <h2>CONDUCTOR PORTAL</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Collection</div>
                            <?php
                            $sel_tc=mysql_query("select sum(amt) from daily_trip where bus_id='$busid' and date='$dt'");
                            $r_tc=mysql_fetch_row($sel_tc);
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $r_tc[0] ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Current Trip Amount</div>
                            <?php
                            $sel_tc=mysql_query("select sum(amt) from daily_trip where bus_id='$busid' and date='$dt' and st=0");
                            $r_tc=mysql_fetch_row($sel_tc);
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $r_tc[0] ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Customer in Bus</div>
                            <?php
                            $chk_trip=mysql_query("select * from daily_trip where date='$dt' and bus_id='$busid' and st=0");
                            $r_trip=mysql_fetch_row($chk_trip);
                            $dtripid1=$r_trip[0];
                            $sel_tot=mysql_query("select * from ticket_issue where daily_tripid='$dtripid1'");
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo mysql_num_rows($sel_tot) ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <?php
                            $dt1=  strtotime($dt);
                            $dt2=  strtotime("-1 day",$dt1);
                            $dt3=date("y-m-d",$dt2);
                            $sel_tc=mysql_query("select sum(amt) from daily_trip where bus_id='$busid' and date='$dt3'");
                            $r_tc=mysql_fetch_row($sel_tc);
                            ?>
                            <div class="text">Yesterday Collection</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $r_tc[0] ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>CONDUCTOR ZONE : MY BUS</h2>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-8">
                                        <?php
                                        $sel_bs=mysql_query("select * from staff_assign,bus_data where bus_data.bus_id=staff_assign.bus_id and staff_assign.stf_id='$cid'");
                                        if(mysql_num_rows($sel_bs)>0)
                                        {
                                            $r_bs=mysql_fetch_row($sel_bs);                                            
                                        }                                        
                                        ?>
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td style="width: 70%"><img src="../Admin/bus_pic/<?php echo $r_bs[9] ?>" class="img img-responsive" /></td>
                                                <td><center>
                                                    <div class="alert alert-info">
                                                    <b>BUS DETAILS</b><br />                                                
                                                <?php echo $r_bs[6] ?><br />
                                                <?php echo $r_bs[7] ?><br />
                                                <?php echo $r_bs[8] ?>
                                                    </div>
                                                     </center>
                                                    <div class="alert alert-success">
                                                        <center><b>TRIP DETAILS</b></center>
                                                    <?php
                                                    $sel_tr=mysql_query("select * from trip_data where bus_id='$r_bs[1]'");
                                                    if(mysql_num_rows($sel_tr)>0)
                                                    {
                                                        echo"<ul>";
                                                        while($r_tr=mysql_fetch_row($sel_tr))
                                                        {
                                                            echo"<li style='cursor:pointer;' onclick='loadway($r_tr[0])'>$r_tr[3]</li>";
                                                        }
                                                        echo"</ul>";
                                                    }
                                                    ?>
                                                
                                                    </div>
                                           </td>
                                            </tr>
                                        </table>
                                        <h3>View Collection</h3>
                                        <form method="post">
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td><input type="date" name="ddt" class="form-control" /></td>
                                                <td><select name="trp" class="form-control">
                                                        <option>Choose</option>
                                                        <?php
                                                        $sel_tr=mysql_query("select * from trip_data where bus_id='$r_bs[1]'");
                                                    if(mysql_num_rows($sel_tr)>0)                                                    {
                                                        
                                                        while($r_tr=mysql_fetch_row($sel_tr))
                                                        {
                                                           ?>
                                                        <option value="<?php echo $r_tr[0] ?>"><?php echo $r_tr[3] ?></option>
                                                        <?php
                                                        }
                                                       
                                                    }
                                                        ?>
                                                    </select></td>
                                                    <td>
                                                        <input type="submit" name="vcol" value="View" class="btn btn-success" />
                                                    </td>
                                            </tr>
                                        </table>
                                            <?php
                                            if(isset($_POST['vcol']))
                                            {
                                                $dt1=$_POST['ddt'];
                                                $trid=$_POST['trp'];
                                                $sel_amt=mysql_query("select * from daily_trip where date='$dt1' and trip_id='$trid' and bus_id='$r_bs[1]'");
                                                $r_amt=  mysql_fetch_row($sel_amt);
                                                echo"<span class='btn btn-danger'>Total Collection : Rs. $r_amt[6]/-</span>";
                                                $dailyid1=$r_amt[0];
                                                $sel_totuser=mysql_query("select * from ticket_issue where daily_tripid='$dailyid1'");
                                                echo"<span class='btn btn-warning'>Total Passanger : ".  mysql_num_rows($sel_totuser)." </span>";
                                                ?>
                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                <tr>
                                                    <td>#</td>
                                                    <td>User Name</td>
                                                    <td>From</td>
                                                    <td>To</td>
                                                    <td>Amount</td>
                                                </tr>
                                                <?php
                                                $i=0;
                                                $tot=0;
                                                while($r_us=mysql_fetch_row($sel_totuser))
                                                {
                                                    $i++;
                                                    $tot+=$r_us[8];
                                                    ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $r_us[3] ?></td>
                                                    <td><?php echo $r_us[4] ?></td>
                                                    <td><?php echo $r_us[6] ?></td>
                                                    <td>Rs.<?php echo $r_us[8] ?>/-</td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="4"><center><b>Total</b></center></td>
                                            <td><b>Rs. <?php echo $tot ?>/-</b></td>
                                                </tr>
                                            </table>
                                            <?php
                                            }
                                            ?>
                                        </form>
                                    </div>
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