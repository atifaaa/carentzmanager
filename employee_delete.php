<?php
session_start();
include "koneksi.php";


$id=$_GET['id'];	

$mySqle  = "delete from employee where id='$id'";
mysqli_query($koneksidb, $mySqle) or die ("Gagal tambah data ".mysqli_error());


echo "<meta http-equiv='refresh' content='0; url=employee.php'>";




?>
