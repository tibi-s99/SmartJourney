<table class="table table-bordered table-condensed table-hover table-responsive table-striped">
    <tr>
        <td>#</td>
        <td>Stop Name</td>
        <TD></TD>
    </tr>
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
$rid=$_GET['rid'];
$sel_pth=mysql_query("select * from path_info where p_id='$rid'");
if(mysql_num_rows($sel_pth)>0)
{
    $i=0;
    $dis=0;
    while($r_pt=mysql_fetch_row($sel_pth))
    {
        $i++;
        $dis+=$r_pt[3];
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $r_pt[2] ?></td>
        <td><?php echo $dis ?> KM</td>
    </tr>
    <?php
    }
}
?>
</table>