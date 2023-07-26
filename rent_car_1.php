<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	$id_car=$_SESSION['ID_CAR'];
    $id_cus=$_GET['id'];
    //echo "id car = ".$id_car;
	//echo "id cust = ".$id_cus;



//save add car
if(isset($_POST['btnSimpan']))
{
    $id_user=$_SESSION['SES_ID'];
	$id_cus = $_POST['id_cus'];
    $id_car = $_POST['id_car'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$rate = $_POST['rate'];
	$insurance = $_POST['insurance'];
	$dp = $_POST['dp'];
	$deposit = $_POST['deposit'];
	$information=$_POST['information'];
	//searching car price
	$mySqla = "SELECT * FROM vehicle WHERE id_car='$id_car'";
	$myQrya = mysqli_query($koneksidb, $mySqla) or die ("Query Salah : ".mysql_error());
	$rowa = mysqli_fetch_array($myQrya);
	if ($rate=="1") {$price=$rowa['price_nondriverfull'];}
	if ($rate=="2") {$price=$rowa['price_withdriverfull'];}
	if ($rate=="3") {$price=$rowa['price_nondriverhalf'];}
	if ($rate=="4") {$price=$rowa['price_withdriverhalf'];}
	
	if (($rate=="1") || ($rate=="2"))
	{
	  $begin = new DateTime($start_date);
	  $end = new DateTime($end_date);
	  $diff = $begin->diff($end);
	  $date_number=$diff->format("%d")." days";
	  $tot_payment=($diff->format("%d")*$price)+$insurance;
	}
	if (($rate=="3") || ($rate=="4"))
	{
	  $diff = new DateTime($start_date);
	  $diff->add(new DateInterval('P12H'));
	  $date_number="12 hours";
	  $tot_payment=$price+$insurance;
	}
	$periode = date('Y').date('m');
	$tgl=Date('Y-m-d H:i:s');
	$id_tran=Date('YmdHis');
	if ($insurance=="0")
	{$insurancetp="No";}
	else
	{$insurancetp="Yes";}
	//echo $periode;
	//echo $start_date;
	
	
                        //value='1' checked='checked'/> Full day driverless RM. 
						//value='2'/> Full day with driver RM.  
						//value='3'/> Half day driverless RM.  
						//value='4'/> Half day with driver RM. 
						
    //(date_tran, rent_period, id, id_car, employee_id, insurance, price_insurance, dp, tot_payment, deposit, start_date, end_date, date_number, information, status_trans )                  
	$sql = "INSERT INTO rental
	(id_tran,date_tran, rent_period, id, id_car, employee_id, insurance, price_insurance, dp, tot_payment, deposit, start_date, end_date, date_number, information, status_trans, penalty ) 
	VALUES 
	('$id_tran','$tgl', '$periode', '$id_cus', '$id_car', '$id_user', '$insurancetp', '$insurance','$dp','$tot_payment','$deposit','$start_date','$end_date','$date_number','$information','Booked','0')";
	mysqli_query($koneksidb, $sql) or die ("Error Saving Data ".mysqli_error());
	?>
	<meta http-equiv='refresh' content='0; url=rent_car_2.php?id=<?php echo $id_tran;?>'>
	
	<?php
	
}







	
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
          <div class="col-lg-6 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>BOOKING/RENT CAR TRANSACTION</h3>
            </div>
			 <div class="form-group CVV">
														
 <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
						
						
							
							<input type="hidden"  name="id_cus" value="<?php echo $id_cus;?>" >
							<input type="hidden"  name="id_car" value="<?php echo $id_car;?>" >
							
							<div class="row">
<?php 
$sqla = "SELECT * FROM customer WHERE id='$id_cus'";
$querya = mysqli_query($koneksidb,$sqla);
$rowa=mysqli_fetch_array($querya);
?>							
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Customer Fullname</label>
                        <input type="text" required name="cust_fullname" class="form-control" value="<?php echo $rowa['cust_fullname']?>">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" required name="phone" class="form-control" value="<?php echo $rowa['phone']?>">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>ID Number</label>
                        <input type="text" required name="id_number" class="form-control" value="<?php echo $rowa['id_number']?>">
						
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Driving License</label>
                        <input type="text" required name="id_driving" class="form-control" value="<?php echo $rowa['id_driving']?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $rowa['email']?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Customer Picture</label><br>
						<img src='img/<?php	echo $rowa['cust_picture'];?>' height='100' width='100'>
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Customer Driving License</label><br>
						<img src='img/<?php	echo $rowa['cust_driving'];?>' height='100' width='100'>
                      </div>
                    </div>
					
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Address 1</label><br>
                        <?php echo $rowa['address_1']?>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Addres 2</label><br>
                        <?php echo $rowa['address_2']?>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <div class="border-head">
							<h4><b>DETAIL VEHICLE</b></h4>
						</div>
                      </div>
                    </div>
<?php 
$sqlb = "SELECT * FROM vehicle WHERE id_car='$id_car'";
$queryb = mysqli_query($koneksidb,$sqlb);
$rowa=mysqli_fetch_array($queryb);
?>						
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Car Plate</label><br>
						<?php echo $rowa['plate'];?> 
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Brand</label><br>
						<?php echo $rowa['brand'];?> 
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Model</label><br>
						<?php echo $rowa['model'];?> 
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Car Year</label><br>
						<?php echo $rowa['year'];?> 
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Transmission</label><br>
						<?php echo $rowa['transmission'];?> 
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Color</label><br>
						<?php echo $rowa['color'];?> 
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Car Picture</label><br>
						<img src='img/<?php	echo $rowa['car_picture'];?>' height='100' width='100' >
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label><b>Car Condition Assessment<br>Damage Remarks</b></label>
                      </div>
                    </div>
					<div class="col-md-3">
                      <div class="form-group">
                        <label>Front Car</label><br>
						<?php echo $rowa['cond_front'];?> 
                      </div>
                    </div>
					<div class="col-md-3">
                      <div class="form-group">
                        <label>Left Car</label><br>
						<?php echo $rowa['cond_left'];?> 
                      </div>
                    </div>
					<div class="col-md-3">
                      <div class="form-group">
                        <label>Right Car</label><br>
						<?php echo $rowa['cond_right'];?> 
                      </div>
                    </div>
					<div class="col-md-3">
                      <div class="form-group">
                        <label>Back Car</label><br>
						<?php echo $rowa['cond_back'];?> 
                      </div>
                    </div>
					
					<div class="col-md-12">
                      <div class="form-group">
                        <div class="border-head">
							<h4><b>DETAIL RENT CAR TRANSACTION</b></h4>
						</div>
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Start Date</label><br>
						<b><?php echo $_SESSION['start_date'];?></b>
						<input type="hidden" required name="start_date" class="form-control" value="<?php echo $_SESSION['start_date'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>End Date</label><br>
						<b><?php echo $_SESSION['end_date'];?></b>
						<input type="hidden" required name="end_date" class="form-control" value="<?php echo $_SESSION['end_date'];?>">
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Car Rental Rates</label><br>
                        <input type='radio' name='rate' value='1' checked='checked'/> Full day driverless RM. <?php echo $rowa['price_nondriverfull'];?><br> 
						<input type='radio' name='rate' value='2'/> Full day with driver RM. <?php echo $rowa['price_withdriverfull'];?><br> 
						<input type='radio' name='rate' value='3'/> Half day driverless RM. <?php echo $rowa['price_nondriverhalf'];?><br> 
						<input type='radio' name='rate' value='4'/> Half day with driver RM. <?php echo $rowa['price_withdriverhalf'];?> 
                      </div>
                    </div>
					<div class="col-md-3">
                      <div class="form-group">
                        <label>Including Insurance</label><br>
						<input type="text" required name="insurance" class="form-control" value="0" >
                      </div>
                    </div>
					
					<div class="col-md-3">
                      <div class="form-group">
                        <label>Downpayment [RM.]</label><br>
						<input type="text" required name="dp" class="form-control" >
                      </div>
                    </div>
					
					<div class="col-md-3">
                      <div class="form-group">
                        <label>Deposit [RM.]</label><br>
						<input type="text" required name="deposit" class="form-control" value="0" >
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Transaction Information</label><br>
						<textarea rows="4" cols="80" required name="information" class="form-control"></textarea>
                      </div>
                    </div>
					
					
					<div class="col-md-12">
                      <div class="form-group" >
							<button type="submit" name="btnSimpan" required class="btn btn-primary">Process</button>
							<a href="cars.php" class="btn btn-success" >Back</a>
                      </div>
                    </div>
					
					
							
							
								
				   
					</div>
					</div>
					</div>
		
	
			 </form>
								
						
						</div>
			 
			 
			 
             
            </div>
            <!-- /row -->
          </div>
 </div>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
    <?php
	include "footer.php";
	?>
    </footer>
    <!--footer end-->
  </section>

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