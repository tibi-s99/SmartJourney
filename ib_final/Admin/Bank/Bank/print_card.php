<?php
include("../connection.php");
$temp=null;
if(isset($_POST['lg'])){
    $uid=$_POST['uid'];
    $pas=$_POST['pas'];
    $sel_usr=mysql_query("select * from usr_log where usr_id='$uid' and pas='$pas'");
    if(mysql_num_rows($sel_usr)>0){
        $r_sel=mysql_fetch_row($sel_usr);
        if($r_sel[3]=="bank"){
            session_start();
            $_SESSION['bnk']=$uid;
            header("location:bank_home.php");
            
        }
        
    }
    else{
        $temp=1;
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Virtual Bank</title>
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
				
			</ul>
		</nav>
		
	</header>
<!-- / header -->
<!-- content -->
	<section id="content">
		<div class="wrapper">
			<div class="pad">
				<div class="wrapper">
					<article class="col1"><h2>Print Account Information</h2></article>
					<article class="col2 pad_left1"><h2></h2></article>
				</div>
			</div>
			<div class="box pad_bot1">
				<div class="pad marg_top">
                                    <div class="wrapper">
                                        <?php
                                        $sel_user=mysql_query("select * from vb_usr where id=".$_GET['id']);
                                        $r_usr=mysql_fetch_row($sel_user);
                                        ?>
                                        <table style="width:40%; padding: 10px; border: 1px solid black" cellspacing="10">
                                            <tr>
                                                <td colspan="2"><div style="height: 25px; font-size: large; text-align: center;color: blue;">VIRTUAL BANK ACCOUNT</div><hr /></td>
                                            </tr>
                                            <tr>
                                                <td width="50%">Account Holder Name </td>
                                                <td><?php echo $r_usr[1] ?></td>
                                            </tr>    
                                            <tr>
                                                <td width="50%">Contact </td>
                                                <td><?php echo $r_usr[3] ?></td>
                                            </tr>  
                                            <tr>
                                                <td width="50%">Email </td>
                                                <td><?php echo $r_usr[2] ?></td>
                                            </tr>    
                                            <tr>
                                                <td style="height:20px;"></td>
                                            </tr>
                                            <tr>
                                                <td width="50%"> </td>
                                                <td><b>Acc.No : <?php echo $r_usr[5] ?></b></td>
                                            </tr>    
                                            <tr>
                                                <td width="50%">Account Balance </td>
                                                <td><?php echo $r_usr[6] ?>/-</td>
                                            </tr>
                                            <tr>
                                                <td style="height:20px;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><a target="_blank" href="print.php?id=<?php echo $_GET['id'] ?>" style="float: right">Print</a></td>
                                            </tr>
                                        </table>
                                    </div>
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