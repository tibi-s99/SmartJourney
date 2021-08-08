<?php
include './connection.php';

if(isset($_POST['sub']))
{
    $onm=$_POST['onm'];
    $lid=$_POST['lid'];
    $pas=$_POST['pas'];
    $addr=$_POST['addr'];
    $con=$_POST['con'];
    $em=$_POST['em'];
    $up=$_FILES['up']['name'];
    $nfn=$lid."".substr($up,strrpos($up,"."));
    $ot=$_POST['ot'];
    $la=$_POST['la'];
    $lo=$_POST['lo'];
    $usrc=mysql_query("select * from org_data where lid='$lid'");
	if(mysql_num_rows($usrc)>0)
	{
		echo"Username already excits";
	}
	else
	{
            if($ot=="1")
    {
    
    $ins3=mysql_query("insert into r_van values('','Not Available','$lid')");
   
    if(mysql_affected_rows()>0)
{
    $ins=mysql_query("insert into org_data values('','$onm','$lid','$addr','$con','$em','$nfn','$ot','$la','$lo','0')");
    if($ins>0)
    {
        $ins1=mysql_query("insert into user_log values('','$lid','$pas','$ot','0')");
        if($ins1>0)
        {
            if(move_uploaded_file($_FILES['up']['tmp_name'],getcwd()."\\picture\\$nfn"))
            {
                header("location:org.php?success=1");
            }
        }
    }
}
}
 else {
    $ins=mysql_query("insert into org_data values('','$onm','$lid','$addr','$con','$em','$nfn','$ot','$la','$lo','0')");
    if($ins>0)
    {
        $ins1=mysql_query("insert into user_log values('','$lid','$pas','$ot','0')");
        if($ins1>0)
        {
            if(move_uploaded_file($_FILES['up']['tmp_name'],getcwd()."\\picture\\$nfn"))
            {
                header("location:org.php?suss=1");
            }
        }
    }
}
}
}
?>
    <?php
                                             
                           session_start();
if(isset($_POST['sub1']))
{
$t1=$_POST['uid1'];
    $t2=$_POST['pas1'];

$log=mysql_query("select * from user_log where uid='$t1' and pas='$t2'and st='1'");
if(mysql_num_rows($log)>0)
{
    $r=mysql_fetch_row($log);
if($r[3]=="1")
{
    $_SESSION['uid1']=$t1;
    header("location:./service_station/home_service.php");
    
}
if($r[3]=="2")
{
    $_SESSION['uid1']=$t1;
    header("location:./spare_parts/home_spare.php");
}
if($r[3]=="3")
{
    $_SESSION['uid1']=$t1;
    header("location:./cab_service/home_cab.php");
}
if($r[3]=="4")
{
    $_SESSION['uid1']=$t1;
    header("location:./park_station/home_park.php");
}
if($r[3]=="5")
{
    $_SESSION['uid1']=$t1;
    header("location:./hospital/home_hos.php");
}
if($r[3]=="6")
{
    $_SESSION['uid1']=$t1;
    header("location:./resturant/check_res.php");
}
if($r[3]=="7")
{
    $_SESSION['uid1']=$t1;
    header("location:./ed_institute/check_ed.php");
}
if($r[3]=="8")
{
    $_SESSION['uid1']=$t1;
    header("location:./petrol/home_service.php");
}
if($r[3]=="9")
{
    $_SESSION['uid1']=$t1;
    header("location:./ATM/home_service.php");
}
if($r[3]=="10")
{
    $_SESSION['uid1']=$t1;
    header("location:./shop/home_shop.php");
}

}
else
{
    header("location:org.php?Fail=1");
}
    

}
                                    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Track Geo Data </title>

    <!-- Bootstrap core CSS -->
    <link href="_template/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="_template/themes/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="_template/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="_template/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="_template/assets/custom/css/flexslider.css" type="text/css" media="screen">    	
    <link rel="stylesheet" href="_template/assets/custom/css/parallax-slider.css" type="text/css">
    <link rel="stylesheet" href="_template/assets/font-awesome-4.0.3/css/font-awesome.min.css" type="text/css">

    <!-- Custom styles for this template -->
	
    <link href="_template/assets/custom/css/business-plate.css" rel="stylesheet">
    <link rel="shortcut icon" href="_template/assets/custom/ico/favicon.ico">
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





function validateemail(a)  
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDge58kDZRSDquz16IhEFQZMzHjMpFWwlw&callback=myMap"></script>

    <script type="text/javascript">
        window.onload = function () {
            var mapOptions = {
                center: new google.maps.LatLng(8.493865786553638, 76.94784119725227),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'dblclick', function (e) {
                //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                document.getElementById("la").value=e.latLng.lat();
                document.getElementById("lo").value=e.latLng.lng();
            });
        }
    </script>
<!-- NAVBAR
================================================== -->
  <body>
	
    <!-- topHeaderSection -->	
    <div class="topHeaderSection">		
    <div class="header">			
		<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>3
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index.php"><img src="_template/assets/custom/img/logo.png" alt="My web solution" /></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class=""><a href="index.php">Home</a></li>
            
            <li><a href="users.php">User</a></li>
            <li class="active"><a href="org.php">New Organization</a></li>
            <li class=""><a href="pro.php">Buy Cars</a></li>
           <li><a href="rto.php">RTO Office</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
	</div>
	</div>

    <!-- bannerSection -->
    
    <!-- highlightSection -->
    <div>
        <img width="100%" height="330px" src="picture/signoff_car_gps_navigation.jpg">
         
         
         </div>
    <!-- bodySection -->
		<div class="serviceBlock">
		<div class="container">
				<div class="row">
                                    <div class="col-md-12">
                                         <?php
                                            if(isset($_GET['suss']))
                                            {
                                            
                                            ?>
                            <center>
                                            <h4 style="color: green">Registration Complete/,Please Wait for Confirmation</h4>
                            </center>
                                                <?php
                                            }
                                            ?>
                                        <br/>
                                        <div class="col-md-6">
                                            <form method="post" enctype="multipart/form-data"onsubmit="return validateemail();">
                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                <tr>
                                                    <td colspan="2"><center><b>CREATE A NEW ACCOUNT HERE</b></center></td>
                                                </tr>
                                                <tr>
                                                    <td>Organization Name</td>
                                                    <td><input type="text" name="onm" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Login ID</td>
                                                    <td><input type="text" name="lid" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Password</td>
                                                    <td><input type="password" id="p10" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Confirm Password</td>
                                                    <td><input type="password" name="pas" class="form-control" required="required"onblur="chkp(this.value)" /><span id="p"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td><textarea name="addr" class="form-control" required="required"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>Contact Number</td>
                                                    <td><input type="text" name="con" class="form-control" required="required"onkeyup="chkc(this.value)" /><span id="o3"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Email Address</td>
                                                    <td><input type="text" name="em" class="form-control" required="required"onblur="validateemail(this.value)" /><span id="em"></span></td>
                                                </tr>
                                                 <tr>
                                                    <td>Organization Logo</td>
                                                    <td><input type="file" name="up" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Organization Type</td>
                                                    <td><select name="ot" class="form-control" required="required">
                                                            <option value="">Choose One</option>
                                                            <option value="1">Service Station</option>
                                                            <option value="2">Spare part Selling</option>
                                                            <option value="3">Cab Service</option>
                                                            <option value="4">Parking Station</option>
                                                            <option value="5">Hospital</option>
                                                            <option value="6">Star Restaurant</option>
                                                            <option value="7">School/College</option>
                                                            <option value="8">Petrol Pump</option>
                                                            <option value="9">ATM</option>
                                                             <option value="10">Shopping Complex</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><center><b>CHOOSE GEO LOCATION</b></center></td>
                                                </tr>
                                                <tr>
                                                    <td>Latitude</td>
                                                    <td><input type="text" name="la" id="la" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Longitude</td>
                                                    <td><input type="text" name="lo" id="lo" class="form-control" required="required" /></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan="2"><center><input type="submit" name="sub"id="btn" value="Register Now" class="btn btn-success" /></center></td>
                                                </tr>
                                            </table>
                                            </form>
                                        </div>
                                        <form method="post">
                                        <div class="col-md-6">
                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                <tr>
                                                    <td colspan="2"><center><b>LOGIN HERE</b></center></td>
                                                </tr>
                                                 <tr>
                                                    <td>User ID</td>
                                                    <td><input type="text" name="uid1" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Password</td>
                                                    <td><input type="password" name="pas1" class="form-control" required="required" /></td>
                                                </tr>                                                
                                                <tr>
                                                    <td colspan="2"><center><input type="submit" name="sub1" value="Login Here" class="btn btn-danger" /></center></td>
                                                </tr>
                                                <?php
                                                if(isset($_GET['Fail']))
                                                {
                                                
                                                ?>
                                                
                                                <tr>
                                                    <td colspan="2"align="center"><b style="color: red">Invalid Username/Password</b>
                                             </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                                
                                            </table>
                                             <div id="dvMap" style="width: 100%; height: 500px"></div>
                                        </div>
                                        </form>
                                    </div>
					
					
				</div>
			
		</div>
		</div>
	
	
	
   

					
					

        
		
		
		
		
	</div>
	</div>
    <!-- clientSection -->
	
	
	
    <!-- footerTopSection -->
    
    <!-- footerBottomSection -->	
	<div class="footerBottomSection">
		<div class="container">
			&copy; 2014, Allright reserved. <a href="_template/#">Terms and Condition</a> | <a href="_template/#">Privacy Policy</a> 
			<div class="pull-right"> <a href="_template/index.html"><img src="_template/assets/custom/img/logo1.png" alt="My web solution" /></a></div>
		</div>
	</div>
	
<!-- JS Global Compulsory -->			
<script type="text/javascript" src="_template/assets/custom/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="_template/assets/custom/js/modernizr.custom.js"></script>		
<script type="text/javascript" src="_template/assets/bootstrap/js/bootstrap.min.js"></script>	
	
	<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="_template/assets/custom/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="_template/assets/custom/js/modernizr.js"></script>
<script type="text/javascript" src="_template/assets/custom/js/jquery.cslider.js"></script> 
<script type="text/javascript" src="_template/assets/custom/js/back-to-top.js"></script>
<script type="text/javascript" src="_template/assets/custom/js/jquery.sticky.js"></script>

<!-- JS Page Level -->           
<script type="text/javascript" src="_template/assets/custom/js/app.js"></script>
<script type="text/javascript" src="_template/assets/custom/js/index.js"></script>


<script type="text/javascript">
    jQuery(document).ready(function() {
      	App.init();
        App.initSliders();
        Index.initParallaxSlider();
    });
</script>


	</body>
</html>