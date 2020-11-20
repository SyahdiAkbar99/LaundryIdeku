<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Stok Barang</h2>
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
                <table id="example" class="table table-strip table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah Barang</th>
                            <th>Total Harga Barang</th>
                            <th>Digunakan</th>
                            <th>Tersedia</th>
                            <th>Tanggal</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($stok as $st) : ?>
                            <?php if ($st['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $st['kode_barang']; ?></td>
                                    <td><?= $st['nama_barang']; ?></td>
                                    <td><?= $st['harga_satuan']; ?></td>
                                    <td><?= $st['jumlah_barang']; ?></td>
                                    <td><?= $st['total_harga_barang']; ?></td>
                                    <td><?= $st['digunakan']; ?></td>
                                    <td><?= $st['tersedia']; ?></td>
                                    <td><?= $st['tanggal_barang']; ?></td>
                                    <td><button type="button" class="btn btn-warning" role="buttton" data-toggle="modal" data-target="#edit_stok_barang<?php echo $st['id_stok']; ?>"><i class="fa fa-edit"></i></button>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('admin/changeActiveStok') ?>" method="post">
                                            <input type="hidden" name="id_stok" value="<?= $st['id_stok']; ?>" />
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#stok_barang" style="border-radius:10px;"><i class="fa fa-plus"></i>&nbsp;Add</button>

        <!----------------------------------------------------------------- Modal Add ------------------------------------------------------------------->
        <div class="modal fade" id="stok_barang" tabindex="-1" role="dialog" aria-labelledby="stokBarangLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stokBarangLabel">Stok Barang</h5>
                    </div>
                    <form action="<?= base_url('admin/stok_barang'); ?>" method="POST" name="formStokBarang" id="formStokBarang">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                                </div>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" id="tanggal_barang" name="tanggal_barang" placeholder="Tanggal">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    Harga Satuan
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Harga Satuan">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    Jumlah
                                    <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang">
                                </div>
                                <div class="form-group col-md-4">
                                    Digunakan
                                    <input type="number" class="form-control" id="digunakan" name="digunakan" placeholder="digunakan">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    Total Harga
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="number" class="form-control" id="total_harga_barang" name="total_harga_barang" placeholder="Total" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    Tersedia
                                    <input type="number" class="form-control" id="tersedia" name="tersedia" placeholder="tersedia" readonly>
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
        <?php
        foreach ($stok as $st) : ?>
            <div class="modal fade" id="edit_stok_barang<?php echo $st['id_stok']; ?>" tabindex="-1" role="dialog" aria-labelledby="editStokBarangLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editStokBarangLabel">Stok Barang</h5>
                        </div>
                        <?php echo form_open_multipart('admin/editStokBarang'); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" name="id_stok" id="id_stok" value="<?php echo $st['id_stok']; ?>">
                                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value="<?php echo $st['kode_barang']; ?>">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="<?php echo $st['nama_barang']; ?>">
                                </div>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" id="tanggal_barang" name="tanggal_barang" placeholder="Tanggal" value="<?php echo $st['tanggal_barang']; ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    Harga Satuan
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="number" class="form-control" id="hargaSatuan" name="harga_satuan" placeholder="Harga Satuan" value="<?= $st['harga_satuan']; ?>">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    Jumlah
                                    <input type="number" class="form-control" id="jumlahBarang" name="jumlah_barang" placeholder="Jumlah Barang" value="<?= $st['jumlah_barang']; ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    Digunakan
                                    <input type="number" class="form-control" id="Digunakan" name="digunakan" placeholder="digunakan" value="<?= $st['digunakan']; ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    Total Harga
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="number" class="form-control" id="totalHargaBarang" name="total_harga_barang" value="<?php echo $st['total_harga_barang']; ?>" placeholder="Total">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    Tersedia
                                    <input type="number" class="form-control" id="Tersedia" name="tersedia" placeholder="tersedia" value="<?php echo $st['tersedia']; ?>">
                                </div>
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
        <!-------------------------------------------------------------------End Of Modal Edit  ------------------------------------------------------------------->


        <!-- <br><br>
        <div class="row">
            <div class="col-md-12">
                <h2>Jenis Cuci</h2>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table id="jenis_cuci" class="table table-striped table-bordered" style="width:100%">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah Barang</th>
                            <th>Total Harga Barang</th>
                            <th>Digunakan</th>
                            <th>Tersedia</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                    </thead>
                    <tbody> -->

        <!-- <tr>


                        </tr> -->

        <!-- </tbody>
                </table>
            </div>
        </div>
        <a href="../../admin/input/stok_barang_i.php" class="btn btn-info text-center" role="button" style="border-radius:10px;"><i class="fa fa-plus"></i>&nbsp;tambah</a>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h2>Paket Cuci</h2>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table id="paket_cuci" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Digunakan</th>
                            <th>Tersedia</th>
                            <th>Jumlah</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>C4BD1</td>
                            <td>Deterjen Rinso</td>
                            <td>Rp 10.000</td>
                            <td>3</td>
                            <td>3</td>
                            <td>6</td>
                            <td style="text-align:center;">
                                <a href="#" class="btn btn-warning" role="buttton"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger" role="buttton"><i class="fa fa-eraser"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>C4BD2</td>
                            <td>Parfum Melati</td>
                            <td>Rp 5.000</td>
                            <td>3</td>
                            <td>3</td>
                            <td>6</td>
                            <td style="text-align:center;">
                                <a href="#" class="btn btn-warning" role="buttton"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger" role="buttton"><i class="fa fa-eraser"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Digunakan</th>
                            <th>Tersedia</th>
                            <th>Jumlah</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <a href="../../admin/input/stok_barang_i.php" class="btn btn-info text-center" role="button" style="border-radius:10px;"><i class="fa fa-plus"></i>&nbsp;tambah</a>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h2>Bahan Cuci</h2>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table id="bahan_cuci" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Digunakan</th>
                            <th>Tersedia</th>
                            <th>Jumlah</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>C4BD1</td>
                            <td>Deterjen Rinso</td>
                            <td>Rp 10.000</td>
                            <td>3</td>
                            <td>3</td>
                            <td>6</td>
                            <td style="text-align:center;">
                                <a href="#" class="btn btn-warning" role="buttton"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger" role="buttton"><i class="fa fa-eraser"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>C4BD2</td>
                            <td>Parfum Melati</td>
                            <td>Rp 5.000</td>
                            <td>3</td>
                            <td>3</td>
                            <td>6</td>
                            <td style="text-align:center;">
                                <a href="#" class="btn btn-warning" role="buttton"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger" role="buttton"><i class="fa fa-eraser"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Digunakan</th>
                            <th>Tersedia</th>
                            <th>Jumlah</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <a href="../../admin/input/stok_barang_i.php" class="btn btn-info text-center" role="button" style="border-radius:10px;"><i class="fa fa-plus"></i>&nbsp;tambah</a>
        /. baris -->
    </div>
    <!-- baris -->

</div>
<!-- /. Page Inner  -->