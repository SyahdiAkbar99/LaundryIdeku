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
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($history as $hst) : ?>
                            <?php if ($hst['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $hst['no_pemesanan']; ?></td>
                                    <td><?= $hst['nama_customer']; ?></td>
                                    <td><?= $hst['nama_kasir']; ?></td>
                                    <td><?= $hst['berat_cucian']; ?></td>
                                    <td><?= ($hst['jenis_cucian'] == 1000) ? 'Baju' : 'Boneka'; ?></td>
                                    <td><?= ($hst['paket_cucian'] == 20000 ? 'Paket Kilat(Kering)' : ($hst['paket_cucian'] == 15000 ? 'Paket Normal (Kering)' : ($hst['paket_cucian'] == 17000 ? 'Paket Kilat (Setrika)' : ($hst['paket_cucian'] == 12000 ? 'Paket Normal (Setrika)' : '')))); ?></td>
                                    <td><?= $hst['waktu_pemesanan']; ?></td>
                                    <td><?= $hst['tanggal_pemesanan']; ?></td>
                                    <td><?= $hst['no_telp_customer']; ?></td>
                                    <td><?= $hst['total_pemesanan']; ?></td>
                                    <td><?= ($hst['status'] == 0 ? 'Tunggu' : ($hst['status'] == 1 ? 'Cuci' : ($hst['status'] == 2 ? 'Setrika' : ($hst['status'] == 3 ? 'Selesai' : '')))); ?></td>
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