<?php
include("../connection.php");
if(isset($_POST['Dep_c'])){
    $acno=$_POST['acno'];
    $amt=$_POST['amt'];
    $dt=date('Y-m-d');
    $ins_dep=mysql_query("insert into vb_cdepo values('','My Self','$acno','$amt','$dt','Cash Deposit','1')");
    echo mysql_error();
    if($ins_dep>0){
        $up_amt=mysql_query("update vb_usr set acc_amt=acc_amt+$amt where acc_num='$acno'");
        if($up_amt>0){
            header("location:cash_depo.php");
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
				<li id="menu_active"><a href="cash_depo.php"><span><span>Deposit Cash</span></span> </a></li>
				<li><a href="cash_tran.php"><span><span>Money Transfer Request</span></span></a></li>				
                                <li class="omega"><a href="../../../logout.php"><span><span>Logout</span></span></a></li>
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
					<article class="col1"><h2>Deposit Cash</h2></article>
					<article class="col2 pad_left1"><h2>Search Account</h2></article>
				</div>
			</div>
			<div class="box pad_bot1">
				<div class="pad marg_top">
					<article class="col1">
                                            <form id="ContactForm" method="post">
							<div>
								<div class="wrapper">
                                                                    <div class="bg"><input class="input" type="text"maxlength="11" name="acno"></div>Acc. No:
								</div>
								<div class="wrapper">
                                                                    <div class="bg"><input class="input" type="text" name="amt"></div>Amount:
								</div>
                                                                
                                                            
                                                            <input type="submit" style="width: 150px; padding: 10px; background-color: green; color: white" name="Dep_c" value="Deposit Cash" />
								
							</div>
						</form>
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

</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>