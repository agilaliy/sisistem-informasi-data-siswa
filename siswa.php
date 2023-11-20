<?php
if (isset($_POST['kelas'])) {
    $kelas = $_POST['kelas'];
}
?>
<h1 class="h3 mb-3"> Siswa</h1>
<div class="row">
    <div class="col-12">
        <div class="card flex-fill">


            <div class="card-body">

                <?php
                if (!empty($_POST['kelas'])) {
                ?>
                    <a href="cetak-siswa.php?kelas=<?php echo $kelas ?>" class="btn btn-success btn-sm mb-3" target="_blank"><i data-feather="printer"></i> Print </a>
                <?php
                } else {
                ?>
                    <a href="cetak-siswa.php" class="btn btn-success btn-sm mb-3" target="_blank"><i data-feather="printer"></i> Print </a>
                <?php
                }

                ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select name="kelas" class="form-select">

                                    <option value="X" <?php echo isset($_POST['kelas']) == true ? ($_POST['kelas'] == 'X' ? 'selected' : '') : '' ?>>
                                        X
                                    </option>

                                    <option value="XI" <?php echo isset($_POST['kelas']) == true ? ($_POST['kelas'] == 'XI' ? 'selected' : '') : '' ?>>
                                        XI
                                    </option>

                                    <option value="XII" <?php echo isset($_POST['kelas']) == true ? ($_POST['kelas'] == 'XII' ? 'selected' : '') : '' ?>>
                                        XII
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-light"><i data-feather="search"></i></button>
                            <a href="?page=siswa" class="btn btn-light"><i data-feather="refresh-ccw"></i></a>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-striped table-hover cell-border" id="siswa">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['kelas'])) {
                            $kelas = $_POST['kelas'];
                            $query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE nama_kelas='$kelas'");
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
                        }
                        $i = 1;
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $data['nisn'] ?></td>
                                <td><?php echo $data['nis'] ?></td>
                                <td><?php echo $data['nama'] ?></td>
                                <td><?php echo $data['tmpt_lahir'] ?></td>
                                <td><?php echo $data['tgl_lahir'] ?></td>
                                <td><?php echo $data['jns_kelamin'] ?></td>
                                <td><?php echo $data['nama_kelas'] ?></td>
                                <td><?php echo $data['nama_jurusan'] ?></td>
                                <td>
                                    <a href="?page=ubah-siswa&id=<?php echo $data['nisn'] ?>" class="btn btn-warning btn-sm rounded"><i data data-feather="edit"></i></a>
                                    <a href="?page=hapus-siswa&id=<?php echo $data['nisn'] ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm rounded"><i data-feather="trash-2"></i></a>
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
<script>
    let table = new DataTable('#siswa');
</script>