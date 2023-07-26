<?php
$koneksidb=mysqli_connect("localhost","root","","carentz");	






//save add car
if(isset($_POST['btnSimpan']))
{
$employee_id= $_POST['employee_id'];
$first_name= $_POST['first_name'];
$last_name= $_POST['last_name'];
$phone= $_POST['phone'];
$email= $_POST['email'];
$user_name= $_POST['user_name'];
$user_pass = password_hash($_POST['user_pass'], PASSWORD_DEFAULT);
$forget_pass= $_POST['forget_pass'];




	
	$sql = "INSERT INTO employee 
	(employee_id, first_name, last_name, phone, email, user_name, user_pass, key_forget) 
	VALUES 
	('$employee_id', '$first_name', '$last_name', '$phone', '$email', '$user_name', '$user_pass','$forget_pass')";

		mysqli_query($koneksidb, $sql) or die ("Error Saving Data ".mysqli_error($koneksidb));
		echo "<meta http-equiv='refresh' content='0; url=index.html'>";
	


}







	
?>	
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Carentz Dashboard Management System</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
 
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
    <section id="main-content">
      <section class="wrapper">
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
						<input type="password" required name="user_pass" class="form-control">
                        
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
			 
			 <a href="Index.html" class="btn btn-warning" >Back</a>
			 
             
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
 
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
