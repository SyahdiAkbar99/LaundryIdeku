<div class="container px-2 px-md-4 py-5 mx-auto">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="cardus border-0 px-4 px-5 py-5" style="border-radius:20px;">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('auth/forgotPassword'); ?>" method="POST">
                    <h2 class="text-center">Forgot Password?</h2>
                    <p class="text-center">You can reset your password here.</p>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="email" id=email placeholder="Enter Email Address . . ." value="<?= set_value('email'); ?>">
                            <small class="text-danger" style="font-size: 11px;"><?= form_error('email') ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info text-center mb-1 py-2"> Reset Password </button>
                        </div>
                    </div>
                    <div class="row" style="margin-top: -10px;">
                        <div class="col-md-12">
                            <p class="text-center" style="margin-top: 20px; padding-top:20px"><a href="<?= base_url('auth'); ?>" style="text-decoration: none;"> <i class="fa fa-arrow-left"></i>back to login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>