<select name="pt" class="form-control" onchange="loadway(this.value)">
    <option>Choose Path</option>
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
$sel_pth=mysql_query("select * from path_data where rt_id='$rid'");
if(mysql_num_rows($sel_pth)>0)
{
    while($r_pt=mysql_fetch_row($sel_pth))
    {
        ?>
    <option value="<?php echo $r_pt[0] ?>"><?php echo $r_pt[2] ?></option>
    <?php
    }
}
?>
</select>