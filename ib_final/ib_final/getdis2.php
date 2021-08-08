<select name="dist" class="form-control show-tick" onchange="loadst2(this.value)">
    <option value="">destination district</option>
<?php
include 'connection.php';
$q=$_GET['q'];
$sel_dis=mysql_query("select * from district where StCode='$q'");
while($r_dis=mysql_fetch_row($sel_dis))
{
    ?>
    <option value="<?php echo $r_dis[0] ?>"><?php echo $r_dis[2] ?></option>
    <?php
}
?>
</select>