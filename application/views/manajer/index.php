<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <h2><?= 'Selamat Datang ! ' . $user['name'] . '<br><br><br>'; ?></h2>
                </div>
                <div class="col-md-6">
                    <h6 style="text-align: right; color:brown;">*Usahakan baris Pemesanan dan Ongkos yang berada di Admin sama jumlahnya supaya <a href="#pb">Penghasilan Bersih</a> Memiliki Hasil yang Valid</h6>
                </div>

            </div>
            <p style="text-align: center; font-size:35px;"><?= $title; ?></p>
        </div>
        <!-- /. baris  -->
        <hr>
        <div class="row">
            <div class="col-md-4 table-responsive">
                <h3 style="text-align:center; margin-bottom:35px;">Jumlah Pelanggan</h3>
                <table id="pelanggan" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jumlah Pelanggan</th>
                            <th>Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pelangganPerMonth as $row) : ?>
                            <?php if ($row['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row['pelanggan']; ?></td>
                                    <td><?= $row['bulan']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- /. baris  -->


            <div class="col-md-4 table-responsive">
                <h3 style="text-align:center; margin-bottom:35px;">Omzet</h3>
                <table id="omzet" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Omzet</th>
                            <th>Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($omzetPerMonth as $row) : ?>
                            <?php if ($row['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row['pendapatan_bulanan']; ?></td>
                                    <td><?= $row['bulan']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 table-responsive">
                <h3 style="text-align:center; margin-bottom:35px;">Ongkos</h3>
                <table id="unomzet" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ongkos</th>
                            <th>Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($unomzetPerMonth as $row) : ?>
                            <?php if ($row['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row['pengeluaran_bulanan']; ?></td>
                                    <td><?= $row['bulan']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /. baris  -->
        <!-- /. baris  -->
        <hr />
        <div class="row">
            <div class="col-md-6 table-responsive" id="pb">
                <h3 style="text-align:center; margin-bottom:35px;">Penghasilan Bersih</h3>
                <table id="clearOmzet" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Penghasilan Bersih</th>
                            <th>Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($clearOmzet as $row) : ?>
                            <?php if ($row['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= ($row['omzet'] - $row['unomzet']) / $row['jum']; ?></td>
                                    <td><?= $row['bulan']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6 table-responsive">
                <h3 style="text-align:center; margin-bottom:35px;">Omzet Bulan Ini</h3>
                <table id="omz-this-month" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Omzet Bulan Ini</th>
                            <th>Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $omzetThisMonth['pendapatan_bulan_ini']; ?></td>
                            <td><?= $omzetThisMonth['this_month'];; ?></td>
                        </tr>
                        <?php $i++; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /. baris  -->

</div>
<!-- /. Page Inner  -->
</div>