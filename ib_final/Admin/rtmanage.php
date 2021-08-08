<?php
ob_start();
include '../connection.php';
session_start();
if(isset($_SESSION['adm']))     
{
    
}
else    
{
    header("location:../login.php");
}

if(isset($_POST['add_rt']))
{
    $rn=$_POST['rn'];
    $st1=$_POST['station'];
    $s1=  explode(",", $st1);
    $st2=$_POST['station1'];
    $s2=  explode(",", $st2);
    $ins_rt=mysql_query("insert into route_data values('','$rn','$s1[0]','$s1[1]','$s2[0]','$s2[1]','1')");
    if($ins_rt>0)
    {
        header("location:rtmanage.php?success=1");
    }
}
if(isset($_GET['d']))
{
    if($_GET['d']=="1")
    {
        $x1=$_GET['x1'];
        $del=mysql_query("delete from route_data where rt_id='$x1'");
        if($del>0)
        {
            header("location:rtmanage.php");
        }
    }
}
if(isset($_POST['add_pth']))
{
    $pn=$_POST['pn'];
    $ins_pth=mysql_query("insert into path_data values('','".$_GET['rid']."','$pn','1')");
    if($ins_pth>0)
    {
        header("location:rtmanage.php?t=1&rid=".$_GET['rid']);
    }
}
if(isset($_POST['add_jn']))
{
    $stn=$_POST['stn'];
    $dist=$_POST['dist'];
    $ins_pt1=mysql_query("insert into path_info values('','".$_GET['pid']."','$stn','$dist','1')");
    if($ins_pt1>0)
    {
        header("location:rtmanage.php?t=2&rid=".$_GET['rid']."&pid=".$_GET['pid']);
    }
}
if(isset($_POST['add_fare']))
{
    $f1=$_POST['fstat'];
    $e1=$_POST['tstat'];
    $f=  explode(",", $f1);
    $e=  explode(",", $e1);
    $amt=$_POST['amt'];
    //echo"$f,$e";
    $ins_fare=mysql_query("insert into fare_data values('','".$_GET['pid']."','$f[1]','$f[0]','$e[1]','$e[0]','$amt','1')");
    if($ins_fare>0)
    {
        header("location:rtmanage.php?t=3&rid=".$_GET['rid']."&pid=".$_GET['pid']);
    }




}
?>
<!DOCTYPE html>
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
                <a class="navbar-brand" href="index.php">Intelligent Business Analyser - ADMIN PORTAL</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                
               
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../images/KSRTC-Logo.jpg" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrator</div>
                    <div class="email">TRAVEL AGENCY</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            
                            <li role="seperator" class="divider"></li>                           
                            <li><a href="../logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
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
                    <li>
                        <a href="collection.php">
                            <i class="material-icons">assessment</i>
                            <span>Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="search.php">
                            <i class="material-icons">search</i>
                            <span>Search Bus</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Track</span>
                        </a>
                        <ul class="ml-menu">
                            
                            <li>
                                <a href="tuser.php">User</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Manage</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="stmanage.php">STATION MANAGE</a>
                            </li>
                            <li class="active">
                                <a href="rtmanage.php">Route Manage</a>
                            </li>
                            <li>
                                <a href="busmanage.php">Bus Manage</a>
                            </li>
                            <li>
                                 <a href="addchecker.php">Add checker</a>
                            </li>    
                           <li>
                                <a href="colmanage.php">Collection Manage</a>
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
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="../_Template/#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="../_Template/#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
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
                                    <h2>ROUTE MANAGE</h2>
                                </div>                                
                            </div>                            
                        </div>
                        <div class="body">
                            <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-6">
                                    <script>
                                        function loaddis(x)
                                        {
                                            $("#dd").load("getdis1.php?q="+x)
                                        }
                                        function loaddis1(x)
                                        {
                                            $("#dd1").load("getdis2.php?q="+x)
                                        }
                                        function loadst1(x)
                                        {
                                            $("#st").load("getstation1.php?did="+x);
                                        }
                                        function loadst2(x)
                                        {
                                            $("#st1").load("getstation2.php?did="+x);
                                        }
                                        </script>
                                        <form method="post">
                                     <table class="table table-hover table-responsive table-bordered table-condensed table-striped">
                                        <tr>
                                            <td colspan="2">
                                        <center>
                                            <b>ADD ROUTE HERE</b>
                                        </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%"><center>START STATION</center></td>
                                     <td><center>END STATION</center></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="text" name="rn" placeholder="Route Name" class="form-control" required="required" /></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="stat"required="" class="form-control show-tick" onchange="loaddis(this.value)">
                                        <option value="0">Choose</option>
                                        <?php
                                        $sel_st=mysql_query("select * from state");
                                        while($r_st=mysql_fetch_row($sel_st))
                                        {
                                            ?>
                                        <option value="<?php echo $r_st[0] ?>"><?php echo $r_st[1] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                            </td>
                                            <td>
                                                <select name="stat" class="form-control show-tick" onchange="loaddis1(this.value)">
                                        <option value="0">Choose</option>
                                        <?php
                                        $sel_st=mysql_query("select * from state");
                                        while($r_st=mysql_fetch_row($sel_st))
                                        {
                                            ?>
                                        <option value="<?php echo $r_st[0] ?>"><?php echo $r_st[1] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span id="dd"></span>
                                            </td>
                                            <td>
                                                <span id="dd1"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span id="st"></span>
                                            </td>
                                            <td>
                                                <span id="st1"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                        <center>
                                            <input type="submit" name="add_rt" value="ADD ROUTE" class="btn btn-danger" />
                                        </center>
                                            </td>
                                        </tr>
                                     </table>
                                        </form>
                                </div>
                                <div class="col-lg-6">
                                    <?php
                                    if(isset($_GET['t']))
                                    {
                                        $sel_rt1=mysql_query("select * from route_data where rt_id='".$_GET['rid']."'");
                                        $r_rt1=mysql_fetch_row($sel_rt1);
                                        if($_GET['t']==1)
                                        {
                                        ?>
                                    <form method="post">
                                    <table class="table table-hover table-responsive table-bordered table-condensed table-striped">
                                        <tr>
                                            <td colspan="2">
                                                <a href="rtmanage.php"><span class="glyphicon glyphicon-backward pull-right" style="color: red;"></span></a>
                                        <center>
                                            <b>MANAGE PATH</b>
                                        </center>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><center><?php echo strtoupper($r_rt1[1]) ?></center></td>
                                        </tr>
                                        <tr>
                                            <td>Path Name</td>
                                            <td><input type="text" name="pn" class="form-control" required="required" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><center><input type="submit" name="add_pth" value="ADD PATH" class="btn btn-danger" /></center></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                    <?php
                                        $sel_pth=mysql_query("select * from  path_data where rt_id='".$_GET['rid']."'");
                                        if(mysql_num_rows($sel_pth)>0)
                                        {
                                            $i=0;
                                            while($r_pth=mysql_fetch_row($sel_pth))
                                            {
                                                $i++;
                                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $r_pth[2] ?></td>
                                            <td><a href="rtmanage.php?t=2&rid=<?php echo $_GET['rid'] ?>&pid=<?php echo $r_pth[0] ?>" title="ADD STOPS"><span class="glyphicon glyphicon-plus-sign" style="color: red;"></span></a>
                                                <a href="rtmanage.php?t=3&rid=<?php echo $_GET['rid'] ?>&pid=<?php echo $r_pth[0] ?>" title="ADD FAIR"><span class="glyphicon glyphicon-plus-sign" style="color: green;"></span></a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    </form>
                                    <?php
                                        }
                                        if($_GET['t']==2)
                                        {
                                            $sel_p=mysql_query("select * from path_data where p_id='".$_GET['pid']."'");
                                            $r_p=mysql_fetch_row($sel_p);
                                            ?>
                                    <form method="post">
                                    <table class="table table-hover table-responsive table-bordered table-condensed table-striped">
                                        <tr>
                                            <td colspan="2">
                                                <a href="rtmanage.php?t=1&rid=<?php echo $_GET['rid'] ?>"><span class="glyphicon glyphicon-backward pull-right" style="color: red;"></span></a>
                                        <center>
                                            <b>ADD STATION</b><br />
                                            <u><?php echo strtoupper($r_rt1[1]) ?></u><br />
                                            <i><?php echo $r_p[2] ?></i>
                                        </center>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="text"required="" name="stn" id="stn" placeholder="Bus Stop Name" class="form-control"autocomplete="off" style="width: 60%; float: left;" onkeyup="loadstop(this.value)" />
                                                <input type="text"required="" name="dist" placeholder="KM from Prev." class="form-control" style="width: 30%; float: left;" />
                                                <input type="submit" name="add_jn" value="+" class="btn btn-danger" style="float: right;" />
                                                <br /><hr />
                                                <div id="stp"></div>
                                                <script>
                                                function loadstop(x){
                                                    if(x.length>0)
                                                    {
                                                        $("#stp").show(1000);
                                                        $("#stp").load("getstop.php?q="+x);
                                                    }
                                                }
                                                function add_data(x)
                                                {
                                                    document.getElementById("stn").value=x;
                                                    $("#stp").hide(1000);
                                                }
                                                </script>
                                            </td>
                                        </tr>
                                    </table>
                                        <?php
                                        $sel_p1=mysql_query("select * from path_info where p_id='".$_GET['pid']."'");
                                        if(mysql_num_rows($sel_p1)>0)
                                        {
                                            ?>
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td>#</td>
                                                <td>Stop</td>
                                                <td>Distance</td>
                                            </tr>
                                        <?php
                                        $i=0;
                                        $dis=0;
                                            while($r_p1=mysql_fetch_row($sel_p1))
                                            {
                                                $i++;
                                                $dis+=$r_p1[3];
                                                ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $r_p1[2] ?></td>
                                                <td><?php echo $r_p1[3] ?> K.M <span class="pull-right"><?php echo $dis ?> K.M</span></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                            <?php
                                        }
                                        ?>
                                    </form>
                                    <?php
                                     }
                                      if($_GET['t']==3)
                                      {
                                         ?>
                                    <form method="post">
                                    <table class="table table-hover table-responsive table-bordered table-condensed table-striped">
                                        <tr>
                                            <td><a href="rtmanage.php?t=1&rid=<?php echo $_GET['rid'] ?>"><span class="glyphicon glyphicon-backward pull-right" style="color: red;"></span></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="fstat" class="form-control show-tick">
                                        <option value="">Choose Station From</option>
                                        <?php
                                        $sel_st=mysql_query("select * from path_info WHERE p_id='".$_GET['pid']."'");
                                        while($r_st=mysql_fetch_row($sel_st))
                                        {
                                            ?>
                                        <option value="<?php echo $r_st[0] ?>,<?php echo $r_st[2] ?>"><?php echo $r_st[2] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="tstat" class="form-control show-tick">
                                        <option value="">Choose Station To</option>
                                        <?php
                                        $sel_st=mysql_query("select * from path_info WHERE p_id='".$_GET['pid']."'");
                                        while($r_st=mysql_fetch_row($sel_st))
                                        {
                                            ?>
                                        <option value="<?php echo $r_st[0] ?>,<?php echo $r_st[2] ?>"><?php echo $r_st[2] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="text"required="" name="amt" class="form-control" placeholder="Amount" /></td>
                                        </tr>
                                        <tr>
                                            <td><center><input type="submit" name="add_fare" value="ADD FARE" class="btn btn-danger" /></center></td>
                                        </tr>
                                    </table>
                                        </form>
                                    <table class="table table-hover table-responsive table-bordered table-condensed table-striped">
                                        <tr>
                                            <td>#</td>
                                            <td>From</td>
                                            <td>To</td>
                                            <td>Amount</td>
                                        </tr>
                                        <?php
                                        $sel_fr=mysql_query("select distinct frn_jnnme from fare_data where p_id='".$_GET['pid']."'");
                                        if(mysql_num_rows($sel_fr)>0)
                                        {
                                            $i=0;
                                            while($r_fr=mysql_fetch_row($sel_fr))
                                            {
                                                $sel_f=mysql_query("select * from fare_data where frn_jnnme='$r_fr[0]' and p_id='".$_GET['pid']."'");
                                                $count=mysql_num_rows($sel_f);
                                                $i++;
                                                ?>
                                        <tr>
                                            <td rowspan="<?php echo $count+1 ?>"><?php echo $i ?></td>
                                            <td rowspan="<?php echo $count+1 ?>"><?php echo $r_fr[0] ?></td>                                            
                                        </tr>
                                        <?php
                                        while($r_f=mysql_fetch_row($sel_f))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $r_f[4] ?></td>
                                            <td><?php echo $r_f[6] ?></td>
                                        </tr>
                                        
                                        <?php
                                        }
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                        <tr>
                                            <td colspan="4">No Data Available</td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <?php                                    
                                      }  
                                    }
                                    else
                                    {
                                    ?>
                                    <table class="table table-hover table-responsive table-bordered table-condensed table-striped">
                                        <tr>
                                            <td colspan="7">
                                        <center>
                                            <b>AVAILABLE ROUTE INFORMATION</b>
                                        </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#</td>
                                            <td>Route Name</td>
                                            <td>Start</td>
                                            <td>End</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                        $sel_rt=mysql_query("select * from route_data order by rt_id desc");
                                        if(mysql_num_rows($sel_rt)>0)
                                        {
                                            $i=0;
                                            while($r_rt=mysql_fetch_row($sel_rt))
                                            {
                                                $i++;
                                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $r_rt[1] ?></td>
                                            <td><?php echo $r_rt[3] ?></td>
                                            <td><?php echo $r_rt[5] ?></td>
                                            <td><a href="rtmanage.php?t=1&rid=<?php echo $r_rt[0] ?>" title="Manage Path"><span class="glyphicon glyphicon-plus-sign" style="color: red"></span></a></td>
                                            <td><a href =" rtmanage.php?x1=<?php echo $r_rt[0]?>&d=1" class="glyphicon glyphicon-trash"></a></td>
                                            <td><a href =" rtmanage.php?x1=<?php echo $r_rt[0]?>&d=2" class="glyphicon glyphicon-edit"></a></td>

                                        </tr>
                                        <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                        <tr>
                                            <td colspan="5">No Data Available</td>
                                        </tr>
                                        <?php
                                        
                                        }
                                        ?>
                                    </table>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            
                            <?php 
                            if(isset($_POST['sub4']))
                            {

                             $x1=$_GET['x1'];
                          $rn1=$_POST['rn1'];
                              $st1=$_POST['st1'];
                            $ed1=$_POST['ed1'];
                              $up=mysql_query("update route_data set route_name='$rn1',source_code='$st1',dest_code='$ed1' where rt_id='$x1'");
                           if($up>0)
                       {
                              header("location:rtmanage.php");
                            }
                            
                            } 
                            
                            if(isset($_GET['d']))
                           {
                                if($_GET['d']=="2")
                                {
                                    $x1=$_GET['x1'];
                                    $sel2=mysql_query("select * from route_data where rt_id='$x1'");
                                    if(mysql_num_rows($sel2)>0)
                                    {
                                        $r2=mysql_fetch_row($sel2);
                                    }
                                    
                            
                           }
                                    ?>
                            <br />
                      
                    <div class="card">
                        
                            <form method="post">
                                <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                    <tr>
                                            <td colspan="2">
                                        <center>
                                            <b>Edit Route Info</b>
                                        </center>
                                            </td>
                                </tr>
                                    <tr>
                                        <td>
                                            Route Name
                                        </td>
                                        <td>
                                            <input type="text"required="" name="rn1" value="<?php echo$r2[1]?>"/>
                                            
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            Start
                                        </td>
                                        <td><input type="text" required="" name="st1" value="<?php echo $r2[3]?>"/>
                                            </td>
                                    </tr>
                                    <tr><td>End</td><td><input required="" type="text" name="ed1" value="<?php echo $r2[5]?>"/>
                                        </td></tr>
                                    <tr>
                                    <td><input type="Submit" name="sub4" value="UPDATE"></td></tr>
                                </table>
                                
                            </form>
                            <?php
                                   }
                               
                                
                            
                            ?>
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