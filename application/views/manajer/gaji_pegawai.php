<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $title; ?></h2>
            </div>
        </div>
        <!-- /. baris  -->
        <hr />
        <?php if (validation_errors()) : ?>
            <div class="row">
                <div class="col-sm-3">
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Gaji Pokok</th>
                            <th>Gaji Bonus</th>
                            <th>Total Gaji</th>
                            <th>Tanggal</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($salary as $sly) : ?>
                            <?php if ($sly['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $sly['nama_pegawai']; ?></td>
                                    <td><?= $sly['gaji_pokok']; ?></td>
                                    <td><?= $sly['gaji_bonus']; ?></td>
                                    <td><?= $sly['total_gaji_pegawai']; ?></td>
                                    <td><?= $sly['tanggal_gaji']; ?></td>
                                    <td>
                                        <a href="#edit-gaji" class="btn btn-warning" data-id="<?php echo $sly['id_gaji'] ?>" data-nama="<?php echo $sly['nama_pegawai'] ?>" data-pokok="<?php echo $sly['gaji_pokok'] ?>" data-bonus="<?php echo $sly['gaji_bonus'] ?>" data-total="<?php echo $sly['total_gaji_pegawai'] ?>" data-tanggal="<?php echo $sly['tanggal_gaji'] ?>" data-toggle="modal">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('manajer/changeActiveGaji') ?>" method="post">
                                            <input type="hidden" name="id_gaji" value="<?= $sly['id_gaji']; ?>" />
                                            <button type="submit" class="btn btn-danger" role="buttton" value="0" name="active" onclick="return confirm('Apakah anda ingin menghapus data ini?');"><i class="fa fa-fw fa-eraser"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-primary" data-toggle="modal" data-target="#gaji-pegawai" style="border-radius:10px;"><i class="fa fa-plus"></i>&nbsp;Add</button>
            </div>


            <!----------------------------------------------------------------- Modal Add ------------------------------------------------------------------->
            <div class="modal fade" id="gaji-pegawai" tabindex="-1" role="dialog" aria-labelledby="gajiLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gajiLabel">Gaji Pegawai</h5>
                        </div>
                        <form action="<?= base_url('manajer/gaji_pegawai'); ?>" method="POST" name="formGaji" id="formGaji">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        Nama Pegawai
                                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai">
                                    </div>
                                    <div class="col-md-6">
                                        Tanggal
                                        <input type="date" class="form-control" id="tanggal_gaji" name="tanggal_gaji" placeholder="Tanggal">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        Gaji Pokok
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="Gaji Pokok">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        Gaji Bonus
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="number" class="form-control" id="gaji_bonus" name="gaji_bonus" placeholder="Gaji Bonus">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        Total Gaji
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="number" class="form-control" id="total_gaji_pegawai" name="total_gaji_pegawai" placeholder="Total Gaji" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius:10px">Close</button>
                                <button type="submit" class="btn btn-primary" style="border-radius:10px">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------End Of Modal Add  ------------------------------------------------------------------->



            <!----------------------------------------------------------------- Modal Edit ------------------------------------------------------------------->
            <div class="modal fade" id="edit-gaji" tabindex="-1" role="dialog" aria-labelledby="editGajiLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editGajiLabel">Edit Gaji Pegawai</h5>
                        </div>
                        <form action="<?= base_url('manajer/editGajiPegawai'); ?>" method="POST" name="formEditGaji" id="formEditGaji">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        Nama Pegawai
                                        <input type="hidden" name="id_gaji" id="id_gaji">
                                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai">
                                    </div>
                                    <div class="col-md-6">
                                        Tanggal
                                        <input type="date" class="form-control" id="tanggal_gaji" name="tanggal_gaji" placeholder="Tanggal">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        Gaji Pokok
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="number" class="form-control pokok" id="gaji_pokok" name="gaji_pokok" placeholder="Gaji Pokok">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        Gaji Bonus
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="number" class="form-control bonus" id="gaji_bonus" name="gaji_bonus" placeholder="Gaji Bonus">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        Total Gaji
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="number" class="form-control total" id="total_gaji_pegawai" name="total_gaji_pegawai" placeholder="Total Gaji" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius:10px">Close</button>
                                <button type="submit" class="btn btn-primary" style="border-radius:10px">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------End Of Modal Edit  ------------------------------------------------------------------->
        </div>
        <!-- /. baris  -->
    </div>
    <!-- /. Page Inner  -->
</div>