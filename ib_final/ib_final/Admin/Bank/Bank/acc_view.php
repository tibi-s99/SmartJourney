<?php
include("../connection.php");
if(isset($_POST['Dep_c'])){
    $acno=$_POST['acno'];
    $amt=$_POST['amt'];
    $dt=date('Y-m-d');
    $ins_dep=mysql_query("insert into vb_cdepo values('','Deposit','$acno','$amt','$dt','Cash Deposit','1')");
    if($ins_dep>0){
        $up_amt=mysql_query("update vb_usr set acc_amt=acc_amt+$amt where acc_num='$acno'");
        if($up_amt>0){
            header("location:bank_home.php");
        }        
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
                            <li class="alpha"><a href="bank_home.php"><span><span>Home</span></span></a></li>
				<li><a href="cash_depo.php"><span><span>Deposit Cash</span></span> </a></li>
				<li><a href="cash_tran.php"><span><span>Money Transfer Request</span></span></a></li>				
                                <li class="omega"><a href="../login.php"><span><span>Logout</span></span></a></li>
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
					<article class="col1"><h2>Account History :: <?php echo $_GET['acno'] ?></h2></article>
					<article class="col2 pad_left1"><h2>Search Account</h2></article>
				</div>
			</div>
			<div class="box pad_bot1">
				<div class="pad marg_top">
					<article class="col1">
                                            <?php
                                            $sel_acc=mysql_query("select * from vb_usr where acc_num = '".$_GET['acno']."'");
                                            $r_acc=mysql_fetch_row($sel_acc);
                                            
                                            ?>
                                            <table width="80%">
                                                <tr>
                                                    <td colspan="2"><div style="padding: 8px; background-color: blue; color: white"><center><b>Mr./Mrs.<?php echo $r_acc[1] ?></b></center></div></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?php echo $r_acc[2] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Contact</td>
                                                    <td><?php echo $r_acc[3] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Account Balance</td>
                                                    <td><?php echo $r_acc[6] ?>/-</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><div style="padding: 8px; background-color: darksalmon;"><center><b>Transfer Information</b></center></div></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                    <?php
                                                    $sel_more=mysql_query("select * from vb_cdepo where amt_to='".$_GET['acno']."' or amt_frm='".$_GET['acno']."'");
                                                    if(mysql_num_rows($sel_more)>0){
                                                        ?>
                                                        <table width="100%">
                                                            <tr>
                                                                <td><b>Amount From</b></td>
                                                                <td><b>Amount To</b></td>
                                                                <td><b>Date</b></td>
                                                                <td><b>Cr</b></td>
                                                                <td><b>Dr</b></td>
                                                            </tr>
                                                        <?php
                                                        while($r_more=mysql_fetch_row($sel_more))
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php 
                                                                    if($r_more[1]!=$_GET['acno']){
                                                                    echo $r_more[1]; 
                                                                    }
                                                                     ?>
                                                                </td>
                                                                <td>
                                                                    <?php 
                                                                    if($r_more[2]!=$_GET['acno']){
                                                                    echo $r_more[2]; 
                                                                    }
                                                                     ?>
                                                                </td>
                                                                <td><?php echo $r_more[4] ?></td>
                                                                <td> <?php 
                                                                    if($r_more[1]!=$_GET['acno']){
                                                                    echo $r_more[3]; 
                                                                    }
                                                                     ?></td>
                                                                <td> <?php 
                                                                    if($r_more[2]!=$_GET['acno']){
                                                                    echo $r_more[3]; 
                                                                    }
                                                                     ?></td>
                                                            </tr>                                                                
                                                        <?php
                                                        }
                                                    }
                                                    else{
                                                        echo"No data";
                                                    }
                                                    ?>
                                                        </table> 
                                                    </td>
                                                </tr>
                                            </table>
					</article>
					<article class="col2 pad_left1">
						<div class="wrapper">
                                                    <input onkeyup="loadinfo(this.value)" type="text" name="ac_no" placeholder="Account Number or name" style="height:25px; width:250px; box-shadow: 2px 5px 2px black; border:1px solid black;" />
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
                                                    $sel_acc=mysql_query("select * from vb_usr limit 15");
                                                    if(mysql_num_rows($sel_acc)>0){
                                                        ?>
                                                <table width="100%">
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Acc. No</td>
                                                        <td>Name</td>
                                                        <td>Acc</td>
                                                      
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

</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>