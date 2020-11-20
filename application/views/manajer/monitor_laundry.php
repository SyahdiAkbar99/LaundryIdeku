<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $title; ?></h2>
            </div>
        </div>
        <hr>
        <!-- /. baris  -->
        <div class="row">
            <div class="col-md-6 table-responsive">
                <h3 style="text-align:center; margin-bottom:35px;">Penghasilan Bersih</h3>
                <table id="penghasilan-bersih" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Penghasilan Bersih</th>
                            <th>Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($cleanIncome as $row) : ?>
                            <?php if ($row['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
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
                <h3 style="text-align:center; margin-bottom:35px;">Beban</h3>
                <table id="beban" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Beban</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($burden as $brd) : ?>
                            <?php if ($brd['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $brd['beban']; ?></td>
                                    <td><?= $brd['bulan']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <hr />
        <div class="row">
            <div class="col-md-12 table-responsive">
                <h3 style="text-align:center; margin-bottom:35px;">Laba Rugi Kotor</h3>
                <table id="laba-rugi-kotor" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Laba Rugi Kotor</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($profloss as $pl) : ?>
                            <?php if ($brd['active'] == 1) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= ($pl['omzet'] - $pl['profitloss']) / $row['jum']; ?></td>
                                    <td><?= $pl['bulan']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /. baris  -->
    </div>
    <!-- /. baris  -->
</div>
<!-- /. Page Inner  -->