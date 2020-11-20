<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $title; ?></h2>
            </div>
        </div>
        <!-- Content  -->
        <hr />
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-lg-8">
                <?= form_open_multipart('admin/editProfile'); ?>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="col-sm-8">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="Email" name="email" value="<?= $user['email']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="col-sm-8">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="Name" name="name" value="<?= $user['name']; ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="col-sm-8">
                                <label for="image">File input</label>
                                <input type="file" id="image" name="image">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/images/profile/') . $user['image']; ?>" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="col-sm-8">
                                <label for="telp">No Telepon</label>
                                <input type="number" class="form-control" id="no_telp" name="no_telp" value="<?= $user['no_telp']; ?>">
                                <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <label for="testi">Testimoni</label><br>
                                <textarea name="testi" id="testi" cols="30" rows="10"><?= $user['testi']; ?></textarea>
                                <?= form_error('testi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" style="border-radius: 10px;">Edit Profile</button>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- / Page Inner  -->