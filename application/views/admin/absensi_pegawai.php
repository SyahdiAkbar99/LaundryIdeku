<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Absensi Pegawai</h2>
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
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Presensi</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($absensi as $abs) : ?>
                            <?php if ($abs['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $abs['nama_pegawai']; ?></td>
                                    <td><?= $abs['tanggal_hadir']; ?></td>
                                    <td><?= $abs['jam_masuk']; ?></td>
                                    <td><?= $abs['jam_keluar']; ?></td>
                                    <td><?= ($abs['presensi'] == 1) ? 'Hadir' : 'Absen'; ?></td>
                                    <td><button type="button" class="btn btn-warning" role="buttton" data-toggle="modal" data-target="#edit_absensi_pegawai<?php echo $abs['id_absen']; ?>"><i class="fa fa-edit"></i></button></td>
                                    <td>
                                        <form action="<?= base_url('admin/changeActiveAbsen') ?>" method="post">
                                            <input type="hidden" name="id_absen" value="<?= $abs['id_absen']; ?>" />
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
        <!-- Trigger button -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#absensi_pegawai" style="border-radius:10px;"><i class="fa fa-plus"></i>&nbsp;Add</button>

        <!-- Modal Add -->
        <div class="modal fade" id="absensi_pegawai" tabindex="-1" role="dialog" aria-labelledby="absensiPegawaiLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="absensiPegawaiLabel">Absensi Pegawai</h5>
                    </div>
                    <form action="<?= base_url('admin/absensi_pegawai'); ?>" method="POST" name="formAbsensiPegawai" id="formAbsensiPegawai">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai">
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="tanggal_hadir" name="tanggal_hadir" placeholder="Tanggal Hadir">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    Jam Masuk
                                    <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" placeholder="Jam Masuk">
                                </div>
                                <div class="form-group col-md-6">
                                    Jam Keluar
                                    <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" placeholder="Jam Keluar">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    Presensi
                                    <select class="form-control" name="presensi">
                                        <option value="0">Absen</option>
                                        <option value="1">Hadir</option>
                                    </select>
                                </div>
                                <br>
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
        <!--End Of Modal Add  -->


        <!-- Modal Edit -->
        <?php $i = 0;
        foreach ($absensi as $abs) : $i++; ?>
            <div class="modal fade" id="edit_absensi_pegawai<?php echo $abs['id_absen']; ?>" tabindex="-1" role="dialog" aria-labelledby="editAbsensiPegawaiLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAbsensiPegawaiLabel">Edit Absensi Pegawai</h5>
                        </div>
                        <?php echo form_open_multipart('admin/editAbsensiPegawai') ?>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="id_absen" id="id_absen" value="<?php echo $abs['id_absen']; ?>">
                                <div class="form-group col-md-6">
                                    Nama Pegawai
                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai" value="<?= $abs['nama_pegawai']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    Tanggal Hadir
                                    <input type="date" class="form-control" id="tanggal_hadir" name="tanggal_hadir" placeholder="Tanggal Hadir" value="<?= $abs['tanggal_hadir']; ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    Jam Masuk
                                    <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" placeholder="Jam Masuk" value="<?= $abs['jam_masuk']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    Jam Keluar
                                    <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" placeholder="Jam Keluar" value="<?= $abs['jam_keluar']; ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    Presensi
                                    <select class="form-control" name="presensi">
                                        <option value="0" <?= ($abs['presensi'] == 0) ? 'selected' : ''; ?>>Absen</option>
                                        <option value="1" <?= ($abs['presensi'] == 1) ? 'selected' : ''; ?>>Hadir</option>
                                    </select>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius:10px">Close</button>
                            <button type="submit" class="btn btn-primary" style="border-radius:10px">Save</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!--End Of Modal Edit  -->
    </div>
    <!-- /. baris  -->
</div>