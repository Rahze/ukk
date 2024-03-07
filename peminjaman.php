<?php
$query = mysqli_query($koneksi, "SELECT * FROM peminjaman 
    LEFT JOIN user ON user.id_user = peminjaman.id_user 
    LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku 
    WHERE peminjaman.id_user=" . $_SESSION['user']['id_user']);

?>

<h1 class="mt-4"> Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=peminjaman_tambah" class="btn btn-primary" style="background-color: #2E8B57; color: #fff;"><i class="fa fa-plus"></i> Tambah Peminjaman</a>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo htmlspecialchars($data['username']); ?></td>
                                <td><?php echo htmlspecialchars($data['judul']); ?></td>
                                <td><?php echo htmlspecialchars($data['tanggal_peminjaman']); ?></td>
                                <td><?php echo htmlspecialchars($data['tanggal_pengembalian']); ?></td>
                                <td><?php echo htmlspecialchars($data['status_peminjaman']); ?></td>
                                <td>
                                    <?php
                                    if ($data['status_peminjaman'] != 'dikembalikan') {
                                    ?>
                                        <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-info" style="background-color: #2E8B57; color: #fff;">Kembalikan</a>
                                        <!-- <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger">Hapus</a> -->
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>