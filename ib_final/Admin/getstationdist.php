<?php
include '../connection.php';
$x=$_GET['q'];
$sel_st=mysql_query("select * from station_data where district='$x'");
if(mysql_num_rows($sel_st)>0)
{
    ?>
<table class="table table-bordered table-condensed table-hover table-striped">
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Station Code</td>
        <td></td>
    </tr>
    <?php
    $i=0;
    while($r_st=mysql_fetch_row($sel_st))
    {
        $i++;
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo strtoupper($r_st[3]) ?></td>
        <td><?php echo $r_st[5] ?></td>
        <td>
            <?php
            if($r_st[4]==1)
            {
                ?>
            <a href="stationdetails.php?<?php echo $r_st[5] ?>"><span class="glyphicon glyphicon-eye-open" style="color:blue;"></span></a>
            <?php
            }
            else
            {
                ?>
            <span class="glyphicon glyphicon-eye-open" style="color:ash;"></span>
            <?php
            }
            ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
}
?>