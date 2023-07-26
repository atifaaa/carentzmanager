<?php

include "koneksi.php";
if(isset($_POST['btnSimpan']))
{
$id= $_POST['id'];
$newpass= md5($_POST['newpass']);
	
	$sql = "UPDATE employee set user_pass='$newpass' where id='$id'";
			mysqli_query($koneksidb, $sql) or die ("Error Saving Data ".mysqli_error());
		echo "<meta http-equiv='refresh' content='0; url=index.html'>";
	


}





$id=$_GET['id'];

	
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
	    
	  
        <h2 class="form-login-heading">NEW PASSWORD</h2>
        <div class="login-wrap">
		<?php
		$sqla = "SELECT * FROM employee WHERE id='$id'";
		$querya = mysqli_query($koneksidb,$sqla);
		$rowa=mysqli_fetch_array($querya);
		?>
		  <input type="hidden"  name="id" value="<?php echo $rowa['id'];?>" >
          <input type="text" name="newpass" class="form-control" placeholder="Your New Password" autofocus>
          <br>

          <button class="btn btn-theme btn-block" name="btnSimpan" type="submit">Submit</button>
          <hr>
<div class="text-pad" align="right">
                                       <a href="forget.php">
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



