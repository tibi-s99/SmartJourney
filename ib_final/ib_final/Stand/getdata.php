<?php
include"../connection.php";
$a=$_GET['q'];
$sel=mysql_query("select * from  staff_data where uid ='$a'");
if (mysql_num_rows($sel)>0)
{
   
        ?>
<div>
    <?php
    echo "<font color='red'>Already exists</font>";
    ?>
</div>
    
    
    <?php
}
?>