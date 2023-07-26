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
	

	
	
	
$id_car = $_POST['id_car '];
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

	
	$sql = "INSERT INTO vehicle 
	(plate, brand, model, year, transmission, color, engine_number, frame_number, pict_interior1, pict_interior2, pict_interior3, pict_interior4, pict_exterior1, pict_exterior2, pict_exterior3, pict_exterior4, car_picture, price_nondriverfull, price_withdriverfull, price_nondriverhalf, price_withdriverhalf, price_nondriverhour, price_withdriverhour, cond_front, cond_left, cond_right, cond_back) 
	VALUES 
	('$plate', '$brand', '$model', '$year', '$transmission', '$color', '$engine_number', '$frame_number', '$pict_name_interior1', '$pict_name_interior2', '$pict_name_interior3', '$pict_name_interior4', '$pict_name_exterior1', '$pict_name_exterior2', '$pict_name_exterior3', '$pict_name_exterior4', '$pict_name_car_picture', '$price_nondriverfull', '$price_withdriverfull', '$price_nondriverhalf', '$price_withdriverhalf', '$price_nondriverhour', '$price_withdriverhour', '$cond_front', '$cond_left', '$cond_right', '$cond_back')";

		mysqli_query($koneksidb, $sql) or die ("Error Saving Data ".mysqli_error());
		echo "<meta http-equiv='refresh' content='0; url=cars.php'>";
	


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
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
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
              <h3>ADD NEW CAR</h3>
            </div>
			 <div class="form-group CVV">
														
 <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
						
						
							
							<input type="hidden"  name="id" value="<?php echo $_SESSION["SES_ID"]?>" >
							
							<div class="row">
                    
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Plate Number</label>
                        <input type="text" required name="plate" class="form-control">
                      </div>
                    </div>
					
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Brand</label>
                        <input type="text" required name="brand" class="form-control">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Model</label>
                        <input type="text" required name="model" class="form-control">
                      </div>
                    </div>
					<div class="col-md-2">
                      <div class="form-group">
                        <label>Year</label>
                        <input type="text" required name="year" class="form-control">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Transmission</label>
						<select name="transmission">
						<option value="Manual">Manual</option>
						<option value="Automatic">Automatic</option>
						
						</select>
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Color</label>
                        <input type="text" required name="color" class="form-control">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Engine Number</label>
                        <input type="text" required name="engine_number" class="form-control">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Frame Number</label>
                        <input type="text" required name="frame_number" class="form-control">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Interior Picture 1</label>
                        <input type="file" name="pict_interior1" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Interior Picture 2</label>
                        <input type="file" name="pict_interior2" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Interior Picture 3</label>
                        <input type="file" name="pict_interior3" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Interior Picture 4</label>
                        <input type="file" name="pict_interior4" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Exterior Picture 1</label>
                        <input type="file" name="pict_exterior1" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Exterior Picture 2</label>
                        <input type="file" name="pict_exterior2" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Exterior Picture 3</label>
                        <input type="file" name="pict_exterior3" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="">Exterior Picture 4</label>
                        <input type="file" name="pict_exterior4" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Car Picture</label>
                        <input type="file" name="car_picture" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent non-driver Full Time [RM]</label>
                        <input type="text" required name="price_nondriverfull" class="form-control">
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent with-driver Full Time [RM]</label>
                        <input type="text" required name="price_withdriverfull" class="form-control">
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent Non-driver Half Time [RM]</label>
                        <input type="text" required name="price_nondriverhalf" class="form-control">
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent with-driver Half Time [RM]</label>
                        <input type="text" required name="price_withdriverhalf" class="form-control">
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent non-driver / hours [RM]</label>
                        <input type="text" required name="price_nondriverhour" class="form-control">
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group">
                        <label>Price rent with-driver / hours [RM]</label>
                        <input type="text" required name="price_withdriverhour" class="form-control">
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Car Condition Front Side</label>
                        <textarea rows="4" cols="80" required name="cond_front" class="form-control"></textarea>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Car Condition Left Side</label>
                        <textarea rows="4" cols="80" required name="cond_left" class="form-control"></textarea>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Car Condition Right Side</label>
                        <textarea rows="4" cols="80" required name="cond_right" class="form-control"></textarea>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Car Condition Back Side</label>
                        <textarea rows="4" cols="80" required name="cond_back" class="form-control"></textarea>
                      </div>
                    </div>
					 
					
					<div class="col-md-12">
                      <div class="form-group" >
							<button type="submit" name="btnSimpan" required class="btn btn-fill btn-primary">Submit</button>
							
							<a href="cars.php" class="btn btn-warning">Back</a>
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
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
   
   
</body>

</html>
<?php
}
else
{
	include "session_warning.php";
}
?>