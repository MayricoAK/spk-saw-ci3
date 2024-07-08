<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Koreksi Rating Kecocokan</h1>
                        </div>
                        <!-- <form class="user" method="post" action="<?php echo base_url();?>Ratingkecocokan/koreksiratingkecocokan/<?php echo $itemratingkecocokan['idrating']; ?>" onsubmit="return convertHafalanAlquran()">
                            <div class="form-group">
                                <label for="idkriteria">Pilih Kriteria</label>
                                <select id="idkriteria" name="idkriteria" required>
                                    <?php foreach ($pilidkriteria as $row) : ?>
                                        <option value="<?php echo $row['idkriteria']; ?>" 
                                        data-namakriteria="<?php echo $row['namakriteria']; ?>" 
                                        <?php if ($row['idkriteria'] == $itemratingkecocokan['idkriteria']) echo 'selected'; ?>>
                                            <?php echo $row['namakriteria']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="idalternatife">Pilih Alternatif</label>
                                <select name="idalternatife" required>
                                    <?php foreach ($pilidalternatif as $row) : ?>
                                        <option value="<?php echo $row['idalternatife']; ?>" <?php if ($row['idalternatife'] == $itemratingkecocokan['idalternatife']) echo 'selected'; ?>>
                                            <?php echo $row['namaalternatif']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nilairating">Nilai Rating (Masukkan jumlah juz untuk hafalan Al-Qur'an)</label>
                                <input type="text" id="nilairating" name="nilairating" value="<?php echo $itemratingkecocokan['nilairating']; ?>" required>
                            </div>
                            <input type="submit" name="bSimpan" value="Simpan" class="btn btn-primary btn-user btn-block">
                            <hr>
                        </form> -->

                        <form class="user" method="post" action="<?php echo base_url();?>Ratingkecocokan/koreksiratingkecocokan/<?php echo $itemratingkecocokan['idrating']; ?>" onsubmit="return convertHafalanAlquran()">
                            <table class="table">
                                <tr>
                                    <td><label for="idkriteria">Pilih Kriteria</label></td>
                                    <td>
                                        <select id="idkriteria" name="idkriteria" required>
                                        <?php foreach ($pilidkriteria as $row) : ?>
                                            <option value="<?php echo $row['idkriteria']; ?>" 
                                            data-namakriteria="<?php echo $row['namakriteria']; ?>" 
                                            <?php if ($row['idkriteria'] == $itemratingkecocokan['idkriteria']) echo 'selected'; ?>>
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
                                            <?php if ($row['idalternatife'] == $itemratingkecocokan['idalternatife']) echo 'selected'; ?>>
                                                <?php echo $row['namaalternatif']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="nilairating">Nilai Rating</label></td>
                                    <td>
                                        <input type="text" id="nilairating" name="nilairating" value="<?php echo $itemratingkecocokan['nilairating']; ?>" required>
                                    </td>
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

<script>
    function convertHafalanAlquran() {
        const kriteriaSelect = document.getElementById('idkriteria');
        const selectedOption = kriteriaSelect.options[kriteriaSelect.selectedIndex];
        const namakriteria = selectedOption.getAttribute('data-namakriteria').toLowerCase();
        const nilairatingInput = document.getElementById('nilairating');

        if (namakriteria === 'hafalan alquran') {
            const juz = parseFloat(nilairatingInput.value);
            if (isNaN(juz) || juz < 0) {
                alert('Masukkan nilai yang valid untuk hafalan Al-Qur\'an.');
                return false;
            }
            if (juz > 30) {
                alert('Nilai hafalan Al-Qur\'an tidak boleh melebihi 30.');
                return false;
            }
            const convertedValue = juz / 30;
            nilairatingInput.value = convertedValue.toFixed(2);
        }
        return true;
    }
</script>
