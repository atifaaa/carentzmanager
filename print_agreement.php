<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	
$id_tran=$_GET['id'];	
?>	
<!DOCTYPE html>
<html lang="en">

 <head>
    <title>Carentz Dashboard Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

<body>
  
	  
	  
    </header>
   
    
    <section id="main-content">
      <section class="wrapper">
	  <div class="col-lg-10 main-chart">
        <div class="border-head">
		<h2>CaRentz Management<h2>
		</div>
		<div class="border-head">
		<h5> Jalan Cempaka Sd 12/5, Jalan PJU 9, Bandar Sri Damansara, 52200 Kuala Lumpur, Malaysia, Selangor, Malaysia</h5>
		</div>
          <hr>
		  
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>RENT CAR AGREEMENT</h3>
			  
            </div>
			
			 <div class="form-group CVV">
<?php 
$sqla = "SELECT * FROM rental WHERE id_tran='$id_tran'";
$querya = mysqli_query($koneksidb,$sqla);
$rowa=mysqli_fetch_array($querya);
$id_cus=$rowa['id'];
$id_car=$rowa['id_car'];

$sqlb = "SELECT * FROM customer WHERE id='$id_cus'";
$queryb = mysqli_query($koneksidb,$sqlb);
$rowb=mysqli_fetch_array($queryb);

$sqlc = "SELECT * FROM vehicle WHERE id_car='$id_car'";
$queryc = mysqli_query($koneksidb,$sqlc);
$rowc=mysqli_fetch_array($queryc);
?>	
			      <div class="col-md-12">
				     <div class="form-group">
                        <label>
						<p align="justify">
						This Car Rental Agreement  is entered into between CaRentz Management, a Selangor corporation, located at Jalan Cempaka Sd 12/5, Jalan PJU 9, Bandar Sri Damansara, 52200 Kuala Lumpur, Malaysia, Selangor, Malaysia, CaRentz Management and <?php echo $rowb['cust_fullname'];?>,  on <?php echo date('Y-m-d');?>.
						</p>
						</label>
                      </div>
                    </div>
					
					<div class="col-md-12">
				     <div class="form-group">
                        <label><b>Rental Period and Car Description</b></label>
						<p align="justify">
						The Rental Company agrees to rent to the Renter, and the Renter agrees to rent from the Rental Company, the vehicle described as <?php echo $rowc['brand'];?>, model <?php echo $rowc['model'];?>, and plate number <?php echo $rowc['plate'];?> for the rental period commencing on <?php echo $rowa['start_date'];?> and ending on <?php echo $rowa['end_date'];?> (Rental Period = <?php echo $rowa['date_number'];?> ).
						</p>
                      </div>
                    </div>
					
					<div class="col-md-12">
				     <div class="form-group">
                        <label><b>Rental Charges and Payment Terms</b></label>
						<p align="justify">
						The Renter agrees to pay the Rental Company the rental charges specified in Schedule A attached hereto (the 'Rental Charges') for the use of the Vehicle during the Rental Period. The Renter shall pay the Rental Charges at the beginning of the Rental Period.
						</p>
                      </div>
                    </div>
					<div class="col-md-12">
				     <div class="form-group">
                        <label><b>Use of the Vehicle</b></label>
						<p align="justify">
						The Renter agrees to use the Vehicle only for the purposes of personal transportation and shall not use the Vehicle for any illegal or commercial purposes. The Renter shall not sublet, lend or otherwise part with possession of the Vehicle. The Renter shall not allow any other person to operate the Vehicle unless authorized by the Rental Company.
						</p>
                      </div>
                    </div>
					<div class="col-md-12">
				     <div class="form-group">
                        <label><b>Insurance and Liability</b></label>
						<p align="justify">
						The Rental Company shall provide insurance coverage for the Vehicle during the Rental Period. The Renter shall be liable for any loss or damage to the Vehicle caused by the Renter's negligence or wilful misconduct. The Renter shall be responsible for any damage to the Vehicle not covered by insurance.
						</p>
                      </div>
                    </div>
					<div class="col-md-12">
				     <div class="form-group">
                        <label><b>Maintenance and Repair</b></label>
						<p align="justify">
						The Rental Company shall be responsible for the regular maintenance and repair of the Vehicle during the Rental Period. The Renter shall promptly notify the Rental Company of any defects or damages to the Vehicle and shall not make any repairs or alterations to the Vehicle without the prior written consent of the Rental Company.
						</p>
                      </div>
                    </div>
					<div class="col-md-12">
				     <div class="form-group">
                        <label><b>Indemnification</b></label>
						<p align="justify">
						The Renter agrees to indemnify and hold the Rental Company harmless from and against any and all claims, damages, losses, liabilities, and expenses (including reasonable attorneys' fees) arising out of the Renter's use or possession of the Vehicle.
						</p>
                      </div>
                    </div>
					<div class="col-md-12">
				     <div class="form-group">
                        <label><b>Governing Law and Jurisdiction</b></label>
						<p align="justify">
						This Agreement shall be governed by and construed in accordance with the laws of the State of Selangor, Malaysia. Any dispute arising out of this Agreement shall be submitted to the jurisdiction of the courts of Selangor, Malaysia.
						</p>
                      </div>
                    </div> 
					<div class="col-md-12">
				     <div class="form-group">
                        <label><b>Entire Agreement</b></label>
						<p align="justify">
						This Agreement contains the entire agreement between the parties and supersedes all prior agreements and understandings, whether written or oral, relating to the subject matter of this Agreement.
						</p>
                      </div>
                    </div>
					<div class="col-md-12">
				     <div class="form-group">
                        <label><b>Amendments</b></label>
						<p align="justify">
						This Agreement may not be amended or modified except in writing signed by both parties.
						</p>
                      </div>
                    </div>
					<div class="col-md-12">
				     <div class="form-group">
                        <label><b>Binding Effect</b></label>
						<p align="justify">
						This Agreement shall be binding upon and inure to the benefit of the parties hereto and their respective successors and assigns.
						</p>
                      </div>
                    </div>
					<div class="col-md-12">
				     <div class="form-group">
                         
						<p align="justify">
						IN WITNESS WHEREOF, the parties have executed this Agreement as of the date first above written.
						</p>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
						
    I, <input type="text" name="renter_name" placeholder="Renter's Name" required>, on <input type="date" id="date" name="date" required> have read and agree to the terms and conditions of the car rental agreement.
    <br> <input type="checkbox" name="accept_terms" required> I accept the terms and conditions.
    <br> <button type="submit" class="finish-button">FINISH</button>
                  </div>
                    </div>
					 
					
					
				
														
			</div>
             
            </div>
			
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->

    
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
   
   
</body>

</html>
<script>
	window.print();
</script>
<?php
}
else
{
	include "session_warning.php";
}
?>