<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="profile.php">CaRentz<span> Rental</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
<?php
$tgl =date("Y-m-d");
?>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="main_form.php" class="nav-link">Home</a></li>
			  <li class="nav-item"><a href="cars.php" class="nav-link">Cars</a></li>
	          <li class="nav-item"><a href="service_record.php" class="nav-link" >Service</a></li>
	          <li class="nav-item"><a href="customer.php" class="nav-link" >Customers</a></li>
	          <li class="nav-item"><a href="rent_date.php" class="nav-link" >Booking</a></li>
	          <li class="nav-item"><a href="employee.php" class="nav-link" >Employee</a></li>
	          <li class="nav-item"><a href="report.php" class="nav-link">Report</a></li>
	          <li class="nav-item"><a href="calendar.php?tgl=<?php echo "0";?>" class="nav-link">Calendar</a></li>
			                        
			  <li class="nav-item"><a href="market.php" class="nav-link" target="_blank">C.45</a></li>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <li class="nav-item"><a href="logout.php" class="nav-link ">"Logout" </a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>