<h1 class="h3 mb-3"> Jurusan</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <a href="?page=tambah-jurusan" class="btn btn-success btn-sm">+ Tambah Jurusan</a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-hover cell-border" id="jurusan">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Jurusan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                           $i = 1;
                                           $query = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                           while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                             <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $data['nama_jurusan'] ?> </td>
                                                <td>
                                                    <a href="?page=ubah-jurusan&id=<?php echo $data['id_jurusan'] ?>"
                                                        class="btn btn-warning btn-sm rounded"><i data
                                                            data-feather="edit"></i></a>
                                                    <a href="?page=hapus-jurusan&id=<?php echo $data['id_jurusan'] ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm rounded"><i
                                                            data-feather="trash-2"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                           }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <script>
                        let table = new DataTable('#jurusan');
                    </script>    