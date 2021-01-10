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
                            <th>Email</th>
                            <th>No Whatsapp</th>
                            <th>Kode Laundry</th>
                            <th>Status</th>
                            <th>Aktif</th>
                            <th>Non Aktif</th>
                            <th>Whatsapp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($pegawai as $pg) : ?>
                            <?php if ($pg['is_active'] >= 0) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $pg['name']; ?></td>
                                    <td><?= $pg['email']; ?></td>
                                    <td><?= $pg['no_telp']; ?></td>
                                    <td><?= $pg['id_entitas']; ?></td>
                                    <td><?= ($pg['is_active'] == 1 ? 'Active' : 'Non Active');?></td>
                                    <td>
                                    <form action="<?= base_url('ceo/changeActiveAbsen') ?>" method="POST">
                                            <input type="hidden" name="id_entitas" value="<?= $pg['id_entitas']; ?>" />
                                            <button type="submit" class="btn btn-success" role="buttton" value="1" name="is_active" onclick="return confirm('Apakah anda ingin Mengaktifkan akun ini?');"><img src="<?= base_url('assets/images/check.png');?>" alt=""></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('ceo/changeActiveAbsen') ?>" method="POST">
                                            <input type="hidden" name="id_entitas" value="<?= $pg['id_entitas']; ?>" />
                                            <button type="submit" class="btn btn-danger" role="buttton" value="0" name="is_active" onclick="return confirm('Apakah anda ingin menonaktifkan akun ini?');"><img src="<?= base_url('assets/images/power-off.png');?>" alt=""></button>
                                        </form>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="https://api.whatsapp.com/send?phone=<?php echo $pg['no_telp'];?>&text=Assalamu'alaikum.. Wr.. Wb%20Masa%20Aktiv%20Akun%20Anda%20Suda%20Berakhir%20silahkan%20di%20perpanjang" class="btn btn-success" role="buttton" target="_blank"><img src="<?= base_url('assets/images/whatsapp.png');?>" alt=""></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

</div>
<!-- /. Page Inner  -->