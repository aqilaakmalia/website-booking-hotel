<?php 
include 'koneksi.php';
session_start();
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                            <a class="nav-link collapsed" href="dataCustomer.php"aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div><div>Customer</div>
                            </a>
                            <a class="nav-link collapsed" href="dataTransaksi.php"aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-cash-register"></i></div><div>Transaksi</div>
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as : admin</div>
                    </div>
                </nav>
            </div>


            <!--Layout Content Untuk templating-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar Kamar</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Room</li>
                        </ol>
                        <a class="btn btn-primary" href="formKamar.php">Tambah Kamar</a>
                       
                        <table class="table table-bordered mt-3">
                        <thead class="table-primary">
                            <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Kode Kamar</th>
                            <th scope="col">Tipe Kamar</th>
                            <th scope="col">Harga Kamar</th>
                            <th class="text-center" scope="col">Aksi</th>
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
                                <td class="text-center">
                                    <a class="btn btn-warning" href="updateKamar.php?no_kamar=<?= $data['NO_KAMAR']; ?>">Update</a> | <a class="btn btn-danger" href="hapusKamar.php?no_kamar=<?= $data['NO_KAMAR']; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php 
                             endwhile; 
                            oci_free_statement($query);
                             oci_close($koneksi);
                        ?>
                        </tbody>
                        </table>
                                                
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
        
    <?php if(@$_SESSION["sukses"]){ ?>
        <script>
            swal("Success", "<?php echo $_SESSION['sukses']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses']); } ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
