<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Data Pegawai</h2>
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
                <table id="example" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Status</th>
                            <th>Bulan Masuk</th>
                            <th>Bulan Keluar</th>
                            <th>Total Absen</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($pegawai as $pg) : ?>
                            <?php if ($pg['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $pg['nama_pegawai']; ?></td>
                                    <td><?= ($pg['status_aktif'] == 1 ? 'Aktif' : 'Mutasi'); ?></td>
                                    <td><?= $pg['tanggal_hadir']; ?></td>
                                    <td><?= $pg['tanggal_keluar']; ?></td>
                                    <td><?= $pg['kehadiran']; ?></td>
                                    <td>
                                        <a href="#edit-data-pegawai" class="btn btn-warning" data-id="<?php echo $pg['id_absen']; ?>" data-nama="<?php echo $pg['nama_pegawai']; ?>" data-bulan="<?php echo $pg['tanggal_keluar']; ?>" data-status="<?php echo $pg['status_aktif']; ?>" data-toggle="modal">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('manajer/changeActiveAbsen') ?>" method="POST">
                                            <input type="hidden" name="id_absen" value="<?= $pg['id_absen']; ?>" />
                                            <button type="submit" class="btn btn-danger" role="buttton" value="0" name="active" onclick="return confirm('Apakah anda ingin menghapus data ini?');"><i class="fa fa-fw fa-eraser"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!------------------------------------------ Modal Ubah -------------------------------->
        <div aria-hidden="true" aria-labelledby="editDataPegawaiLabel" role="dialog" tabindex="-1" id="edit-data-pegawai" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="editDataPegawaiLabel">Change Status Pegawai</h4>
                    </div>
                    <form action="<?php echo base_url('manajer/data_pegawai') ?>" method="POST" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    Nama Pegawai
                                    <input type="hidden" id="id_absen" name="id_absen">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    Tanggal Keluar
                                    <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" placeholder="Tanggal Keluar">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    Status Aktif
                                    <select class="form-control" id="status_aktif" name="status_aktif">
                                        <option value="0" <?= ($pg['status_aktif'] == 0 ? 'selected' : ''); ?>>Mutasi</option>
                                        <option value="1" <?= ($pg['status_aktif'] == 1 ? 'selected' : ''); ?>>Aktif</option>
                                    </select>
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
    </div>
    <!----------------------------------- END Modal Ubah ------------------------------------>
</div>
<!-- /. baris  -->

</div>
<!-- /. Page Inner  -->