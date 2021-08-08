<?php
ob_start();
include './connection.php';
session_start();
session_destroy();
if(isset($_POST['b1']))
{
    $em=$_POST['t1'];
    
$log=mysql_query("select * from station_data where em='$em'");
if(mysql_num_rows($log)>0)
{
    $r1=  mysql_fetch_row($log);
    $em1=$r1[7];
    $pas="ksrtc";
    
    
date_default_timezone_set('America/Toronto');
require_once('class.phpmailer.php');
$mail             = new PHPMailer();
$body             = "Your Username is <b>$em1</b> and Password is <b>$pas</b>";
$mail->IsSMTP(); 
$mail->SMTPDebug  =1;                    
$mail->SMTPAuth   = true;                 
$mail->CharSet="UTF-8";
//$mail->SMTPSecure = "tls";                 
$mail->Host       = "mail.trinitytechnology.in"; 
$mail->Port       = 25;
$mail->Username   = "web@trinitytechnology.in";  
$mail->Password   = "abc123!@#";          
$mail->SetFrom('web@trinitytechnology.in', "Smart Journey"); 
$mail->Subject    = "Password Recovery";
$mail->MsgHTML($body);
$address = "$em";
$mail->AddAddress($address, "Smart Journey");

if($mail->Send()) {
    echo"success";
}


}
else
{
    echo"invalid Email";
}
    

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Intelligent Business Analyser</title>
    <!-- Favicon-->
    <link rel="icon" href="_Template/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="_Template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="_Template/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="_Template/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="_Template/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="index.php">Business<b>Analyser</b></a>
            <small>for Transport Department</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Enter the email used for registration</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="t1" placeholder="Username" required=""placeholder="Enter the email used for registration" autofocus>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <input type="submit" name="b1" value="Login here" class="btn btn-success" />
                        </div>
                        
                    </div>
                    <center>
                            <?php
                            if(isset($_GET['error']))
                            {
                                if($_GET['error']=="1")
                                {
                                    echo"<font color='red'>Invalid User ID or Password</font>";
                                }
                            }
                            ?>
                        </center>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="_Template/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="_Template/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="_Template/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="_Template/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="_Template/js/admin.js"></script>
    <script src="_Template/js/pages/examples/sign-in.js"></script>
</body>

</html>