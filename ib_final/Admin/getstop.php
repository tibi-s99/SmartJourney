<?php
include '../connection.php';
$q=$_GET['q'];
$sel_jn=mysql_query("select * from station_data where loc like '$q%' limit 5");
if(mysql_num_rows($sel_jn)>0)
{
    while($r_jn=mysql_fetch_row($sel_jn))
    {
        ?>
<div style="border: 1px solid gray; margin-bottom: 2px;padding: 3px;"><?php echo $r_jn[3] ?><span class="glyphicon glyphicon-bookmark pull-right"  style="cursor: pointer;" onclick="add_data('<?php echo $r_jn[3] ?>')"></span></div>
<?php
    }
}
else
{
    echo"No Data Found";
}