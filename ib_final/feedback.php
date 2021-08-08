<?php
ob_start();
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
                          
                            <a href="index.php"><span class="label label-info pull-right"  style="cursor: pointer;">SEARCH BUS</span></a>
                             <a href="feedback.php"><span class="label label-success pull-right"  style="cursor: pointer;">FEEDBACK</span></a>
                             <a href="Admin/Bank/index.php"><span class="label label-danger pull-right"  style="cursor: pointer;">BANK</span></a>
                            <br>
                            
                            <form method="post">
                                <center>  <b>FEEDBACK</b></center>
                                 <script>
            function loaddis(x)
            {
                //alert();
                $("#dd").load("getdis1.php?q="+x)
            }
            function loaddis1(x)
            {
               // alert();
                $("#dd1").load("getdis2.php?q="+x)
            }
            function loadst1(x)
            {
               // alert();
                $("#st").load("getstation3.php?did="+x);
            }
            function loadst2(x)
            {
                //alert();
                $("#st1").load("getstation3.php?did="+x);
                
            }
            function loadst3(x)
            {
                //alert();
                $("#st2").load("getstation3.php?did="+x);
                
            }
            function shobutton(){
                $("#sub").show();
            }
            </script>
                     <br />          
                                <table class="table table bordered table-hover" style="background-color: white">
                                    
                                
                                <tr>
                                    <td><input type="text" name="ci" placeholder="Adhar No" class="form-control" /></td>
                                </tr>
                                
                                <tr>
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
                        <span id="st2"></span>
                    </td>
                </tr>
                 <tr>
                     <td><textarea rows="10" cols="10" name="f" placeholder="feedback" class="form-control" ></textarea></td>
                                </tr>
                <tr>
                    <td colspan="2">
                
                                <tr>
                                    <td><center><input type="submit" name="sub" value="Click Here" /></center></td>
                                </tr>
                            </table>
                            </form>
                              <?php
                              if(isset($_POST['sub']))
                              {
                                  $ci=$_POST['ci'];
                                  $stat=$_POST['stat'];
                                  $dist=$_POST['dist'];
                                  $station=$_POST['station1'];
                                  $f=$_POST['f'];
                                  
                                  
                                            $ins=mysql_query("insert into feedback values('','$ci','$stat','$dist','$station','$f','1')");
                                            if($ins>0)
                                            {
                                                header("location:feedback.php");
                                            }
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