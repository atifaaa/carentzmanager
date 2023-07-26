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
    
 
     
    <div id="login-page">
    <div class="container">
      <form class="form-login" action="login_hint_cek.php" method="post">
        <h2 class="form-login-heading">PASSWORD HINT </h2>
        <div class="login-wrap">
          <input type="password" name="verification" class="form-control" placeholder="Your Hint Password " autofocus>
          <br>

          <button class="btn btn-theme btn-block" type="submit">Submit</button>
          <hr>
<div class="text-pad" align="right">
                                       
                                        
                                    </div>
        <!-- Modal -->

        <!-- modal -->
      </form>
    </div>
  </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="css/jquery.min.js"></script>
  <script src="css/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="css/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
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
<?php
}
else
{
	include "session_warning.php";
}
?>