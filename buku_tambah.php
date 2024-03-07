  <h1 class="mt-4">Buku</h1>
  <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
      <form method="post">
      <?php
if(isset($_POST['submit'])){
    $id_kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];

    // Pemeriksaan apakah input kategori, judul, penulis, penerbit, tahun_terbit, dan deskripsi tidak kosong
    if(empty($id_kategori) || empty($judul) || empty($penulis) || empty($penerbit) || empty($tahun_terbit) || empty($deskripsi)){
        echo '<script>alert("Semua kolom harus diisi.");</script>';
    } else {
        // Lanjutkan dengan penyimpanan data jika semua input tidak kosong
        $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi) VALUES('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");

        if($query) {
            echo '<script>alert("Tambah data berhasil.");</script>';
        } else {
            echo '<script>alert("Tambah data gagal.");</script>';
        }
    }
}
?>



<div class="row mb-3">
    <div class="col-md-2">Kategori</div>
    <div class="col-md-8">
        <select class="form-control" name="kategori">
            <option value="">Pilih Kategori</option>
            <?php
                // Ambil data kategori dari database
                $result = mysqli_query($koneksi, "SELECT * FROM kategori");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id_kategori'] . '">' . $row['kategori'] . '</option>';
                }
            ?>
        </select>
    </div>
</div>
          <div class="row mb-3">
              <div class="col-md-2">Judul Buku</div>
              <div class="col-md-8"><input type="text" class="form-control" name="judul"></div>
          </div>
          <div class="row mb-3">
              <div class="col-md-2">Penulis</div>
              <div class="col-md-8"><input type="text" class="form-control" name="penulis"></div>
          </div>
          <div class="row mb-3">
              <div class="col-md-2">Penerbit</div>
              <div class="col-md-8"><input type="text" class="form-control" name="penerbit"></div>
          </div>
          <div class="row mb-3">
              <div class="col-md-2">Tahun Terbit</div>
              <div class="col-md-8"><input type="text" class="form-control" name="tahun_terbit"></div>
          </div>
          <div class="row mb-3">
              <div class="col-md-2">Deskripsi</div>
              <div class="col-md-8"><input type="text" class="form-control" name="deskripsi"></div>
          </div>
          <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                    <button type="submit" class="btn btn-success" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=buku" class="btn btn-danger">Kembali</a>
             </div>
          </div>
      </form>
    </div>
  </div>
</div>
</div>