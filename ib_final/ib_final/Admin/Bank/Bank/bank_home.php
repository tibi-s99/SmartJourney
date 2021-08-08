<?php
include("../connection.php");
if(isset($_POST['add_acc'])){
    $nme=$_POST['nme'];
    $em=$_POST['em'];
    $con=$_POST['con'];
    $addr=$_POST['addr'];
    $acc_num1="0123456789";
    $acc_num2=  str_shuffle($acc_num1);
    $acc_p1=  substr($acc_num2, 5,3);
    
    $acc_num3=  str_shuffle($acc_num1);
    $acc_p2=  substr($acc_num3, 5,3);
    
    $p3=mysql_query("select num from  vb_acno");
    $p3_1=mysql_fetch_row($p3);
    $acc_p3=$p3_1[0];
    
    $acc_num="$acc_p1-$acc_p2-$acc_p3";
    
    $pwd=rand(11111,9999);
    $pwd1=  str_shuffle($pwd);
    
    $ins_acc=mysql_query("insert into vb_usr values('','$nme','$em','$con','$addr','$acc_num','0','$pwd1')");
    $id=  mysql_insert_id();
    if($ins_acc>0){
        $up=mysql_query("update vb_acno set num=num+1");
        if($up>0){
            header("location:print_card.php?id=$id");
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
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
                                                    <script type="text/javascript">
                                                      /*  function chknum(e)
                                                        {
                                                            var code=e.which || e.keycode;
                                                            if(code>=47 $$ code<=58)
                                                            {
                                                                return true;
                                                            }
                                                            else
                                                            {
                                                                return false;
                                                            }
                                                        }*/                                                        </script>

    <script>
        function chknum(x)
        {
         var k=x.length;
         var ch2=/([0-9])$/;
         if(ch2.test(x)==false)
         {
             document.getElementById("o3").innerHTML="<font color='red'>ONLY NUMBERS</font>";
             return false;
             
             
         }
         else
         {
             document.getElementById("o3").innerHTML=""; 
         }
        }
    </script>
   
                                                        
        
    
<title>Virctual Bank</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_700.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_600.font.js"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
	<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
</head>

<body id="page4">
<div class="main">
<!-- header -->
	<header>
		<div class="wrapper">
			<h1><a href="index.php" id="logo">Virtual Bank</a></h1>
			
		</div>
		<nav>
			<ul id="menu">
                            <li id="menu_active" class="alpha"><a href="bank_home.php"><span><span>Home</span></span></a></li>
				<li><a href="cash_depo.php"><span><span>Deposit Cash</span></span> </a></li>
				<li><a href="cash_tran.php"><span><span>Money Transfer Request</span></span></a></li>				
                                <li class="omega"><a href="logout.php"><span><span>Logout</span></span></a></li>
			</ul>
		</nav>
		<div class="wrapper">
			<div class="text">
				<span class="text1">Start<span>Account Here</span></span>
				<a href="#" class="button">Now!!!</a>
			</div>
		</div>
	</header>
<!-- / header -->
<!-- content -->
	<section id="content">
		<div class="wrapper">
			<div class="pad">
				<div class="wrapper">
					<article class="col1"><h2>New Account</h2></article>
					<article class="col2 pad_left1"><h2>Search Account</h2></article>
				</div>
			</div>
			<div class="box pad_bot1">
				<div class="pad marg_top">
					<article class="col1">
                                            <form id="ContactForm" method="post">
							<div>
								<div class="wrapper">
                                                                    <div class="bg"><input class="input" type="text" required="required" name="nme"></div>Name:
								</div>
								<div class="wrapper">
                                                                    <div class="bg"><input class="input" type="email" required="required" name="em" id="em1" onblur="emm()"><br /></div>Email:
								</div><span id="rslt"></span>
                                                                <div class="wrapper">
                                                                    <div class="bg"><input class="input" type="text" onblur="chknum(this.value)" required="required" name="con"maxlength="10"></div>Contact:
                                                                    <span id="o3"></span>
								</div>                                                                
								<div class="wrapper">
                                                                    <div class="bg2"><textarea name="addr" required="required"></textarea></div>Address:
								</div>
                                                            
                                                            <input type="submit" style="width: 150px; padding: 10px; background-color: green; color: white" name="add_acc" value="Create Account" />
								
							</div>
						</form>
					</article>
					<article class="col2 pad_left1">
						<div class="wrapper">
                                                    <input onkeyup="loadinfo(this.value)" type="text" name="ac_no" placeholder="Account Number for search" style="height:25px; width:250px; box-shadow: 2px 5px 2px black; border:1px solid black;" />
						</div><br />
                                                <script type="text/javascript">
                                                    function loadinfo(x){
                                                        var xhttp = new XMLHttpRequest();
                                                                xhttp.onreadystatechange = function() {
                                                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                                                    document.getElementById("ac_info").innerHTML = xhttp.responseText;
                                                                    }
                                                                };
                                                                xhttp.open("GET", "loadusr.php?x="+x, true);
                                                                xhttp.send();
                                                    }
                                                    </script>
						<h3>Available Account</h3>
                                                <span id="ac_info">
                                                <p class="pad_bot3">
                                                    
                                                    <?php
                                                    $sel_acc=mysql_query("select * from vb_usr");
                                                    if(mysql_num_rows($sel_acc)>0){
                                                        ?>
                                                <table width="100%">
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Acc. No</td>
                                                        <td>Name</td>
                                                        <td>Acc</td>
                                                        <td>More</td>
                                                    </tr>  
                                                    <tr>
                                                        <td style="height:10px;"></td>
                                                    </tr>
                                                    <?php
                                                    $i=1;
                                                        while($r_acc=mysql_fetch_row($sel_acc)){
                                                            ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $r_acc[5] ?></td>
                                                        <td><?php echo $r_acc[1] ?></td>
                                                        <td><?php echo $r_acc[6] ?></td>
                                                        <td><a href="acc_view.php?acno=<?php echo $r_acc[5] ?>">Go</a></td>
                                                    </tr>
                                                    
                                                    <?php
                                                    $i++;
                                                        }
                                                    }
                                                    else{
                                                        echo"No Accounts Found";
                                                    }
                                                    ?>
                                                </table>
                                                        </span>
                                                </p>
					</article>
				</div>
			</div>
			<div class="wrapper pad_bot4">
				
			</div>
		</div>
	</section>
<!-- / content -->
<!-- footer -->
	<footer>
		<a rel="nofollow" href="#" target="_blank">Website </a> designed by Trinity Technologies<br>
	</footer>
<!-- / footer -->
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>