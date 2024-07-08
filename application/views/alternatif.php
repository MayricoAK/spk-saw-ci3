<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                 <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Input Alternatif Baru</h1>
                            </div>
                            <form class="user" method="post" action="alternatif/simpanrekordbaru">
                                <div class="form-group">
                                 <?php echo validation_errors(); ?>
                                 <input type="text" name="namaalternatif" class="form-control form-control-user" id="exampleFirstName" 
                                  placeholder="Ketik nama Alternatif" required>
                                </div>
                                <input type="submit" name="bSimpan" value="Simpan Rekord Baru" class="btn btn-primary btn-user btn-block">
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Alternatif</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Tabel Alternatif</h6>
							
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Alternatif</th>
                                            <th>Nama Alternatif</th>
                                            <th>Koreksi/Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php $num = 1; foreach ($itemalternatif as $row): ?>
                                        <tr>
                                            <td><?php echo $num++; ?></td>
                                            <td><?php echo $row['namaalternatif']; ?></td>
                                            <td><a href="alternatif/koreksi/<?php echo $row['idalternatife']; ?>" class="btn btn-primary btn-user btn-block">Koreksi</a>
                                                <a href="alternatif/hapus/<?php echo $row['idalternatife']; ?>" 
                                                onclick="return(confirm('Apakah yakin akan menghapus rekord terpilih ?'))"
                                                class="btn btn-danger btn-user btn-block">Hapus</a>
                                            </td>
                                        </tr><?php endforeach; ?>
                                    </tbody>
                                </table>
                                <a href="<?= base_url();?>Alternatif/hapusall" class="btn btn-danger"
                                onclick="return(confirm('Apakah yakin akan menghapus semua rekord alternatif ?'))">
                                Hapus Semua Rekord</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
