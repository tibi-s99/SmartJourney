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
$b=$_GET['b'];
$d=$_GET['d'];
$sel_bus=mysql_query("select * from bus_data where bus_id='$b'");
$r_bus=mysql_fetch_row($sel_bus);
?>
<div class="col-lg-12">
    <div class="col-lg-6">
        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
            <tr>
                <td>
                    <img src="../Admin/bus_pic/<?php echo $r_bus[4] ?>" class="img img-responsive" />
                    <br />
            <CENTER>
                    <h4><?php echo $r_bus[1] ?></h4>
                    <h4><?php echo $r_bus[2] ?></h4>
                    <h4><?php echo $r_bus[3] ?></h4>
            </center>   
                </td> 
              
            </tr>
        </table>
    </div>
    <div class="col-lg-6">
        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
            <tr>
                <td colspan="3"><center><b>COLLECTION DETAILS : <?php echo date("Y M j",  strtotime($d)); ?></b></center></td>
            </tr>
            <tr>
                <td>#</td>
                <td>Trip</td>
                <td>Collection</td>
            </tr>
            <?php
            $i=0;
            $sel_trip=mysql_query("select * from trip_data where bus_id='$b'");
            $total_trip=mysql_num_rows($sel_trip);
            while($r_trip=mysql_fetch_row($sel_trip))
            {
                $i++;
                ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $r_trip[3] ?><span class="pull-right">(<?php echo $r_trip[4] ?>)</span></td>
                <td>Rs. 
                    <?php
                    $sel_col=mysql_query("select amt from daily_trip where trip_id='$r_trip[0]' and date='$d'");
                    $r_col=mysql_fetch_row($sel_col);
                    echo $r_col[0];
                    ?>/-
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
            <tr>
                <td colspan="3"><center><b>CURRENT POSITION</b></center></td>
            </tr>
            <?php
            $sel_ftrip=mysql_query("select * from daily_trip where bus_id='$b' and st=1 and date='$d'");
            $completed=mysql_num_rows($sel_ftrip);
            $bal=$total_trip-$completed;
            if($bal==0)
            {
                ?>
            <tr>
                <td colspan="3">Completed All Trip</td>
            </tr>
            <?php
            }
            else
            {
                ?>
            <tr>
                <td colspan="3">Need to Complete <?php echo $bal ?> Trip(s)</td>
            </tr>
            <?php
            $sel_findtrip=mysql_query("select * from daily_trip where bus_id='$b' and st=0 and date='$d'");
            if(mysql_num_rows($sel_findtrip)>0)
            {
            $r_find=mysql_fetch_row($sel_findtrip);
            $path=$r_find[5];
            $sel_station=mysql_query("select * from dailt_trip_stop where daily_tripid='$r_find[0]' and dt='$d' order by id desc");
            $r_station=mysql_fetch_row($sel_station);
            $jnid=$r_station[4];
            ?>
            <tr>
                <td colspan="3">
                    Current Position : <b><?php echo $r_station[3] ?></b> <br />
                    <?php
                    $sel_nxt=mysql_query("select * from path_info where p_id='$path' and id>$jnid");
                    echo mysql_error();
                    while($r_nxt=mysql_fetch_row($sel_nxt))
                    {
                        echo $r_nxt[2]."<br />";
                    }
                    ?>
                </td>
            </tr>
            <?php
            }
            }
            ?>
        </table>
    </div>
</div>
