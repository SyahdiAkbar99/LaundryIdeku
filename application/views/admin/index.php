<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Dashboard Admin</h2>
                <h4>Selamat datang <?= $user['name']; ?></h4>
            </div>
        </div>
        <!-- Content  -->
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
                            <th>No Pemesanan</th>
                            <th>Nama Customer</th>
                            <th>Nama Kasir</th>
                            <th>Berat (Kg)</th>
                            <th>Jenis Cucian</th>
                            <th>Paket</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th>No Telpon</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                            <th>Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($data_pem as $dp) : ?>
                            <?php if ($dp['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $dp['no_pemesanan']; ?></td>
                                    <td><?= $dp['nama_customer']; ?></td>
                                    <td><?= $dp['nama_kasir']; ?></td>
                                    <td><?= $dp['berat_cucian']; ?></td>
                                    <td><?= ($dp['jenis_cucian'] == 1000) ? 'Baju' : 'Boneka'; ?></td>
                                    <td><?= ($dp['paket_cucian'] == 20000 ? 'Paket Kilat(Kering)' : ($dp['paket_cucian'] == 15000 ? 'Paket Normal (Kering)' : ($dp['paket_cucian'] == 17000 ? 'Paket Kilat (Setrika)' : ($dp['paket_cucian'] == 12000 ? 'Paket Normal (Setrika)' : '')))); ?></td>
                                    <td><?= $dp['waktu_pemesanan']; ?></td>
                                    <td><?= $dp['tanggal_pemesanan']; ?></td>
                                    <td><?= $dp['no_telp_customer']; ?></td>
                                    <td><?= $dp['total_pemesanan']; ?></td>
                                    <td><?= ($dp['status'] == 0 ? 'Tunggu' : ($dp['status'] == 1 ? 'Cuci' : ($dp['status'] == 2 ? 'Setrika' : ($dp['status'] == 3 ? 'Selesai' : '')))); ?></td>
                                    <td style="text-align:center;">
                                        <a href="<?= base_url('admin/editIndex/') . $dp['id_pemesanan']; ?>" class="btn btn-warning" role="buttton"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td style="text-align:center;">
                                        <form action="<?= base_url('admin/changeActive') ?>" method="post">
                                            <input type="hidden" name="id_pemesanan" value="<?= $dp['id_pemesanan']; ?>" />
                                            <button type="submit" class="btn btn-danger" role="buttton" value="0" name="active" onclick="return confirm('Apakah anda ingin menghapus data ini?');"><i class="fa fa-fw fa-eraser"></i></button>
                                        </form>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="<?= base_url('admin/cetakStruk/') . $dp['id_pemesanan']; ?>" class="btn btn-success" role="buttton" target="_blank"><i class="fa fa-print"></i></a>
                                        <!-- <a href="#" style="border-radius:10px;" class="btn btn-info" role="button" target="_blank">Print Preview</a> -->
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
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#data_pemesanan" style="border-radius:10px;"><i class="fa fa-plus"></i>&nbsp;Add</a>

        <!-- Modal Add -->
        <div class="modal fade" id="data_pemesanan" tabindex="-1" role="dialog" aria-labelledby="dataPemesananLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dataPemesananLabel">Data Pemesanan</h5>
                    </div>
                    <form action="<?= base_url('admin'); ?>" method="POST" name="formDataPemesanan" id="formDataPemesanan">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="no_pemesanan" name="no_pemesanan" placeholder="No Pemesanan">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Nama Customer">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="nama_kasir" name="nama_kasir" placeholder="Nama Kasir">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    Berat Cuci<br>
                                    <div class="input-group">
                                        <input type="number" class="form-control" aria-label="Amount (rounded to the nearest dollar)" name="berat_cucian" placeholder="Berat Cucian" onFocus="startCalc();" onBlur="stopCalc();">
                                        <span class="input-group-addon">Kg</span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    Paket Cuci
                                    <select class="form-control" name="paket_cucian" onFocus="startCalc();" onBlur="stopCalc();">
                                        <option value="20000">Paket Kilat (Kering) </option>
                                        <option value="15000">Paket Normal (Kering)</option>
                                        <option value="17000">Paket Kilat (Setrika) </option>
                                        <option value="12000">Paket Normal (Setrika)</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    Jenis Cuci
                                    <select class="form-control" name="jenis_cucian" onFocus="startCalc();" onBlur="stopCalc();">
                                        <option value="1000">Baju</option>
                                        <option value="3000">Boneka</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    Parfum Cuci
                                    <select class="form-control" name="parfum_cucian" onFocus="startCalc();" onBlur="stopCalc();">
                                        <option value="5000">Parfum Sakura</option>
                                        <option value="7000">Parfum Casablance</option>
                                    </select>
                                </div>
                                <br>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <input type="time" class="form-control" id="waktu_pesan" name="waktu_pemesanan" placeholder="Waktu Pesan">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan" placeholder="Tanggal Pesan">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" id="no_telp_customer" name="no_telp_customer" placeholder="081 . . .">
                                </div>
                                <br>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    Status
                                    <select id="status" class="form-control" name="status">
                                        <option value="0">Tunggu</option>
                                        <option value="1">Cuci</option>
                                        <option value="2">Setrika</option>
                                        <option value="3">Selesai</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    Harga Total
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control input-md" aria-label="Amount (rounded to the nearest dollar)" placeholder="1" name="total_pemesanan" id="total_pemesanan" readonly="readonly">
                                        <span class="input-group-addon">,00</span>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius:10px">Close</button>
                            <button type="submit" class="btn btn-primary" style="border-radius:10px">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End Of Modal Add  -->

        <!-- Modal Edit -->

        <!-- End Of Modal Edit -->

    </div>
</div>
<!-- / Page Inner  -->