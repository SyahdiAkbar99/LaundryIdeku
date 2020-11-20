<div class="container px-2 px-md-4 py-5 mx-auto">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="cardus border-0 px-4 px-5 py-5" style="border-radius:20px;">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('auth/changePassword'); ?>" method="POST">
                    <h2 class="text-center">Reset Your Password</h2>
                    <p class="text-center">Change your password for</p>
                    <h5 class="text-center"><?= $this->session->userdata('reset_email'); ?></h5>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="password" name="password1" id="password1" placeholder="Enter new Password . . .">
                            <small class=" text-danger" style="font-size: 11px;"><?= form_error('password1') ?></small>
                        </div>
                        <div class="col-md-12">
                            <input type="password" name="password2" id="password2" placeholder="Repeat Password . . .">
                            <small class=" text-danger" style="font-size: 11px;"><?= form_error('password2') ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info text-center mb-1 py-2"> Change Password </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>