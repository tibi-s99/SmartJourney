<?php
include("../connection.php");
                                        $sel_user=mysql_query("select * from vb_usr where id=".$_GET['id']);
                                        $r_usr=mysql_fetch_row($sel_user);
                                        ?>
                                        <table style="width:70%; padding: 10px; border: 1px solid black" cellspacing="10">
                                            <tr>
                                                <td colspan="2"><div style="height: 25px; font-size: large; text-align: center;color: blue;">VIRCTUAL BANK ACCOUNT</div><hr /></td>
                                            </tr>
                                            <tr>
                                                <td width="50%">Account Holder Name </td>
                                                <td><?php echo $r_usr[1] ?></td>
                                            </tr>    
                                            <tr>
                                                <td width="50%">Contact </td>
                                                <td><?php echo $r_usr[3] ?></td>
                                            </tr>  
                                            <tr>
                                                <td width="50%">Email </td>
                                                <td><?php echo $r_usr[2] ?></td>
                                            </tr>    
                                            <tr>
                                                <td style="height:20px;"></td>
                                            </tr>
                                            <tr>
                                                <td width="50%"> </td>
                                                <td><b>Acc.No : <?php echo $r_usr[5] ?></b></td>
                                            </tr>    
                                            <tr>
                                                <td width="50%">Account Balance </td>
                                                <td><?php echo $r_usr[6] ?>/-</td>
                                            </tr>
                                            <tr>
                                                <td style="height:20px;"></td>
                                            </tr>
                                            
                                        </table><script>
                                        window.print();
                                        </script>