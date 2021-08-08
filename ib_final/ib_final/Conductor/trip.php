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
if(isset($_POST['up_stp']))
{
    $st=$_POST['st'];
    $st1=  explode(",", $st);
    $dlyid=$_POST['dlyid'];
    $ins_upst=mysql_query("insert into dailt_trip_stop values('','$dt','$dlyid','$st1[1]','$st1[0]','".  time()."')");
    if($ins_upst>0)
    {
        header("location:trip.php");
    }
}



$bs=mysql_query("select * from bus_data where bus_id='$busid'");
    $bs1=mysql_fetch_row($bs);
    
    
    
    
if(isset($_POST['iss_tkt']))
{
    $qr=$_POST['rslt'];
    $sel_u=mysql_query("select * from user_data where qrcode='$qr'");
    if(mysql_num_rows($sel_u)>0)
    {
    $r_u=mysql_fetch_row($sel_u);
    $accno=$r_u[2];
    $item=$r_u[5];
    $sn=$_POST['srsn'];
    $sid=$_POST['srsid'];
    $des=$_POST['des'];
    $des1=  explode(",", $des);
    $deid=$des1[0];
    $den=$des1[1];
    $amt=$_POST['amt'];
    $trid=$_POST['trid'];
    date_default_timezone_set('asia/calcutta');
    $tim=  date("F j, Y, g:i a");  
    $sel10=mysql_query("select * from vb_usr where acc_num='$accno'");
    $r10=mysql_fetch_row($sel10);
    $amount_acc=$r10[6];
    if($amount_acc<=100 && $amount_acc<$amt)
    {
        header("location:trip.php?bal=$amount_acc");
    }
    else
    {
        $item=$r_u[5];
        
    $ins_req=mysql_query("insert into cash_tranreq values('','$r_u[1]','$accno','KSRTC','681-312-101','$amt','".date('Y-m-d')."','$trid','Transfer','0')");
    $ins_tkt=mysql_query("insert into ticket_issue values('','$dt','$trid','$qr','$sn','$sid','$den','$deid','$amt','$busid')");
    if($ins_tkt>0)
    {
        $up=mysql_query("update daily_trip set amt=amt+$amt where id='$trid'");
        
        
        if($up>0)
    {
        $sel1=mysql_query("select * from vb_usr where acc_num='$accno'");
    $r1=mysql_fetch_row($sel1);
            $item="$r1[3]";
        $t="Msg From KSRTC!! $r1[1],You have Debited $amt Rs/- from your Account for traveling $sn-$den in bus $bs1[2]($bs1[1])  on $dt";
        echo "<script language='javascript'> var win = window.open('http://api.msg91.com/api/sendhttp.php?route=4&sender=TESTIN&mobiles=$item&authkey=269646AttiMOEtXITY5c9c472d&message=$t', '1366002941508',  'width=100,height=100,left=375,top=330','_blank');
           setTimeout(function(){
                win.close()
            }, 6000);</script>";
           header("Refresh:15;location:trip.php?num=$item"); 
        }
     
    }
    }
    }
 else {
        header("location:trip.php?error=1");
    }

}
if(isset($_GET['num']))
{
    $t="Transaction is complete";
    /*$item=$_GET['num'];
            echo "<script language='javascript'> var win = window.open('http://msgbox.in/httpapi/smsapi?uname=Trinity&password=trinity&sender=TRNITY&receiver=$item&route=TA&msgtype=1&sms=$t', '1366002941508',  'width=100,height=100,left=375,top=330','_blank');
           setTimeout(function(){
                win.close()
            }, 6000);</script>";*/
}
if(isset($_GET['x']))
{
    $up=mysql_query("update daily_trip set st=1 where id='".$_GET['tid']."'");
    if($up>0)
    {
        header("location:trip.php");
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
                    <li class="active">
                        <a href="trip.php">
                            <i class="material-icons">assessment</i>
                            <span>My Trip</span>
                        </a>
                    </li>     
                        
                    <li>
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
                                    <h2>MY CURRENT TRIP (<?php echo $dt ?>)</h2>
                                </div>
                                
                                
                            </div>
                            
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <h4>UPDATE STOP</h4>
                                        <?php
                                        $dailyid=null;
                                        $chk_trip=mysql_query("select * from daily_trip where date='$dt' and bus_id='$r_bs[1]' and st=0");
                                        if(mysql_num_rows($chk_trip)>0)
                                        {
                                            $r_trip=mysql_fetch_row($chk_trip);
                                            $dailyid=$r_trip[0];
                                            $tripid=$r_trip[4];
                                            $pathid=$r_trip[5];
                                            $current_tripid=$r_trip[0];
                                            ?>
                                        <form method="post">
                                            <script>
                                                function dat(x)
                                                {
                                                    var did=document.getElementById("ddidd").value;
                                                    $("#ulist").show(1000);
                                                    $("#ulist").load("userlist.php?x="+x+"&t="+did);
                                                    //alert(x+","+did);
                                                }
                                            </script>
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>                                                
                                                <td><center><select name="st" class="form-control" onchange="dat(this.value)">
                                                        <option>Update Stop</option>
                                                        <?php
                                                        $sel_path=mysql_query("select * from path_info where p_id='$pathid'");
                                                        while($r_path=mysql_fetch_row($sel_path))
                                                        {
                                                            ?>
                                                        <option value="<?php echo $r_path[0] ?>,<?php echo $r_path[2] ?>"><?php echo $r_path[2] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <input type="hidden" id="ddidd" name="dlyid" value="<?php echo $dailyid ?>" />
                                                    <input type="submit" name="up_stp" value="UPDATE" class="btn btn-sm btn-danger" /> 
                                            </center></td>
                                            </tr>
                                        </table>
                                            <div id="ulist" style="display: none;">
                                                
                                            </div>
                                        </form>
                                        <?php
                                        }
                                        else
                                        {
                                            echo "NO Trip Selected By You...";
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php
                                        $sel_daily=mysql_query("select * from dailt_trip_stop where daily_tripid='$dailyid' order by id desc");
                                         if(mysql_num_rows($sel_daily)>0)
                                         {
                                            $r_daily=mysql_fetch_row($sel_daily);
                                            ?>
                                        <div class="alert alert-success">
                                            <center><h5>CURRENT TRIP</h5></center>
                                        Current Stop : <?php echo $r_daily[3] ?><br />
                                        Total Customer : 
                                        <?php
                                        $sel_tc=mysql_query("select * from ticket_issue where daily_tripid='$dailyid'");
                                        echo mysql_num_rows($sel_tc);
                                        ?><br />
                                        Customer in Bus : 
                                        <?php
                                        $sel_tcb=mysql_query("select * from ticket_issue where daily_tripid='$dailyid' and did>$r_daily[4]");
                                        echo mysql_num_rows($sel_tcb);
                                        ?>  
                                        <script>
                                        function flp()
                                        {
                                            $("#qn").hide();
                                            $("#ver").show(1000);
                                        }
                                        </script>
                                        <div class="pull-right">
                                            <span class="label label-danger pull-right" id="qn" onclick="flp()" style="cursor: pointer;">Complete Trip</span>
                                            <div id="ver" style="display: none;">
                                                <a href="trip.php?x=1&tid=<?php echo $dailyid ?>"><span class="label label-danger">YES</span></a>
                                                <a href="trip.php"><span class="label label-warning">NO</span></a>
                                            </div>
                                        </div>
                                        
                                        </div>
                                        <?php
                                         }
                                            ?>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   
                                        <?php
                                        if(isset($dailyid))
                                        {
                                        ?>
                                         <h4>ISSUE TICKET
                                         <?php
                                         if(isset($_GET['error']))
                                         {
                                             echo"<center><span><font color='red'>Invalid</font></span></center>";
                                         }
                                         if(isset($_GET['bal']))
                                         {
                                             echo"<center><span><font color='red'>Insufficient balance</font></span></center>";
                                         }
                                         ?>
                                             /<a href="chk.php">KSRTC staff</a></h4>
                                         <?php
                                         $sel_daily=mysql_query("select * from dailt_trip_stop where daily_tripid='$dailyid' order by id desc");
                                         if(mysql_num_rows($sel_daily)>0)
                                         {
                                            $r_daily=mysql_fetch_row($sel_daily);
                                            ?>
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
                                                 <td><input type="text" name="rslt" required="required" id="result" class="form-control" onfocus="loadchk1()" /></td>
                                             </tr>
                                             <tr>
                                                 <td>Source</td>
                                                 <td><input type="text" name="srsn" value="<?php echo $r_daily[3] ?>" class="form-control" />
                                                     <input type="hidden" name="srsid" id="srsid" value="<?php echo "$r_daily[4]" ?>" class="form-control" />
                                                     <input type="hidden" name="trid" id="" value="<?php echo $dailyid ?>" class="form-control" />
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Destination</td>
                                                 <td>
                                                     <select name="des" class="form-control" onchange="loadamt(this.value,'<?php echo $pathid ?>')">
                                                         <option>Choose</option>
                                                         <?php
                                                         $sel_des=mysql_query("select * from path_info where p_id='$pathid' and id>'$r_daily[4]'");
                                                         while($r_des=mysql_fetch_row($sel_des))
                                                         {
                                                             ?>
                                                         <option value="<?php echo $r_des[0] ?>,<?php echo $r_des[2] ?>"><?php echo $r_des[2] ?></option>
                                                         <?php
                                                         }
                                                         ?>
                                                     </select>
                                                 </td>
                                             </tr>
                                             <script>
                                                 function loadamt(d,p)
                                                 {
                                                     var d1=d.split(",");
                                                     var dest=d1[0];
                                                     var srs=document.getElementById("srsid").value;
                                                     $("#am1").load("loadamt.php?s="+srs+"&d="+dest+"&p="+p);
                                                 }
                                             </script>
                                             <tr>
                                                 <td>Amount</td>
                                                 <td><div id="am1"><input type="text" name="amt" class="form-control" id="amt" /></div></td>
                                             </tr>
                                             <tr>
                                                 <td colspan="2"><center><input type="submit" name="iss_tkt" value="ISSUE TICKET" class="btn btn-sm btn-danger" /> </center></td>
                                             </tr>
                                         </table>
                                         </form>
                                            <?php                                            
                                         }
                                         else
                                         {
                                             ?>
                                         <div class="alert alert-danger">Please Select The Junction</div>
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