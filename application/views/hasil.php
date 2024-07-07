<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Hasil Perhitungan dan Perangkingan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Perangkingan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Atribut</th>
                            <th>Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rangking as $rank => $item) : ?>
                            <tr>
                                <td><?php echo $rank + 1; ?></td>
                                <td><?php echo $item['namaatribut']; ?></td>
                                <td><?php echo $item['nilaiakhir']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                Dengan demikain urutan ranking rekomendasi adalah : <br>
                <?php $nmr=1;
				foreach ($rangking as $rank) { 
				echo $nmr++.'. '.$rank['namaatribut'].' dengan Nilai '
				.$rank['nilaiakhir'].'<br>';
				};
				?>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->
