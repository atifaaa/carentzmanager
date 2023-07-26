<?php
session_start();
if(isset($_SESSION['SES_SECURITY'])) 
{
	include "koneksi.php";
	$idSecurity	= $_SESSION['SES_SECURITY'];
	$idusr	= $_SESSION['SES_LOGIN'];
	$idnm	= $_SESSION['SES_ID'];
	$name	= $_SESSION['SES_USER'];
	
	
?>	
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carentz Dashboard Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

<body>
  
	  
 
  	<section class="ftco-section">
		
			<div class="container">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>MARKET PREDICTION USING C.45 ALGORITHMS</h3>
            </div>
			 <div class="form-group CVV">
					<h4><b>Normalization of Car Rental Sales Data</b></h4>
							 
								<table class='table table-condensed'>
					<thead><tr>
					<th>ID</th>
					<th>Plate</th>
					<th>Brand</th>
					<th>Model</th>
					<th>Transmission</th>
					<th>Price </th>
					<th>Amount Sold</th>
					 
					
					
					</tr>
					</thead>
					<tbody>
					<?php 
					$sql_a = "SELECT * FROM vehicle";
                    $myQrya = mysqli_query($koneksidb,$sql_a) or die ("Query salah : ".mysql_error());
						 	 
	
                    $i=0;
					$laris=0;
					$tidaklaris=0;
                    while($rowa = mysqli_fetch_array($myQrya))
					{
						$i++;
						?>
						<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $rowa['plate'];?></td>
						<td><?php echo $rowa['brand'];?></td>
						<td><?php echo $rowa['model'];?></td>
						<td><?php echo $rowa['transmission'];?></td>
						<td>
						<?php 			 
						if ($rowa['price_nondriverfull'] <= 65){echo "Cheap";}
						if ($rowa['price_nondriverfull'] > 65){echo "Expensive";}
						?>
						</td>
						<td>
						<?php 
						    $search=$rowa['id_car']; 
							$result="SELECT * from rental where id_car='$search'";
							$myQryb = mysqli_query($koneksidb,$result) or die ("Query salah : ".mysql_error());
							$data=mysqli_num_rows( $myQryb );
							echo $data;
							if ($data > 5)
							{
								$laris=$laris+1;
							}
							else
							{
								$tidaklaris=$tidaklaris+1;
							}
							?></td> 
							 						 
						</tr>
						<?php
					}
					?>

				</tbody>
				</table>
				<h4><b>Calculation Results on the Dataset</b></h4>
				<table class='table table-condensed'>
					<thead><tr>
					<th>Total Cases</th>
					<th>Sum (In Demand)</th>
					<th>Sum (Not Selling Well) </th>
					<th>Entropy Total</th>
					</tr>
					</thead>
					<tbody>
						<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $laris;?></td>
						<td><?php echo $tidaklaris;?></td>
						<td>
						<?php 
							$ja=($laris/$i)*(-1);
							$jb=log($laris/$i,2);
							$jc=($tidaklaris/$i)*(-1);
							$jd=log($tidaklaris/$i,2);
							$jtotal=($ja*$jb)+($jc*$jd);
							echo number_format($jtotal,4);
						?></td>
						</tr>
				</tbody>
				</table>
				<hr>
				<h4><b>Transmission Category Variable Value</b></h4>
				<table class='table table-condensed'>
					<thead><tr>
					<th>Transmission Category </th>
					<th>Information</th>
					<th>Amount</th>
					<th>Total</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>Automatic</td>
						<td>
						<table>
							<tr><td>In Demand (+)</td></tr>
							<tr><td>Not Selling Well (-)</td></tr>
						</table>
						</td>
						<td>
						<table>
						<?php 
						$dmdmatic=0;
						$nswmatic=0;
						$mtc=0;
						$jlhmtc=0;
						
						$sql_c = "SELECT * FROM vehicle where transmission='Automatic'";
						$myQryc = mysqli_query($koneksidb,$sql_c) or die ("Query salah : ".mysql_error());
						while($rowc = mysqli_fetch_array($myQryc))
						{
							$mtc=$mtc+1;
							$search=$rowc['id_car']; 
							$result="SELECT * from rental where id_car='$search'";
							$myQryb = mysqli_query($koneksidb,$result) or die ("Query salah : ".mysql_error());
							$jlhmtc=mysqli_num_rows( $myQryb );
							if ($jlhmtc <= 5)
							{$nswmatic=$nswmatic+1;}
							if ($jlhmtc > 5)
							{$dmdmatic=$dmdmatic+1;}
						}
						
						?>
							<tr><td><?php echo $dmdmatic; ?></td></tr>
							<tr><td><?php echo $nswmatic; ?></td></tr>
						</table>
						</td>
						<td>
						<?php echo $mtc; ?>
						</td>
					</tr>
					<tr>	
						<td>Manual</td>
						<td>
						<table>
							<tr><td>In Demand (+)</td></tr>
							<tr><td>Not Selling Well (-)</td></tr>
						</table>
						</td>
						<td>
						<table>
						<?php 
						$dmdmanual=0;
						$nswmanual=0;
						$mnl=0;
						$jlhmnl=0;
						$sql_c = "SELECT * FROM vehicle where transmission='Manual'";
						$myQryc = mysqli_query($koneksidb,$sql_c) or die ("Query salah : ".mysql_error());
						while($rowc = mysqli_fetch_array($myQryc))
						{
							$mnl=$mnl+1;
							$search=$rowc['id_car']; 
							$result="SELECT * from rental where id_car='$search'";
							$myQryb = mysqli_query($koneksidb,$result) or die ("Query salah : ".mysql_error());
							$jlhmnl=mysqli_num_rows( $myQryb );
							if ($jlhmnl <= 5)
							{$nswmanual=$nswmanual+1;}
							if ($jlhmnl > 5)
							{$dmdmanual=$dmdmanual+1;}
						}
						
						?>
							<tr><td><?php echo $dmdmanual; ?></td></tr>
							<tr><td><?php echo $nswmanual; ?></td></tr>
						</table>
						</td>
						<td>
						<?php echo $mnl; ?>
						</td>
					</tr>
				</tbody>
				</table>
				
				
				<b>Entropy (Automatic) = </b>
				<?php 
				$ec=((($dmdmatic/$mtc)*-1)*(log($dmdmatic/$mtc,2)))-((($nswmatic/$mtc)*-1)*(log($nswmatic/$mtc,2)));
				if (is_nan($ec)){$ec=0;}
				//$ec = !is_nan($ec) ? round($ec) : 0;
				echo number_format($ec,4);
				
				?>
				<br><b>Entropy (Manual) = </b>
				<?php 
				$ed=((($dmdmanual/$mnl)*-1)*(log($dmdmanual/$mnl,2)))-((($nswmanual/$mnl)*-1)*(log($nswmanual/$mnl,2)));
				if (is_nan($ed)){$ed=0;}
				echo number_format($ed,4);
				?>
				<br><b>Gain Transmission Category = </b>
				<?php 
				$ee=$jtotal-(($mtc/$i)*$ec)-(($mnl/$i)*$ed);
				echo number_format($ee,4);
				?>
				<hr>
				
				<h4><b>Price Category Variable Value</b></h4>
				<table class='table table-condensed'>
					<thead><tr>
					<th>Price Category </th>
					<th>Information</th>
					<th>Amount</th>
					<th>Total</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>Cheap</td>
						<td>
						<table>
							<tr><td>In Demand (+)</td></tr>
							<tr><td>Not Selling Well (-)</td></tr>
						</table>
						</td>
						<td>
						<table>
						<?php 
						$lakucheap=0;
						$tdklakucheap=0;
						$jlhcheap=0;
						
						
						$sql_c = "SELECT * FROM vehicle";
						$myQryc = mysqli_query($koneksidb,$sql_c) or die ("Query salah : ".mysql_error());
						while($rowc = mysqli_fetch_array($myQryc))
						{
							if ($rowc['price_nondriverfull'] <= 65)
							{
								$search=$rowc['id_car']; 
								$result="SELECT * from rental where id_car='$search'";
								$myQryb = mysqli_query($koneksidb,$result) or die ("Query salah : ".mysql_error());
								$jlhdata=mysqli_num_rows( $myQryb );
								$jlhcheap=$jlhcheap+1;
								//demand
								if ($jlhdata > 5)
								{
								   $lakucheap=$lakucheap+1;	
								}
								//notdeman
								else
								{
									$tdklakucheap=$tdklakucheap+1;
								}
								
							}

						}
						
						?>
							<tr><td><?php echo $lakucheap; ?></td></tr>
							<tr><td><?php echo $tdklakucheap; ?></td></tr>
						</table>
						</td>
						<td>
						<?php echo $jlhcheap; ?>
						</td>
					</tr>
					<tr>
						<td>Expensive</td>
						<td>
						<table>
							<tr><td>In Demand (+)</td></tr>
							<tr><td>Not Selling Well (-)</td></tr>
						</table>
						</td>
						<td>
						<table>
						<?php 
						$lakuexpens=0;
						$tdklakuexpens=0;
						$jlhexpens=0;
						
						
						$sql_c = "SELECT * FROM vehicle";
						$myQryc = mysqli_query($koneksidb,$sql_c) or die ("Query salah : ".mysql_error());
						while($rowc = mysqli_fetch_array($myQryc))
						{
							if ($rowc['price_nondriverfull'] > 65)
							{
								$search=$rowc['id_car']; 
								$result="SELECT * from rental where id_car='$search'";
								$myQryb = mysqli_query($koneksidb,$result) or die ("Query salah : ".mysql_error());
								$jlhdata=mysqli_num_rows( $myQryb );
								$jlhexpens=$jlhexpens+1;
								//demand
								if ($jlhdata > 5)
								{
								   $lakuexpens=$lakuexpens+1;	
								}
								//notdeman
								else
								{
									$tdklakuexpens=$tdklakuexpens+1;
								}
								
							}
							
						}
						
						?>
							<tr><td><?php echo $lakuexpens; ?></td></tr>
							<tr><td><?php echo $tdklakuexpens; ?></td></tr>
						</table>
						</td>
						<td>
						<?php echo $jlhexpens; ?>
						</td>
					</tr>
				 					
						 
				</tbody>
				</table>
				
				
				<b>Entropy (Cheap) = </b>
				<?php 
				$pc=((($lakucheap/$jlhcheap)*-1)*(log($lakucheap/$jlhcheap,2)))-((($tdklakucheap/$jlhcheap)*-1)*(log($tdklakucheap/$jlhcheap,2)));
				if (is_nan($pc)){$pc=0;}
				echo number_format($pc,4);
				
				?>
				<br><b>Entropy (Expensive) = </b>
				<?php 
				$pd=((($lakuexpens/$jlhexpens)*-1)*(log($lakuexpens/$jlhexpens,2)))-((($tdklakuexpens/$jlhexpens)*-1)*(log($tdklakuexpens/$jlhexpens,2)));
				if (is_nan($pd)){$pd=0;}
				echo number_format($pd,4);
				?>
				<br><b>Gain Price Category = </b>
				<?php 
				$pe=$jtotal-(($jlhcheap/$i)*$pc)-(($jlhexpens/$i)*$pd);
				echo number_format($pe,4);
				?>
				<hr>
				
				<h4><b>Amount Sold Category Variable Value</b></h4>
				<table class='table table-condensed'>
					<thead><tr>
					<th>Price Category </th>
					<th>Information</th>
					<th>Amount</th>
					<th>Total</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>Little</td>
						<td>
						<table>
							<tr><td>In Demand (+)</td></tr>
							<tr><td>Not Selling Well (-)</td></tr>
						</table>
						</td>
						<td>
						<table>
						<?php 
						$lakulittle=0;
						$tdklakulittle=0;
						$jlhlittle=0;
						
						
						$sql_c = "SELECT * FROM vehicle";
						$myQryc = mysqli_query($koneksidb,$sql_c) or die ("Query salah : ".mysql_error());
						while($rowc = mysqli_fetch_array($myQryc))
						{
 
								$search=$rowc['id_car']; 
								$result="SELECT * from rental where id_car='$search'";
								$myQryb = mysqli_query($koneksidb,$result) or die ("Query salah : ".mysql_error());
								$jlhdata=mysqli_num_rows( $myQryb );
								
								//demand
								if ($jlhdata < 5)
								{
								   $tdklakulittle=$tdklakulittle+1;
								}
								$jlhlittle=$tdklakulittle;
								
 
						}
						
						?>
							<tr><td><?php echo $lakulittle; ?></td></tr>
							<tr><td><?php echo $tdklakulittle; ?></td></tr>
						</table>
						</td>
						<td>
						<?php echo $jlhlittle; ?>
						</td>
					</tr>
					<tr>
						<td>Lots</td>
						<td>
						<table>
							<tr><td>In Demand (+)</td></tr>
							<tr><td>Not Selling Well (-)</td></tr>
						</table>
						</td>
						<td>
						<table>
						<?php 
						$lakulots=0;
						$tdklakulots=0;
						$jlhlots=0;
						
						
						$sql_c = "SELECT * FROM vehicle";
						$myQryc = mysqli_query($koneksidb,$sql_c) or die ("Query salah : ".mysql_error());
						while($rowc = mysqli_fetch_array($myQryc))
						{
				
								$search=$rowc['id_car']; 
								$result="SELECT * from rental where id_car='$search'";
								$myQryb = mysqli_query($koneksidb,$result) or die ("Query salah : ".mysql_error());
								$jlhdata=mysqli_num_rows( $myQryb );
								
								//demand
								if ($jlhdata > 5)
								{
								   $lakulots=$lakulots+1;	
								}
								$jlhlots=$lakulots;

							
						}
						
						?>
							<tr><td><?php echo $lakulots; ?></td></tr>
							<tr><td><?php echo $tdklakulots; ?></td></tr>
						</table>
						</td>
						<td>
						<?php echo $jlhlots; ?>
						</td>
					</tr>
				 					
						 
				</tbody>
				</table>
				
				
				<b>Entropy (Little) = </b>
				<?php 
				$lc=((($lakulittle/$jlhlittle)*-1)*(log($lakulittle/$jlhlittle,2)))-((($tdklakulittle/$jlhlittle)*-1)*(log($tdklakulittle/$jlhlittle,2)));
				//$lc= ((($lakulittle/$jlhlittle)*-1)*(log($lakulittle/$jlhlittle,2)));
				if (is_nan($lc)){$lc=0;}
				echo number_format($lc,4);
				
				?>
				<br><b>Entropy (Lots) = </b>
				<?php 
				$ld=((($lakulots/$jlhlots)*-1)*(log($lakulots/$jlhlots,2)))-((($tdklakulots/$jlhlots)*-1)*(log($tdklakulots/$jlhlots,2)));
				if (is_nan($ld)){$ld=0;}
				echo number_format($ld,4);
				?>
				<br><b>Gain Amount Category = </b>
				<?php 
				$le=$jtotal-(($jlhlittle/$i)*$lc)-(($jlhlots/$i)*$ld);
				if (is_nan($le)){$le=0;}
				echo number_format($le,4);
				?>
				<hr>
				
				
				<h3><b>Decision Tree Calculation Results</b></h3>
				<table class='table table-condensed'>
					<thead><tr>
					<th>Variabel </th>
					<th>Value</th>
					<th>Amount of Data</th>
					<th>In Demand</th>
					<th>Not Selling Well</th>
					<th>Entropy</th>
					<th>Gain</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>
							<b>Transmission</b>
						</td>
						<td>
							<table>
							<tr><td>Automatic</td></tr>
							<tr><td>Manual</td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo $mtc; ?></td></tr>
							<tr><td><?php echo $mnl; ?></td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo $dmdmatic; ?></td></tr>
							<tr><td><?php echo $dmdmanual; ?></td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo $nswmatic; ?></td></tr>
							<tr><td><?php echo $nswmanual; ?></td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo number_format($ec,4); ?></td></tr>
							<tr><td><?php echo number_format($ed,4); ?></td></tr>
							</table>
						</td>
						<td>
							<h3><?php echo number_format($ee,4); ?> </h3>
							
						</td>
					</tr>
					
					
					
					
					<tr>
						<td>
							<b>Price</b>
						</td>
						<td>
							<table>
							<tr><td>Cheap</td></tr>
							<tr><td>Expensive</td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo $jlhcheap; ?></td></tr>
							<tr><td><?php echo $jlhexpens; ?></td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo $lakucheap; ?></td></tr>
							<tr><td><?php echo $lakuexpens; ?></td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo $tdklakucheap; ?></td></tr>
							<tr><td><?php echo $tdklakuexpens; ?></td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo number_format($pc,4); ?></td></tr>
							<tr><td><?php echo number_format($pd,4); ?></td></tr>
							</table>
						</td>
						<td>
							<h3><?php echo number_format($pe,4); ?> </h3>
							
						</td>
					</tr>
					
					<tr>
						<td>
							<b>Amount Sold</b>
						</td>
						<td>
							<table>
							<tr><td>Little</td></tr>
							<tr><td>Lots</td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo $jlhlittle; ?></td></tr>
							<tr><td><?php echo $jlhlots; ?></td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo $lakulittle; ?></td></tr>
							<tr><td><?php echo $lakulots; ?></td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo $tdklakulittle; ?></td></tr>
							<tr><td><?php echo $tdklakulots; ?></td></tr>
							</table>
						</td>
						<td>
							<table>
							<tr><td><?php echo number_format($lc,4); ?></td></tr>
							<tr><td><?php echo number_format($ld,4); ?></td></tr>
							</table>
						</td>
						<td>
							<h3><?php echo number_format($le,4); ?> </h3>
							
						</td>
					</tr>
					 
				</tbody>
				</table>
				
				<hr>
				<h2><b>The Root Node is : 
				<?php 
				  if (($ee > $pe) and ($ee > $le)){echo "Transmission";}
				  if (($pe > $ee) and ($pe > $le)){echo "Price";}
				  if (($le > $ee) and ($le > $pe)){echo "Amount Sold";}
				?>
				<hr>
				Conclusion Rules
				</b>
				</h2>
				<br>

				
				<b>
				Rule 1 :<br>
				<?php 
				  if (($ee > $pe) and ($ee > $le))
				  {echo "  If Transmission=Lots, then In Demand";}
				  if (($pe > $ee) and ($pe > $le))
				  {echo "  If Price=Lots, then In Demand";}
				  if (($le > $ee) and ($le > $pe))
				  {echo "  If Amount Sold=Lots, then In Demand";}
				?>
				<br>
				Rule 2 :<br>
				<?php 
				  if (($ee > $pe) and ($ee > $le))
				  {echo "  If Transmission=Little and Price=Expensive, then Not Selling Well";}
				  if (($pe > $ee) and ($pe > $le))
				  {echo "  If Price=Expensive and Transmission=Little, then Not Selling Well";}
				  if (($le > $ee) and ($le > $pe))
				  {echo "  If Amount Sold=Little And Price=Expensive, then Not Selling Well";}
				?>
				<br>
				Rule 3 :<br>
				<?php 
				  if (($ee > $pe) and ($ee > $le))
				  {echo "  If Transmission=Little and Price=Expensive and Amount Sold=Lots, then In Demand";}
				  if (($pe > $ee) and ($pe > $le))
				  {echo "  If Price=Expensive and Transmission=Little and Amount Sold=Lots, then In Demand";}
				  if (($le > $ee) and ($le > $pe))
				  {echo "  If Amount Sold=Lots and Transmission=Little and Price=Expensive, then In Demand";}
				?>
				<br>
				Rule 4 :<br>
				<?php 
				  if (($ee > $pe) and ($ee > $le))
				  {echo "  If Transmission=Little and Price=Expensive and Amount Sold=Little, then Not Selling Well";}
				  if (($pe > $ee) and ($pe > $le))
				  {echo "  If Price=Expensive and Transmission=Little and Amount Sold=Little, then Not Selling Well";}
				  if (($le > $ee) and ($le > $pe))
				  {echo "  If Amount Sold=Little and Transmission=Little and Price=Expensive, then Not Selling Well";}
				?>
				<br>
				Rule 5 :<br>
				<?php 
				  if (($ee > $pe) and ($ee > $le))
				  {echo "  If Transmission=Little and Price=Cheap and Amount Sold=Lots, then In Demand";}
				  if (($pe > $ee) and ($pe > $le))
				  {echo "  If and Price=Cheap and Transmission=Little  and Amount Sold=Lots, then In Demand";}
				  if (($le > $ee) and ($le > $pe))
				  {echo "  If Amount Sold=Lots and Transmission=Little and Price=Cheap, then In Demand";}
				?>
				
				</b>
			
				 
				 
				
				</div>
			 
            <!-- /row -->
          </div>
  </div>
    </section>
    <!--main content end-->
    <!--footer start-->
    <?php
	//include "footer.php";
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