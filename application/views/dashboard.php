<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
    <p class="mb-4">Selamat datang <?php if (isset($_SESSION['_userid'])) echo $_SESSION['_userid']; ?></p>

    <!-- Content Row -->
    <div class="row">

        <!-- Card: Tutorial -->
        <div class="col-xl-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-primary text-uppercase mb-1">Tutorial menggunakan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <ol>
                                    <li>Masukkan data atribut dan kriteria.</li>
                                    <li>Masukkan bobot pada masing-masing kriteria yang ada.</li>
                                    <li>Masukkan rating atau penilaian terhadap kriteria atribut dan masuk ke halaman Normalisasi Matriks.</li>
                                    <li>Klik tombol perangkingan.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Atribut -->
        <div class="col-xl-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <h5 class="card-title">Tabel Atribut</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableAtribut" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Atribut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1; foreach ($itematribut as $row): ?>
                                    <tr>
                                        <td><?php echo $num++; ?></td>
                                        <td><?php echo $row['namaatribut']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="<?= base_url();?>atribut" class="btn btn-primary mt-3">
                        Halaman Atribut
                    </a>
                </div>
            </div>
        </div>

        <!-- Tabel Kriteria -->
        <div class="col-xl-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <h5 class="card-title">Tabel Kriteria</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableKriteria" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kriteria</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1; foreach ($itemkriteria as $row): ?>
                                    <tr>
                                        <td><?php echo $num++; ?></td>
                                        <td><?php echo $row['namakriteria']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="<?= base_url();?>kriteria" class="btn btn-primary mt-3">
                        Halaman Kriteria
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
