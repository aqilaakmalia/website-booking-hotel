<?php 

$username  = "SCOTT";
$password = "tiger";
$database = "localhost:1522/orcl";

$koneksi = oci_connect($username,$password,$database);
// $query = oci_parse($koneksi,"SELECT * FROM pelanggan");
// oci_execute($query);
// $col = oci_num_fields($query);
// // var_dump($col);
// while($data = oci_fetch_array($query)){
//     var_dump($data);
// }
// if (!$koneksi) {
//     $e = oci_error();
//     trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
// }else {
//     echo "berhasil";
// }


?>