 <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.php"><img src="img/logo.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">CaRentz Management</h5>
		  <h6 class="centered">User : <?php echo $name; ?></h6>
          <li>
            <a href="main_form.php">
              <i class="fa fa-dashboard"></i>
              <span>Vehicles</span>
              </a>
          </li>
          <li>
            <a href="service_record.php">
              <i class="fa fa-desktop"></i>
              <span>Car Service Record</span>
              </a>
          </li>
          <li>
            <a href="customer.php">
              <i class="fa fa-cogs"></i>
              <span>Customers</span>
              </a>
          </li>
          <li>
            <a href="rent_date.php">
              <i class="fa fa-book"></i>
              <span>Booking </span>
              </a>
          </li>
          <li>
            <a href="employee.php">
              <i class="fa fa-tasks"></i>
              <span>Employee</span>
              </a>
          </li>
          <li>
            <a href="report.php">
              <i class="fa fa-th"></i>
              <span>Report</span>
              </a>
          </li>
          <li>
              <a href="calendar.php?tgl=<?php echo '0';?>" target="_blank">
              <i class=" fa fa-bar-chart-o"></i>
              <span>Calendar</span>
              </a>
          </li>
		  <li>
              <a href="market.php">
              <i class=" fa fa-address-book-o"></i>
              <span>Market Predictions</span>
              </a>
          </li>
         </ul>
        <!-- sidebar menu end-->
      </div>