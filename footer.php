<!DOCTYPE html>
<html>
<head>
  <title>Page Title</title>
  <style>
    html, body {
      height: 20%;
      margin: 0;
    }

    .content {
      padding-bottom: 30px; /* Adjust the value to leave space for the footer */
    }

    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: #00008B;
      padding: 20px;
      text-align: center;
    }
  </style>
</head>

  <footer class="footer">
        &copy; <?php echo date("Y"); ?> <strong>Atifa</strong> All Rights Reserved
  </footer>
  <!--script for logout for 20 minutes if no action note 1 second = 1000 -->
  <!--In this case we used 20 minutes if no action the page will be logout 20 minutes * 60 seconds * 1000 = 1.200.000-->
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script type="text/javascript" src="lib/jquery.idle.js"></script>
  
  
  
  
  
  
  <script>
    $(document).idle({
        onIdle: function(){
            window.location="login_hint.php";                
        },
        idle: 60000 //1200000
    });
</script>
</html>
