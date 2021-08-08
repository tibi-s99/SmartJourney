<?php
include("../connection.php");
$x=$_GET['x'];
$sel_acc=mysql_query("select * from vb_usr where acc_num like '%$x%' or nme like '%$x%'");
                                                    if(mysql_num_rows($sel_acc)>0){
                                                        ?>
                                                <table width="100%">
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Acc. No</td>
                                                        <td>Name</td>
                                                        <td>Acc</td>
                                                        <td>More</td>
                                                    </tr>  
                                                    <tr>
                                                        <td style="height:10px;"></td>
                                                    </tr>
                                                    <?php
                                                    $i=1;
                                                        while($r_acc=mysql_fetch_row($sel_acc)){
                                                            ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $r_acc[5] ?></td>
                                                        <td><?php echo $r_acc[1] ?></td>
                                                        <td><?php echo $r_acc[6] ?></td>
                                                        <td><a href="acc_view.php?acno=<?php echo $r_acc[5] ?>"><img src="../logo/view1.png" /></a></td>
                                                    </tr>
                                                    
                                                    <?php
                                                    $i++;
                                                        }
                                                    }
                                                    else{
                                                        echo"No Accounts Found";
                                                    }
                                                    ?>
                                                </table>
