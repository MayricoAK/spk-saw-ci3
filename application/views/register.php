<div class="container">

        <!-- Card: Tutorial -->
        <div class="col-lg-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-primary text-uppercase mb-1">Input Pengguna Baru</div>
                            <?php echo validation_errors(); ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <form class="user" method="post" action="pengguna/simpanrekordbaru">
                                <div class="form-group">
                                 <input type="text" name="idpengguna" class="form-control form-control-user" id="exampleFirstName" 
                                 value="<?php echo set_value('idpengguna'); ?>"
                                 placeholder="First Name">
                                </div>
                                <div class="form-group">
                                 <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                <input type="password" name="konfirmasipassword" class="form-control form-control-user"
                                id="exampleRepeatPassword" placeholder="Ulangi ketik Passwordnya">
                                </div>
                                <input type="submit" name="bSimpan" value="Simpan Pengguna Baru" class="btn btn-primary btn-user btn-block">
                                <hr>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Table Pengguna</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Pengguna</th>
                                            <th>Koreksi/Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php foreach ($itempengguna as $row): ?>
                                        <tr>
                                            <td><?php echo $row['idpengguna']; ?></td>
                                            <td><a href="pengguna/koreksi/<?php echo $row['idpengguna']; ?>" class="btn btn-primary btn-user btn-block">Koreksi</a>
                                                <a href="pengguna/hapus/<?php echo $row['idpengguna']; ?>" 
                                                onclick="return(confirm('Apakah yakin akan menghapus rekord ini ?'))"
                                                class="btn btn-danger btn-user btn-block">Hapus</a>
                                            </td>
                                        </tr><?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
