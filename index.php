<?php
include "koneksi.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
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
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #2E8B57">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">UKK SHAFWAN</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"  style="color: #ffff"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" style="background-color: #2E8B57;" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading" style="color: #ffff">Core</div>
                        <a class="nav-link" href="?" style="color: #ffff">
                            <div class="sb-nav-link-icon" style="color: #ffff"><i class="fas fa-tachometer-alt "></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading" style="color: #ffff">Navigasi</div>
                        <?php
                        if ($_SESSION['user']['level'] != 'peminjam') {
                        ?>
                            <a class="nav-link" href="?page=kategori" style="color: #ffff">
                                <div class="sb-nav-link-icon" style="color: #ffff"><i class="fas fa-table"></i></div>
                                Kategori Buku
                            </a>

                            <a class="nav-link" href="?page=buku" style="color: #ffff">
                                <div class="sb-nav-link-icon " style="color: #ffff"><i class="fas fa-book"></i></div>
                                Buku
                            </a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link" href="?page=peminjaman" style="color: #ffff">
                                <div class="sb-nav-link-icon" style="color: #ffff"><i class="fas fa-book-open"></i></div>
                                Peminjaman
                            </a>
                        <?php
                        }
                        ?>
                        <a class="nav-link" href="?page=ulasan" style="color: #ffff">
                            <div class="sb-nav-link-icon" style="color: #ffff"><i class="fas fa-comment"></i></div>
                            Ulasan
                        </a>

                        <?php
                        if ($_SESSION['user']['level'] != 'peminjam') {
                        ?>
                            <a class="nav-link" href="?page=laporan" style="color: #ffff">
                                <div class="sb-nav-link-icon" style="color: #ffff"><i class="fas fa-book"></i></div>
                                Laporan Peminjaman
                            </a>
                        <?php
                        }
                        ?>
                      <?php if ($_SESSION['user']['level'] != 'admin') : ?>
                           <a class="nav-link" href="?page=koleksi_pribadi" style="color: #ffff">
                               <div class="sb-nav-link-icon" style="color: #ffff"><i class="fas fa-table"></i></div>
                               Koleksi Pribadi
                           </a>
                      <?php endif; ?>

                        <a class="nav-link" href="logout.php" style="color: #ffff">
                            <div class="sb-nav-link-icon" style="color: #ffff"><i class="fas fa-power-off"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer" style="background-color: #3CB371;">
                    <div class="small" style="color: #ffff">Logged in as:</div>
                    <?php echo $_SESSION['user']['nama_lengkap']; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <?php

                    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                    if (file_exists($page . '.php')) {
                        include $page . '.php';
                    } else {
                        include '404.php';
                    }
                    ?>
                </div>
            </main>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>