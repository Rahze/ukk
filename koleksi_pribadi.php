<?php
$id_user = $_SESSION['user']['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM koleksi_pribadi LEFT JOIN buku ON buku.id_buku = koleksi_pribadi.id_buku WHERE koleksi_pribadi.id_user = '$id_user'");

$row = [];

while ($result = mysqli_fetch_array($query)) {
    $row[] = $result;
}
?>

<h1 class="mt-4">Koleksi Pribadi</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                // Check if the user is not an admin
                if ($_SESSION['user']['level'] != 'admin') :
                ?>
                    <a href="?page=koleksi_tambah" class="btn btn-info" style="background-color: #2E8B57; color: #fff;">+ Tambah Data</a>

                <?php endif; ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <!-- <th>Nama Kategori</th> -->
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($row as $book) :
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $book['judul']   ?></td>
                            <td><?php echo $book['penulis']   ?></td>
                            <td><?php echo $book['penerbit']   ?></td>
                            <td><?php echo $book['tahun_terbit']   ?></td>
                            <td><?php echo $book['deskripsi']   ?></td>
                            <!-- Cek apakah pengguna adalah admin -->
                            <?php if ($_SESSION['user']['level'] == 'peminjam') : ?>
                                <td>
                                    <a href="?page=koleksi_hapus&&id=<?= $book['id_koleksi']; ?>" class="btn btn-warning" style="background-color: #2E8B57; color: #fff;" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
