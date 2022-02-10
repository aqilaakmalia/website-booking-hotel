<?php

session_start(); 
include 'koneksi.php';


$id_pelanggan = $_GET['id_pelanggan'];

$query = oci_parse($koneksi,"DELETE FROM pelanggan WHERE id_pelanggan = $id_pelanggan");
oci_execute($query);

$_SESSION["sukses"] = 'Data Berhasil dihapus';
header('Location: dataCustomer.php');



?>