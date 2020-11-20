<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $title; ?></h2>
            </div>
        </div>
        <!-- /. baris  -->
        <hr />
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
                                </tr>
                                <?php $i++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /. baris  -->
</div>
<!-- /. Page Inner  -->