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
$t=$_GET['t'];
$sel_chk=mysql_query("select * from staff_assign where bus_id='$b' and typ='$t'");
if(mysql_num_rows($sel_chk)>0)
{
    ?>
<div class="btn btn-warning">ALREADY ASSIGNED</div>
<?php
}
 else {
?>
<input type="submit" name="ass_bs" value="ASSIGN NOW" class="btn btn-sm btn-danger" />
<?php
}
$seld=mysql_query("select * from staff_assign,staff_data where staff_data.uid=staff_assign.stf_id and staff_assign.bus_id='$b' and staff_assign.typ='1'");
$rd=  mysql_fetch_row($seld);
echo "<br />DRIVER : $rd[6]";
$selc=mysql_query("select * from staff_assign,staff_data where staff_data.uid=staff_assign.stf_id and staff_assign.bus_id='$b' and staff_assign.typ='2'");
$rc=  mysql_fetch_row($selc);
echo "<br />CONDUCTOR : $rc[6]";