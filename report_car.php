<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	



 

$id=$_GET['id'];

	
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
	  //include ("header.php");
	  ?>
    <!-- END nav -->
    
    
 
 <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					 
	  					<div class="col-md-12 d-flex align-items-center">
	  						 
							 
							 
							 <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head"><br><br><br><br><br><br><br><br><br>
              <h3>VEHICLE DETAILS</h3>
<?php
		$sqla = "SELECT * FROM vehicle WHERE id_car='$id'";
		$querya = mysqli_query($koneksidb,$sqla);
		$rowa=mysqli_fetch_array($querya);
?>			  
            </div>
			 <div class="form-group CVV">
														
 <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
						
													
							<div class="row">
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Plate Number</label>
                        <input type="text" required name="plate" class="form-control" value="<?php echo $rowa['plate'];?>">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Brand</label>
                        <input type="text" required name="brand" class="form-control" value="<?php echo $rowa['brand'];?>">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Model</label>
                        <input type="text" required name="model" class="form-control"  value="<?php echo $rowa['model'];?>">
                      </div>
                    </div>
					<div class="col-md-2">
                      <div class="form-group">
                        <label>Year</label>
                        <input type="text" required name="year" class="form-control" value="<?php echo $rowa['year'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
					  <label>Transmission</label>
					  <input type="text" required name="year" class="form-control" value="<?php echo $rowa['transmission'];?>">
                         
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Color</label>
                        <input type="text" required name="color" class="form-control" value="<?php echo $rowa['color'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Engine Number</label>
                        <input type="text" required name="engine_number" class="form-control"  value="<?php echo $rowa['engine_number'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Frame Number</label>
                        <input type="text" required name="frame_number" class="form-control" value="<?php echo $rowa['frame_number'];?>">
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label for="">Interior Picture</label><br>
                        <img src='img/<?php	echo $rowa['pict_interior1'];?>' height='100' width='100' > 
						<img src='img/<?php	echo $rowa['pict_interior2'];?>' height='100' width='100' >
						<img src='img/<?php	echo $rowa['pict_interior3'];?>' height='100' width='100' >
						<img src='img/<?php	echo $rowa['pict_interior4'];?>' height='100' width='100' >
                      </div>
                    </div>
					
					<div class="col-md-12">
                      <div class="form-group">
                        <label for="">Exterior Picture </label><br>
                        <img src='img/<?php	echo $rowa['pict_exterior1'];?>' height='100' width='100' >
						<img src='img/<?php	echo $rowa['pict_exterior2'];?>' height='100' width='100' >
						<img src='img/<?php	echo $rowa['pict_exterior3'];?>' height='100' width='100' >
						<img src='img/<?php	echo $rowa['pict_exterior4'];?>' height='100' width='100' >
                      </div>
                    </div>
					 
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Car Picture</label><br>
                        
						<img src='img/<?php	echo $rowa['car_picture'];?>' height='100' width='100' >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Price rent non-driver Full Time [RM]</label>
                        <input type="text" required name="price_nondriverfull" class="form-control" value="<?php echo $rowa['price_nondriverfull'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Price rent with-driver Full Time [RM]</label>
                        <input type="text" required name="price_withdriverfull" class="form-control" value="<?php echo $rowa['price_withdriverfull'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Price rent Non-driver Half Time [RM]</label>
                        <input type="text" required name="price_nondriverhalf" class="form-control" value="<?php echo $rowa['price_nondriverhalf'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Price rent with-driver Half Time [RM]</label>
                        <input type="text" required name="price_withdriverhalf" class="form-control" value="<?php echo $rowa['price_withdriverhalf'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Price rent non-driver / hours [RM]</label>
                        <input type="text" required name="price_nondriverhour" class="form-control" value="<?php echo $rowa['price_nondriverhour'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Price rent with-driver / hours [RM]</label>
                        <input type="text" required name="price_withdriverhour" class="form-control" value="<?php echo $rowa['price_withdriverhour'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Car Condition Front Side</label>
                        <textarea rows="4" cols="40" required name="cond_front" class="form-control"><?php echo $rowa['cond_front'];?></textarea>
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Car Condition Left Side</label>
                        <textarea rows="4" cols="40" required name="cond_left" class="form-control"><?php echo $rowa['cond_left'];?></textarea>
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Car Condition Right Side</label>
                        <textarea rows="4" cols="40" required name="cond_right" class="form-control"><?php echo $rowa['cond_right'];?></textarea>
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Car Condition Back Side</label>
                        <textarea rows="4" cols="40" required name="cond_back" class="form-control"><?php echo $rowa['cond_back'];?></textarea>
                      </div>
                    </div>
					 

							
							
								
				   
					</div>
					</div>
					</div>
		
	
			 </form>
								
						
						</div>
			 
			 
			 
             
            </div>	 
			
			
			<div class="border-head">
              <h4>RENT SCHEDULE</h4>
			  
            </div>
			 <div class="form-group CVV">
														
							 
								<table class='table table-condensed'>
					<thead><tr>
					<th>Number</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Length of Rent</th>
					<th>Car Status</th>
					
					</tr>
					</thead>
					<tbody>
					<?php 
					$sql_a = "SELECT * FROM rental where status_trans != '0'";
                    $myQrya = mysqli_query($koneksidb,$sql_a) or die ("Query salah : ".mysql_error());
						 	 
	
                    $i=0;
                    while($rowa = mysqli_fetch_array($myQrya))
					{
						$i++;
						?>
						<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $rowa['start_date'];?></td>
						<td><?php echo $rowa['end_date'];?></td>
						<td><?php echo $rowa['date_number'];?></td>
						
						<td><?php echo $rowa['status_trans'];?></td>
						</td>
						</tr>
						<?php
					}
					?>

						
						
						
				</tbody>
				</table>
								
						
						</div>		
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
	  					</div>
	  				</div>
				</div>
  		</div>
    </section>
 
 
 
  
     


     

    

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>entz</span></a></h2>
              <p>As CaRentz sets its eyes on the coming years, the founders expect to grow the number of operations in the region as well as the number of cars the company operates</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
                <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jalan Cempaka Sd 12/5, Jalan PJU 9, Bandar Sri Damansara, 52200 Kuala Lumpur, Malaysia, Selangor, Malaysia</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+60 3-2117 8000</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">carentz@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  <?php 
  include ("footer.php");
  ?>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
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