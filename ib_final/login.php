<?php
ob_start();
include './connection.php';
session_start();
session_destroy();
if(isset($_POST['sub']))
{
    $un=$_POST['un'];
    $pas=$_POST['pas'];
    $chk_login=mysql_query("select * from user_login where uid='$un' and pwd='$pas'");
    if(mysql_num_rows($chk_login)>0)
    {
        session_start();
        $r_login=mysql_fetch_row($chk_login);
        if($r_login[3]=="admin")
        {
            $_SESSION['adm']=$un;
            header("location:Admin\\index.php");
        }
        
        if($r_login[3]=="stand")
        {
            $_SESSION['stnd']=$un;
            header("location:Stand\\index.php");
        }
        if($r_login[3]=="conductor")
        {
            $_SESSION['con']=$un;
            header("location:Conductor\\index.php");
        }
         if($r_login[3]=="checker")
        {
            $_SESSION['chek']=$un;
            header("location:Checker\\index.php");
        }
    }
    else
    {
        header("location:login.php?error=1");
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
            <a href="javascript:void(0);">Business<b>Analyser</b></a>
            <small>for Transport Department</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="un" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pas" placeholder="Password" required>
                           
                        </div>
                        <br/>
                        <br/>
                        <a href="pass.php"> <span style="float: right;color: lightskyblue">Forget Password?</span></a>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <input type="submit" name="sub" value="Login here" class="btn btn-success" />
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