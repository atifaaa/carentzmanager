<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	






//save add car
if(isset($_POST['btnSimpan']))
{
$id= $_POST['id'];
$cust_fullname= $_POST['cust_fullname'];
$phone= $_POST['phone'];
$id_number= $_POST['id_number'];
$id_driving= $_POST['id_driving'];
$email= $_POST['email'];
$address_1= $_POST['address_1'];
$address_2= $_POST['address_2'];

$cust_pict= $_FILES['cust_pict']['name'];
$pict_tmp_cust= $_FILES['cust_pict']['tmp_name'];
$pict_name_cust=time()."_".$cust_pict;
move_uploaded_file($pict_tmp_cust,"img/".$pict_name_cust);

if ($cust_pict <> '')	
{
	$sql = "UPDATE customer set cust_fullname='$cust_fullname', 
								phone='$phone', 
								id_number='$id_number', 
								id_driving='$id_driving', 
								email='$email', 
								address_1='$address_1', 
								address_2='$address_2',
								cust_picture='$pict_name_cust' where id='$id'";
}
else
{
	$sql = "UPDATE customer set cust_fullname='$cust_fullname', 
								phone='$phone', 
								id_number='$id_number', 
								id_driving='$id_driving', 
								email='$email', 
								address_1='$address_1', 
								address_2='$address_2' where id='$id'";
}	
		mysqli_query($koneksidb, $sql) or die ("Error Saving Data ".mysqli_error());
		echo "<meta http-equiv='refresh' content='0; url=customer.php'>";
	


}





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
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
 
	  
	  
    </header>
 
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
  	<section class="ftco-section">
		
			<div class="container">
        <div class="row">
          <div class="col-lg-6 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>EDIT CUSTOMER DATA</h3>
            </div>
			 <div class="form-group CVV">
												
<?php
		$sqla = "SELECT * FROM customer WHERE id='$id'";
		$querya = mysqli_query($koneksidb,$sqla);
		$rowa=mysqli_fetch_array($querya);
?>
 <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
						
						
							
							<input type="hidden"  name="id" value="<?php echo $rowa['id'];?>" >
							
							<div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Customer Fullname</label>
                        <input type="text" required name="cust_fullname" class="form-control" value="<?php echo $rowa['cust_fullname'];?>">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" required name="phone" class="form-control" value="<?php echo $rowa['phone'];?>">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>ID Number</label>
                        <input type="text" required name="id_number" class="form-control" value="<?php echo $rowa['id_number'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Driving License</label>
                        <input type="text" required name="id_driving" class="form-control" value="<?php echo $rowa['id_driving'];?>">
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" required name="email" class="form-control" value="<?php echo $rowa['email'];?>">
                      </div>
                    </div>
					
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Address 1</label>
                        <textarea rows="2" cols="80" required name="address_1" class="form-control"><?php echo $rowa['address_1'];?></textarea>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Addres 2</label>
                        <textarea rows="2" cols="80" required name="address_2" class="form-control"><?php echo $rowa['address_2'];?></textarea>
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Customer Picture</label>
                        <input type="file" name="cust_pict" class="btn btn-fill btn-success" id="picture" >
						<img src='img/<?php	echo $rowa['cust_picture'];?>' height='100' width='100' >
                      </div>
                    </div>
					 
					
					<div class="col-md-12">
                      <div class="form-group" >
							<button type="submit" name="btnSimpan" required class="btn btn-fill btn-primary">Edit Data</button>
							
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