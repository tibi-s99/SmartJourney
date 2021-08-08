<?php
ob_start();
include '../connection.php';
if(isset($_POST['add_st']))
{
    $stat=$_POST['stat'];
    $dist=$_POST['dist'];
    $loc=$_POST['loc'];
    $iss=$_POST['iss'];
    if($iss=="0")
    {
        $ins_st=mysql_query("insert into station_data (id,state,district,loc,is_st,st) values('','$stat','$dist','$loc','$iss','1')");
        if($ins_st>0)
        {
             header("location:stmanage.php?success=1");
        }
    }
    if($iss=="1")
    {
        $sc=$_POST['sc'];
        $sm=$_POST['sm'];
        $uid=$_POST['uid'];
        $pwd=$_POST['pwd'];
        $addr=$_POST['addr'];
        $con=$_POST['con'];
        $em=$_POST['em'];
        $up=$_FILES['up']['name'];          
        $nfn=  $sc."".substr($up,strrpos($up,"."));   
        $usrc=mysql_query("select * from user_login where uid='$uid'");
	if(mysql_num_rows($usrc)>0)
	{
		header("location:stmanage.php?fail=1");
	}
	else
	{
        $ins_st=mysql_query("insert into station_data values('','$stat','$dist','$loc','$iss','$sc','$sm','$uid','$addr','$con','$em','$nfn','1')");
        $ins_log=mysql_query("insert into user_login values('','$uid','$pwd','stand','1')");
        if($ins_st>0)
        {
            if(move_uploaded_file($_FILES['up']['tmp_name'],getcwd()."\\station_pic\\$nfn"))
            {
                header("location:stmanage.php?success=1");
            }
        }
    }
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
    <script type="text/javascript">
    
    
    function chkc(b2)
{
var k5=b2.length;
var ch2=/([0-9])$/;
if(ch2.test(b2)==false)
{
document.getElementById("o3").innerHTML="<font color='red'>*Only Numbers*</font>";
$("#btn").hide();
return false;
}
else if(k5!=10)
{
document.getElementById("o3").innerHTML="<font color='red'>*Please Check Your Mobile Number*</font>";
$("#btn").hide();
return false;
}
else
{
  document.getElementById("o3").innerHTML="";  
  $("#btn").show();
}
}
  
 function chkp(c)
{
var s=document.getElementById("p10").value;

if(s==c)
{
document.getElementById("p").innerHTML="<font color='Green'>*Password is Correct*</font>";
$("#btn").show();
return false;
}
else
{
document.getElementById("p").innerHTML="<font color='red'>*Verfy Password*</font>";
$("#btn").hide();
}
}





function vem(a)  
     {  
          //var a = document.myform.email.value;  
          var atposition = a.indexOf("@");  
          var dotposition = a.lastIndexOf(".");  
          if (atposition<1 || dotposition<atposition+2 || dotposition+2>=a.length) 
          {  
               document.getElementById("em").innerHTML="<font color='red'>*Please Check Your Email Address*</font>";
                $("#btn").hide();  
          }  
          else
{
                document.getElementById("em").innerHTML="";  
  $("#btn").show();
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
                        <a href="feedback.php">
                            <i class="material-icons">assessment</i>
                            <span>Feedback</span>
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
                            <li class="active"  >
                                <a href="stmanage.php">STATION MANAGE</a>
                            </li>
                            <li>
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
                                    <h2>STATION MANAGE</h2>
                                </div>                                
                            </div>                            
                        </div>
                        <div class="body">
                            <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-6">
                                    <form method="post" enctype="multipart/form-data">
                                        <script>
                                        function loaddis(x)
                                        {
                                            var xmlhttp = new XMLHttpRequest();
                                            xmlhttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    document.getElementById("dd").innerHTML = this.responseText;
                                                }
                                            };
                                            xmlhttp.open("GET", "getdis.php?q=" + x, true);
                                            xmlhttp.send();
                                        }
                                        </script>
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
                                    <table class="table table-hover table-responsive table-bordered table-condensed table-striped">
                                        <tr>
                                            <td colspan="2">
                                        <center>
                                            <b>ADD STATION HERE</b>
                                        </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>
                                                <select name="stat" class="form-control show-tick" onchange="loaddis(this.value);load_st(this.value)">
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
                                            <td>District</td>
                                            <td>
                                                <span id="dd"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Location</td>
                                            <td><input type="text" name="loc" class="form-control" required="required" /></td>
                                        </tr>
                                        <tr>
                                            <td>is it a Bus stand</td>
                                            <td>
                                                <select name="iss" class="form-control show-tick" onchange="shodata(this.value)">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>                                        
                                    </select>
                                            </td>
                                        </tr>
                                        <tr id="bs" style="display: none;">
                                            <td colspan="2">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td colspan="2"><center><b>STATION DETAILS</b></center></td>
                                                    </tr>
                                                    <tr>
                                            <td>Station Code</td>
                                            <td><input type="text" name="sc" class="form-control"/></td>
                                        </tr>
                                        <tr>
                                            <td>Station Master</td>
                                            <td><input type="text" name="sm" class="form-control"/></td>
                                        </tr>
                                        <tr>
                                            <td>Login ID</td>
                                            <td><input type="text" name="uid" class="form-control"/></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><input type="password" name="pwd" class="form-control"/></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><textarea name="addr" class="form-control"></textarea></td>
                                        </tr>
                                         <tr>
                                            <td>Contact Number</td>
                                            <td><input type="number"name="con" class="form-control" onkeyup="chkc(this.value)" /><span id="o3"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="email" name="em" class="form-control" onkeyup="vem(this.value)" /><span id="em"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Image</td>
                                            <td><input type="file" name="up" class="form-control" /></td>
                                        </tr>
                                        
                                                </table>
                                            </td>
                                        </tr>  
                                        <tr>
                                            <td colspan="2"><center><input type="submit" name="add_st" value="ADD STATION" class="btn btn-sm btn-danger" /></center></td>
                                        </tr>
                                    </table>
                                        
                                        <script>
                                           function shodata(x)
                                           {
                                               if(x=="1")
                                               {
                                                   $("#bs").show(1000);
                                               }
                                               else
                                               {
                                                   $("#bs").hide(1000);
                                               }
                                           }
                                        </script>
                                        <?php
                                        if(isset($_GET['success']))
                                        {
                                            echo "<font color='green'>Add Successfully</font>";
                                        }
                                        ?>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <script>
                                        function loaddis1(x)
                                        {
                                            var xmlhttp = new XMLHttpRequest();
                                            xmlhttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    document.getElementById("dd1").innerHTML = this.responseText;
                                                }
                                            };
                                            xmlhttp.open("GET", "getdis1.php?q=" + x, true);
                                            xmlhttp.send();
                                        }
                                        function load_st(x)
                                        {
                                            var xmlhttp = new XMLHttpRequest();
                                            xmlhttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    document.getElementById("st1").innerHTML = this.responseText;
                                                }
                                            };
                                            xmlhttp.open("GET", "getstationst.php?q=" + x, true);
                                            xmlhttp.send();
                                        }
                                        function loadst1(x)
                                        {
                                            var xmlhttp = new XMLHttpRequest();
                                            xmlhttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    document.getElementById("st1").innerHTML = this.responseText;
                                                }
                                            };
                                            xmlhttp.open("GET", "getstationdist.php?q=" + x, true);
                                            xmlhttp.send();
                                        }
                                        </script>                                    
                                        <span id="st1">
                                            
                                        </span>
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