<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                 <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Koreksi Alternatif</h1>
                            </div>
                            <form class="user" method="post" action="alternatif/simpanrekordkoreksi">
                                <div class="form-group">
                                 <input type="hidden" name="idalternatife" value="<?php echo $itemalternatif['idalternatife'];?>" required>
                                 <?php echo validation_errors(); ?>
                                 <input type="text" name="namaalternatif" class="form-control form-control-user" id="exampleFirstName" 
                                  placeholder="Ketik nama alternatif" 
                                  value="<?php echo $itemalternatif['namaalternatif'];?>"
                                  required>
                                </div>
                                <input type="submit" name="bSimpan" value="Simpan Hasil Koreksi" class="btn btn-primary btn-user btn-block">
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>