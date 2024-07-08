<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Rating Kecocokan</h1>
                        </div>
                        <form class="user" method="post" action="<?php echo base_url();?>Ratingkecocokan/buatratingkecocokanbaru">
                            <div class="form-group">
                                <label for="idkriteria">Pilih Kriteria</label>
                                <select name="idkriteria" required>
                                    <?php foreach ($pilidkriteria as $row) : ?>
                                        <option value="<?php echo $row['idkriteria']; ?>" <?php if ($row['idkriteria'] == $_SESSION['pilikrit']) echo 'selected'; ?>>
                                            <?php echo $row['namakriteria']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="idalternatife">Pilih Alternatif</label>
                                <select name="idalternatife" required>
                                    <?php foreach ($pilidalternatif as $row) : ?>
                                        <option value="<?php echo $row['idalternatife']; ?>" <?php if ($row['idalternatife'] == $_SESSION['pilidat']) echo 'selected'; ?>>
                                            <?php echo $row['namaalternatif']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nilairating">Nilai Rating (Masukkan jumlah juz untuk hafalan Al-Qur'an)</label>
                                <input type="text" name="nilairating" required placeholder="Isi nilainya">
                            </div>
                            <input type="submit" name="bSimpan" value="Simpan" class="btn btn-primary btn-user btn-block">
                            <hr>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
