<?php

include "koneksi.php";
	

if(isset($_POST['btnSimpan']))
{
	
	$email 		= $_POST['email'];
	$key     	= $_POST['hp'];

	
			$sql = "SELECT * FROM employee  WHERE email='$email' and key_forget='$key'";
			$query = mysqli_query($koneksidb,$sql);
			$row=mysqli_fetch_array($query);
			if (isset($row['user_name']) AND isset($row['user_pass']))
{
	$id=$row['id'];
	?>
	<meta http-equiv="refresh" content="0; url=employee_new_pass.php?id=<?php echo $id;?>">
	
	<?php
	//echo '<br><div align="center"><h2>Your User Name  : '.$row['user_name'].'</h2></div>';
	//echo '<br><div align="center"><h2>Your Password  : '.$row['user_pass'].'</h2></div>';
}
else
{
	
	echo "<script>alert('Wrong Email or Forgot Key.....!');</script>";
    echo "<script>location='forget.php';</script>";
}
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

  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="" method="post" type="form" name="form" enctype="multipart/form-data">
	  
	  
        <h2 class="form-login-heading">FORGET PASSWORD</h2>
        <div class="login-wrap">
          <input type="text" name="email" class="form-control" placeholder="Your Email" autofocus>
          <br>
          <input type="text" name="hp" class="form-control" placeholder="Forgot Password Key"><br>

          <button class="btn btn-theme btn-block" name="btnSimpan" type="submit">Submit</button>
          <hr>
<div class="text-pad" align="right">
                                       <a href="index.html">
                                           Back
                                       </a>
                                        
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
</body>

</html>
