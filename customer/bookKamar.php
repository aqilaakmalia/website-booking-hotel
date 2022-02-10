<?php 
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../index.html');
}


if (isset($_POST['submit'])) {
    $no_kamar = $_POST['no_kamar'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $tgl_keluar = $_POST['tgl_keluar'];
    $lama_menginap = $_POST['lama_menginap'];

    // var_dump($tgl_masuk);
    $query = "INSERT INTO transaksi (no_kamar, id_pelanggan, tgl_masuk, tgl_keluar, lama_menginap) 
    VALUES($no_kamar, '$id_pelanggan', TO_DATE('$tgl_masuk','YYYY-MM-DD'), TO_DATE('$tgl_keluar','YYYY-MM-DD'), $lama_menginap)";

    $result = oci_parse($koneksi,$query); 

    oci_execute($result);

    // var_dump($tgl_masuk);
        //untuk alert
        $_SESSION["sukses"] = 'Data Berhasil dikirim';
        header('Location: transaksi.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hotelin.id</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Pesan Kamar</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-floating mb-3">
                                                <select class="form-control" name="no_kamar">
                                                    <option>Pilih No. Kamar</option>
                                                <?php 
                                                  $no_kamar = oci_parse($koneksi,"SELECT * FROM kamar");
                                                  oci_execute($no_kamar);
                                                //   $col = oci_num_fields($query);
                                                  while($data = oci_fetch_array($no_kamar)): 
                                                ?>
                                                    <option value="<?php echo $data['NO_KAMAR'] ?>"><?php echo $data['NO_KAMAR'] ?></option>
                                                <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="id_pelanggan" id="inputAlamat" type="number" readonly value="<?php echo implode($_SESSION['id_pelanggan']) ?>"/>
                                                <label for="inputAlamat">Id Pelanggan</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="tgl_masuk" id="inputNoTelp" type="date" placeholder="Masukkan Nomor Telepon Anda" />
                                                <label for="inputEmail">Tanggal Masuk</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="tgl_keluar" id="status" type="date"/>
                                                <label for="status">Tanggal Keluar</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="lama_menginap" id="inputUsername" type="number" placeholder="Masukkan username" />
                                                <label for="inputEmail">Lama Menginap</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" href="transaksi.php" name="submit" type="submit">Pesan</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Hotelin.id 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
