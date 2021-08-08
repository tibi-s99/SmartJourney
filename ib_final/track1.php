<?php
include './connection.php';

?>
<!--A Design by W3layouts
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>SMART JOURNEY</title>
<!-- meta data -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Register Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta data -->
<link href="//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
<!-- css files -->
<link href="_Template1/css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="_Template/plugins/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" media="all"> 
<script src="_Template/plugins/jquery/jquery.min.js"></script>
<!-- //css files -->
</head>
<!-- body starts -->
<body>
<!-- section -->
<section class="register">
	<div class="register-full">
		<div class="register-left">
			<div class="register-in">
                            <span class="label label-danger pull-right" onclick="shologin()" style="cursor: pointer;">LOGIN</span>
                            
                            <a href="app/GetLattittude (3).apk"><span class="label label-info pull-right" class="glyphicon glyphicon-apple"  style="cursor: pointer;">Download App</span></a>
                           <a href="feedback.php"><span class="label label-success pull-right"  style="cursor: pointer;">FEEDBACK</span></a>
                          
                        
                        
                        
                        <?php
                        if(isset($_GET['bid']))
                        {
                            $bid=$_GET['bid'];
                        ?>
                        <iframe src="http://trinitytechnology.in/auto_location/Auto_Location_Update/index.php?cid=<?php echo $bid ?>" style="width: 100%; height: 500px;"></iframe>
                        
                        <?php
                        }
                        ?>
                        </div>
		</div>
            <script>
            function shologin(){
                $("#lgin").slideToggle(1000);
            }
            </script>
            <div class="register-right" style="display: none;" id="lgin">
			<div class="register-in">
                            <center>
				
                                <div class="register-form">
                                    <a href="login.php"><img src="_Template1/images/KSRTC-Logo.jpg" class="img img-responsive" ></a>
                                    <br />
                                    <img src="_Template1/images/save.jpg" class="img img-responsive" >
                                </div>
                            </center>
			</div>
			<div class="clear"> </div>
		</div>
	<div class="clear"> </div>
	</div>
	
</section>
<!-- //section -->
</body>	
<!-- //body ends -->
</html>