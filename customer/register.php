<?php 
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO pelanggan (nama,alamat,no_telp,jenis_kelamin,username,password) 
    VALUES('$nama','$alamat','$no_telp','$jenis_kelamin','$username','$password')";

    $result=oci_parse($koneksi,$query); 

    oci_execute($result);
        //untuk alert
        $_SESSION["sukses"] = 'Data Berhasil Disimpan';
        header('Location: customerLogin.php');
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="nama" id="inputNama" type="text" placeholder="Masukkan nama Anda" />
                                                <label for="inputNama">Nama</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="alamat" id="inputAlamat" type="text" placeholder="Masukkan alamat Anda" />
                                                <label for="inputAlamat">Alamat</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="no_telp" id="inputNoTelp" type="text" placeholder="Masukkan Nomor Telepon Anda" />
                                                <label for="inputEmail">No. Telepon</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <!-- <label for="inputJenisKelamin">Jenis Kelamin</label> -->
                                                <select class="form-control" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin Anda">
                                                    <option>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" id="inputUsername" type="text" placeholder="Masukkan username" />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" href="customerLogin.php" name="submit" type="submit">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="customerLogin.php">Have an account? Go to login</a></div>
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
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
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
