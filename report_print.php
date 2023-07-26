<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	
$periode=$_POST['periode'];	
$tahun=substr($periode,0,4);
$bulan=substr($periode,5,2);
$search=$tahun.$bulan;

if ($bulan=="01"){$nmbulan="January";}
if ($bulan=="02"){$nmbulan="February";}
if ($bulan=="03"){$nmbulan="March";}
if ($bulan=="04"){$nmbulan="April";}
if ($bulan=="05"){$nmbulan="May";}
if ($bulan=="06"){$nmbulan="June";}
if ($bulan=="07"){$nmbulan="July";}
if ($bulan=="08"){$nmbulan="August";}
if ($bulan=="09"){$nmbulan="September";}
if ($bulan=="10"){$nmbulan="October";}
if ($bulan=="11"){$nmbulan="November";}
if ($bulan=="12"){$nmbulan="December";}

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
        	  <?php 
	  include ("header.php");
	  ?>

		<section class="ftco-section">
		
			<div class="container">
        <div class="row">
		<h2> CaRentz Management<h2>
		<h5> Jalan Cempaka Sd 12/5, Jalan PJU 9, Bandar Sri Damansara, 52200 Kuala Lumpur, Malaysia, Selangor, Malaysia</h5>
		<hr>
          <div class="col-lg-16 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>FINANCIAL REPORT FOR MONTHLY STATEMENTS</h3>
			  
			  
            </div>
			
			 <div class="form-group CVV">

			      <div class="col-md-16">
				  
                      <div class="form-group">
                        <label><b>
						<?php 
						echo "Report Period : ".$nmbulan." ".$tahun;
						?>
						</b></label>
						
						<table class='table table-condensed'>
					<thead><tr>
					<th>No.</th>
					<th>Transaction</th>
					<th>Date</th>
					<th>Customers Name</th>
					<th>Car Rental Time</th>
					<th>Car Plate</th>
					<th>Car Model</th>
					<th>The Amount of Cost</th>
					<th>Fine Amount</th>
					</tr>
					</thead>
					<tbody>
					<?php 
					
					$sql_a = "SELECT rental.*, customer.*, vehicle.* FROM rental INNER JOIN customer ON rental.id=customer.id INNER JOIN vehicle ON rental.id_car=vehicle.id_car where rental.rent_period='$search'";
                    $myQrya = mysqli_query($koneksidb,$sql_a) or die ("Query salah : ".mysql_error());
						 	 
	
                    $i=0;
					$tot_pay=0;
					$tot_fine=0;
                    while($rowa = mysqli_fetch_array($myQrya))
					{
						$i++;
						
						?>
						<tr>
						<td><?php echo $i;?></td>
						<td><a href="report_tran.php?id=<?php echo $rowa['id_tran'];?>" target="_blank"><?php echo $rowa['id_tran'];?></a></td>
						<td><?php echo $rowa['date_tran'];?></td>
						<td><a href="report_cust.php?id=<?php echo $rowa['id'];?>" target="_blank"><?php echo $rowa['cust_fullname'];?></a></td>
						<td><?php echo $rowa['date_number'];?></td>
						<td><a href="report_car.php?id=<?php echo $rowa['id_car'];?>" target="_blank"><?php echo $rowa['plate'];?></a></td>
						<td><?php echo $rowa['model'];?></td>
						<td><?php 
						echo $rowa['tot_payment'];
						$tot_pay=$tot_pay+$rowa['tot_payment'];
						?></td>
						<td><?php echo $rowa['penalty'];
						$tot_fine=$tot_fine+$rowa['penalty'];
						?></td>
						</tr>
						<?php
					}
					?>

						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><b>Amount RM.</b></td>
						<td><?php echo $tot_pay;?></td>
						<td><?php echo $tot_fine;?></td>
						</tr>	
<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><b>Total Income RM.</b></td>
						<td></td>
						<td><b><?php echo $tot_pay+$tot_fine;?></b></td>
						</tr>							
						
				</tbody>
				</table>
                      </div>
                    </div>
					 
					
					
					<div class="col-md-6">
                      <div class="form-group">
                         <a href="report_printout.php?id=<?php echo $periode;?>" class="btn btn-primary" target="_BLANK">Print Report</a>
						 <br><br><br><br><br><br>
                      </div>
                    </div>
				
														
			</div>
             
            </div>
			
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          
      </div>
    </section>
    <!--main content end-->
    <!--footer start-->

    
    </footer>
    <!--footer end-->
 
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

<?php
}
else
{
	include "session_warning.php";
}
?>