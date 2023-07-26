<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	$id_car=$_GET['id'];
    $_SESSION['ID_CAR'] = $id_car;
	
	
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
    <header class="header black-bg">
 
	  
	  
    </header>
 
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>RENT CAR BOOKING FORM</h3>
            </div>
			 <div class="form-group CVV">
														
							<a href="rent_car_customer_add.php" class="btn btn-warning" >Add New Customer</a>
							<a href="rent_date.php" class="btn btn-success">Back</a>
								<table class='table table-condensed'>
					<thead><tr>
					<th>ID</th>
					<th>Customer Full Name</th>
					<th>Phone</th>
					<th>ID Number</th>
					<th>Driving License</th>
					<th>Email</th>
					<th>Address 1</th>
					<th>Address 2</th>
					<th>Picture</th>
					<th>Booking Process</th>
					</tr>
					</thead>
					<tbody>
					<?php 
					$sql_a = "SELECT * FROM customer";
                    $myQrya = mysqli_query($koneksidb,$sql_a) or die ("Query salah : ".mysql_error());
						 	 
	
                    $i=0;
                    while($rowa = mysqli_fetch_array($myQrya))
					{
						$i++;
						?>
						<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $rowa['cust_fullname'];?></td>
						<td><?php echo $rowa['phone'];?></td>
						<td><?php echo $rowa['id_number'];?></td>
						<td><?php echo $rowa['id_driving'];?></td>
						<td><?php echo $rowa['email'];?></td>
						<td><?php echo $rowa['address_1'];?></td>
						<td><?php echo $rowa['address_2'];?></td>
						<td>
						<img src='img/<?php	echo $rowa['cust_picture'];?>' height='100' width='100' >
						</td>
						<td>
						<a href="rent_car_1.php?id=<?php echo $rowa['id'];?>" class="btn btn-success" ><i class="fa fa-edit"> Booking Car</i></a>
						</td>
						</tr>
						<?php
					}
					?>

						
						
						
				</tbody>
				</table>
								
						
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