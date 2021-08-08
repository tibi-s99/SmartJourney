<?php
include '../connection.php';
$x=$_GET['x'];
$t=$_GET['t'];
$jn=  explode(",", $x);
$sel_user=mysql_query("select * from user_data,ticket_issue where user_data.qrcode=ticket_issue.qr_id and ticket_issue.daily_tripid='$t' and ticket_issue.did='$jn[0]'");
if(mysql_num_rows($sel_user)>0)
{
    $i=0;
    ?>
<table class="table table-bordered">
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Address</td>
        <td>Contact</td>
    </tr>
    <?php
    while($r_u=mysql_fetch_row($sel_user))
    {
        $i++;
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $r_u[3] ?></td>
        <td><?php echo $r_u[4] ?></td>
        <td><?php echo $r_u[5] ?></td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
}
?>