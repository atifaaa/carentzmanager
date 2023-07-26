<?php
session_start();
include "koneksi.php";
require 'C:\xampp\htdocs\carrental\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\carrental\PHPMailer\src\SMTP.php';
require 'C:\xampp\htdocs\carrental\PHPMailer\src\Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$username = $_POST['lgn'];
$pass     = $_POST['pass'];

$koneksidb=mysqli_connect("localhost","root","","carentz");
$mySql = "SELECT * FROM employee WHERE user_name= '$username' AND user_pass='$pass'";
$myQry = mysqli_query($koneksidb, $mySql) or die ("Query Salah : ".mysql_error());
$row = mysqli_fetch_array($myQry);
$email = $row['email'];
$bcrypt = $row['user_pass'];

if (isset($row['user_name']) && password_verify($password, $bcrypt)) {
    $kode = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5); //time() . "_" . $pass;	
    $sqlx = "UPDATE employee SET verification='$kode' WHERE user_name='$username' AND user_pass='$pass'";
    mysqli_query($koneksidb, $sqlx) or die ("Error Saving Data ".mysqli_error($koneksidb));

    // Sending OTP to email
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->Username = 'finalyearproject.atifa@gmail.com';
        $mail->Password = 'mlstbjgvuasikqea';

        $mail->setFrom('finalyearproject.atifa@gmail.com', 'Atifa');
        $mail->addAddress($email);
        $mail->Subject = 'Verification Code';
        $mail->Body = $kode;

        $mail->send();

        $_SESSION['SES_LOGIN'] = $row['user_name'];
        $_SESSION['SES_ID'] = $row['id'];
        $_SESSION['SES_USER'] = $row['first_name'] . " " . $row['last_name'];
        $_SESSION['SES_SECURITY'] = "34313123sdsdfsdf";
		$_SESSION['start_date'] = "-";
        $_SESSION['end_date'] = "-";
		$_SESSION['idcar'] = "-";
		 
        echo "<meta http-equiv='refresh' content='0; url=verification.php'>"; 
    } catch (Exception $e) {
        echo "Failed Sending OTP Verification. Error: " . $mail->ErrorInfo;
    }
} else {
    echo "<script>alert('Username or Password not correct...... !!!');</script>";
    echo "<script>location='index.html';</script>";
}
?>
