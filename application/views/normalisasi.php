<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Matrix Normalisasi</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Matrix Normalisasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <?php foreach ($pilidkriteria as $r) : ?>
                                <th><?php echo $r['namakriteria']; ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pilidalternatif as $alternatif) : ?>
                            <tr>
                                <td><?php echo $alternatif['namaalternatif']; ?></td>
                                <?php foreach ($pilidkriteria as $kriteria) : ?>
                                    <?php
                                    // Cari data normalisasi berdasarkan idalternatif dan idkriteria
                                    $idalternatife = $alternatif['idalternatife'];
                                    $idkriteria = $kriteria['idkriteria'];
                                    $nilaiNormalisasi = null;

                                    foreach ($itemratingkecocokan as $rating) {
                                        if ($rating['idalternatife'] == $idalternatife && $rating['idkriteria'] == $idkriteria) {
                                            $nilaiNormalisasi = $rating['nilainormalisasi'];
                                            break;
                                        }
                                    }
                                    ?>
                                    <td><?php echo number_format($nilaiNormalisasi, 2); ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="<?php echo count($pilidkriteria) + 1; ?>">
                                <a href="<?= base_url(); ?>saw/hasil" class="btn btn-primary">
                                    Perangkingan
                                </a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->
