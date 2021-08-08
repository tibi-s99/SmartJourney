<?php
ob_start();
include '../connection.php';
if(isset($_POST['add_bus']))
{
    $bn=$_POST['bn'];
    $bnum=$_POST['bnum'];
    $typ=$_POST['typ'];
    $up=$_FILES['up']['name'];
    $nfn=  $bn."".substr($up,strrpos($up,"."));
    $ins_bus=mysql_query("insert into bus_data values('','$bn','$bnum','$typ','$nfn','0')");
    if($ins_bus>0)
    {
        if(move_uploaded_file($_FILES['up']['tmp_name'],getcwd()."\\bus_pic\\$nfn"))
        {
            header("location:busmanage.php?success=1");
        }
    }
}
if(isset($_POST['as_bus']))
{
    $bid=$_GET['bus'];
    $stid=$_POST['station'];
    $assign_bus=mysql_query("insert into bus_assign values('','$bid','$stid','1')");
    if($assign_bus>0)
    {
        $up=mysql_query("update bus_data set st=1 where bus_id='$bid'");
        header("location:busmanage.php");
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
                            <li>
                                <a href="stmanage.php">STATION MANAGE</a>
                            </li>
                            <li>
                                <a href="rtmanage.php">Route Manage</a>
                            </li>
                            <li class="active">
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
                                    <h2>BUS MANAGE</h2>
                                </div>                                
                            </div>                            
                        </div>
                        <div class="body">
                            <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-6">
                                    <form method="post" enctype="multipart/form-data">
                                    <table class="table table-bordered table-condensed table-hover table-striped table-responsive">
                                        <tr>
                                            <td colspan="2"><center><b>ADD BUS HERE</b></center></td>
                                        </tr>
                                        <tr>
                                            <td>BUS No.</td>
                                            <td><input type="text" name="bn"required="" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <td>Number Plate Info</td>
                                            <td><input type="text" name="bnum"required="" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <td>Bus Type</td>
                                            <td><select name="typ"required="" class="form-control">
                                                    <option>Super Fast</option>
                                                    <option>Express</option>
                                                    <option>Ordinary</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Image</td>
                                            <td><input type="file"required="" name="up" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><center><input type="submit" name="add_bus" value="ADD BUS" class="btn btn-danger" /></center></td>
                                        </tr>
                                    </table>
                                    </form>
                                    <?php
                                        if(isset($_GET['success']))
                                        {
                                            echo "<font color='green'>Add Successfully</font>";
                                        }
                                        ?>
                                </div>
                                <div class="col-lg-6">
                                    <?php
                                    if(isset($_GET['bus']))
                                    {
                                        $bid=$_GET['bus'];
                                        $sel_b1=mysql_query("select * from bus_data where bus_id='$bid'");
                                        if(mysql_num_rows($sel_b1)>0)
                                        {
                                            $r_b1=mysql_fetch_row($sel_b1);
                                            ?>
                                    <script>
                                        function loaddis(x)
                                        {
                                            var xmlhttp = new XMLHttpRequest();
                                            xmlhttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    document.getElementById("dd").innerHTML = this.responseText;
                                                }
                                            };
                                            xmlhttp.open("GET", "getdis1.php?q=" + x, true);
                                            xmlhttp.send();
                                        }
                                        function loadst1(x)
                                        {
                                            $("#st").load("getstation.php?did="+x);
                                        }
                                        </script>
                                        <form method="post">
                                    <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                        <tr>
                                            <td colspan="2">
                                                <img src="bus_pic/<?php echo $r_b1[4] ?>" class="img img-responsive" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>
                                                <select name="stat" class="form-control show-tick" onchange="loaddis(this.value)">
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
                                            <td>Station</td>
                                            <td>
                                                <span id="st"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                        <center>
                                            <input type="submit" name="as_bus" value="ASSIGN BUS" class="btn btn-danger" />
                                        </center>
                                            </td>
                                        </tr>
                                    </table>
                                        </form>
                                    <?php
                                        }
                                    }
                                    else
                                    {
                                    $sel_bus=mysql_query("select * from bus_data where st=0 order by bus_id desc");
                                    if(mysql_num_rows($sel_bus)>0)
                                    {
                                        ?>
                                    <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                        <tr>
                                            <td>#</td>
                                            <td>Bus No</td>
                                            <td>Number Plate</td>
                                            <td></td>
                                        </tr>
                                        <?php
                                        $i=0;
                                        while($r_bus=mysql_fetch_row($sel_bus))
                                        {
                                            $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $r_bus[1] ?></td>
                                            <td><?php echo $r_bus[2] ?></td>
                                            <td><a href="busmanage.php?bus=<?php echo $r_bus[0] ?>" title="Assign Bus"><span class="glyphicon glyphicon-plus-sign" style="color: red;"></span></a></td>
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