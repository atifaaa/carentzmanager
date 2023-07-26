<?php
session_start();
unset ($_SESSION['SES_ID']);
unset ($_SESSION['SES_LOGIN']);
unset ($_SESSION['SES_SECURITY']);
unset ($_SESSION['SES_USER']);
session_unset();
session_destroy();
echo "<script>location='index.html';</script>";
exit;
?>