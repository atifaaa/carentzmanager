<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	$_SESSION['start_date'] = $_POST['start_date'];
    $_SESSION['end_date'] = $_POST['end_date'];
	$dta=$_POST['start_date'];
	
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
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
 
	  
	  
    </header>
 
 
   <section class="ftco-section">
		
			<div class="container">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>AVAILABLE CAR STOCK FOR <?PHP echo $_SESSION['start_date'];?> To <?PHP echo $_SESSION['end_date'];?></h3>
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
					<th>Price Non-Driver</th>
					<th>Price With-Driver</th>
					<th>Picture</th>
					<th>Booking Process</th>
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
						<td>
						<?php 
						echo "1. Full Time RM.".$rowa['price_nondriverfull']."<br>";
						echo "2. Hall Time RM.".$rowa['price_nondriverhalf']."<br>";
						echo "3. Per-Hours RM.".$rowa['price_nondriverhour']."<br>";
						?>
						</td>
						<td>
						<?php
						echo "1. Full Time RM.".$rowa['price_withdriverfull']."<br>";
						echo "2. Hall Time RM.".$rowa['price_withdriverhalf']."<br>";
						echo "3. Per-Hours RM.".$rowa['price_withdriverhour']."<br>";
						?>
						</td>
						<td>
						<img src='img/<?php	echo $rowa['car_picture'];?>' height='100' width='100' >
						
						</td>
						<td>
						<?php
						$id_car=$rowa['id_car'];
						//echo $dta;
						$searchdt = New DateTime($dta);
						//DECLARE report_date date=Date($dta);
						//SET report_date = new DateTime($dta);
						//$sql_b = "SELECT * FROM rental where id_car='$id_car' and status_trans != 'Finished' and start_date >= new datetime('$searchdt') and end_date <= new datetime('$searchdt')";
						//$sql_b = "SELECT * FROM rental where id_car='$id_car' and $searchdt BETWEEN start_date >= '2023-06-08 06:05:00'";
						//$sql_b = "SELECT * FROM rental where id_car='$id_car' and '2023-06-08 06:05:00' BETWEEN start_date and end_date";
						$sql_b = "SELECT * FROM rental where id_car='$id_car' and status_trans != 'Finished' and ' . $ searchdt . ' BETWEEN start_date and end_date";
						$myQryb = mysqli_query($koneksidb,$sql_b) or die ("Query salah : ".mysql_error());
						$rowb=mysqli_fetch_array($myQryb);
						 
							if (empty($rowb['id_car']))
							{
								
								?>
								  <a href="report_car.php?id=<?php echo $rowa['id_car'];?>" class="btn btn-info" target="_blank"><i class="fa fa-snapchat-ghost"></i> Car Detail</a>
								  <br>
								  <a href="rent_car_book.php?id=<?php echo $rowa['id_car'];?>" class="btn btn-success" ><i class="fa fa-first-order"></i> Booking Form</a>
								
								<?php
							}
							else
							{
								echo $rowb['status_trans'];
							}
						
						
						?>
						
						
						</td>
						</tr>
						<?php
					}
					?>

						
						
						
				</tbody>
				</table>
								
						
						</div>
			 
			 
			 
             
            </div>
            <!-- /row -->
          </div>
  </div>
    </section>
    <!--main content end-->
    <!--footer start-->
    <?php
	include "footer.php";
	?>
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
<?php
}
else
{
	include "session_warning.php";
}
?>