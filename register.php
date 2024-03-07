<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Ke Perpustakaan Digital</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary" style="background-image: url(assets/img/background_login.jpg); background-size:cover;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Register Perpustakaan Digital</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['register'])) {
                                        $email = $_POST['email'];
                                        $username = $_POST['username'];
                                    
                                        // Pemeriksaan apakah data sudah ada di database
                                        $check_duplicate = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' OR username='$username'");
                                    
                                        if (mysqli_num_rows($check_duplicate) > 0) {
                                            // Jika data sudah ada, tampilkan pesan kesalahan
                                            echo '<script>alert("Maaf, Email atau Username yang anda gunakan sudah terdaftar.");</script>';
                                        } else {
                                            // Jika data belum ada, lakukan proses registrasi
                                            $nama_lengkap = $_POST['nama_lengkap'];
                                            $alamat = $_POST['alamat'];
                                            $no_telpon = $_POST['no_telpon'];
                                            $level = $_POST['level'];
                                            $password = $_POST['password'];
                                    
                                            $insert = mysqli_query($koneksi, "INSERT INTO user(nama_lengkap,email,alamat,no_telpon,username,password,level) VALUES('$nama_lengkap','$email','$alamat','$no_telpon','$username','$password','$level')");
                                    
                                            if ($insert) {
                                                echo '<script>alert("Selamat, register berhasil. Silahkan Login"); location.href="login.php"</script>';
                                            } else {
                                                echo '<script>alert("Register gagal, silahkan ulangi kembali.");</script>';
                                            }
                                        }
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="small mb-1">Nama Lengkap</label>
                                            <input class="form-control py-4" type="text" required name="nama_lengkap" placeholder="Masukan Nama Lengkap" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Email</label>
                                            <input class="form-control py-4" type="text" required name="email" placeholder="Masukan Email" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Alamat</label>
                                            <textarea name="alamat" rows="5" required class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">No. Telpon</label>
                                            <input class="form-control py-4" type="text" required name="no_telpon" placeholder="Masukan No. Telpon" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Username</label>
                                            <input class="form-control py-4" id="inputusername" required type="username" name="username" placeholder="Masukan Username" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" required type="password" name="password" placeholder="Masukan Password" />
                                        </div>
                                        <div class="form-group">
                                            <label for="small mb-1">Level</label>
                                            <select name="level" class="form-control">
                                                <option value="peminjam">Peminjam</option>
                                            </select>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-success" type="submit" name="register" value="register" href="index.php">Register</button>
                                            <a class="btn btn-danger" href="login.php">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        &copy; UKK Shafwan Perpustakaan Digital.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>

</html>