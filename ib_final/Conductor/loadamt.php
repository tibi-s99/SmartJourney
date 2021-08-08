<?php
include '../connection.php';
$p=$_GET['p'];
$s=$_GET['s'];
$d=$_GET['d'];
$sel_amt=mysql_query("select * from fare_data where frn_jnid='$s' and to_jnid='$d' and p_id='$p'");
if(mysql_num_rows($sel_amt)>0)
{
    $r=  mysql_fetch_row($sel_amt);
    ?>
<input type="text" name="amt" class="form-control" id="amt" value="<?php echo $r[6] ?>" readonly="readonly" />
<?php
}