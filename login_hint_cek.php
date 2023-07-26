<?php
session_start();
if (isset($_SESSION['SES_SECURITY'])) {
    include "koneksi.php";
    $idSecurity = $_SESSION['SES_SECURITY'];
    $idnm = $_SESSION['SES_ID'];

    if (isset($_POST['verification'])) {
        $verification = $_POST['verification'];
		//echo $verification;
        $mySql = "SELECT * FROM employee WHERE id='$idnm' AND key_forget='$verification'";
        $myQry = mysqli_query($koneksidb, $mySql) or die ("Query Salah : ".mysql_error());
        $row = mysqli_fetch_array($myQry);

        if (isset($row['user_name']) && isset($row['user_pass'])) {
            echo "<meta http-equiv='refresh' content='0; url=main_form.php'>";
        } else {
            echo "<script>alert('Failure Hint Password...... !!!');</script>";
            echo "<script>location='index.html';</script>";
        }
    }
} else {
    include "session_warning.php";
}


?>