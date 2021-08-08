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
 
                            if(isset($_POST['sub']))
{
    $s=$_POST['station'];
    $d=$_POST['station1'];
    //find the junction id
    
    $sel_p1=mysql_query("select distinct p_id from path_info where jn_nme='$s' || jn_nme='$d'");
    if(mysql_num_rows($sel_p1)>0)
    {
        while($r1=mysql_fetch_row($sel_p1))
        {
            $pathid=$r1[0];           
            
            //finding the id from the table to find the bus direction
            $sel1=mysql_query("select id from path_info where p_id='$pathid' and jn_nme='$s'");
            $sel2=mysql_query("select id from path_info where p_id='$pathid' and jn_nme='$d'");
            if(mysql_num_rows($sel1)>0 && mysql_num_rows($sel2)>0)
            {                
                $sid=mysql_fetch_row($sel1);
                $sourceid=$sid[0];
                $did=mysql_fetch_row($sel2);
                $destid=$did[0];
                if($sourceid<$destid)
                {    
                    //echo"$sourceid,$destid,$pathid<br/>";
                    //find active trip
                    $sel_t=mysql_query("select * from daily_trip where path_id='$pathid' and st=0");
                    if(mysql_num_rows($sel_t)>0)
                    {
                    $r_t=mysql_fetch_row($sel_t);
                    $tripid=$r_t[0];
                    $busid=$r_t[2];
                    //echo $busid;
                   //echo "bus id is $busid,$tripid";
                    //find current bus position
                    
                    $sel_pos=mysql_query("select * from dailt_trip_stop where daily_tripid='$tripid' order by id desc");
                    $r_pos=mysql_fetch_row($sel_pos);
                    $current_stop=$r_pos[3];
                    $stopid=$r_pos[4]; // to find the passanger
                    
                    //find the stop id of the bus
                    $sel_stid=mysql_query("select * from path_info where p_id='$pathid' and jn_nme='$current_stop'");
                    $r_stid=mysql_fetch_row($sel_stid);
                    $curnt_stopid=$r_stid[0];  
                    
                    if($curnt_stopid<$sourceid)
                    {
                        //echo "$busid,";
                        $sel_bus=mysql_query("select * from bus_data where bus_id='$busid'");
                        $r_bus=mysql_fetch_row($sel_bus);
                        ?>
<div class="col-lg-6">   
    <img src="Admin/bus_pic/<?php echo $r_bus[4] ?>" class="img img-responsive" />
    <center>in <?php echo $current_stop ?><br />
    Total Passengers : <?php $sel_tcb=mysql_query("select * from ticket_issue where daily_tripid='$tripid' and did>$stopid");
    if(mysql_num_rows($sel_tcb)>0) 
    {
       // echo"$tripid.$stopid";
    echo mysql_num_rows($sel_tcb); ?>
    <a href="track1.php?bid=<?php echo $r_bus[1] ?>"<b style="color: lightskyblue;font-size: larger">Track Bus</b><span style="color: red" class="glyphicon glyphicon-map-marker"></span>
    <?php
    }
    ?>
    </center></div>
                    <?php
                    }
                    }
                }
            }
        }
    }
}
 else {
    ?>
 <h1>SEARCH HERE</h1>
				<form method="post">
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
            
            function shobutton(){
                $("#sub").show();
            }
            </script>
            <table class="table table-responsive" style="border: none;">
                <tr>
                    <td>
                        <select name="stat" class="form-control show-tick" onchange="loaddis(this.value)">
                <option value="0"> source state</option>
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
                <option value="0">Destination State</option>
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
                    <input type="submit" id="sub" name="sub" value="SEARCH BUS" class="btn btn-danger" style="display: none;" />
                </center>
                    </td>
                </tr>
             </table>
        </form>    
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