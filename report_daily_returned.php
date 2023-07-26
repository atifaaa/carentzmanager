<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	
 
 
  
$tgl= date("Y-m-d");
$st= "2";

//echo $tgl;
//echo "<br>";
//echo $st;
 
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
     
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
            
						
<div class="border-head">
<h1><b>Car Rental Daily Reports</b></h1>
</div>
<div class="form-group CVV">
														
							 
			 <div class="col-md-12">
				  
                      <div class="form-group">
                         <h2><b>Status : Car Will Return </b></h2>
						
						<table class='table table-condensed'>
					<thead><tr>
					<th>No.</th>
					<th>Transaction</th>
					<th>Date</th>
					<th>Customers Name</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Rental Time</th>
					<th>Car Plate</th>
					<th>Car Model</th>
					<th>Deposit</th>
					<th>Down Payment</th>
					<th>Cost</th>
					<th>Fine</th>
					<th>Status</th>
					</tr>
					</thead>
					<tbody>
					<?php 
					if ($st=="0")
					{
					  $sql_a = "SELECT rental.*, customer.*, vehicle.* FROM rental INNER JOIN customer ON rental.id=customer.id INNER JOIN vehicle ON rental.id_car=vehicle.id_car where rental.date_tran='$tgl'";
					}
					if ($st=="1")
					{
					  $sql_a = "SELECT rental.*, customer.*, vehicle.* FROM rental INNER JOIN customer ON rental.id=customer.id INNER JOIN vehicle ON rental.id_car=vehicle.id_car where rental.status_trans='Booked' and date(rental.date_tran)='$tgl'";
					}
					if ($st=="2")
					{
					  $sql_a = "SELECT rental.*, customer.*, vehicle.* FROM rental INNER JOIN customer ON rental.id=customer.id INNER JOIN vehicle ON rental.id_car=vehicle.id_car where rental.status_trans='Used' and date(rental.end_date)='$tgl'";
					}
					if ($st=="3")
					{
					  $sql_a = "SELECT rental.*, customer.*, vehicle.* FROM rental INNER JOIN customer ON rental.id=customer.id INNER JOIN vehicle ON rental.id_car=vehicle.id_car where rental.status_trans='Finished' and rental.end_date='$tgl'";
					}
                    $myQrya = mysqli_query($koneksidb,$sql_a) or die ("Query salah : ".mysql_error());
						 	 
	
                    $i=0;
					$tot_pay=0;
					$tot_fine=0;
                    while($rowa = mysqli_fetch_array($myQrya))
					{
						$i++;
						?>
						<tr>
						<td><?php echo $i;?></td>
						<td><a href="report_tran.php?id=<?php echo $rowa['id_tran'];?>" target="_blank"><?php echo $rowa['id_tran'];?></a></td>
						<td><?php echo $rowa['date_tran'];?></td>
						<td><a href="report_cust.php?id=<?php echo $rowa['id'];?>" target="_blank"><?php echo $rowa['cust_fullname'];?></a></td>
						<td><?php echo $rowa['start_date'];?></td>
						<td><?php echo $rowa['end_date'];?></td>
						<td><?php echo $rowa['date_number'];?></td>
						<td><a href="report_car.php?id=<?php echo $rowa['id_car'];?>" target="_blank"><?php echo $rowa['plate'];?></a></td>
						<td><?php echo $rowa['model'];?></td>
						<td><?php echo $rowa['deposit'];?></td>
						<td><?php echo $rowa['dp'];?></td>
						<td><?php 
						echo $rowa['tot_payment'];
						$tot_pay=$tot_pay+$rowa['tot_payment'];
						?></td>
						<td><?php echo $rowa['penalty'];
						$tot_fine=$tot_fine+$rowa['penalty'];
						?></td>
						<td><?php echo $rowa['status_trans'];?></td>
						 
						
						</tr>
						<?php
					}
					?>

						 						
						
				</tbody>
				</table>
                      </div>
                    </div>
					 
					
								
						
</div>						
			 
			 
			 
             
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          
      </section>
     
    <!--main content end-->

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
<script>
	window.print();
</script>
<?php
}
else
{
	include "session_warning.php";
}
?>