
<select name="station" class="form-control show-tick">
<option value="0">source station</option>
<?php
include 'connection.php';
$did=$_GET['did'];
$sel_st=mysql_query("select * from station_data where district='$did'");
if(mysql_num_rows($sel_st)>0)
{
    while($r_st=mysql_fetch_row($sel_st))
    {
        
        
        ?>
<option value="<?php echo $r_st[3] ?>"><?php echo $r_st[3] ?></option>
<?php
    }
}
?>
<

/select>

