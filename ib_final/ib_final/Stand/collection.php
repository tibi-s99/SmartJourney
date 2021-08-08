<?php
ob_start();
include '../connection.php';

session_start();
if(isset($_SESSION['stnd']))     
{
    
}
else    
{
    header("location:../login.php");
}
$sid=$_SESSION["stnd"];
$sel_data=mysql_query("select * from station_data where uid='$sid'");
$r_data=mysql_fetch_row($sel_data);
if(isset($_POST['add_trip']))
{
    $tn=$_POST['tn'];
    $tim=$_POST['tim'];
    $ins_trip=mysql_query("insert into trip_data values('','".$_GET['bid']."','$r_data[0]','$tn','$tim','1')");
    if($ins_trip>0)
    {
        header("location:collection.php?success=1&t=1&bid=".$_GET['bid']);
    }
}
if(isset($_POST['add_pth']))
{
    $rn=$_POST['rn'];
    $pt=$_POST['pt'];
    $ins_trp=mysql_query("insert into trip_info values('','".$_GET['tid']."','".$_GET['bid']."','$r_data[0]','$rn','$pt','1')");
    if($ins_trp>0)
    {
        header("location:collection.php?success=1&t=1&bid=".$_GET['bid']);
    }
}
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
                <a class="navbar-brand" href="index.php">Intelligent Business Analyser - <?php echo strtoupper($r_data[3]) ?> BUS STAND</a>
                
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
                <IMG src="../Admin/station_pic/<?php echo $r_data[11] ?>" class="img img-responsive" style="width:100%; height: 110px;" />
                
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="collection.php">
                            <i class="material-icons">assessment</i>
                            <span>Assigned Bus</span>
                        </a>
                    </li>
                     
                    <li>
                        <a href="tbus.php">
                            <i class="material-icons">swap_calls</i>
                            <span>Track Bus</span>
                        </a>
                    </li>    
                    <li class="">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Manage</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="">
                                <a href="userreg.php">Register User</a>
                            </li>
                            <li class="">
                                <a href="staff.php">Manage Staff</a>
                            </li>
                            
                        </ul>
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
                <h2>ASSIGNED BUS DATA</h2>
            </div>

            <!-- Widgets -->
            
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>BUS DETAILS</h2>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <form method="post" enctype="multipart/form-data">
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td>#</td>
                                                <td>Bus ID</td>
                                                <td>Bus Type</td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            $sel_b=mysql_query("select * from bus_assign,bus_data where bus_data.bus_id=bus_assign.bus_id and bus_assign.station_id='$r_data[0]'");
                                            if(mysql_num_rows($sel_b)>0)
                                            {
                                                $i=0;
                                                while($r_b=mysql_fetch_row($sel_b))
                                                {
                                                    $i++;
                                                    ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $r_b[5] ?></td>
                                                <td><?php echo $r_b[7] ?></td>
                                                <td><a href="collection.php?t=1&bid=<?php echo $r_b[1] ?>"><span class="glyphicon glyphicon-plus-sign" title="ADD TRIP"></span></a></td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                            <tr>
                                                <td colspan="3">No data Available</td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                        </form>
                                        <?php
                                        
                                        ?>
                                   </div>
                                    <div class="col-lg-6">
                                        <?php
                                        if(isset($_GET['t']))
                                        {
                                            if($_GET['t']==1)
                                            {
                                                ?>
                                        <form method="post">
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td colspan="2"><center><b>ADD TRIP</b><a href="collection.php"><span class="glyphicon glyphicon-backward pull-right" style="color: red"></span></a></center></td>
                                            </tr>
                                            <tr>
                                                <td>Trip Name</td>
                                                <td><input type="text" name="tn" class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td>Start Time</td>
                                                <td><input type="time" name="tim" class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><center><input type="submit" name="add_trip" value="ADD TRIP" class="btn btn-sm btn-danger" /></center></td>
                                            </tr> 
                                        </table>
                                        </form>
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td>#</td>
                                                <td>Trip Name</td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            $sel_tr=mysql_query("select * from trip_data where bus_id='".$_GET['bid']."'");
                                            if(mysql_num_rows($sel_tr)>0)
                                            {
                                                $i=0;
                                                while($r_tr=mysql_fetch_row($sel_tr))
                                                {
                                                    $i++;
                                                    ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $r_tr[3] ?><span class="pull-right"><?php echo $r_tr[4] ?></span></td>
                                                <td>
                                                    <?php
                                                    $chk1=mysql_query("select * from trip_info where trip_id='$r_tr[0]'");
                                                    if(mysql_num_rows($chk1)>0)
                                                    {
                                                        ?>
                                                    <a href="collection.php?t=3&trid=<?php echo $r_tr[0] ?>&bid=<?php echo $_GET['bid'] ?>"><span class="glyphicon glyphicon-search" title="VIEW ROUTE" style="color:green;"></span></a></td>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <a href="collection.php?t=2&tid=<?php echo $r_tr[0] ?>&bid=<?php echo $_GET['bid'] ?>"><span class="glyphicon glyphicon-plus-sign" title="ADD ROUTE"></span></a></td>
                                                <?php
                                                    }
                                                    ?>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                            <tr>
                                                <td colspan="3">No Data Available</td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                        <?php                                        
                                            }
                                            if($_GET['t']==2)
                                            {
                                                $tid=$_GET['tid'];
                                                $sel_tdata=mysql_query("select * from trip_data,bus_data where bus_data.bus_id=trip_data.bus_id and trip_data.trip_id='$tid'");
                                                $r_tdata=mysql_fetch_row($sel_tdata);
                                                ?>
                                        <script>
                                        function loadpath(x)
                                        {
                                            $("#pth").load("loadpath.php?rid="+x);
                                        }
                                        function loadway(x)
                                        {
                                            $("#way").load("loadway.php?rid="+x);
                                        }
                                        </script>
                                        <form method="post">
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td colspan="2"><center><b>ASSIGN PATH :<?php echo $r_tdata[7] ?> - <?php echo $r_tdata[9] ?> </b><a href="collection.php?t=1&bid=<?php echo $_GET['bid'] ?>"><span class="glyphicon glyphicon-backward pull-right" style="color: red"></span></a>
                                            <br />
                                            <?php echo "$r_tdata[3]  ($r_tdata[4] ) ";?>
                                            </center></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <select name="rn" class="form-control" onchange="loadpath(this.value)">
                                                    <option>Choose Route</option>
                                                    <?php
                                                    $sel_rt=mysql_query("select * from route_data");
                                                    while($r_rt=mysql_fetch_row($sel_rt))
                                                    {
                                                        ?>
                                                    <option value="<?php echo $r_rt[0] ?>"><?php echo $r_rt[1] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <span id="pth"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                        <center><input type="submit" name="add_pth" value="ADD PATH" class="btn btn-danger" /></center>
                                            </td>
                                        </tr>
                                        </table>
                                        </form>
                                        <div id="way"></div>
                                        <?php
                                            }
                                            if($_GET['t']==3)
                                            {
                                                $sel_all=mysql_query("select * from trip_info,route_data,path_data,trip_data,bus_data where bus_data.bus_id=trip_info.bus_id and trip_data.trip_id=trip_info.trip_id and path_data.rt_id=route_data.rt_id and route_data.rt_id=trip_info.rt_id and trip_info.trip_id='".$_GET['trid']."'");
                                                $r_all=mysql_fetch_row($sel_all);
                                                $pid1=$r_all[14];
                                                ?>
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td><center><b><?php echo $r_all[25] ?>(<?php echo $r_all[27] ?>)-<?php echo $r_all[21] ?>(<?php echo $r_all[22] ?>)</b><br /><?php echo $r_all[8] ?><br /><?php echo $r_all[16] ?>
                                            <a href="collection.php?t=1&bid=<?php echo $_GET['bid'] ?>"><span class="glyphicon glyphicon-backward pull-right" style="color: red"></span></a>
                                            </center></td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                        <tr>
                                            <td>#</td>
                                            <td>Stop Name</td>
                                            <TD>Distance</TD>
                                        </tr>
                                        <?php
                                        $sel_pth=mysql_query("select * from path_info where p_id='$pid1'");
                                        if(mysql_num_rows($sel_pth)>0)
                                        {
                                            $i=0;
                                            $dis=0;
                                            while($r_pt=mysql_fetch_row($sel_pth))
                                            {
                                                $i++;
                                                $dis+=$r_pt[3];
                                                ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $r_pt[2] ?></td>
                                                <td><?php echo $dis ?> KM</td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        ?>
                                        </table>
                                        <?php
                                            }
                                        }
                                        ?>
                                        
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