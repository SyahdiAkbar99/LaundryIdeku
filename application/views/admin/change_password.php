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
                <form action="<?= base_url('admin/changePassword'); ?>" method="POST">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="col-sm-8">
                                    <label for="Current Password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="col-sm-8">
                                    <label for="new_password1">New Password</label>
                                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="col-sm-8">
                                    <label for="new_password2">Repeat Password</label>
                                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary" style="border-radius: 10px;">Change Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- / Page Inner  -->