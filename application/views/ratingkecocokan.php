<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Input Rating Kecocokan Baru</h1>
                        </div>
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('error'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                            // Hapus flashdata setelah ditampilkan
                            $this->session->unset_userdata('error');
                            ?>
                        <?php endif; ?>
                        <form class="user" method="post" action="Ratingkecocokan/buatratingkecocokanbaru">
                            <table class="table">
                                <tr>
                                    <td><label for="idkriteria">Pilih Kriteria</label></td>
                                    <td>
                                        <select name="idkriteria" required>
                                            <?php 
                                            if (!isset($_SESSION)) session_start();
                                            if (empty($_SESSION['pilikrit'])) $_SESSION['pilikrit']=0;
                                            if (empty($_SESSION['pilidat'])) $_SESSION['pilidat']=0;
                                            foreach ($pilidkriteria as $row) : ?>
                                                <option value="<?php echo $row['idkriteria']; ?>"
                                                <?php if($row['idkriteria'] == $_SESSION['pilikrit']) echo "selected"; ?>>
                                                    <?php echo $row['namakriteria']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="idalternatife">Pilih Alternatif</label></td>
                                    <td>
                                        <select name="idalternatife" required>
                                            <?php foreach ($pilidalternatif as $row) : ?>
                                                <option value="<?php echo $row['idalternatife']; ?>"
                                                <?php if($row['idalternatife'] == $_SESSION['pilidat']) echo "selected"; ?>>
                                                    <?php echo $row['namaalternatif']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="nilairating">Nilai Rating</label></td>
                                    <td><input type="text" name="nilairating" required placeholder="Isi nilainya"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="submit" name="bSimpan" value="Simpan" class="btn btn-primary btn-user btn-block">
                                    </td>
                                </tr>
                            </table>
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
    <h1 class="h3 mb-2 text-gray-800">Tabel Rating Kecocokan</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <?php foreach ($pilidkriteria as $r) : ?>
                                <th><?php echo $r['namakriteria']; ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>

                    <tbody><?php foreach ($pilidalternatif as $ra) : ?>
                            <tr>
                                <td><?php echo $ra['namaalternatif']; ?></td>
                                <?php foreach ($pilidkriteria as $rk) : ?>
                                    <td><?php foreach ($itemratingkecocokan as $ir) :
                                            if (($ir['idalternatife'] == $ra['idalternatife']) and ($ir['idkriteria'] == $rk['idkriteria'])) {
                                                echo $ir['nilairating']; ?>
                                                <a href="ratingkecocokan/koreksiratingkecocokan/<?php echo $ir['idrating']; ?>" class="btn btn-primary btn-user btn-block">Koreksi</a>
                                                <a href="ratingkecocokan/hapusratingkecocokan/<?php echo $ir['idrating']; ?>" class="btn btn-danger btn-user btn-block">Hapus</a>
                                        <?php }
                                        endforeach; ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer py-3">
            <a href="<?= base_url();?>Ratingkecocokan/hapusall" class="btn btn-danger"
			onclick="return(confirm('Apakah yakin akan menghapus semua rekord Ratingkecocokan ?'))">
			Hapus Semua</a>
			<a href="<?= base_url();?>saw" class="btn btn-primary">
			Normalisasi Matriks</a>
        </div>
    </div>
</div><!-- /.container-fluid -->
</div><!-- End of Main Content -->