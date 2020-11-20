<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>My Profile</h2>
            </div>
        </div>
        <!-- Content  -->
        <hr />
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-xs-11">
                <div class="card mb-3" style="max-width: 540px; background-color:aqua; margin: auto;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);">
                    <div class="row">
                        <div class="col-sm-4 text-center" style="padding: 20px 0;">
                            <img src="<?= base_url('assets/images/profile/') . $user['image']; ?>" class="card-img img-circle" alt="...">
                        </div>
                        <div class="col-sm-6" style="margin-top:8px;">
                            <div class="card-body">
                                <h3 class=" card-title text-center" style="font-weight: 900; text-align:center;"><?= $user['name']; ?></h3>
                                <p class="card-text text-center" style="font-weight: 900; text-align:center;"><?= $user['email']; ?></p>
                                <p class="card-text text-center"><small class="text-muted">Member Since<?= date('d F Y',  $user['date_created']); ?></small></p>
                                <p class="card-text text-center" style="font-weight: 900; font-size:medium"><?= $user['no_telp']; ?></p>
                                <h2 class="text-center" style="font-weight: 900; font-size:medium">Testimoni Anda</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <p class="card-text text-center" style="font-weight: 900; text-align:justify; padding:20px 20px;"><?= $user['testi']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Page Inner  -->