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
if(isset($_POST['add_user']))
{
    $an=$_POST['an'];
    $acn=$_POST['acn'];
    $nme=$_POST['nme'];
    $addr=$_POST['addr'];
    $con=$_POST['con'];
    $up=$_FILES['up']['name'];
    $up1=$_FILES['up1']['name'];
    $dt=$_POST['dt'];
    $fn=$an."".substr($up, strrpos($up, "."));
    $fn1=$an."".substr($up1, strrpos($up1, "."));
    $ins_user=mysql_query("insert into user_data values('','$an','$acn','$nme','$addr','$con','$fn','$fn1','$dt','".$sid."','$an','1')");
    if($ins_user>0)
    {
        if(move_uploaded_file($_FILES['up']['tmp_name'], getcwd()."//aadhar//$fn"))  
        {
          if(move_uploaded_file($_FILES['up1']['tmp_name'], getcwd()."//userpic//$fn1"))  
            {
              header("location:userreg.php?success=1");
            }  
        }
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
    <style>
        .lgo{
            transition: width 2s, height 2s, transform 2s;
        }
        .lgo:hover{
            transform: rotate(360deg);
        }
    </style>
    <script type="text/javascript">
    
    
    function chkc(b2)
{
var k5=b2.length;
var ch2=/([0-9])$/;
if(ch2.test(b2)==false)
{
document.getElementById("o3").innerHTML="<font color='red'>*Only Numbers*</font>";
return false;
}
else if(k5!=10)
{
document.getElementById("o3").innerHTML="<font color='red'>*Please Check Your Mobile Number*</font>";
return false;
}
else
{
  document.getElementById("o3").innerHTML="";  
}
}
  
 function chkd(d2)
{
var t5=d2.length;
var ch2=/([0-9])$/;
if(ch2.test(d2)==false)
{
document.getElementById("p3").innerHTML="<font color='red'>*Only Numbers*</font>";
return false;
}
else if(t5!=12)
{
document.getElementById("p3").innerHTML="<font color='red'>*Please Check Your Aadhar Number*</font>";
return false;
}
else
{
  document.getElementById("p3").innerHTML="";  
}
}
  
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
                    <li>
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
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Manage</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <a href="userreg.php">Register User</a>
                            </li>
                            <li>
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
                <h2>USER MANAGE</h2>
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
                                    <h2>MANAGE USER HERE</h2>
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
                                                <td>Aadhar Number</td>
                                                <td><input type="text" name="an" class="form-control" maxlength="12" required="required"onblur="chkd(this.value)" /><span id="p3"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Account Number</td>
                                                <td><input type="text" name="acn"required="required"  maxlength="11"class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td><input type="text" name="nme"required="required" class="form-control" /></td>
                                            </tr> 
                                            <tr>
                                                <td>Address</td>
                                                <td><textarea name="addr"required="required" class="form-control"></textarea></td>  
                                            </tr> 
                                            <tr>
                                                <td>Contact Number</td>
                                                <td><input type="text"required="required" name="con" maxlength="10" class="form-control"onblur="chkc(this.value)" /><span id="o3"></span></td>
                                            </tr> 
                                            <tr>
                                                <td>Aadhar File</td>
                                                <td><input type="file" name="up" class="form-control" /></td>
                                            </tr> 
                                            <tr>
                                                <td>Photo</td>
                                                <td><input type="file" name="up1" class="form-control" /></td>
                                            </tr>
                                             <tr>
                                                <td>DOB</td>
                                                <td><input type="date"required="required" name="dt" class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><center><input type="submit" name="add_user" value="REGISTER USER" class="bt btn-danger" /></center></td>
                                            </tr>  
                                        </table>
                                        </form>
                                   </div>
                                    <div class="col-lg-6">
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td colspan="4"><center><b>USER DETAILS</b></center></td>
                                            </tr>
                                            <tr>
                                                <td>#</td>
                                                <td>Name</td>
                                                <td>Contact</td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            $sel_user=mysql_query("select * from user_data where st_id='$sid'");
                                            if(mysql_num_rows($sel_user)>0)
                                            {
                                                $i=0;
                                                while($r_user=mysql_fetch_row($sel_user))
                                                {
                                                    $i++;
                                                    ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><b><?php echo $r_user[3] ?></b></td>
                                                <td><?php echo $r_user[5] ?></td>
                                                <td><a href="print.php?uid=<?php echo $r_user[0] ?>" target="_BLANK"><span class="glyphicon glyphicon-print"></span></a></td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                            <tr>
                                                <td colspan="4">No Data Found</td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
        
                <!-- #END# Browser Usage -->
            </div>
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