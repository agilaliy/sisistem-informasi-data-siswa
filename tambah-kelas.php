<?php
if (isset ($_POST['nama_kelas'])) {
    $nama_kelas = $_POST['nama_kelas'];
    $id_jurusan = $_POST['id_jurusan'];


    $query =mysqli_query($koneksi, "INSERT INTO kelas (nama_kelas,id_jurusan) VALUES ('$nama_kelas','$id_jurusan')");

    if ($query) {
        echo '<script>alert("Data Berhasil di Tambah");locaton.href="?page=kelas";</script>';
    }
}
?>

<h1 class="h3 mb-3">Tambah Kelas</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <div class="">
                            <input type="text" name="nama_kelas" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Jurusan</label>
                        <select name="id_jurusan" class="form-select">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM jurusan");
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?php echo $data['id_jurusan'] ?>"><?php echo $data['nama_jurusan'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                      <button class="btn btn-success"><i data-feather="save"></i></button>
                        <button type="reset" class="btn btn-danger"><i
                                data-feather="refresh-ccw"></i></button>
                    </div>  
                </form>

            </div>

        </div>
    </div>
</div>
