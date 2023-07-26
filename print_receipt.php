<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	
$id_tran=$_GET['id'];	
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
  
	  
	  
    </header>
   
    
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
		
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
			<div class="border-head">
		<h2> CaRentz Management<h2>
		</div>
		<div class="border-head">
		<h5> Jalan Cempaka Sd 12/5, Jalan PJU 9, Bandar Sri Damansara, 52200 Kuala Lumpur, Malaysia, Selangor, Malaysia</h5>
		</div>
		<hr>
			
            <div class="border-head">
              <h3>RENT CAR RECEIPT</h3>
			  
            </div>
			
			 <div class="form-group CVV">
<?php 
$sqla = "SELECT * FROM rental WHERE id_tran='$id_tran'";
$querya = mysqli_query($koneksidb,$sqla);
$rowa=mysqli_fetch_array($querya);
$id_cus=$rowa['id'];
$id_car=$rowa['id_car'];

$sqlb = "SELECT * FROM customer WHERE id='$id_cus'";
$queryb = mysqli_query($koneksidb,$sqlb);
$rowb=mysqli_fetch_array($queryb);

$sqlc = "SELECT * FROM vehicle WHERE id_car='$id_car'";
$queryc = mysqli_query($koneksidb,$sqlc);
$rowc=mysqli_fetch_array($queryc);
?>	
			      <div class="col-md-6">
				  
                      <div class="form-group">
                        <label><b>Customer Data</b><br>=================================</label>
						<table>
						<tr>
						<td width="30%"><b>Full Name</b></td>
						<td width="5%">:</td>
						<td width="65%"><?php echo $rowb['cust_fullname'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>Phone Number</b></td>
						<td width="5%">:</td>
						<td width="65%"><?php echo $rowb['phone'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>Email</b></td>
						<td width="5%">:</td>
						<td width="65%"><?php echo $rowb['email'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>Adrress 1 </b></td>
						<td width="5%">:</td>
						<td width="65%"><?php echo $rowb['address_1'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>Adrress 2 </b></td>
						<td width="5%">:</td>
						<td width="65%"><?php echo $rowb['address_2'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>Customer Picture </b></td>
						<td width="5%">:</td>
						<td width="65%">
						<img src='img/<?php	echo $rowb['cust_picture'];?>' height='100' width='100' >
						</td>
						</tr>
						</table>
                      </div>
                    </div>
					 
					 <div class="col-md-6">
                      <div class="form-group">
                        <label><b>Car Data</b><br>=================================</label>
						<table>
						<tr>
						<td width="30%"><b>Plate</b></td>
						<td width="5%">:</td>
						<td width="65%"><?php echo $rowc['plate'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>Brand</b></td>
						<td width="5%">:</td>
						<td width="65%"><?php echo $rowc['brand'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>Model</b></td>
						<td width="5%">:</td>
						<td width="65%"><?php echo $rowc['model'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>Color </b></td>
						<td width="5%">:</td>
						<td width="65%"><?php echo $rowc['color'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>Transmission </b></td>
						<td width="5%">:</td>
						<td width="65%"><?php echo $rowc['transmission'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>Picture </b></td>
						<td width="5%">:</td>
						<td width="65%">
						<img src='img/<?php	echo $rowc['car_picture'];?>' height='100' width='100' >
						</td>
						</tr>
						</table>
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label><b>Rent Car Transaction Data</b><br>=================================</label>
						<table>
						<tr>
						<td width="30%"><b>Transaction Date</b></td>
						<td width="15%">:</td>
						<td width="55%"><?php echo $rowa['date_tran'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>Start Date</b></td>
						<td width="15%">:</td>
						<td width="55%"><?php echo $rowa['start_date'];?></td>
						</tr>
						<tr>
						<td width="30%"><b>End Date</b></td>
						<td width="15%">:</td>
						<td width="55%"><?php echo $rowa['end_date'];?></td>
						</tr>
						<tr>
						 <td width="30%"><b>Long Rented</b></td>
						<td width="15%">:</td>
						<td width="55%"><?php echo $rowa['date_number'];?></td>
						</tr>
						<tr>
						 <td width="30%"><b>Insurrance</b></td>
						<td width="15%">: RM. </td>
						<td width="55%"><?php echo $rowa['insurance'];?></td>
						</tr>
						<tr>
						 <td width="30%"><b>Insurrance Rate</b></td>
						<td width="15%">: RM. </td>
						<td width="55%"><?php echo $rowa['price_insurance'];?></td>
						</tr>
						<tr>
						 <td width="30%"><b>Total Payment</b></td>
						<td width="15%">: RM. </td>
						<td width="55%"><?php echo $rowa['tot_payment'];?></td>
						</tr>
						<tr>
						 <td width="30%"><b>Deposit</b></td>
						<td width="15%">: RM. </td>
						<td width="55%"><?php echo $rowa['deposit'];?></td>
						</tr>
						<tr>
						 <td width="30%"><b>Down Payment</b></td>
						<td width="15%">: RM. </td>
						<td width="55%"><?php echo $rowa['dp'];?></td>
						</tr>
						<tr>
						 <td width="30%"><b>Under Payment</b></td>
						<td width="15%">: RM. </td>
						<td width="55%"><?php echo $rowa['tot_payment']-$rowa['dp'];?></td>
						</tr>
						</table>
                      </div>
                    </div>
					 
					<div class="col-md-6">
                      <div class="form-group">
                        <label><b>Car Rental Receipt</b><br>=================================</label>
						<p>
						This Car Rental Agreement is entered into between Carentz Management, a Selangor corporation, located at Jalan Cempaka Sd 12/5, Jalan PJU 9, Bandar Sri Damansara, 52200 Kuala Lumpur, Malaysia, Selangor, Malaysia.
						</p>
						 <p align="right">CaRentz Management on <?php echo date('Y-m-d');?></p>
						<table>
						<tr>
						<td width="40%">
						<b>Signature Carentz Management</b>
						<br><br><br>
						[ <?php echo $_SESSION['SES_USER'];?> ]
						</td>
						<td width="20%"></td>
						<td width="40%">
						<b>Signature Customer</b>
						<br><br><br>
						[ <?php echo $rowb['cust_fullname'];?> ]
						</td>
						</tr>
						
						</table>
                      </div>
                    </div>
					
				
														
			</div>
             
            </div>
			
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->

    
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