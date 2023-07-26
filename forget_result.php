<?php

include "koneksi.php";
	$email 		= $_POST['email'];
	$hp     	= $_POST['hp'];

	
			$sql = "SELECT * FROM employee  WHERE email='$email' and phone='$hp'";
			$query = mysqli_query($koneksidb,$sql);
			$row=mysqli_fetch_array($query);
			if (isset($row['user_name']) AND isset($row['user_pass']))
{
	$username=$row['user_name'];
	$userpass=$row['user_pass'];
}
else
{
	$username="Wrong Email";
	$userpass="Wrong Phone Number";
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
	  
        <h2 class="form-login-heading">RESULT FOR SEARCHING</h2>
        <div class="login-wrap">
		   Your user name was : <br>
          <input type="text" name="email" class="form-control" value="<?php echo $username;?>" autofocus>
          <br>
		  Your password was : <br>
          <input type="text" name="hp" class="form-control" value="<?php echo $userpass;?>"><br>

          
          <hr>
<div class="text-pad" align="right">
                                       <a href="index.html">
                                           Home
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
