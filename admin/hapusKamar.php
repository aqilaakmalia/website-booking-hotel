<?php

session_start(); 
include 'koneksi.php';


$no_kamar = $_GET['no_kamar'];

$query = oci_parse($koneksi,"DELETE FROM kamar WHERE no_kamar = $no_kamar");
oci_execute($query);

$_SESSION["sukses"] = 'Data Berhasil dihapus';
header('Location: kamar.php');



?>