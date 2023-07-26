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
	$id_car=$_SESSION['idcar'];
    $_SESSION['ID_CAR'] = $id_car;
	
	
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
<div class="border-head">
 
              
</div>
  	  
 
            <div class="border-head">
              <h3>RENT CAR BOOKING FORM</h3>
            </div>
			  
														
							<a href="customer_add.php" class="btn btn-warning" >Add New Customer</a>
							<a href="cars.php" class="btn btn-success">Back</a>
								<table class='table table-condensed' border='0'>
					<thead><tr>
					<th>ID</th>
					<th>Customer Full Name</th>
					<th>Phone</th>
					<th>ID Number</th>
					<th>Driving License</th>
					<th>Email</th>
					<th>Address 1</th>
					<th>Address 2</th>
					<th>Picture</th>
					<th>Booking Process</th>
					</tr>
					</thead>
					<tbody>
					<?php 
					$sql_a = "SELECT * FROM customer";
                    $myQrya = mysqli_query($koneksidb,$sql_a) or die ("Query salah : ".mysql_error());
						 	 
	
                    $i=0;
                    while($rowa = mysqli_fetch_array($myQrya))
					{
						$i++;
						?>
						<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $rowa['cust_fullname'];?></td>
						<td><?php echo $rowa['phone'];?></td>
						<td><?php echo $rowa['id_number'];?></td>
						<td><?php echo $rowa['id_driving'];?></td>
						<td><?php echo $rowa['email'];?></td>
						<td><?php echo $rowa['address_1'];?></td>
						<td><?php echo $rowa['address_2'];?></td>
						<td>
						<img src='img/<?php	echo $rowa['cust_picture'];?>' height='100' width='100' >
						</td>
						<td>
						<a href="rent_car_1.php?id=<?php echo $rowa['id'];?>" class="btn btn-success" ><i class="fa fa-edit">Booked Car</i></a>
						</td>
						</tr>
						<?php
					}
					?>

						
						
						
				</tbody>
				</table>
								
						
						 
    <footer class="site-footer">
    <?php
	include "footer.php";
	?>
    </footer>
 
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