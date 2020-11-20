<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Ongkos</h2>
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
                            <th>Listrk</th>
                            <th>Pajak</th>
                            <th>Total Harga Barang</th>
                            <th>Total Gaji Pegawai</th>
                            <th>Total Ongkos</th>
                            <th>Tanggal</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($ongkos as $ong) : ?>
                            <?php if ($ong['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $ong['listrik']; ?></td>
                                    <td><?= $ong['pajak']; ?></td>
                                    <td><?= $ong['total_harga_barang']; ?></td>
                                    <td><?= $ong['total_gaji_pegawai']; ?></td>
                                    <td><?= $ong['total_ongkos']; ?></td>
                                    <td><?= $ong['tanggal_ongkos']; ?></td>
                                    <td>
                                        <a href="#edit-ongkos" class="btn btn-warning" data-id-ongkos="<?php echo $ong['id_ongkos'] ?>" data-listrik="<?php echo $ong['listrik'] ?>" data-pajak="<?php echo $ong['pajak'] ?>" data-totharbar="<?php echo $ong['total_harga_barang'] ?>" data-totgajpeg="<?php echo $ong['total_gaji_pegawai'] ?>" data-totong="<?php echo $ong['total_ongkos'] ?>" data-tangos="<?php echo $ong['tanggal_ongkos'] ?>" data-toggle="modal">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('admin/changeActiveOngkos') ?>" method="post">
                                            <input type="hidden" name="id_ongkos" value="<?= $ong['id_ongkos']; ?>" />
                                            <button type="submit" class="btn btn-danger" role="buttton" value="0" name="active" onclick="return confirm('Apakah anda ingin menghapus data ini?');"><i class="fa fa-fw fa-eraser"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ongkos" style="border-radius:10px;"><i class="fa fa-plus"></i>&nbsp;Add</button>

        <!----------------------------------------------------------------- Modal Add ------------------------------------------------------------------->
        <div class="modal fade" id="ongkos" tabindex="-1" role="dialog" aria-labelledby="ongkosLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ongkosLabel">Ongkos</h5>
                    </div>
                    <form action="<?= base_url('admin/ongkos'); ?>" method="POST" name="formOngkos" id="formOngkos">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    Listrik
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="number" class="form-control" id="listrik" name="listrik" placeholder="Listrik">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    Pajak (Dalam Rupiah)
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="number" class="form-control" id="pajak" name="pajak" placeholder="Pajak">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    Total Harga Barang
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="number" class="form-control" id="total_harga_barang" name="total_harga_barang" placeholder="Total Harga Barang">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    Total Gaji Pegawai
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="number" class="form-control" id="total_gaji_pegawai" name="total_gaji_pegawai" placeholder="Total Gaji Pegawai">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    Total Ongkos
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="number" class="form-control" id="total_ongkos" name="total_ongkos" placeholder="Total Ongkos" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    Tanggal
                                    <input type="date" class="form-control" id="tanggal_ongkos" name="tanggal_ongkos" placeholder="Tanggal Ongkos">
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

        <!-- Modal Ubah -->
        <div aria-hidden="true" aria-labelledby="editOngkosLabel" role="dialog" tabindex="-1" id="edit-ongkos" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="editOngkosLabel">Edit Ongkos</h4>
                    </div>
                    <form action="<?php echo base_url('admin/editOngkos') ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    Listrik
                                    <input type="hidden" id="id_ongkos" name="id_ongkos">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control listrik" id="listrik-Ongkos" name="listrik" placeholder="Listrik">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    Pajak
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control pajak" id="pajak-Ongkos" name="pajak" placeholder="Pajak">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Total Harga Barang
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control total_harga_barang" id="total_harga_barang-Ongkos" name="total_harga_barang" placeholder="Total Harga Barang">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    Total Gaji Pegawai
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control total_gaji_pegawai" id="total_gaji_pegawai-Ongkos" name="total_gaji_pegawai" placeholder="Total Gaji Pegawai">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Total Ongkos
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control total_ongkos" id="total_ongkos-Ongkos" name="total_ongkos" placeholder="Total Ongkos" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    Tanggal
                                    <input type="date" class="form-control" id="tanggal_ongkos-Ongkos" name="tanggal_ongkos" placeholder="Tanggal Ongkos">
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
    <!-- END Modal Ubah -->

</div>
<!-- /. baris  -->

</div>
<!-- /. Page Inner  -->