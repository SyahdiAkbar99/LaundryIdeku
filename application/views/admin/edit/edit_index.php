<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Form Pemesanan</h2>
            </div>
        </div>
        <!-- /. baris  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <form action="<?= base_url('admin/updateIndex') ?>" method="POST" class="form-inline" name="formEditPemesanan">
                        <?php foreach ($editDataPemesanan as $row) : ?>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <input type="hidden" name="id_pemesanan" id="id_pemesanan" value="<?= $row->id_pemesanan; ?>">
                                    <label for="no_pemesanan">No Pemesanan :</label><br>
                                    <input type="text" class="form-control" id="no_pemesanan" name="no_pemesanan" placeholder="No Pemesanan" value="<?= $row->no_pemesanan ?>" minlength="6" maxlength="12" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nama_customer">Nama Customer :</label><br>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Nama Customer" value="<?= $row->nama_customer ?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nama_kasir">Nama Kasir :</label><br>
                                    <input type="text" class="form-control" id="nama_kasir" name="nama_kasir" placeholder="Nama Kasir" value="<?= $row->nama_kasir; ?>" required>
                                </div>
                                <br>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="parfum_cuci">Parfum Cuci:</label><br>
                                    <select id="parfum_cucian" class="form-control" name="parfum_cucian" required>
                                        <option value="5000" <?= ($row->parfum_cucian == 5000) ? 'selected' : '' ?>>Parfum Sakura</option>
                                        <option value="7000" <?= ($row->parfum_cucian == 7000) ? 'selected' : '' ?>>Parfum Casablance</option>
                                    </select>
                                    <input type="hidden" class="form-control input-sm" id="parfumCuci" name="parfum_cuci" placeholder="value" required><br>
                                    <span class="badge badge-warning">reset kolom supaya perhitungan menjadi valid</span>
                                </div>
                                <div class="form-group col-md-4 col-md-offset-2">
                                    <label for="paket">Paket Cuci:</label><br>
                                    <select id="paket_cucian" class="form-control" name="paket_cucian" required>
                                        <option value="20000" <?= ($row->paket_cucian == 20000) ? 'selected' : '' ?>>Paket Kilat (1 Hari - Kering) </option>
                                        <option value="15000" <?= ($row->paket_cucian == 15000)  ? 'selected' : '' ?>>Paket Normal (2 Hari - Kering)</option>
                                        <option value="17000" <?= ($row->paket_cucian == 17000)  ? 'selected' : '' ?>>Paket Kilat (1 Hari - Setrika) </option>
                                        <option value="12000" <?= ($row->paket_cucian == 12000) ? 'selected' : '' ?>>Paket Normal (2 Hari - Setrika)</option>
                                    </select>
                                    <input type="hidden" class="form-control input-sm" id="paketCuci" name="paket_cuci" placeholder="value" required><br>
                                    <span class="badge badge-warning">reset kolom supaya perhitungan menjadi valid</span>
                                </div>
                                <br>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Jenis Cuci">Jenis Cuci :</label><br>
                                    <select id="jenis_cucian" class="form-control" name="jenis_cucian" required>
                                        <option value="1000" <?= ($row->jenis_cucian == 1000) ? 'selected' : '' ?>>Baju</option>
                                        <option value="3000" <?= ($row->jenis_cucian == 3000) ? 'selected' : '' ?>>Boneka</option>
                                    </select>
                                    <input type="hidden" class="form-control input-sm" id="jenisCuci" name="jenis_cuci" placeholder="value" required><br>
                                    <span class="badge badge-warning">reset kolom supaya perhitungan menjadi valid</span>
                                </div>
                                <div class="form-group col-md-4 col-md-offset-2">
                                    <div class="input-group">
                                        <label for="berat_cuci">Berat Cuci :</label><br>
                                        <div class="input-group">
                                            <input type="number" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="1" id="beratCuci" name="berat_cucian" value="<?= $row->berat_cucian; ?>" pattern="[+]?[0-9]" required>
                                            <span class="input-group-addon">Kg</span>
                                        </div>
                                        <span class="badge badge-warning">reset angka supaya perhitungan menjadi valid</span>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="Waktu Pemesanan">Waktu Pemesanan :</label><br>
                                    <input type="time" class="form-control" id="Waktu_pesan" name="waktu_pemesanan" placeholder="Waktu Pesan" value="<?= $row->waktu_pemesanan; ?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Tanggal Pemesanan">Tanggal Pemesanan :</label><br>
                                    <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pemesanan" placeholder="Tanggal Pesan" value="<?= $row->tanggal_pemesanan; ?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="No Telpon">No Telpon :</label><br>
                                    <input type="number" class="form-control" id="no_telp_customer" name="no_telp_customer" placeholder="081 . . ." value="<?= $row->no_telp_customer; ?>" required>
                                </div>
                                <br>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Status">Status :</label><br>
                                    <select id="status" class="form-control" name="status" value="<?= $row->status; ?>" required>
                                        <option value="0" <?= ($row->status == 0) ? 'selected' : '' ?>>Tunggu</option>
                                        <option value="1" <?= ($row->status == 1) ? 'selected' : '' ?>>Cuci</option>
                                        <option value="2" <?= ($row->status == 2) ? 'selected' : '' ?>>Setrika</option>
                                        <option value="3" <?= ($row->status == 3) ? 'selected' : '' ?>>Selesai</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-md-offset-2">
                                    <label for="total">Harga Total :</label><br>
                                    <input type="text" class="form-control input-sm" id="totalPemesanan" name="total_pemesanan" placeholder="Harga Total" value="<?= $row->total_pemesanan; ?>" readonly>
                                </div>
                                <br>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="form-group col-md-4 col-md-offset-8">
                                    <button type="submit" class="btn btn-primary" style="border-radius:20px;" onclick="return confirmation('Simpan perubahan ?');">Simpan</button>
                                    <a href="<?= base_url('admin'); ?>" style="border-radius:20px;" class="btn btn-default" role="button">Batal</a>
                                </div>
                                <br>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /. Page Inner  -->
</div>