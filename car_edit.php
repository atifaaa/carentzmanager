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
	
$id_car= $_POST['id_car'];
$plate= $_POST['plate'];
$brand= $_POST['brand'];
$model= $_POST['model'];
$year= $_POST['year'];
$transmission= $_POST['transmission'];
$color= $_POST['color'];
$engine_number= $_POST['engine_number'];
$frame_number= $_POST['frame_number'];

$pict_interior1= $_FILES['pict_interior1']['name'];
$pict_tmp_interior1= $_FILES['pict_interior1']['tmp_name'];
$pict_name_interior1=time()."_".$pict_interior1;
move_uploaded_file($pict_tmp_interior1,"img/".$pict_name_interior1);

$pict_interior2= $_FILES['pict_interior2']['name'];
$pict_tmp_interior2= $_FILES['pict_interior2']['tmp_name'];
$pict_name_interior2=time()."_".$pict_interior2;
move_uploaded_file($pict_tmp_interior2,"img/".$pict_name_interior2);

$pict_interior3= $_FILES['pict_interior3']['name'];
$pict_tmp_interior3= $_FILES['pict_interior3']['tmp_name'];
$pict_name_interior3=time()."_".$pict_interior3;
move_uploaded_file($pict_tmp_interior3,"img/".$pict_name_interior3);

$pict_interior4= $_FILES['pict_interior4']['name'];
$pict_tmp_interior4= $_FILES['pict_interior4']['tmp_name'];
$pict_name_interior4=time()."_".$pict_interior4;
move_uploaded_file($pict_tmp_interior4,"img/".$pict_name_interior4);



$pict_exterior1= $_FILES['pict_exterior1']['name'];
$pict_tmp_exterior1= $_FILES['pict_exterior1']['tmp_name'];
$pict_name_exterior1=time()."_".$pict_exterior1;
move_uploaded_file($pict_tmp_exterior1,"img/".$pict_name_exterior1);

$pict_exterior2= $_FILES['pict_exterior2']['name'];
$pict_tmp_exterior2= $_FILES['pict_exterior2']['tmp_name'];
$pict_name_exterior2=time()."_".$pict_exterior2;
move_uploaded_file($pict_tmp_exterior2,"img/".$pict_name_exterior2);

$pict_exterior3= $_FILES['pict_exterior3']['name'];
$pict_tmp_exterior3= $_FILES['pict_exterior3']['tmp_name'];
$pict_name_exterior3=time()."_".$pict_exterior3;
move_uploaded_file($pict_tmp_exterior3,"img/".$pict_name_exterior3);

$pict_exterior4= $_FILES['pict_exterior4']['name'];
$pict_tmp_exterior4= $_FILES['pict_exterior4']['tmp_name'];
$pict_name_exterior4=time()."_".$pict_exterior4;
move_uploaded_file($pict_tmp_exterior4,"img/".$pict_name_exterior4);


$car_picture= $_FILES['car_picture']['name'];
$pict_tmp_car_picture= $_FILES['car_picture']['tmp_name'];
$pict_name_car_picture=time()."_".$car_picture;
move_uploaded_file($pict_tmp_car_picture,"img/".$pict_name_car_picture);

$price_nondriverfull= $_POST['price_nondriverfull'];
$price_withdriverfull= $_POST['price_withdriverfull'];
$price_nondriverhalf= $_POST['price_nondriverhalf'];
$price_withdriverhalf= $_POST['price_withdriverhalf'];
$price_nondriverhour= $_POST['price_nondriverhour'];
$price_withdriverhour= $_POST['price_withdriverhour'];
$cond_front= $_POST['cond_front'];
$cond_left= $_POST['cond_left'];
$cond_right= $_POST['cond_right'];
$cond_back= $_POST['cond_back'];

	
	
	//pict_interior1, pict_interior2, pict_interior3, pict_interior4, pict_exterior1, pict_exterior2, pict_exterior3, pict_exterior4, car_picture
	//'$pict_name_interior1', '$pict_name_interior2', '$pict_name_interior3', '$pict_name_interior4', '$pict_name_exterior1', '$pict_name_exterior2', '$pict_name_exterior3', '$pict_name_exterior4', '$pict_name_car_picture'
	
	
	$sql = "UPDATE vehicle set plate='$plate', 
								brand='$brand', 
								model='$model', 
								year='$year', 
								transmission='$transmission', 
								color='$color', 
								engine_number='$engine_number',
								frame_number='$frame_number',
								price_nondriverfull='$price_nondriverfull',
								price_withdriverfull='$price_withdriverfull',
								price_nondriverhalf='$price_nondriverhalf',
								price_withdriverhalf='$price_withdriverhalf',
								price_nondriverhour='$price_nondriverhour',
								price_withdriverhour='$price_withdriverhour',
								cond_front='$cond_front',
								cond_left='$cond_left',
								cond_right='$cond_right',
								cond_back='$cond_back' where id_car='$id_car'";
	mysqli_query($koneksidb, $sql) or die ("Error Saving Data ".mysqli_error());
	echo "<meta http-equiv='refresh' content='0; url=cars.php'>";
	
								//pict_interior1=$pict_name_interior1, 
								//pict_interior2=$pict_name_interior2, 
								//pict_interior3=$pict_name_interior3, 
								//pict_interior4=$pict_name_interior4, 
								//pict_exterior1=$pict_name_exterior1, 
								//pict_exterior2=$pict_name_exterior2, 
								//pict_exterior3=$pict_name_exterior3, 
								//pict_exterior4=$pict_name_exterior4, 
								//car_picture=$pict_name_car_picture,
		
	


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
     
<?php 
include "header.php";
?>
	  
	  
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
     
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
              <h3>EDIT VEHICLE</h3>
<?php
		$sqla = "SELECT * FROM vehicle WHERE id_car='$id'";
		$querya = mysqli_query($koneksidb,$sqla);
		$rowa=mysqli_fetch_array($querya);
?>			  
            </div>
			 <div class="form-group CVV">
														
 <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
						
						
							
							<input type="hidden"  name="id" value='<?php echo $_SESSION["SES_ID"];?>'>
							<input type="hidden"  name="id_car" value='<?php echo $id;?>'>
							
							<div class="row">
                    
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Plate Number</label>
                        <input type="text" required name="plate" class="form-control" value="<?php echo $rowa['plate'];?>">
                      </div>
                    </div>
					
					<div class="col-md-12">
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
                        <label>Transmission : </label> <?php echo $rowa['transmission'];?><br>
						
						<select name="transmission">
						<option value="Manual">Manual</option>
						<option value="Automatic">Automatic</option>
						
						</select>
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
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Interior Picture 1</label>
                        <input type="file" name="pict_interior1" class="btn btn-fill btn-success" id="picture" value='img/<?php	echo $rowa['pict_interior1'];?>'>
						<img src='img/<?php	echo $rowa['pict_interior1'];?>' height='100' width='100' >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Interior Picture 2</label>
                        <input type="file" name="pict_interior2" class="btn btn-fill btn-success" id="picture" value='img/<?php echo $rowa['pict_interior2'];?>'>
						<img src='img/<?php	echo $rowa['pict_interior2'];?>' height='100' width='100' >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Interior Picture 3</label>
                        <input type="file" name="pict_interior3" class="btn btn-fill btn-success" id="picture" value='img/<?php	echo $rowa['pict_interior3'];?>'>
						<img src='img/<?php	echo $rowa['pict_interior3'];?>' height='100' width='100' >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Interior Picture 4</label>
                        <input type="file" name="pict_interior4" class="btn btn-fill btn-success" id="picture" value='img/<?php	echo $rowa['pict_interior4'];?>'>
						<img src='img/<?php	echo $rowa['pict_interior4'];?>' height='100' width='100' >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Exterior Picture 1</label>
                        <input type="file" name="pict_exterior1" class="btn btn-fill btn-success" id="picture" value='img/<?php	echo $rowa['pict_exterior1'];?>'>
						<img src='img/<?php	echo $rowa['pict_exterior1'];?>' height='100' width='100' >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Exterior Picture 2</label>
                        <input type="file" name="pict_exterior2" class="btn btn-fill btn-success" id="picture" value='img/<?php	echo $rowa['pict_exterior2'];?>'>
						<img src='img/<?php	echo $rowa['pict_exterior2'];?>' height='100' width='100' >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Exterior Picture 3</label>
                        <input type="file" name="pict_exterior3" class="btn btn-fill btn-success" id="picture" value='img/<?php	echo $rowa['pict_exterior3'];?>'>
						<img src='img/<?php	echo $rowa['pict_exterior3'];?>' height='100' width='100' >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Exterior Picture 4</label>
                        <input type="file" name="pict_exterior4" class="btn btn-fill btn-success" id="picture" value='img/<?php	echo $rowa['pict_exterior4'];?>'>
						<img src='img/<?php	echo $rowa['pict_exterior4'];?>' height='100' width='100' >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Car Picture</label>
                        <input type="file" name="car_picture" class="btn btn-fill btn-success" id="picture" value='img/<?php echo $rowa['car_picture'];?>'>
						<img src='img/<?php	echo $rowa['car_picture'];?>' height='100' width='100' >
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent non-driver Full Time [RM]</label>
                        <input type="text" required name="price_nondriverfull" class="form-control" value="<?php echo $rowa['price_nondriverfull'];?>">
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent with-driver Full Time [RM]</label>
                        <input type="text" required name="price_withdriverfull" class="form-control" value="<?php echo $rowa['price_withdriverfull'];?>">
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent Non-driver Half Time [RM]</label>
                        <input type="text" required name="price_nondriverhalf" class="form-control" value="<?php echo $rowa['price_nondriverhalf'];?>">
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent with-driver Half Time [RM]</label>
                        <input type="text" required name="price_withdriverhalf" class="form-control" value="<?php echo $rowa['price_withdriverhalf'];?>">
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent non-driver / hours [RM]</label>
                        <input type="text" required name="price_nondriverhour" class="form-control" value="<?php echo $rowa['price_nondriverhour'];?>">
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent with-driver / hours [RM]</label>
                        <input type="text" required name="price_withdriverhour" class="form-control" value="<?php echo $rowa['price_withdriverhour'];?>">
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Car Condition Front Side</label>
                        <textarea rows="4" cols="80" required name="cond_front" class="form-control"><?php echo $rowa['cond_front'];?></textarea>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Car Condition Left Side</label>
                        <textarea rows="4" cols="80" required name="cond_left" class="form-control"><?php echo $rowa['cond_left'];?></textarea>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Car Condition Right Side</label>
                        <textarea rows="4" cols="80" required name="cond_right" class="form-control"><?php echo $rowa['cond_right'];?></textarea>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Car Condition Back Side</label>
                        <textarea rows="4" cols="80" required name="cond_back" class="form-control"><?php echo $rowa['cond_back'];?></textarea>
                      </div>
                    </div>
					 
					
					<div class="col-md-12">
                      <div class="form-group" >
							<button type="submit" name="btnSimpan" required class="btn btn-fill btn-primary">Submit</button>
							
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
          <!-- /col-lg-9 END SECTION MIDDLE -->
          
   
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