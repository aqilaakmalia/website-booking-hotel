<?php 

session_start(); 
include 'koneksi.php';

//menangkap data dari nomer kamar
$no_kamar = $_GET['no_kamar'];



if (isset($_POST['submit'])) {
    $no_kamar = $_POST['no_kamar'];
    $tipe_kamar = $_POST['tipe_kamar'];
    $harga = $_POST['harga'];

    $query = "UPDATE kamar SET no_kamar = $no_kamar , tipe_kamar = '$tipe_kamar', harga_kamar = $harga WHERE no_kamar = $no_kamar";

    $result=oci_parse($koneksi,$query);
    

    oci_execute($result);
        //untuk alert
        $_SESSION["sukses"] = 'Data Berhasil Diupdate';
        header('Location: kamar.php');
   
    
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
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Hotelin.id</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>Back to Home</a>
                            <div class="sb-sidenav-menu-heading">Menu Utama</div>
                            <a class="nav-link active" href="kamar.php"aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-bed"></i></div><div>Kamar</div>
                            </a>
                            <a class="nav-link collapsed" href="#"aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-couch"></i></div><div>Fasilitas</div>
                            </a>
                            <a class="nav-link" href="dataCustomer.php"aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div><div>Customer</div>
                            </a>
                            <a class="nav-link collapsed" href="dataTransaksi.php"aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-cash-register"></i></div><div>Transaksi</div>
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>


            <!--Layout Content Untuk templating-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Kamar</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Room</li>
                        </ol>

                        <!-- Form Insert kamar -->
                    <div class="col-6 mx-auto">
                    <div class="card mt-3">
                        <div class="card-body">
                            <?php 
                             $query = oci_parse($koneksi,"SELECT * FROM kamar WHERE no_kamar = $no_kamar");
                             oci_execute($query);
                             $col = oci_num_fields($query);
                          
                             while($data = oci_fetch_array($query)): 
                            ?>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No Kamar</label>
                                <input type="number" name="no_kamar" class="form-control" id="exampleInputEmail1" value="<?= $data['NO_KAMAR'] ?>" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tipe Kamar</label>
                                <input type="text" name="tipe_kamar" class="form-control" id="exampleInputPassword1" value="<?= $data['TIPE_KAMAR']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Harga</label>
                                <input type="number" name="harga" class="form-control" id="exampleInputPassword1" value="<?= $data['HARGA_KAMAR']; ?>"  required>
                            </div>
                    
                            <button name="submit" type="submit" class="btn btn-primary">Update</button>
                            </form>
                            <?php endwhile; ?>
                        </div>
                      </div>
                      </div>
                      <!-- END Form Insert kamar -->  

                        <div style="height: 100vh"></div>
                        <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
                    </div>
                </main>
                   <!-- END Layout Content Untuk templating-->







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
