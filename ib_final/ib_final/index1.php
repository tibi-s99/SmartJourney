<?php
include './connection.php';
if(isset($_POST['sub']))
{
    $s=$_POST['station'];
    $d=$_POST['station1'];
    //find the junction id
    
    $sel_p1=mysql_query("select distinct p_id from path_info where jn_nme='$s' || jn_nme='$d'");
    if(mysql_num_rows($sel_p1)>0)
    {
        while($r1=mysql_fetch_row($sel_p1))
        {
            $pathid=$r1[0];
            //finding the id from the table to find the bus direction
            $sel1=mysql_query("select id from path_info where p_id='$pathid' and jn_nme='$s'");
            $sel2=mysql_query("select id from path_info where p_id='$pathid' and jn_nme='$d'");
            if(mysql_num_rows($sel1)>0 && mysql_num_rows($sel2)>0)
            {
                $sid=mysql_fetch_row($sel1);
                $sourceid=$sid[0];
                $did=mysql_fetch_row($sel2);
                $destid=$did[0];
                if($sourceid<$destid)
                {
                    //find active trip
                    $sel_t=mysql_query("select * from daily_trip where path_id='$pathid' and st=0");
                    $r_t=mysql_fetch_row($sel_t);
                    $tripid=$r_t[0];
                    $busid=$r_t[2];
                    //find current bus position
                    $sel_pos=mysql_query("select * from dailt_trip_stop where daily_tripid='$tripid' order by id desc");
                    $r_pos=mysql_fetch_row($sel_pos);
                    $current_stop=$r_pos[3];
                    $stopid=$r_pos[4]; // to find the passanger
                    //find the stop id of the bus
                    $sel_stid=mysql_query("select * from path_info where p_id='$pathid' and jn_nme='$current_stop'");
                    $r_stid=mysql_fetch_row($sel_stid);
                    $curnt_stopid=$r_stid[0];                    
                    if($curnt_stopid<$sourceid)
                    {
                        $sel_bus=mysql_query("select * from bus_data where bus_id='$busid'");
                        $r_bus=mysql_fetch_row($sel_bus);
                        ?>
<div class="col-lg-4">   
    <img src="Admin/bus_pic/<?php echo $r_bus[4] ?>" class="img img-responsive" />
    Current Position : <?php echo $current_stop ?><br />
    Total Passengers : <?php $sel_tcb=mysql_query("select * from ticket_issue where daily_tripid='$tripid' and did>$stopid");
                                        echo mysql_num_rows($sel_tcb); ?>
</div>
                    <?php
                    }
                }
            }
        }
    }
}
?>
<html>
    <head>
         <script src="_Template/plugins/jquery/jquery.min.js"></script>
         <link href="_Template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <a href="login.php">LOGIN</a>
        <form method="post">
            <script>
            function loaddis(x)
            {
                $("#dd").load("getdis1.php?q="+x)
            }
            function loaddis1(x)
            {
                $("#dd1").load("getdis2.php?q="+x)
            }
            function loadst1(x)
            {
                $("#st").load("getstation1.php?did="+x);
            }
            function loadst2(x)
            {
                $("#st1").load("getstation2.php?did="+x);
            }
            </script>
            <table class="table table-hover table-responsive table-bordered table-condensed table-striped">
                <tr>
                    <td>
                        <select name="stat" class="form-control show-tick" onchange="loaddis(this.value)">
                <option value="0">Choose</option>
                <?php
                $sel_st=mysql_query("select * from state");
                while($r_st=mysql_fetch_row($sel_st))
                {
                    ?>
                <option value="<?php echo $r_st[0] ?>"><?php echo $r_st[1] ?></option>
                <?php
                }
                ?>
            </select>
                    </td>
                    <td>
                        <select name="stat" class="form-control show-tick" onchange="loaddis1(this.value)">
                <option value="0">Choose</option>
                <?php
                $sel_st=mysql_query("select * from state");
                while($r_st=mysql_fetch_row($sel_st))
                {
                    ?>
                <option value="<?php echo $r_st[0] ?>"><?php echo $r_st[1] ?></option>
                <?php
                }
                ?>
            </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span id="dd"></span>
                    </td>
                    <td>
                        <span id="dd1"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span id="st"></span>
                    </td>
                    <td>
                        <span id="st1"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                <center>
                    <input type="submit" name="sub" value="ADD ROUTE" class="btn btn-danger" />
                </center>
                    </td>
                </tr>
             </table>
        </form>
    </body>
</html>