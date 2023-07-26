<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	
$periode=$_GET['id'];	
$tahun=substr($periode,0,4);
$bulan=substr($periode,5,2);
$search=$tahun.$bulan;

if ($bulan=="01"){$nmbulan="January";}
if ($bulan=="02"){$nmbulan="February";}
if ($bulan=="03"){$nmbulan="March";}
if ($bulan=="04"){$nmbulan="April";}
if ($bulan=="05"){$nmbulan="May";}
if ($bulan=="06"){$nmbulan="June";}
if ($bulan=="07"){$nmbulan="July";}
if ($bulan=="08"){$nmbulan="August";}
if ($bulan=="09"){$nmbulan="September";}
if ($bulan=="10"){$nmbulan="October";}
if ($bulan=="11"){$nmbulan="November";}
if ($bulan=="12"){$nmbulan="December";}

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
		<h5> Jalan Cempaka Sd 12/5, Jalan PJU 9, Bandar Sri Damansara, 52200 Kuala Lumpur, Malaysia, Selangor, Malaysia</h5>
		<hr>
              <h3>FINANCIAL REPORT FOR MONTHLY STATEMENTS</h3>
			  
			  
            </div>
			
			 <div class="form-group CVV">

			      <div class="col-md-12">
				  
                      <div class="form-group">
                        <label><b>
						<?php 
						echo "Report Period : ".$nmbulan." ".$tahun;
						?>
						</b></label>
						
						<table class='table table-condensed'>
					<thead><tr>
					<th>No.</th>
					<th>Transaction</th>
					<th>Date</th>
					<th>Customers Name</th>
					<th>Car Rental Time</th>
					<th>Car Plate</th>
					<th>Car Model</th>
					<th>The Amount of Cost</th>
					<th>Fine Amount</th>
					</tr>
					</thead>
					<tbody>
					<?php 
					
					$sql_a = "SELECT rental.*, customer.*, vehicle.* FROM rental INNER JOIN customer ON rental.id=customer.id INNER JOIN vehicle ON rental.id_car=vehicle.id_car ";
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
						<td><?php echo $rowa['id_tran'];?></td>
						<td><?php echo $rowa['date_tran'];?></td>
						<td><?php echo $rowa['cust_fullname'];?></td>
						<td><?php echo $rowa['date_number'];?></td>
						<td><?php echo $rowa['plate'];?></td>
						<td><?php echo $rowa['model'];?></td>
						<td><?php 
						echo $rowa['tot_payment'];
						$tot_pay=$tot_pay+$rowa['tot_payment'];
						?></td>
						<td><?php echo $rowa['penalty'];
						$tot_fine=$tot_fine+$rowa['penalty'];
						?></td>
						</tr>
						<?php
					}
					?>

						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><b>Amount RM.</b></td>
						<td><?php echo $tot_pay;?></td>
						<td><?php echo $tot_fine;?></td>
						</tr>	
<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><b>Total Income RM.</b></td>
						<td></td>
						<td><b><?php echo $tot_pay+$tot_fine;?></b></td>
						</tr>							
						
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