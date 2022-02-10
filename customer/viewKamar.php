<?php 
session_start();
include 'koneksi.php';

if(!isset($_SESSION['username'])){
    die("<b>Oops!</b> Access Failed.
        <p>Sistem Logout. Anda harus melakukan Login kembali.</p>
        <button type='button' onclick=location.href='customerLogin.php'>Back</button>");
}
$username = $_SESSION['username'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Jquery js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/669cf90489.js" crossorigin="anonymous"></script>

    <title>Hotelin.id</title>
  </head>
  <body>
    
    <!--Menu-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-primary text-white">
        <div class="container">
          <a class="navbar-brand bg-primary text-white" href="index.php">Hotelin.id</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active bg-primary text-white" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-primary text-white" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-primary text-white" href="#">Daftar Harga</a>
              </li>
              <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $username?></a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#!">Settings</a></li>
                      <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                      <li><hr class="dropdown-divider" /></li>
                      <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </ul>
          </div>
        </div>
      </nav>

      <br><br><br><br>
    
      <!-- <section class="mt-5">
          <div class="container d-flex justify-content-around">
              <div class="row">
              <div class="col-6">
                  <div class="card text-center" style="width: 22rem;">
                      <div class="card-body">
                      <h5 class="card-title">Selamat Transaksi Anda Berhasil!</h5>
                      </div>
                  </div>
              </div>
          </div>
      </section> -->

      <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Kamar</h1>
            <!-- <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">List Transaksi</li>
            </ol> -->
            
            <table class="table table-bordered mt-3">
                <thead class="table-primary">
                    <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Kode Kamar</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Harga Kamar</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $query = oci_parse($koneksi,"SELECT * FROM kamar ORDER BY no_kamar");
                    oci_execute($query);
                    $col = oci_num_fields($query);
                    $no=1;
                    while($data = oci_fetch_array($query)): 
                ?>
                    <tr>
                        <th scope="row" class="text-center"><?php echo $no++ ?></th>
                        <td><?php echo $data["NO_KAMAR"] ?></td>
                        <td><?php echo $data["TIPE_KAMAR"] ?></td>
                        <td><?php echo "Rp " . number_format($data["HARGA_KAMAR"]); ?></td>
                    </tr>
                    <?php 
                        endwhile; 
                    oci_free_statement($query);
                        oci_close($koneksi);
                ?>
                </tbody>
            </table>
        </div>
      </main>

      <br><br>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0d6efd" fill-opacity="1" d="M0,32L30,48C60,64,120,96,180,112C240,128,300,128,360,138.7C420,149,480,171,540,176C600,181,660,171,720,170.7C780,171,840,181,900,165.3C960,149,1020,107,1080,80C1140,53,1200,43,1260,53.3C1320,64,1380,96,1410,112L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
      </svg>

      <footer class="bg-primary text-white text-center p-2">
        <p> </p>
      </footer>

      <footer id="footer">
        <div class="mt-4 pt-1 footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-5 col-xs-12">
                <h2 style="font-size: 20px;">CONTACT US</h2>
                <p class="pr-5 text-white-40" style="font-size: 13px;">
                  You can reach us at email hotelinid@gmail.com or our customer service at LINE Official (@hotelin.id)
                </p>
                <ul class="social">
                  <li><a href="https://www.instagram.com/chillmask.co/?hl=en"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="https://api.whatsapp.com/send?phone=6289637685785&text=Halo%21"><i class="fab fa-whatsapp"></i></a></li>
                  <li><a href="#"><i class="fab fa-line"></i></a></li>
                  <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-xs-12 links">
                <h4 class="mt-lg-0 mt-sm-3" style="font-size: 20px;">LINKS</h4>
                <ul class="m-0 p-0">
                  <li><a href="#">How To Order</a></li>
                  <li><a href="#">Shipping</a></li>
                  <li><a href="#">Exchange</a></li>
                  <li><a href="#">FAQ</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                </ul>
              </div>
              <div class="col-lg-4 col-xs-12 location">
                <h4 class="mt-lg-0 mt-sm-4" style="font-size: 20px;">LOCATION</h4>
                <p class="pr-5 text-white-40" style="font-size: 13px"><i class="fa fa-map-marker"> Surabaya, Jawa Timur, Indonesia</i></p>
                <p class="pr-5 text-white-40" style="font-size: 13px"><i class="fa fa-phone"> (0356)-320974</i></p>
                <p class="pr-5 text-white-40" style="font-size: 13px"><i class="fa fa-envelope-o"> hotelinid@gmail.com</i></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <footer class="text-black-50 text-center p-1">
          <p>Created By Kelompok 6</p>
      </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>