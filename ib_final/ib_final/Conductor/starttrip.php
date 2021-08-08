<?php
include '../connection.php';
session_start();
$cid=$_SESSION["con"];
$rid=$_GET['rid'];
$sel_tdata=mysql_query("select * from trip_data,bus_data where bus_data.bus_id=trip_data.bus_id and trip_data.trip_id='$rid'");
$r_tdata=mysql_fetch_row($sel_tdata);
$chk_pth=mysql_query("select * from trip_info where trip_id='$rid'");
$r_pth=mysql_fetch_row($chk_pth);
$rutedataid=$r_pth[4];
$pathdataid=$r_pth[5];
$sel_rut=mysql_query("select * from route_data where rt_id='$rutedataid'");
$r_rut=mysql_fetch_row($sel_rut);
$sel_path=mysql_query("select * from path_data where p_id='$pathdataid'");
$r_path=mysql_fetch_row($sel_path);
$dt=date("Y-m-d");
$chk_tst=mysql_query("select * from daily_trip where date='$dt' and bus_id='$r_tdata[1]' and st=0");
if(mysql_num_rows($chk_tst)>0)
{    
    ?>
<span class="label label-default">Error!!! You have to Complete Previous trip </span>
<?php
}
else
{
    $ins_start=mysql_query("insert into daily_trip values('','$dt','$r_tdata[1]','$cid','$rid','$pathdataid','0','0')");

$chk_trip=mysql_query("select * from daily_trip where date='$dt' and trip_id='$r_tdata[0]'");
if(mysql_num_rows($chk_trip)>0)
{
    $r_trip=mysql_fetch_row($chk_trip);
    if($r_trip[7]==0)
    {
        ?>
<span class="label label-warning">This Trip is Going On</span>
<?php
    }
    if($r_trip[7]==1)
    {
        ?>
<span class="label label-success">The trip was Completed</span>
<?php
    }

}
else
{
    ?>
<span class="label label-danger" onclick="starttrip('<?php echo $rid ?>')" style="cursor: pointer;">Choose Trip Here</span>
<?php
}
}
?>
<table class="table table-bordered table-condensed table-hover table-responsive table-striped">
<tr>
    <td colspan="2"><center><b><?php echo $r_tdata[7] ?> - <?php echo $r_tdata[9] ?> </b>
<br />
<?php echo "$r_tdata[3]  ($r_tdata[4] ) ";?>
</center></td>
</tr>
<tr>
    <td colspan="2"><center><?php echo $r_rut[1] ?><br /><?php echo $r_path[2] ?></center></td>
</tr>
</table>
<table class="table table-bordered table-condensed table-hover table-responsive table-striped">
    <tr>
        <td>#</td>
        <td>Stop Name</td>
        <TD></TD>
    </tr>
<?php

$sel_pth=mysql_query("select * from path_info where p_id='$r_path[0]'");
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