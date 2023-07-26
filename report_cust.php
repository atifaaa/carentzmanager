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
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-6 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>DETAIL CUSTOMER DATA</h3>
            </div>
			 <div class="form-group CVV">
												
<?php
		$sqla = "SELECT * FROM customer WHERE id='$id'";
		$querya = mysqli_query($koneksidb,$sqla);
		$rowa=mysqli_fetch_array($querya);
?>
 <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
						
						
							
							
							
							<div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Customer Fullname</label>
                        <input type="text" required name="cust_fullname" class="form-control" value="<?php echo $rowa['cust_fullname'];?>">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" required name="phone" class="form-control" value="<?php echo $rowa['phone'];?>">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>ID Number</label>
                        <input type="text" required name="id_number" class="form-control" value="<?php echo $rowa['id_number'];?>">
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Driving License</label>
                        <input type="text" required name="id_driving" class="form-control" value="<?php echo $rowa['id_driving'];?>">
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" required name="email" class="form-control" value="<?php echo $rowa['email'];?>">
                      </div>
                    </div>
					
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Address 1</label>
                        <textarea rows="2" cols="80" required name="address_1" class="form-control"><?php echo $rowa['address_1'];?></textarea>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label>Addres 2</label>
                        <textarea rows="2" cols="80" required name="address_2" class="form-control"><?php echo $rowa['address_2'];?></textarea>
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label for="">Customer Picture</label><br>
                        
						<img src='img/<?php	echo $rowa['cust_picture'];?>' height='100' width='100' >
						<img src='img/<?php	echo $rowa['cust_driving'];?>' height='100' width='100' >
						<img src='img/<?php	echo $rowa['cust_idcard'];?>' height='100' width='100' >
                      </div>
                    </div>
					 

							
							
								
				   
					</div>
					</div>
					</div>
		
	
			 </form>
								
						
						</div>
			 
			 
			 
             
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          
      </section>
    </section>
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