<?php
session_start();
include "koneksi.php";


$id=$_GET['id'];	


$sql = "UPDATE rental set status_trans='Used' where id_tran='$id'";
mysqli_query($koneksidb, $sql) or die ("Gagal tambah data ".mysqli_error());

echo "<meta http-equiv='refresh' content='0; url=calendar.php?tgl=0'>";




?>
