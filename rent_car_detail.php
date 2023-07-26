<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	
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
<?php 
include "header.php";
?>
	  
	  
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
     <?php 
	 include "left.php";
	 ?>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>CAR DETAIL</h3>
            </div>
			 <div class="form-group CVV">
														
							 
								<table class='table table-condensed'>
					<thead><tr>
					<th>Plate</th>
					<th>Brand</th>
					<th>Model</th>
					<th>Year</th>
					<th>Color</th>
					<th>Transmission</th>
					<th>Picture</th>
					</tr>
					</thead>
					<tbody>
					<?php 
					$sql_a = "SELECT * FROM vehicle where id_car='$id'";
                    $myQrya = mysqli_query($koneksidb,$sql_a) or die ("Query salah : ".mysql_error());
                    $rowa = mysqli_fetch_array($myQrya);
					$id=$rowa['id_car'];
						?>
						<tr>

						<td><?php echo $rowa['plate'];?></td>
						<td><?php echo $rowa['brand'];?></td>
						<td><?php echo $rowa['model'];?></td>
						<td><?php echo $rowa['year'];?></td>
						<td><?php echo $rowa['color'];?></td>
						<td><?php echo $rowa['transmission'];?></td>
						<td>
						<img src='img/<?php	echo $rowa['car_picture'];?>' height='100' width='100' >
						</td>
						</tr>
				</tbody>
				</table>
			 <div class="border-head"><h3>INTERIOR PICTURE</h3></div>
			 <div class="form-group CVV">
														
							 
								<table class='table table-condensed'>
					
						<tr>
						<td>
						<img src='img/<?php	echo $rowa['pict_interior1'];?>' height='100' width='100' >
						</td>
						<td>
						<img src='img/<?php	echo $rowa['pict_interior2'];?>' height='100' width='100' >
						</td>
						<td>
						<img src='img/<?php	echo $rowa['pict_interior3'];?>' height='100' width='100' >
						</td>
						<td>
						<img src='img/<?php	echo $rowa['pict_interior4'];?>' height='100' width='100' >
						</td>
						</tr>
				</tbody>
				</table>
			</div>
			 <div class="border-head"><h3>EXTERIOR PICTURE</h3></div>
			 <div class="form-group CVV">
														
							 
								<table class='table table-condensed'>
					
						<tr>
						<td>
						<img src='img/<?php	echo $rowa['pict_exterior1'];?>' height='100' width='100' >
						</td>
						<td>
						<img src='img/<?php	echo $rowa['pict_exterior2'];?>' height='100' width='100' >
						</td>
						<td>
						<img src='img/<?php	echo $rowa['pict_exterior3'];?>' height='100' width='100' >
						</td>
						<td>
						<img src='img/<?php	echo $rowa['pict_exterior4'];?>' height='100' width='100' >
						</td>
						</tr>
				</tbody>
				</table>
			</div>	
<div class="border-head"><h3>CAR BODY CONDITION</h3></div>
			 <div class="form-group CVV">
								<table class='table table-condensed'>						
							 <thead><tr>
					<th>Front</th>
					<th>Left</th>
					<th>Right</th>
					<th>Back</th>
					</tr>
					</thead>
					<tbody>
								
					
						<tr>
						<td>
						<?php	echo $rowa['cond_front'];?> 
						</td>
						<td>
						<?php	echo $rowa['cond_left'];?> 
						</td>
						<td>
						<?php	echo $rowa['cond_right'];?> 
						</td>
						<td>
						<?php	echo $rowa['cond_back'];?> 
						</td>
						</tr>
				</tbody>
				</table>
			</div>				
						
						
						
<div class="border-head">
              <h4>RENT SCHEDULE</h4>
			  <hr>
            </div>
			 <div class="form-group CVV">
														
							 
								<table class='table table-condensed'>
					<thead><tr>
					<th>Number</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Length of Rent</th>
					<th>Car Status</th>
					
					</tr>
					</thead>
					<tbody>
					<?php 
					$sql_a = "SELECT * FROM rental where status_trans != '0'";
                    $myQrya = mysqli_query($koneksidb,$sql_a) or die ("Query salah : ".mysql_error());
						 	 
	
                    $i=0;
                    while($rowa = mysqli_fetch_array($myQrya))
					{
						$i++;
						?>
						<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $rowa['start_date'];?></td>
						<td><?php echo $rowa['end_date'];?></td>
						<td><?php echo $rowa['date_number'];?></td>
						<td>
						<td><?php echo $rowa['status_trans'];?></td>
						</td>
						</tr>
						<?php
					}
					?>

						
						
						
				</tbody>
				</table>
								
						
						</div>						
			 
			 <a href="rent_car_book.php?id=<?php echo $id;?>" class="btn btn-success" ><i class="fa fa-first-order"></i> Booking Car</a>
			 
             
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