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
$employee_id= $_POST['employee_id'];
$first_name= $_POST['first_name'];
$last_name= $_POST['last_name'];
$phone= $_POST['phone'];
$email= $_POST['email'];
$user_name= $_POST['user_name'];
$user_pass= md5($_POST['user_pass']);
$forget_pass= $_POST['forget_pass'];




	
	$sql = "INSERT INTO employee 
	(employee_id, first_name, last_name, phone, email, user_name, user_pass, key_forget) 
	VALUES 
	('$employee_id', '$first_name', '$last_name', '$phone', '$email', '$user_name', '$user_pass','$forget_pass')";

		mysqli_query($koneksidb, $sql) or die ("Error Saving Data ".mysqli_error());
		echo "<meta http-equiv='refresh' content='0; url=employee.php'>";
	


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
		<section class="ftco-section">
					<div class="container">
        <div class="row">
          <div class="col-lg-6 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>ADD EMPLOYEE</h3>
            </div>
			 <div class="form-group CVV">
														
 <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
						
						
							
							<input type="hidden"  name="id" value="<?php echo $_SESSION["SES_ID"]?>" >
							
							<div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Employee ID</label>
                        <input type="text" required name="employee_id" class="form-control">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" required name="first_name" class="form-control">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" required name="last_name" class="form-control">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" required name="phone" class="form-control">
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" required name="email" class="form-control">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>User Name</label>
                        <input type="text" required name="user_name" class="form-control">
						
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>User Password</label>
						<input type="text" required name="user_pass" class="form-control">
                        
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Password Hint</label>
						<input type="text" required name="forget_pass" class="form-control">
                        
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