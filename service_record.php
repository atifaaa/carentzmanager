<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	
	
	
	
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
    <!-- END nav -->
    
     

      


    

    

		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	
            <h2 class="mb-3">Service Records</h2>
          </div>
        </div>
		
		 <div class="form-group CVV">
														
							 
								<table class='table table-condensed'>
					<thead><tr>
					<th>ID</th>
					<th>Plate</th>
					<th>Brand</th>
					<th>Model</th>
					<th>Year</th>
					<th>Transmission</th>
					<th>Mileage Service Schedule</th>
					<th>Picture</th>
					<th>Service Information</th>
					</tr>
					</thead>
					<tbody>
					<?php 
					$sql_a = "SELECT * FROM vehicle";
                    $myQrya = mysqli_query($koneksidb,$sql_a) or die ("Query salah : ".mysql_error());
						 	 
	
                    $i=0;
                    while($rowa = mysqli_fetch_array($myQrya))
					{
						$i++;
						?>
						<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $rowa['plate'];?></td>
						<td><?php echo $rowa['brand'];?></td>
						<td><?php echo $rowa['model'];?></td>
						<td><?php echo $rowa['year'];?></td>
						<td><?php echo $rowa['transmission'];?></td>
						<td><?php echo $rowa['service_odometer'];?></td>
						<td>
						<img src='img/<?php	echo $rowa['car_picture'];?>' height='100' width='100' >
						
						</td>
						<td>
						<a href="service_car_add.php?id=<?php echo $rowa['id_car'];?>" class="btn btn-info btn-sm update"><i class="fa fa-snapchat-ghost"></i> Service</a>
						<a href="service_car_history.php?id=<?php echo $rowa['id_car'];?>" class="btn btn-info btn-sm update" target="_blank"><i class="fa fa-first-order"></i> History</a>
						
						</td>
						</tr>
						<?php
					}
					?>

						
						
						
				</tbody>
				</table>
								
						
						</div>
		
		
		
		
		
		
		
		
		
				 
		</section>

		 
 

    <footer class="ftco-footer ftco-bg-dark ftco-section">
 
          
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  <?php 
  include ("footer.php");
  ?>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
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