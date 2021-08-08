<?php
session_start();
include '../connection.php';
if(isset($_SESSION['stnd']))     
{
    
}
else    
{
    header("location:../login.php");
}
$uid=$_GET['uid'];
$sel_u=mysql_query("select * from user_data where id='$uid'");
$r_u=mysql_fetch_row($sel_u);
?>
<html>
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To Administrative Portal</title>
    <!-- Favicon-->
    <link rel="icon" href="../_Template/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../_Template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../_Template/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../_Template/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../_Template/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../_Template/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../_Template/css/themes/all-themes.css" rel="stylesheet" />
    <link href="../_Template/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div  style="border: 1px solid black;">
                    <table class="table-bordered">
            <tr>
                <td colspan="3" style="background-color: black; color: white; text-align: center;">
            <center>
                <img src="../images/KSRTC-Logo.jpg" class="img img-circle" style="float: right; width: 50px;" />
                <h3>KSRTC: JOURNEY CARD</h3>
            </center>
                </td>
            </tr>
            <tr>
                <td style="width: 30%">
                    <img src="userpic/<?php echo $r_u[7] ?>" class="img img-responsive" />
                </td>
                <td>
                    <iframe src="amr\qrcode.php?id=<?php echo $r_u[10] ?>" style="border:none; height: 90px; width: 90px; float: right; margin-top: 30px; margin-right: 30px;"></iframe>
                    <b>Name :</b><br /><div style="margin-left: 10px;"><?php echo $r_u[3] ?></div>
                    <b>Address:</b><br /><div style="margin-left: 10px;"> <?php echo $r_u[4] ?></div>
                    <b>Aadhar :</b><br /><div style="margin-left: 10px;"><?php echo $r_u[1] ?></div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="background-color: red; color: white; text-align: center;">E-JOURNEY CARD</td>
            </tr>
        </table>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
        
    </body>
</html>
<script>
window.print();
</script>
