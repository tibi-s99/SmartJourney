<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from jollythemes.com/html/jollymedic/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Nov 2016 11:13:49 GMT -->
<head>
   
  
<script type="text/javascript" src="cam/llqrcode.js"></script>
<script type="text/javascript" src="cam/plusone.js"></script>
<script type="text/javascript" src="cam/webqr.js"></script>


  

</head>
<body>
<h3>Find Your Medical Report Here</h3>
                        <form method="post">
                            <table class="table table-bordered table-striped table-hover table-responsive">
                            <tr>
                                
                                <td><center>
                                    <img class="selector" id="qrimg" src="cam.png" onclick="setimg()"/>
                                <div id="outdiv">
                                </div></center>
                            <input type="text" name="rslt" id="result" onfocus="loadchk12()" />
                            </td>
                            </tr>
                           
                            <tr style="display: none;">
                                <td colspan="2"><center><input type="submit" name="sub" value="Find My REPORT" class="btn btn-success" /></center></td>
                            </tr>
                            <canvas id="qr-canvas" width="800" height="600"></canvas>
<script type="text/javascript">load();</script>
                            <script>
                                function loadchk1()
                                {
                                    var code=document.getElementById("result").value;
                                    window.location.href = "report1.php?report=1&code=" +code ;
                                }
                                </script>
                            
                            </table>
                        </form>
                               
                                                                                
                                                                            </form>
                    </div>
                    
                
				

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end white-wrapper -->
    
    
	
    

	
	
    
</body>

<!-- Mirrored from jollythemes.com/html/jollymedic/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Nov 2016 11:13:49 GMT -->
</html>