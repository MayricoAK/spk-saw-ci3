<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Input Bobot Kriteria</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Bobot Kriteria</h6>
        </div>
        <div class="card-body">
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

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            // Hapus flashdata setelah ditampilkan
            $this->session->unset_userdata('success');
            ?>
        <?php endif; ?>

        <div class="table-responsive">
            <form method="post" action="<?php echo base_url();?>kriteria/bobot">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kriteria</th>
                            <th>Jenis Kriteria</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $num=1;foreach ($itemkriteria as $ra) : ?>
                        <tr>
                            <input type="hidden" value="<?php echo $ra['idkriteria'];?>" name="idkriteria[]">
                            <td><?php echo $num++; ?></td>
                            <td><?php echo $ra['namakriteria']; ?></td>
                            <td>
                                <select name="jeniskriteria[]" required>
                                    <option value="1" <?php if ($ra['jeniskriteria']=='1') echo 'selected';?>>Cost</option>
                                    <option value="2" <?php if ($ra['jeniskriteria']=='2') echo 'selected';?>>Benefit</option>
                                </select>
                            </td>
                            <td>
                            <input type="number" step="0.01" value="<?php echo $ra['bobotpreferensi'];?>" name="bobotharapan[]" required>
                            </td>
                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th colspan="<?php echo count($itemkriteria); ?>">
                                <input type="submit" value="Simpan Nilai Bobot" name="bSimpanBobot" class="btn btn-primary">
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>

        </div>
    </div>
</div><!-- /.container-fluid -->
