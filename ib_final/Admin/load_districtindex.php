<?php
include '../connection.php';
$x=$_GET['x'];


$sel_district=mysql_query("select * from bus_assign where Station_id='$x'");
if(mysql_num_rows($sel_district)>0)
{
    ?>
<select name="dist" class="form-control" required="required" onchange="loadtaluk(this.value);loaddis_hos(this.value)">
<option value="">Choose One</option>
<?php
while($r_district=mysql_fetch_row($sel_district))
{
    ?>
<option value="<?php echo $r_district[1] ?>"><?php  
                                                        
                                                      
      $n=$r_district[1];
       $qry=mysql_query("select bus_no from bus_data where bus_id='$n'");
       
$sname=mysql_result($qry,0);
    
                                                        
                                                        
                                                        echo strtoupper($sname)  ?></option>
<?php
}
?>
</select>
<?php
}
else{
    ?>
<select name="dist" class="form-control" required="required">
<option value="">Choose One</option>
  </select>
<?php
}
?>