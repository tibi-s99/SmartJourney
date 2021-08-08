<?php
include("../connection.php");
$temp=null;
if(isset($_POST['lg'])){
    $uid=$_POST['uid'];
    $pas=$_POST['pas'];
    $sel_usr=mysql_query("select * from usr_log where usr_id='$uid' and usr_pas='$pas'");
    if(mysql_num_rows($sel_usr)>0)
        {
        $r_sel=mysql_fetch_row($sel_usr);
        if($r_sel[3]=="bank")
            {
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
			
		</nav>
		
	</header>
<!-- / header -->
<!-- content -->
	<section id="content">
		<div class="wrapper">
			<div class="pad">
				<div class="wrapper">
					<article class="col1"><h2>Virtual Bank Login</h2></article>
					<article class="col2 pad_left1"><h2></h2></article>
				</div>
			</div>
			<div class="box pad_bot1">
				<div class="pad marg_top">
                                    <div class="wrapper">
                                        <article class="col1">
		<form id="ContactForm" method="post">
							<div>
								<div class="wrapper">
                                                                    <div class="bg"><input class="input" type="text" name="uid"></div>User ID:
								</div>
								<div class="wrapper">
                                                                    <div class="bg"><input class="input" type="password" name="pas"></div>Password:
								</div>
								<div class="wrapper">
                                                                    <div class="bg"><input type="submit" value="Login" name="lg"></div>
								</div>
							<?php
                                                        if(isset($temp)){
                                                        echo"Invalid Informations";    
                                                        
                                                        }
                                                        ?>
							</div>
						</form>	
                                            </article>
                                    </div>
				</div>
			</div>
			<div class="wrapper pad_bot4">
				
			</div>
		</div>
	</section>
<!-- / content -->
<!-- footer -->
	
<!-- / footer -->
</div>
<script type="text/javascript"> Cufon.now(); </script>

</body>
</html>