<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = oci_parse($koneksi,"SELECT * FROM pelanggan WHERE username = '$username' AND password= '$password'");
  oci_execute($query);

  // $dataoci_fetch_all($query,$temp);
  // var_dump($temp);
  // $_SESSION['id_pelanggan'] = $data['ID_PELANGGAN'];
  // var_dump($_SESSION['id_pelanggan']);

  


  if (oci_fetch_all($query,$temp) > 0) {
    $_SESSION['username']=$username;
    $_SESSION['password'] = $password;
    $_SESSION['login']= $_POST['login'];
    $_SESSION['id_pelanggan'] = $temp['ID_PELANGGAN'];
     header('Location: index.php');
    
  //  if ($row['STATUS'] = "customer") {
     
  //     $_SESSION['username']=$username;
  // //     $_SESSION['STATUS']= 'customer';
  //      header('Location: index.php');
  //  }else {
  //    echo "<script>alert('Anda tidak diperbolehkan mengakses')</script>";
  //  }
  } else {
     echo "<script>alert('Gagal Login')</script>";
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/style.css">
    
      
    <title>Hotelin | Login</title>
    <style>
 
    </style>
  </head>
  <body>   
    <section class="mb-4">
      <div class="container mt-5">
          <div class="row d-flex justify-content-center">
              <div class="col-12 col-lg-5">

              <div class="card login-card" style="width: 100%;">
                  <div class="card-body">
                      <h3 class="text-center">Login</h3>
                      <form class="mt-4" action="" method="post">
                          <div class="form-grup mb-3" >
                            <label for="exampleInputEmail1">Username</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <!-- <small id="emailHelp" class="form-text text-muted">Mohon Gunakan akun Gmail anda</small> -->
                          </div>
                          <div class="form-grup mb-3">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                          </div>
                          <div class="form-group form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                          </div>
                          <button type="submit" class="btn btn-primary" style="width: 100%;" href="index.php" name="login">Login</button>
                          <p class="mt-2">Belum Terdaftar? <a href="register.php">Daftar Sekarang!</a></p>
                        </form>
                  </div>
                </div>  

              </div> 
          </div>
      </div>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#0d6efd" fill-opacity="1" d="M0,96L80,112C160,128,320,160,480,144C640,128,800,64,960,58.7C1120,53,1280,107,1360,133.3L1440,160L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
    </svg>
    
    <footer class="bg-primary text-white text-center p-2">
      <p>Created By Kelompok 6</p>
    </footer>

    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
  </body>
</html>