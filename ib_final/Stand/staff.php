<?php
ob_start();
session_start();
include '../connection.php';
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
if(isset($_POST['add_stf']))
{
    $nme=$_POST['nme'];
    $addr=$_POST['addr'];
    $con=$_POST['con'];
    $dt=$_POST['dt'];
    $styp=$_POST['styp'];
    $stid=$_POST['stid'];
    $up=$_FILES['up']['name'];                                          
    $fn=$stid."".substr($up, strrpos($up, "."));
    $usrc=mysql_query("select * from user_login where uid='$stid'");
	if(mysql_num_rows($usrc)>0)
	{
		header("location:addchecker.php?fail=1");
	}
	else
	{
    $ins_user=mysql_query("insert into staff_data values('','$nme','$addr','$con','$dt','$styp','$stid','".$fn."','$r_data[0]','1')");
    if($styp==2)
    {
        $ins_log=mysql_query("insert into user_login values('','$stid','ksrtc','conductor','1')");
    }
    if($ins_user>0)
    {
        if(move_uploaded_file($_FILES['up']['tmp_name'], getcwd()."\\staff\\$fn"))  
        {
            header("location:staff.php?success=1");
        }
    }
}
}
if(isset($_POST['ass_bs']))
{
    $bs=$_POST['bs'];
    $ins_asst=mysql_query("insert into staff_assign values('','$bs','".$_GET['stid']."','".$_GET['typ']."','1')");
    if($ins_asst>0)
    {
        header("location:staff.php");
    }
}
if(isset($_GET['d']))
{
    if($_GET['d']=="1")
    {
        $x1=$_GET['x1'];
        $del=mysql_query("delete from staff_data where st_id='$x1'");
        if($del>0)
        {
            header("location:staff.php");
        }
    }
}
?>
﻿<!DOCTYPE html>
<html>

<head>
    <script>
    function emm()
    {
        var x=document.getElementById("em1").value;
       
        var xmlhttp = new XMLHttpRequest();
                                   xmlhttp.open("GET","getdata.php?q="+x,true);
                                       xmlhttp.send();
                                       
                                      
                                       xmlhttp.onreadystatechange= function()
                                            {
                                    if (this.readyState == 4 && this.status == 200) {
                                       
                                 document.getElementById("rslt").innerHTML = this.responseText;
                                                }
                                            };
                               
                                   
                                                    }
                                                    </script>
                                                    <script>
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
                                                        </script>
        
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
                            <li class="">
                                <a href="userreg.php">Register User</a>
                            </li>
                            <li class="active">
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
                <h2>STAFF MANAGE</h2>
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
                                    <h2>MANAGE STAFF HERE</h2>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <?php
                                            if(isset($_GET['fail']))
                                            {
                                            
                                            ?>
                            <center>
                                            <h4 style="color: red">Registration Failed/,Username Already Exist</h4>
                            </center>
                                                <?php
                                            }
                                            ?>
                                        <form method="post" enctype="multipart/form-data">
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td>Name</td>
                                                <td><input type="text" name="nme"required="" class="form-control" /></td>
                                            </tr> 
                                            <tr>
                                                <td>Address</td>
                                                <td><textarea name="addr"required="" class="form-control"></textarea></td>  
                                            </tr> 
                                            <tr>
                                                <td>Contact Number</td>
                                                <td><input type="text"required="" name="con" class="form-control" onblur="chkc(this.value)" /><span id="o3"></span></td>
                                            </tr> 
                                            <tr>
                                                <td>DOB</td>
                                                <td><input type="date" name="dt" class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td>Staff Type</td>
                                                <td><select name="styp" class="form-control">
                                                        <option value="1">Driver</option>
                                                        <option value="2">Conductor</option>
                                                        <option value="3">Others</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Staff ID</td>
                                                <td><input type="text"required="" name="stid" class="form-control" type="text" name="em" id="em1" onblur="emm()" /></td>
                                                 
                                            </tr>
                                            <tr><<td colspan="2"><center>
                                                <span id="rslt"></span></center></td>
                                        </tr>
                                            <tr>
                                                <td>Photo</td>
                                                <td><input type="file"required="" name="up" class="form-control" /></td>
                                            </tr>                                             
                                            <tr>
                                                <td colspan="2"><center><input type="submit" name="add_stf" value="ADD STAFF" class="bt btn-danger" /></center></td>
                                            </tr>  
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
                                                $sel_st=mysql_query("select * from staff_data where uid='".$_GET['stid']."'");
                                                $r_st=mysql_fetch_row($sel_st);
                                                ?>
                                        <script>
                                          function loaddata(b,t)
                                          {
                                              $("#b1").load("check_bus.php?b="+b+"&t="+t);                                              
                                          }
                                        </script>
                                        <form method="post">
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td style="width: 50%"><img src="staff/<?php echo $r_st[7] ?>" class="img img-responsive" /></td>
                                                <td><h3><?php echo $r_st[1] ?></h3>
                                                    <span class="glyphicon glyphicon-phone-alt"></span> <?php echo $r_st[3] ?>   
                                                    <hr />
                                                    <span class="glyphicon glyphicon-envelope"></span> <?php echo $r_st[2] ?><br />
                                                    <span class="glyphicon glyphicon-calendar"></span> <?php echo $r_st[4] ?><br />
                                                    <br />Designation : 
                                                    <?php
                                                    if($r_st[5]==1)
                                                    {
                                                        echo "Driver";
                                                    }
                                                    else
                                                    {
                                                        echo "Conductor";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><center><b>ASSIGN BUS</b></center></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <select name="bs" class="form-control" onchange="loaddata(this.value,'<?php echo $r_st[5] ?>')">
                                                        <option>Choose Bus</option>
                                                        <?php
                                                        $sel_bs=mysql_query("select bus_id from bus_assign where station_id='$r_data[0]'");
                                                        if(mysql_num_rows($sel_bs)>0)
                                                        {
                                                            while($r_bs=mysql_fetch_row($sel_bs))
                                                            {
                                                                $sel_bus=mysql_query("select * from bus_data where bus_id='$r_bs[0]'");
                                                                $r_bus=  mysql_fetch_row($sel_bus);                                                               
                                                                ?>
                                                        <option value="<?php echo $r_bus[0]?>"><?php echo $r_bus[1]?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><center>
                                                    <div id="b1">
                                                <input type="submit" name="ass_bs" value="ASSIGN NOW" class="btn btn-sm btn-danger" />
                                                    </div>
                                            </center></td>
                                            </tr> 
                                        </table>
                                        </form>
                                        <?php
                                            }
                                        }
                                        else
                                        {
                                        ?>
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td colspan="5"><center><b>STAFF DETAILS</b></center></td>
                                            </tr>
                                            <tr>
                                                <td>#</td>
                                                <td>Name</td>
                                                <td>Contact</td>
                                                <td></td>
                                                <td></td>
                                                
                                                
                                            </tr>
                                            <?php
                                            $sel_user=mysql_query("select * from staff_data where stat_id='$r_data[0]'");
                                            if(mysql_num_rows($sel_user)>0)
                                            {
                                                $i=0;
                                                while($r_user=mysql_fetch_row($sel_user))
                                                {
                                                    $i++;
                                                    ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><b><?php echo $r_user[1] ?></b>
                                                <?php
                                                if($r_user[5]==1)
                                                {
                                                    echo"(Driver)";
                                                }
                                                else
                                                {
                                                    echo"(Conductor)";
                                                }
                                                $chk_bs=mysql_query("select * from staff_assign,bus_data where bus_data.bus_id=staff_assign.bus_id and staff_assign.stf_id='$r_user[6]'");
                                                if(mysql_num_rows($chk_bs)>0)
                                                {
                                                    $r_bss=mysql_fetch_row($chk_bs);
                                                    echo "<br /> $r_bss[6] ($r_bss[8])";
                                                }
                                                ?>
                                                </td>
                                                <td><?php echo $r_user[3] ?></td>
                                                <td><a href="staff.php?t=1&stid=<?php echo $r_user[6] ?>&typ=<?php echo $r_user[5] ?>"><span class="glyphicon glyphicon-plus-sign"></span></a></td>
                                                <td><a href ="staff.php?x1=<?php echo $r_user[0]?>&d=1" class="glyphicon glyphicon-trash"></a></td>
                                            
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